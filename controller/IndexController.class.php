<?php
class IndexController{
    
    public function indexAction($args){

        $view = new View();
        $view->setView('indexView');
        $view->putData('name', 'moi');
    }


}
