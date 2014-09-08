<?php

class LinkLockerController {
	
	public $user;
	public $user_model;

	public function __construct() {
		// check for a user?
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
			
			case "register":
				$this->add();
				break;

			default:
				error_log('Unknown action: '.$action);
				break;
		}
	}

	/**
	* index
	*
	* Display the application to the user.
	*
	**/
	public function index() {
		$this->renderView('registration');
	}

	public function renderView($view) {
		include('templates/common/header.php');
		include('templates/'.$view.'.php');
		include('templates/common/footer.php');
	}
}