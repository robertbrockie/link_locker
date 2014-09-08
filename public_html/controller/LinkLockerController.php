<?php

class LinkLockerController {
	
	public $user;
	public $user_model;

	public function __construct() {
		session_start();

		$user_id = null;

		//check if the user is logged in
		if (isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
		}
	}

	/**
	* invoke
	*
	* Rudimentary "routing".
	**/
	public function invoke() {
		//invoke will take care of figuring out 
		$vals = array_merge($_POST, $_GET);
		
		//what are we doing?
		$action = isset($vals['action']) ? $vals['action'] : "index";

		switch ($action) {
			case "index":
				$this->index();
				break;
			
			case "registration":
				$this->registration();
				break;

			default:
				error_log('Unknown action: '.$action);
				break;
		}
	}

	public function index() {
		$this->renderView('login');
	}

	public function registration() {
		$this->renderView('registration');
	}

	public function renderView($view) {
		include('templates/common/header.php');
		include('templates/'.$view.'.php');
		include('templates/common/footer.php');
	}
}