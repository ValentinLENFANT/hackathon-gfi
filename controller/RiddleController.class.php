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
                "idDomain" => [
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
                "file" => [
                    "type" => "file",
                    "validation" => "file",
                    "value" => '',
                    "label" => "Insert the image",
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

    public function indexAction($args)
    {
        $view = new View();
        $view->setView('riddleView');
        $view->putData('name', 'moi');
    }

    public function addRiddleAction($args)
    {
        $data = $this->riddleForm->validate();
        if($data && !$data['error']['error']){
            $riddle = new Riddle();
            $riddle_data = [
                "name" => $data['name'],
                "content" => $data['content'],
                "idDomain" => $data['idDomain'],
                "file" => $data['file'],
            ];
            //  Logger::debug($data);
            $riddle->fromArray($riddle_data);
            $riddle->save();
            move_uploaded_file($data['file']['tmp_name'], 'riddle/' . $data['file']['name']);
        }
        $view = new View();
        $view->setView('inscriptionView');
        $view->putData('name', 'moi');
        $view->putData('inscriptionForm', $this->riddleForm);
    }

    public function displayImageAction($args)
    {
        $riddle = new Riddle();
        $rid = $riddle->getWhere();
        foreach ($rid as $value)
        {
            $test = htmlentities($value->getContent());
        }
        $text = $test;
        // Création de l'image
        header('Content-Type: image/png');
        $im = imagecreate(2500, 1400);
        // Création de quelques couleurs
        $white = imagecolorallocate($im, 255, 255, 255);
        $grey = imagecolorallocate($im, 128, 128, 128);
        $black = imagecolorallocate($im, 0, 0, 0);

        // Le texte à dessiner
        // Remplacez le chemin par votre propre chemin de police
        $font = 'arial.ttf';

        // Ajout du texte
        imagettftext($im, 12, 0, 80, 80, $black, $font, $text);

        // Utiliser imagepng() donnera un texte plus claire,
        // comparé à l'utilisation de la fonction imagejpeg()
        imagepng($im);
        imagedestroy($im);
    }
}