<?php

class RiddleController
{
    private $riddleForm;
    public function preDeploy($args)
    {
        $domain = new Domain();
        $domains = $domain->getWhere();
        $this->riddleForm = new Form([
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
                    "label" => "Riddle's name",
                    "labelClass" => '',
                    "class" => 'validate',
                    "div_class" => 'input-field'
                ],
                "content" => [
                    "type" => "text",
                    "validation" => "text",
                    "value" => '',
                    "label" => 'Insert the riddle',
                    "labelClass" => '',
                    "class" => 'validate',
                    "div_class" => 'input-field'
                ],
                "domain" => [
                    "type" => "select",
                    "validation" => "select",
                    "value" => '',
                    "name" => 'domain',
                    "values"=> $domains,
                    "label" => "What is the riddle's field?",
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

    public function addRiddleAction($args){
        $data = $this->riddleForm->validate();
        if($data && !$data['error']['error']){
            $riddle = new Riddle();
            $riddle_data = [
                "name" => $data['name'],
                "content" => $data['content'],
                "idDomain" => $data['domain'],
            ];
            //  Logger::debug($data);
            $riddle->fromArray($riddle_data);
            $riddle->save();
        }
        $view = new View();
        $view->setView('inscriptionView');
        $view->putData('name', 'moi');
        $view->putData('inscriptionForm', $this->riddleForm);
        // $view->putData('err', $err);

    }
}