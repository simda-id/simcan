<?php
namespace hoaaah\LaravelBreadcrumb;

use Illuminate\Support\Facades\Request;

class Breadcrumb {
    public $homeUrl = '';

    public function begin(){
        $urlUnique = NULL;
        foreach(Request::segments() as $segments){
            $urlUnique .= '/'.$segments;
        }
        if($urlUnique != '/') {
            echo '
            <ul class="breadcrumb">
                <i class="fa fa-home"></i>
                <li><a href="/'.$this->homeUrl.'">Home</a></li>';
        }ELSE{
            echo '';
        }
    }

    public function add($params){
        if(!array_key_exists('url', $params)){
            $params['url'] = '';
            $tag = 'span';
        }else{
            $params['url'] = 'href="'.url($params['url']).'"';
            $tag = 'a';
        }
        if(!array_key_exists('label', $params)) $params['label'] = 'Use label params!';
        echo '<li><'.$tag.' '.$params['url'].' >'.$params['label'].'</'.$tag.'></li>';
    }

    public function end(){
        echo '</ul>';
    }
}
