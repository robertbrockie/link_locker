<?php

	class User {

		private $id = 0;
		private $email = '';
		private $password = '';
		private $username = '';

		public function getId() {
			return $this->id;
		}

		public function setId($value) {
			$this->id = $value;
		}

		public function getEmail() {
			return $this->email;
		}

		public function setEmail($value) {
			$this->id = $value;
		}

		public function getPassword() {
			return $this->password;
		}

		public function setPassword($value) {
			$this->password = $value;
		}

		public function getUsername() {
			return $this->username;
		}

		public function setUsername($value) {
			$this->username = $value;
		}
	}