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
       // var_dump($data['dateNaissance']);
        if($data && !$data['error']['error']){
            $applicant = new Applicant();
            $applicant_data = [
                "email" => $data['email'],
                "pwd" => $data['pwd'],
                "dateNaissance" => $data['dateNaissance'],
            ];
           // Logger::debug($data);
            $applicant->fromArray($applicant_data);
            $applicant->save();
        }
        $view = new View();
        $view->setView('inscriptionView');
        $view->putData('name', 'moi');
        $view->putData('inscriptionForm', $this->inscriptionForm);
       // $view->putData('err', $err);
   
    }


}
