<?php
/**
 * Created by PhpStorm.
 * User: purwa
 * Date: 28-Feb-16
 * Time: 10:33
 */
Yii::import('zii.widgets.CBreadcrumbs');

class ENewBreadcrumbs extends CBreadcrumbs {
    public $activeLinkTemplate = '<li><a href="{url}">{label}</a><i class="fa fa-angle-right"></i></li>';
    public $inactiveLinkTemplate = '<li class="current">{label}</li>';
    public $breadcrumbLabelTemplate = '<li class="breadcrumbs-label">{label}:</li>';
    public $breadcrumbLabel = 'You are here';
    /**
     * Renders the content of the portlet.
     */
    public function run() {

        if(empty($this->links))
            return;

        $definedLinks = $this->links;

        echo CHtml::openTag($this->tagName,$this->htmlOptions)."\n";
        echo Chtml::openTag('ul',array('class'=>'breadcrumbs-list'))."\n";
        $links=array();
        $links[] = str_replace('{label}', $this->breadcrumbLabel, $this->breadcrumbLabelTemplate);
        if($this->homeLink===null)
            $definedLinks=array(Yii::t('zii','Home') => Yii::app()->homeUrl)+$definedLinks;
        elseif($this->homeLink!==false)
            $links[]=$this->homeLink;
        foreach($definedLinks as $label=>$url)
        {
            if(is_string($label) || is_array($url))
                $links[]=strtr($this->activeLinkTemplate,array(
                    '{url}'=>CHtml::normalizeUrl($url),
                    '{label}'=>$this->encodeLabel ? CHtml::encode($label) : $label,
                ));
            else
                $links[]=str_replace('{label}',$this->encodeLabel ? CHtml::encode($url) : $url,$this->inactiveLinkTemplate);
        }
        echo implode('',$links);
        echo CHtml::closeTag('ul');
        echo CHtml::closeTag($this->tagName);
    }
}