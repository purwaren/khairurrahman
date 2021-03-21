<?php

/**
 * Created by PhpStorm.
 * User: purwa
 * Date: 28/02/16
 * Time: 22:12
 */
class ELatestNews extends CWidget
{
    public $title = 'Berita Terbaru';
    public $labelMore = 'Selengkapnya';
    public $pageSize = 5;

    /**
     * @var $data
     * Array of news data contain
     * - thumbnail
     * - title
     * - summary
     * - permalink
     * Order by timestamp created, new first
     */
    public $data;

    public function run()
    {
        if(!empty($this->data))
        {
            $items = array(); $i=0; $item='';
            foreach($this->data as $row) {
                $i++;
                $item .= $this->render('_latest', array(
                    'link'=>$row['link'],
                    'title'=>$row['title'],
                    'thumb'=>$row['thumbnail'],
                    'summary'=>$row['summary'],
                    'more'=>$this->labelMore
                ),true);

                if($i%$this->pageSize == 0) {
                    $items[] = $item;
                    $item = '';
                }
            }
            if(!empty($item))
                $items[] = $item;

            $this->render('latest',array(
                'newsList'=>$items
            ));
        }

    }
}