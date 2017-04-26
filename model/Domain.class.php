<?php
class Domain extends Entity{

	protected $id = -1;
	protected $wording;

	public function __construct($wording=null){
		parent::__construct();
                
		$this->setWording($wording);


	}

        function getId() {
            return $this->id;
        }

        function getWording() {
            return $this->wording;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setWording($wording) {
            $this->wording = $wording;
        }


}

