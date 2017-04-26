<?php
class Applicant extends Entity{

	protected $id;
	protected $firstname;
	protected $lastname;
	protected $email;
	protected $phoneNumber;
	protected $address;
	protected $skills;
	protected $pwd;
	protected $dateNaissance;
	protected $gender;
	protected $admin;


	public function __construct($lastname=null,$firstname=null,$email = null,$phoneNumber=null,$address=null,$skills=null,$pwd = null,$dateNaissance = null,$gender=null ){
		parent::__construct();
                
		$this->setLastname($lastname);
		$this->setFirstname($firstname);
		$this->setEmail($email);
		$this->setPhoneNumber($phoneNumber);
		$this->setaddress($address);
		$this->setSkills($skills);
		$this->setPwd($pwd);
		$this->setDateNaissance($dateNaissance);
		$this->setGender($gender);
	}


        function getId() {
            return $this->id;
        }

        function getFirstname() {
            return $this->firstname;
        }

        function getLastname() {
            return $this->lastname;
        }

        function getEmail() {
            return $this->email;
        }

        function getPhoneNumber() {
            return $this->phoneNumber;
        }

        function getaddress() {
            return $this->address;
        }

        function getSkills() {
            return $this->skills;
        }

        function getPwd() {
            return $this->pwd;
        }

        function getDateNaissance() {
            return $this->dateNaissance;
        }

        function getGender() {
            return $this->gender;
        }
        
        function getAdmin() {
            return $this->admin;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setFirstname($firstname) {
            $this->firstname = $firstname;
        }

        function setLastname($lastname) {
            $this->lastname = $lastname;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setPhoneNumber($phoneNumber) {
            $this->phoneNumber = $phoneNumber;
        }

        function setaddress($address) {
            $this->address = $address;
        }

        function setSkills($skills) {
            $this->skills = $skills;
        }

        function setPwd($pwd) {
            $this->pwd = $pwd;
        }

        function setDateNaissance($dateNaissance) {
            $this->dateNaissance = $dateNaissance;
        }

        function setGender($gender) {
            $this->gender = $gender;
        }
        
        function setAdmin($admin) {
            $this->admin = $admin;
        }



}

