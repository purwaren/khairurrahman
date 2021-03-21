<?php

/**
 * Created by PhpStorm.
 * User: purwa
 * Date: 4/10/16
 * Time: 10:03 PM
 */
class EHotNews extends CWidget
{
    public $labelMore = 'Selengkapnya';
    public $itemCount = 4;

    /**
     * @var $data
     * Array of news data contain
     * - banner
     * - title
     * - summary
     * - permalink
     * Order by timestamp created, new first
     */
    public $data;
    
    public function run()
    {
        $items = '';
        foreach ($this->data as $row)
        {
            $temp = str_replace('<p>','',$row['summary']);
            $temp = str_replace('</p>','',$temp);
            $row['summary'] = $temp;
            $items .= $this->render('_hot',$row,true);
        }
        Yii::app()->clientScript->registerCss('slider',"
            #promo-slider .slides img {
                max-height: 350px;
            }
        ");
        $this->render('hot',array(
            'items'=>$items
        ));
    }
}