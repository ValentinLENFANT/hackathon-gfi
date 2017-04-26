<?php
class ApplicantController{
      /**
     * This will execute before every action
     * @param $args
     */
    private $inscriptionForm;
    public function preDeploy($args)
    {
        $this->inscriptionForm = new Form([
            'options' => [
                'method' => 'POST',
                'action' => '#',
                'submit' => 'Valider',
                'name' => 'postform',
                'class' => '',
                "id" => 'test',
                'enctype' => "multipart/form-data"
            ],
            'data' => [
                "name" => [
                    "type" => "text",
                    "validation" => "text",
                    "value" => '',
                    "label" => 'Nom Prénom',
                    "labelClass" => '',
                    "class" => 'validate',
                    "div_class" => 'input-field'
                ],
                "email" => [
                    "type" => "text",
                    "validation" => "text",
                    "value" => '',
                    "label" => 'Email',
                    "labelClass" => '',
                    "class" => 'validate',
                    "div_class" => 'input-field'
                ],
                "pwd" => [
                    "type" => "password",
                    "validation" => "text",
                    "value" => '',
                    "label" => 'Mot de passe',
                    "labelClass" => '',
                    "class" => 'validate',
                    "div_class" => 'input-field'
                ],
                "confirmation" => [
                    "type" => "password",
                    "validation" => "",
                    "value" => '',
                    "label" => 'Confirmez votre mot de passe',
                    "div_class" => 'btn amber accent-4',
                ],
                "dateNaissance" => [
                    "type" => "date",
                    "validation" => "text",
                    "value" => '',
                    "labelClass" => '',
                    "class" => 'materialize-textarea',
                    "div_class" => 'input-field',
                    "id" => '',
                    "label" => 'Date de naissance'
                ],
            ]
        ]);
    }
    /**
     * This will execute after every action
     * @param $args
     */
    public function postDeploy($args)
    {
    }
    public function indexAction($args){
        $view = new View();
        $view->setView('indexView');
        $view->putData('name', 'moi');
    }
    public function connectAction($args){
        $view = new View();
        $view->setView('indexView');
        $view->putData('name', 'moi');
    }
    public function disconnectAction($args){

   
    }
    public function inscrireAction($args){
        $data = $this->inscriptionForm->validate();
        var_dump($data['name']);
        if(isset($data['name'])){
           $name[] = explode(" ", $data['name']);
           if(isset($name[0])){
                $firtname = $name[0];
           }else{
                $firtname= '';
           }
           if(isset($name[1])){
               $lastname = $name[1];
           }else{
                $lastname= '';
           }
        }else{
           $firtname= '';
           $lastname= '';
        }
        if($data && !$data['error']['error']){
            $applicant = new Applicant();
            $applicant_data = [
                "firtname" => $firtname ,
                "lastname" => $lastname,
                "email" => $data['email'],
                "pwd" => $data['pwd'],
                "dateNaissance" => $data['dateNaissance'],
            ];
          //  Logger::debug($data);
            $applicant->fromArray($applicant_data);
           // $applicant->save();
        }
        $view = new View();
        $view->setView('inscriptionView');
        $view->putData('name', 'moi');
        $view->putData('inscriptionForm', $this->inscriptionForm);
       // $view->putData('err', $err);
   
    }


}
