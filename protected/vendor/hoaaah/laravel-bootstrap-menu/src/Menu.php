<?php
namespace hoaaah\LaravelMenu;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

class Menu {
    public $divClass = 'sidebar-nav navbar-collapse';
    public $ulClass = 'nav';
    public $ulId = 'side-menu';
    public $secondLevelClass = "nav-second-level";
    public $thirdLevelClass = "nav-third-level";
    public $activeClass = "active";
    public $linkTemplate = '<a href="{url}">{icon} {label}</a>';
    public $defaultIconHtml = 'fa fa-circle-o';
    public $homeUrl = '';
    public $icon;

    public function render($params){
        if(isset($params['options'])){
            $options = $params['options'];
            if(isset($options['divClass'])) $this->divClass = $options['divClass'];
            if(isset($options['ulClass'])) $this->ulClass = $options['ulClass'];
            if(isset($options['ulId'])) $this->ulId = $options['ulId'];
        }
        $render = '<div class="'.$this->divClass.'"><ul class="'.$this->ulClass.'" id="'.$this->ulId.'">';
        foreach($params['items'] as $items){
            // echo $items['label'];
            if($this->isVisible($items)) $render .= $this->renderItems($items);
        }
        $render .= '</ul></div>';
        echo $render;
    }

    public function renderItems($item){
        if(!isset($item['icon'])){
            $this->icon = $this->defaultIconHtml;
        }else{
            $this->icon = $item['icon'];
        }
        // $isActive = $this->isItemActive($item['url']);
        $render = '<li>';
        if(isset($item['items'])){
            $isActive = '';
            foreach($item['items'] as $ddItem){
                if(isset($ddItem['url']) && $this->isDropdownActive($ddItem['url']) == 'in') $isActive = 'in';
                $isActive .=$isActive;
            }            
            $render .= '<a href="#"><i class="'.$this->icon.'"></i> '.$item['label'].'<i class="fa fa-angle-right pull-right"></i></a>';
            $render.= '<ul class="nav nav-second-level '.$isActive.'">';
            foreach($item['items'] as $item)
            {
                // if(!isset($item['visible']) || $item['visible'] == true){
                if($this->isVisible($item)){
                    if(isset($item['items'])){
                        $render .= '<li><a href="#"><i class="'.$this->icon.'"></i> '.$item['label'].'<i class="fa fa-angle-right pull-right"></i></a>';
                        $render.= '<ul class="nav nav-third-level">';
                        foreach($item['items'] as $item2){
                             if($this->isVisible($item2)){
                                $render .= '<li>';
                                $render .= $this->renderItem($item2);
                                $render .= '</li>';
                             }
                        }
                        $render .='</ul></li>';
                    }else{
                        if($this->isVisible($item)){
                            $render .= '<li>';
                            $render .= $this->renderItem($item);
                            $render .= '</li>';
                        }
                    }

                }
            }
            $render .='</ul>';
        }else{
            $render .= $this->renderItem($item);
        }
        $render .= '</li>';

        return $render;
    }

    public function renderItem($item){
        if(!isset($item['icon'])){
            $this->icon = $this->defaultIconHtml;
        }else{
            $this->icon = $item['icon'];
        }
        $isActive = $this->isItemActive($item);
        return '<a href="'.url($item['url']).'" '.$isActive.' > <i class="'.$this->icon.'"></i> '.$item['label'].'</a>';
    }

    protected function isItemActive($item)
    {
        /*
        // get current controller
        $action = Route::current();
        $action = explode('\\', $action->action['controller']);
        $action = end($action);
        $action = explode('@', $action);
        $currentAction = $action[0];

        // get item controller
        $request = Request::create($item['url'], 'GET');
        $route = Route::getRoutes()->match($request);
        $given = $route->getActionName();
        $given = explode('\\', $given);
        $given = end($given);
        $given = explode('@', $given);
        $itemAction = $given[0];        
        if(isset($item['url']) && $currentAction == $itemAction ){
            return 'class="active"';
        }else{
        */
            return '';
        // }
    }

    protected function isDropdownActive($url)
    {
        /*
        // get current controller
        $action = Route::current();
        $action = explode('\\', $action->action['controller']);
        $action = end($action);
        $action = explode('@', $action);
        $currentAction = $action[0];

        // get item controller
        $request = Request::create($url, 'GET');
        $route = Route::getRoutes()->match($request);
        $given = $route->getActionName();
        $given = explode('\\', $given);
        $given = end($given);
        $given = explode('@', $given);
        $itemAction = $given[0];        
        if($currentAction == $itemAction ){
            return 'in';
        }else{
        */
            return '';
        // }
    }    

    protected function isVisible($item){
        if(isset($item['visible']) && $item['visible'] == false ){
            return false;
        }else{
            return true;
        }
    }
}
