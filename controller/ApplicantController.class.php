<?php
class ApplicantController{
      /**
     * This will execute before every action
     * @param $args
     */
    public function preDeploy($args)
    {
    }
    /**
     * This will execute after every action
     * @param $args
     */
    public function postDeploy($args)
    {
    }
    public function connectAction($args){

        $view = new View();
        $view->setView('indexView');
        $view->putData('name', 'moi');
    }
    public function disconnectAction($args){

   
    }
    public function inscrireAction($args){

   
    }


}
