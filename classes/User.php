<?php 

class User {

	private $user;
	private $db;
	
	public function __construct() {
		$this->db = DB::getInstance();

		if ($this->isLogedIn()) {
			$this->user = $this->db->get('users', ['id', '=', $_SESSION['user']]);
		} else {
			$this->user = NULL;
		}
	}

	public function isLogedIn() {
		if (isset($_SESSION['user'])) {
			return true;
		}
		
		return false;
	}

	public function user() {
		return $this->user;
	}

	public function login($username, $password) {
		$user = $this->db->get('users', ['username', '=', $username]);
		if ($user->count()) {
			if (verify($password, $this->db->first()->password)) {
				$_SESSION['user'] = $this->db->first()->id;
				return true;
			} else {
				return false;
			}
		}

		return false;
	}

	public function addUser($username, $email, $password) {
		$query = $this->db->insert('users', [
			'username'	=> $username,
			'email'		=> $email,
			'password'	=> generateHash($password)
		]);

		if ($query) {
			return true;
		}

		return false;
	}

	public function logout() {
		$_SESSION = array();
		session_destroy();
	}

}