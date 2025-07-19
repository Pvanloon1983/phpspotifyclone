<?php

class Account {

	private $errorArray;

	public function __construct() {
		$this->errorArray = array();
	}

	public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
		$this->validateUsername($un);
		$this->validateFirstname($fn);
		$this->validateLastname($ln);
		$this->validateEmails($em, $em2);
		$this->validatePasswords($pw, $pw2);

		if(empty($this->errorArray)) {
			
		}
	}

	private function validateUsername($un) {
			
		if(strlen($un) > 25 || strlen($un) < 5) {
			array_push($this->errorArray, "Your username must be between 5 and 25 characters");
			return;
		}

		// TODO: check if username exists

	}

	private function validateFirstname($fn) {
		if(strlen($un) > 25 || strlen($fn) < 2) {
			array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
			return;
		}
	}

	private function validateLastname($ln) {
		if(strlen($un) > 25 || strlen($ln) < 2) {
			array_push($this->errorArray, "Your first last must be between 2 and 25 characters");
			return;
		}
	}

	private function validateEmails($em, $em2) {

		if($em != $em2) {
			array_push($this->errorArray, "Your emails do not match");
			return;
		}

		if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, "Email is invalid");
			return;
		}

		// TODO: check if email already exists

	}

	private function validatePasswords($pw, $pw2) {

		if($pw != $pw2) {
			array_push($this->errorArray, "Your passwords do not macth");
			return;
		}

		// ^ means not
		if(preg_match('/[^A-Za-z0-9]/', $pw)) {
			array_push($this->errorArray, "Your passwords can only contain numbers and letter");
			return;
		}

		 if(strlen($pw) > 30 || strlen($pw) < 5) {
			array_push($this->errorArray, "Your password must be between 5 and 30 characters");
			return;
		}

	}

}

?>