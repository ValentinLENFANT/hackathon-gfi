<?php
class ApplicantController{
      /**
     * This will execute before every action
     * @param $args
     */
    private $inscriptionForm;
    private $connexionForm;
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
                    "label" => 'Prénom Nom',
                    "labelClass" => '',
                    "class" => 'validate',
                    "div_class" => 'input-field'
                ],
                "email" => [
                    "type" => "text",
                    "validation" => "email",
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
                    "validation" => "text",
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
        $this->connexionForm = new Form([
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
    public function connectAction($args)
    {
        $data = $this->connexionForm->validate();
        $applicant = new Applicant();
        if($data && !$data['error']['error'] && !isset($err)){
            $applicant_data = [
                "email" => $data['email'],
                "pwd" => $data['pwd'],
            ];
            Logger::debug($data);
            $applicantConnect = $applicant->getWhere($applicant_data);
            if($applicantConnect){
               $view = new View();
               $view->setView('applicantView'); 
               $view->putData('name', 'moi');
            }
        }
        $view = new View();
        $view->setView('connectView');
        $view->putData('name', 'moi');
        $view->putData('connexionForm', $this->connexionForm);
    }
    public function disconnectAction($args){

   
    }
    public function inscrireAction($args){
        $data = $this->inscriptionForm->validate();
       // var_dump($data['confirmation']);
       // $pattern = '#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#';
        $err= array();
        if(isset($data['confirmation']) && isset($data['pwd'])){
           if(!(strlen($data['pwd']) >=8)){
               $err[] ='le mot de passe n\'est pas conforme, 8 caractére minimum';
           }
          /* if (!preg_match($pattern, $data['pwd'])){
                 $err[] ='le mot de passe n\'est pas conforme, Majescule, entier recomamlmjkhkjefjl';
           }*/
           if(!($data['pwd']==$data['confirmation'])){
               $err[] ='le mot de passe ne correspond pas sa confirmation';
           }
        }
        //var_dump($err);
        if(isset($data['name'])){
               $name = explode(" ", $data['name']);
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
           // var_dump($err);
        if($data && !$data['error']['error']){
                $applicant = new Applicant();
                $applicant_data = [
                    "firstname" => $firtname ,
                    "lastname" => $lastname,
                    "email" => $data['email'],
                    "pwd" => $data['pwd'],
                    "dateNaissance" => $data['dateNaissance'],
                ];
                Logger::debug($data);
                $applicant->fromArray($applicant_data);
                $applicant->save();
        }
        $view = new View();
        $view->setView('inscriptionView');
        $view->putData('name', 'moi');
        $view->putData('inscriptionForm', $this->inscriptionForm);
        if(isset($err)){
            $view->putData('err', $err);
        }
   
    }


}
