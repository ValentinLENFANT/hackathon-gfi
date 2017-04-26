<?php
class Jobadvert extends Entity{

	protected $id = -1;
	protected $wording;
	protected $description;
	protected $skills;


	public function __construct($wording=null, $description=null, $skills = null){
		parent::__construct();
                
		$this->setLastname($lastname);
		$this->setFirstname($firstname);
		$this->setEmail($email);
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



}

