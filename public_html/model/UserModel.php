<?php

	include_once('lib/database.php');
	include_once('model/User.php');

	class UserModel {

		//database connection
		public $db;

		public function __construct() {
			$this->db = new Database();
			$this->db->connect();
		}

		public function __destruct() {
			$this->db->disconnect();
		}

		public function loadFromRow($row) {

			$user = new User();
			$user->setId($row['id']);
			$user->setEmail($row['email']);
			$user->setPassword($row['password']);
			$user->setUsername($row['username']);

			return $user;
		}

		public function load($id) {
			$query = sprintf("SELECT * FROM user WHERE id = '%d'",
				mysql_real_escape_string($id));

			$row = $this->db->query($query);

			return $this->loadFromRow($row);
		}

		public function save($user) {
			// Insert the new user
			$query = sprintf("INSERT INTO user (email, password, username) VALUES ('%s', '%s', '%s')",
				mysql_real_escape_string($user->getEmail()),
				mysql_real_escape_string($user->getPassword()),
				mysql_real_escape_string($user->getUsername()));

			$id = $this->db->insert($query);
			
			if ($id) {
				// set the id
				$user->setId($id);

				return $user;
			} else {
				error_log('Could not save user: '.print_r($user, true));
				return false;
			}
		}
	}