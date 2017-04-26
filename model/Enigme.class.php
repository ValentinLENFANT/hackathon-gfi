<?php
class Enigme extends Entity{

	protected $id = -1;
	protected $name;
	protected $content;
	protected $idDomain;
        
	public function __construct($name=null,$content=null,$idDomain = null){
		parent::__construct();
                
		$this->setName($name);
		$this->setContent($content);
		$this->setIdDomain($idDomain);

	}
        function getId() {
            return $this->id;
        }

        function getName() {
            return $this->name;
        }

        function getContent() {
            return $this->content;
        }

        function getIdDomain() {
            return $this->idDomain;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setName($name) {
            $this->name = $name;
        }

        function setContent($content) {
            $this->content = $content;
        }

        function setIdDomain($idDomain) {
            $this->idDomain = $idDomain;
        }



}

