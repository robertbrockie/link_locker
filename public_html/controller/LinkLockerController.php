<?php
session_start();

include_once('model/UserModel.php');

class LinkLockerController {
	
	public $user_id;
	public $user = null;
	public $user_model;

	public function __construct() {
		$this->user_model = new UserModel();

		//check if the user is logged in
		if (isset($_SESSION['user_id'])) {
			$this->user_id = $_SESSION['user_id'];

			$this->user = $this->user_model->load($this->user_id);
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
		$action = isset($vals['action']) ? $vals['action'] : "login";

		switch ($action) {
			case 'login':
				$this->login();
				break;

			case 'logout':
				$this->logout();
				break;
			
			case "registration":
				$this->registration();
				break;

			default:
				error_log('Unknown action: '.$action);
				break;
		}
	}

	public function login() {
		if ($this->user) {
			$this->renderView('dashboard');
		} else if (empty($_POST)) {
			$this->renderView('login');
		} else {
			//TODO: add validation
			$username = $_POST['email'];
			$password = $_POST['password'];

			$user = $this->user_model->getByEmailAndPassword($username, $password);

			if ($user) {
				$this->loginUser($user);
				$this->renderView('dashboard');
			} else {
				$this->renderView('login');
			}
		}
	}

	public function logout() {
		session_destroy();
		$this->user_id = null;
		$this->user = null;

		$this->renderView('login');
	}

	public function registration() {
		if (empty($_POST)) {
			$this->renderView('registration');
		} else {
			//TODO: add validation
			$user = new User();
			$user->setEmail($_POST['email']);
			$user->setPassword($_POST['password']);
			$user->setUsername($_POST['username']);

			$user = $this->user_model->save($user);

			$this->loginUser($user);

			echo '<pre>'.print_r($user, true);

			$this->renderView('dashboard');
		}
	}

	public function dashboard() {
		$this->renderView('dashboard');
	}

	public function renderView($view) {
		$data = array();

		if ($this->user) {
			$data['user'] = $this->user;
		}

		include('templates/common/header.php');
		include('templates/'.$view.'.php');
		include('templates/common/footer.php');
	}

	protected function loginUser($user) {
		$_SESSION['user_id'] = $user->getId();
		$this->user = $user;
	}
}