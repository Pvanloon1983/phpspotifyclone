<?php

class Account {

    private $conn;
	private $errorArray;

	public function __construct($conn) {
        $this->conn = $conn;
		$this->errorArray = array();
	}

	public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
		$this->validateUsername($un);
		$this->validateFirstname($fn);
		$this->validateLastname($ln);
		$this->validateEmails($em, $em2);
		$this->validatePasswords($pw, $pw2);

		if(empty($this->errorArray)) {
			// Insert into DB
            return $this->insertUserDetails($un, $fn, $ln, $em, $pw);
		} else {
			return false;
		}
	}

	public function getError($error){
		if(!in_array($error, $this->errorArray)) {
			$error = "";
		}
		return "<span class='errorMessage'>$error</span>";
	}

    private function insertUserDetails($un, $fn, $ln, $em, $pw) {
        $encryptedPw = password_hash($pw, PASSWORD_DEFAULT);
        $profilePic = "assets/images/profile-pics/head_emeralds.png";
        $date = date("Y-m-d");

        $result = mysqli_query($this->conn, "INSERT INTO users VALUES (NULL, '$un', '$fn', '$ln', '$em','$encryptedPw', '$date', '$profilePic')");

        return $result;
    }

	private function validateUsername($un) {
			
		if($un == null || strlen($un) > 25 || strlen($un) < 5) {
			array_push($this->errorArray, Constants::$usernameCharacters);
			return;
		}

		// TODO: check if username exists

	}

	private function validateFirstname($fn) {
		if($fn == null || strlen($fn) > 25 || strlen($fn) < 2) {
			array_push($this->errorArray, Constants::$firstNameCharacters);
			return;
		}
	}

	private function validateLastname($ln) {
		if($ln == null || strlen($ln) > 25 || strlen($ln) < 2) {
			array_push($this->errorArray, Constants::$lastNameCharacters);
			return;
		}
	}

	private function validateEmails($em, $em2) {

		if($em != $em2) {
			array_push($this->errorArray, Constants::$emailsDoNotMatch);
			return;
		}

		if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			array_push($this->errorArray, Constants::$emailInvalid);
			return;
		}

		// TODO: check if email already exists

	}

	private function validatePasswords($pw, $pw2) {

		if($pw != $pw2) {
			array_push($this->errorArray, Constants::$passwordsDoNotMatch);
			return;
		}

		// ^ means not
		if($pw != null && preg_match('/[^A-Za-z0-9]/', $pw)) {
			array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
			return;
		}

		 if($pw == null || strlen($pw) > 30 || strlen($pw) < 5) {
			array_push($this->errorArray, Constants::$passwordCharacters);
			return;
		}

	}

}

?>