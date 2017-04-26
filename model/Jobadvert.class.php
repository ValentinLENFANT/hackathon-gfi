<?php
class Jobadvert extends Entity{

	protected $id = -1;
	protected $wording;
	protected $description;
	protected $skills;
	protected $idDomain;
	protected $idEnigme;


	public function __construct($wording=null, $description=null, $skills = null){
		parent::__construct();
                
		$this->setWording($wording);
		$this->setDescription($description);
		$this->setSkills($skills);
	}

        function getId() {
            return $this->id;
        }

        function getWording() {
            return $this->wording;
        }

        function getDescription() {
            return $this->description;
        }

        function getSkills() {
            return $this->skills;
        }

        function getIdDomain() {
            return $this->idDomain;
        }

        function getIdEnigme() {
            return $this->idEnigme;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setWording($wording) {
            $this->wording = $wording;
        }

        function setDescription($description) {
            $this->description = $description;
        }

        function setSkills($skills) {
            $this->skills = $skills;
        }

        function setIdDomain($idDomain) {
            $this->idDomain = $idDomain;
        }

        function setIdEnigme($idEnigme) {
            $this->idEnigme = $idEnigme;
        }


}

