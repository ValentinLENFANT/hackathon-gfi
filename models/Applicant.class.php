<?php
class Applicant extends Entity{

	protected $id = -1;
	protected $firstname;
	protected $lastname;
	protected $email;
	protected $phoneNumber;
	protected $adress;
	protected $skills;
	protected $pwd;
	protected $age;
	protected $gender;


	public function __construct($lastname=null,$firstname=null,$email = null,$phoneNumber=null,$adress=null,$skills=null,$pwd = null,$age = null,$gender=null ){
		parent::__construct();
                
		$this->setLastname($lastname);
		$this->setFirstname($firstname);
		$this->setEmail($email);
		$this->setPhoneNumber($phoneNumber);
		$this->setAdress($adress);
		$this->setSkills($skills);
		$this->setPwd($pwd);
		$this->setAge($age);
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

        function getAdress() {
            return $this->adress;
        }

        function getSkills() {
            return $this->skills;
        }

        function getPwd() {
            return $this->pwd;
        }

        function getAge() {
            return $this->age;
        }

        function getGender() {
            return $this->gender;
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

        function setAdress($adress) {
            $this->adress = $adress;
        }

        function setSkills($skills) {
            $this->skills = $skills;
        }

        function setPwd($pwd) {
            $this->pwd = $pwd;
        }

        function setAge($age) {
            $this->age = $age;
        }

        function setGender($gender) {
            $this->gender = $gender;
        }



}

