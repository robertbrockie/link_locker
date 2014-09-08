<?php

	include_once('lib/database.php');
	include_once('model/Link.php');

	class LinkModel {

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

			$link = new Link();
			$link->setId($row['id']);
			$link->setUrl($row['url']);
			$link->setImageUrl($row['image_url']);
			$link->setTitle($row['title']);

			return $link;
		}

		public function load($id) {
			$query = sprintf("SELECT * FROM link WHERE id = '%d'",
				mysql_real_escape_string($id));

			$row = $this->db->query($query);

			return $this->loadFromRow($row);
		}

		public function getAll($user_id) {
			//TODO: eventually use the user id
			$query = sprintf('SELECT * FROM link');

			$links = array();

			$row = $this->db->query($query);

			$links[] = $this->loadFromRow($row);
			
			return $links;
		}

		public function save($link) {

			$query = sprintf("INSERT INTO link (url, image_url, title) VALUES ('%s', '%s', '%s')",
				mysql_real_escape_string($link->getUrl()),
				mysql_real_escape_string($link->getImageUrl()),
				mysql_real_escape_string($link->getTitle()));

			$id = $this->db->insert($query);
			
			if ($id) {
				// set the id
				$link->setId($id);

				return $link;
			} else {
				error_log('Could not save link: '.print_r($link, true));
				return false;
			}
		}
	}