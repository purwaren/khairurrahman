<?php

/**
 * Created by PhpStorm.
 * User: purwa
 * Date: 14/08/16
 * Time: 10:25
 */
class ELatestVideo extends CWidget
{
    public $title='Video';
    public $pageSize=2;
    /**
     * @var AlbumContent
     */
    public $data;
    public $album;

    public function run()
    {
        if(!empty($this->album))
        {
            foreach ($this->data as $idx=>$row)
            {
                $items[] = array(
                    'url' => $row->getEmbedUrl(),
                    'caption' => $row->caption,
                );
                if($idx > $this->pageSize)
                break;
            }
            $this->render('video',array(
                'items'=>$items,
                'title'=>$this->title,
                'album'=>$this->album
            ));
        }
    }
}