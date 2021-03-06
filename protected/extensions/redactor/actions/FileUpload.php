<?php

/**
 * Redactor widget file upload action.
 *
 * @param string $attr Model attribute
 * @throws CHttpException
 */

class FileUpload extends CAction
{
	public $uploadPath;
	public $uploadUrl;
	public $uploadCreate=false;
	public $permissions=0774;

	public function run($attr)
	{
		$name=strtolower($this->getController()->getId());
		$attribute=strtolower((string)$attr);

		if ($this->uploadPath===null) {
			$path=Yii::app()->basePath.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'uploads';
			$this->uploadPath=realpath($path);
			if ($this->uploadPath===false && $this->uploadCreate===true) {
				if (!mkdir($path,$this->permissions,true)) {
					throw new CHttpException(500,CJSON::encode(
						array('error'=>'Could not create upload folder "'.$path.'".')
					));
				}
			}
		}
		if ($this->uploadUrl===null) {
			$this->uploadUrl=Yii::app()->request->baseUrl .'/uploads';
		}

		// Make Yii think this is a AJAX request.
		$_SERVER['HTTP_X_REQUESTED_WITH']='XMLHttpRequest';

		$file=CUploadedFile::getInstanceByName('file');
		if ($file instanceof CUploadedFile) {
			$attributePath=$this->uploadPath.DIRECTORY_SEPARATOR.$name.DIRECTORY_SEPARATOR.$attribute;
			$fileName=$this->sanitizeFilename($file->getName());
			if (!is_dir($attributePath)) {
				if (!mkdir($attributePath,$this->permissions,true)) {
					throw new CHttpException(500,CJSON::encode(
						array('error'=>'Could not create folder "'.$attributePath.'". Make sure "uploads" folder is writable.')
					));
				}
			}
			$path=$attributePath.DIRECTORY_SEPARATOR.$fileName;
			if (file_exists($path) || !$file->saveAs($path)) {
				throw new CHttpException(500,CJSON::encode(
					array('error'=>'Could not save file or file exists: "'.$path.'".')
				));
			}
			$attributeUrl=$this->uploadUrl.'/'.$name.'/'.$attribute.'/'.$fileName;
			$data = array(
				'filelink'=>$attributeUrl,
				'filename'=>$fileName,
			);
			echo CJSON::encode($data);
			exit;
		} else {
			throw new CHttpException(500,CJSON::encode(
				array('error'=>'Could not upload file.')
			));
		}
	}

	protected function sanitizeFilename($name) {
		// char replace table found at: http://www.php.net/manual/en/function.strtr.php#98669
		$replaceChars=array(
			'??'=>'S', '??'=>'s', '??'=>'Dj','??'=>'Z', '??'=>'z', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A', '??'=>'A',
			'??'=>'A', '??'=>'A', '??'=>'C', '??'=>'E', '??'=>'E', '??'=>'E', '??'=>'E', '??'=>'I', '??'=>'I', '??'=>'I',
			'??'=>'I', '??'=>'N', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'O', '??'=>'U', '??'=>'U',
			'??'=>'U', '??'=>'U', '??'=>'Y', '??'=>'B', '??'=>'Ss','??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a', '??'=>'a',
			'??'=>'a', '??'=>'a', '??'=>'c', '??'=>'e', '??'=>'e', '??'=>'e', '??'=>'e', '??'=>'i', '??'=>'i', '??'=>'i',
			'??'=>'i', '??'=>'o', '??'=>'n', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'o', '??'=>'u',
			'??'=>'u', '??'=>'u', '??'=>'y', '??'=>'y', '??'=>'b', '??'=>'y', '??'=>'f'
		);
		$name=strtr($name, $replaceChars);
		// convert & to "and", @ to "at", and # to "number"
		$name=preg_replace(array('/[\&]/', '/[\@]/', '/[\#]/'), array('-and-', '-at-', '-number-'), $name);
		$name=preg_replace('/[^(\x20-\x7F)]*/','', $name); // removes any special chars we missed
		$name=str_replace(' ', '-', $name); // convert space to hyphen
		$name=str_replace('\'', '', $name); // removes apostrophes
		$name=preg_replace('/[^\w\-\.]+/', '', $name); // remove non-word chars (leaving hyphens and periods)
		$name=preg_replace('/[\-]+/', '-', $name); // converts groups of hyphens into one
		return strtolower($name);
	}
}