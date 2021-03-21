<?php
/**
 * COciSchema class file.
 *
 * @author Ricardo Grana <rickgrana@yahoo.com.br>
 * @link http://www.yiiframework.com/
 * @copyright 2008-2013 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * COciSchema is the class for retrieving metadata information from an Oracle database.
 *
 * @property string $defaultSchema Default schema.
 *
 * @author Ricardo Grana <rickgrana@yahoo.com.br>
 * @package system.db.schema.oci
 */
class COciSchema extends CDbSchema
{
	private $_defaultSchema = '';

	/**
	 * @var array the abstract column types mapped to physical column types.
	 * @since 1.1.6
	 */
	public $columnTypes=array(
		'pk' => 'NUMBER(10) NOT NULL PRIMARY KEY',
		'bigpk' => 'NUMBER(20) NOT NULL PRIMARY KEY',
		'string' => 'VARCHAR2(255)',
		'text' => 'CLOB',
		'integer' => 'NUMBER(10)',
		'bigint' => 'NUMBER(20)',
		'float' => 'NUMBER',
		'decimal' => 'NUMBER',
		'datetime' => 'TIMESTAMP',
		'timestamp' => 'TIMESTAMP',
		'time' => 'TIMESTAMP',
		'date' => 'DATE',
		'binary' => 'BLOB',
		'boolean' => 'NUMBER(1)',
		'money' => 'NUMBER(19,4)',
	);

	/**
	 * Quotes a table name for use in a query.
	 * A simple table name does not schema prefix.
	 * @param string $name table name
	 * @return string the properly quoted table name
	 * @since 1.1.6
	 */
	public function quoteSimpleTableName($name)
	{
		return '"'.$name.'"';
	}

	/**
	 * Quotes a column name for use in a query.
	 * A simple column name does not contain prefix.
	 * @param string $name column name
	 * @return string the properly quoted column name
	 * @since 1.1.6
	 */
	public function quoteSimpleColumnName($name)
	{
		return '"'.$name.'"';
	}

	/**
	 * Creates a command builder for the database.
	 * This method may be overridden by child classes to create a DBMS-specific command builder.
	 * @return CDbCommandBuilder command builder instance
	 */
	protected function createCommandBuilder()
	{
		return new COciCommandBuilder($this);
	}

	/**
	 * @param string $schema default schema.
	 */
	public function setDefaultSchema($schema)
	{
		$this->_defaultSchema=$schema;
	}

	/**
	 * @return string default schema.
	 */
	public function getDefaultSchema()
	{
		if (!strlen($this->_defaultSchema))
		{
			$this->setDefaultSchema(strtoupper($this->getDbConnection()->username));
		}

		return $this->_defaultSchema;
    }

	/**
	 * @param string $table table name with optional schema name prefix, uses default schema name prefix is not provided.
	 * @return array tuple as ($schemaName,$tableName)
	 */
	protected function getSchemaTableName($table)
	{
		$table = strtoupper($table);
		if(count($parts= explode('.', str_replace('"','',$table))) > 1)
			return array($parts[0], $parts[1]);
		else
			return array($this->getDefaultSchema(),$parts[0]);
	}

	/**
	 * Loads the metadata for the specified table.
	 * @param string $name table name
	 * @return CDbTableSchema driver dependent table metadata.
	 */
	protected function loadTable($name)
	{
		$table=new COciTableSchema;
		$this->resolveTableNames($table,$name);

		if(!$this->findColumns($table))
			return null;
		$this->findConstraints($table);

		return $table;
	}

	/**
	 * Generates various kinds of table names.
	 * @param COciTableSchema $table the table instance
	 * @param string $name the unquoted table name
	 */
	protected function resolveTableNames($table,$name)
	{
		$parts=explode('.',str_replace('"','',$name));
		if(isset($parts[1]))
		{
			$schemaName=$parts[0];
			$tableName=$parts[1];
		}
		else
		{
			$schemaName=$this->getDefaultSchema();
			$tableName=$parts[0];
		}

		$table->name=$tableName;
		$table->schemaName=$schemaName;
		if($schemaName===$this->getDefaultSchema())
			$table->rawName=$this->quoteTableName($tableName);
		else
			$table->rawName=$this->quoteTableName($schemaName).'.'.$this->quoteTableName($tableName);
	}

	/**
	 * Collects the table column metadata.
	 * @param COciTableSchema $table the table metadata
	 * @return boolean whether the table exists in the database
	 */
	protected function findColumns($table)
	{
		$schemaName=$table->schemaName;
		$tableName=$table->name;

		$sql=<<<EOD
	SELECT UPPER(column_name) as COLUMN_NAME, UPPER(data_type) as DATA_TYPE, nullable, data_default, key, column_comment
	FROM www_tab_columns 
	WHERE UPPER(table_name) = UPPER('{$tableName}')
	ORDER BY column_id
EOD;

		$command=$this->getDbConnection()->createCommand($sql);

		if(($columns=$command->queryAll())===array()){
			return false;
		}

		foreach($columns as $column)
		{
			$c=$this->createColumn($column);

			$table->columns[$c->name]=$c;
			if($c->isPrimaryKey)
			{
				if($table->primaryKey===null)
					$table->primaryKey=$c->name;
				elseif(is_string($table->primaryKey))
					$table->primaryKey=array($table->primaryKey,$c->name);
				else
					$table->primaryKey[]=$c->name;
				$table->sequenceName='';
				$c->autoIncrement=true;
			}
		}
		return true;
	}

	/**
	 * Creates a table column.
	 * @param array $column column metadata
	 * @return CDbColumnSchema normalized column metadata
	 */
	protected function createColumn($column)
	{
		$c=new COciColumnSchema;
		$c->name=$column['COLUMN_NAME'];
		$c->rawName=$this->quoteColumnName($c->name);
		$c->allowNull=$column['NULLABLE']==='Y';
		$c->isPrimaryKey=strpos($column['KEY'],'P')!==false;
		$c->isForeignKey=false;
		$c->init($column['DATA_TYPE'],$column['DATA_DEFAULT']);
		$c->comment=$column['COLUMN_COMMENT']===null ? '' : $column['COLUMN_COMMENT'];

		return $c;
	}

	/**
	 * Collects the primary and foreign key column details for the given table.
	 * @param COciTableSchema $table the table metadata
	 */
	protected function findConstraints($table)
	{
		$sql=<<<EOD
        SELECT UPPER(constraint_type) as CONSTRAINT_TYPE, UPPER(column_name) as COLUMN_NAME, UPPER(position) as POSITION, UPPER(r_constraint_name) as R_CONSTRAINT_NAME,
        UPPER(table_ref) as TABLE_REF, UPPER(column_ref) as COLUMN_REF
        FROM www_tab_cons
        WHERE UPPER(table_name) = UPPER('{$table->name}')
        ORDER BY position
EOD;
		$command=$this->getDbConnection()->createCommand($sql);
		foreach($command->queryAll() as $row)
		{
			if($row['CONSTRAINT_TYPE']==='R')   // foreign key
			{
				$name = $row["COLUMN_NAME"];
				$table->foreignKeys[$name]=array($row["TABLE_REF"], $row["COLUMN_REF"]);
				if(isset($table->columns[$name]))
					$table->columns[$name]->isForeignKey=true;
			}

		}
	}

	/**
	 * Returns all table names in the database.
	 * @param string $schema the schema of the tables. Defaults to empty string, meaning the current or default schema.
	 * If not empty, the returned table names will be prefixed with the schema name.
	 * @return array all table names in the database.
	 */
	protected function findTableNames($schema='')
	{
		if($schema==='')
		{
			$sql=<<<EOD
SELECT UPPER(table_name) as TABLE_NAME, UPPER(table_schema) as TABLE_SCHEMA FROM www_tables
EOD;
			$command=$this->getDbConnection()->createCommand($sql);
		}
		else
		{
			$sql=<<<EOD
SELECT UPPER(table_name) as TABLE_NAME, UPPER(table_schema) as TABLE_SCHEMA FROM www_tables
WHERE UPPER(table_schema) = UPPER(:schema)
EOD;
			$command=$this->getDbConnection()->createCommand($sql);
			$command->bindParam(':schema',$schema);
		}

		$rows=$command->queryAll();
		$names=array();
		foreach($rows as $row)
		{
			if($schema===$this->getDefaultSchema() || $schema==='')
				$names[]=$row['TABLE_NAME'];
			else
				$names[]=$row['TABLE_SCHEMA'].'.'.$row['TABLE_NAME'];
		}
		return $names;
	}

	/**
	 * Builds a SQL statement for renaming a DB table.
	 * @param string $table the table to be renamed. The name will be properly quoted by the method.
	 * @param string $newName the new table name. The name will be properly quoted by the method.
	 * @return string the SQL statement for renaming a DB table.
	 * @since 1.1.6
	 */
	public function renameTable($table, $newName)
	{
		return 'ALTER TABLE ' . $this->quoteTableName($table) . ' RENAME TO ' . $this->quoteTableName($newName);
	}

	/**
	 * Builds a SQL statement for changing the definition of a column.
	 * @param string $table the table whose column is to be changed. The table name will be properly quoted by the method.
	 * @param string $column the name of the column to be changed. The name will be properly quoted by the method.
	 * @param string $type the new column type. The {@link getColumnType} method will be invoked to convert abstract column type (if any)
	 * into the physical one. Anything that is not recognized as abstract type will be kept in the generated SQL.
	 * For example, 'string' will be turned into 'varchar(255)', while 'string not null' will become 'varchar(255) not null'.
	 * @return string the SQL statement for changing the definition of a column.
	 * @since 1.1.6
	 */
	public function alterColumn($table, $column, $type)
	{
		$type=$this->getColumnType($type);
		$sql='ALTER TABLE ' . $this->quoteTableName($table) . ' MODIFY '
			. $this->quoteColumnName($column) . ' '
			. $this->getColumnType($type);
		return $sql;
	}

	/**
	 * Builds a SQL statement for dropping an index.
	 * @param string $name the name of the index to be dropped. The name will be properly quoted by the method.
	 * @param string $table the table whose index is to be dropped. The name will be properly quoted by the method.
	 * @return string the SQL statement for dropping an index.
	 * @since 1.1.6
	 */
	public function dropIndex($name, $table)
	{
		return 'DROP INDEX '.$this->quoteTableName($name);
	}

	/**
	 * Resets the sequence value of a table's primary key.
	 * The sequence will be reset such that the primary key of the next new row inserted
	 * will have the specified value or max value of a primary key plus one (i.e. sequence trimming).
	 *
	 * Note, behavior of this method has changed since 1.1.14 release. Please refer to the following
	 * issue for more details: {@link https://github.com/yiisoft/yii/issues/2241}
	 *
	 * @param CDbTableSchema $table the table schema whose primary key sequence will be reset
	 * @param integer|null $value the value for the primary key of the next new row inserted.
	 * If this is not set, the next new row's primary key will have the max value of a primary
	 * key plus one (i.e. sequence trimming).
	 * @since 1.1.13
	 */
	public function resetSequence($table,$value=null)
	{
		if($table->sequenceName===null)
			return;

		if($value!==null)
			$value=(int)$value;
		else
		{
			$value=(int)$this->getDbConnection()
				->createCommand("SELECT MAX(\"{$table->primaryKey}\") FROM {$table->rawName}")
				->queryScalar();
			$value++;
		}
		$this->getDbConnection()
			->createCommand("DROP SEQUENCE \"{$table->name}_SEQ\"")
			->execute();
		$this->getDbConnection()
			->createCommand("CREATE SEQUENCE \"{$table->name}_SEQ\" START WITH {$value} INCREMENT BY 1 NOMAXVALUE NOCACHE")
			->execute();
	}

	/**
	 * Enables or disables integrity check.
	 * @param boolean $check whether to turn on or off the integrity check.
	 * @param string $schema the schema of the tables. Defaults to empty string, meaning the current or default schema.
	 * @since 1.1.14
	 */
	public function checkIntegrity($check=true,$schema='')
	{
		if($schema==='')
			$schema=$this->getDefaultSchema();
		$mode=$check ? 'ENABLE' : 'DISABLE';
		foreach($this->getTableNames($schema) as $table)
		{
			$constraints=$this->getDbConnection()
				->createCommand("SELECT CONSTRAINT_NAME FROM USER_CONSTRAINTS WHERE TABLE_NAME=:t AND OWNER=:o")
				->queryColumn(array(':t'=>$table,':o'=>$schema));
			foreach($constraints as $constraint)
				$this->getDbConnection()
					->createCommand("ALTER TABLE \"{$schema}\".\"{$table}\" {$mode} CONSTRAINT \"{$constraint}\"")
					->execute();
		}
	}
}
