<?php 

/**
 * User handling
 */
class User
{
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;
	
	public function __construct($user = null) {
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');

		$this->_cookieName = Config::get('remember/cookie_name');

		if (!$user) {
			if (Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if ($this->find($user)) {
					$this->_isLoggedIn = true;
				} else {
					// logout
				}
			}
		} else {
			$this->find($user);
		}
	}

	public function create($fields = array()) {
		if (!$this->_db->insert('users', $fields)) {
			throw new Exception('Error Creating User');
		}
	}

	public function find($user = null) {
		if($user){
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));

			if($data->count()){
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function data() {
		return $this->_data;
	}

	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}

	public function login($username = null, $password = null, $remember = false){
		
		
		if (!$username && !$password && $this->exists()) {
			Session::put($this->_sessionName, $this->data()->id);
		} else {
			$user = $this->find($username);
			if ($user) {
				if ($this->data()->password === Hash::generateHash($password, $this->data()->salt)) {
					Session::put($this->_sessionName, $this->data()->id);

					if ($remember) {
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('user_session', array('user_id', '=', $this->data()->id));

						if (!$hashCheck->count()) {
							$this->_db->insert('user_session', array(
								'user_id' => $this->data()->id,
								'hash' => $hash
							));
							echo $this->_db->error();
						} else {
							$hash = $hashCheck->first()->hash;
						}

						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}

					return true;
				}
			}
		}
		return false;
	}

	public function exists(){
		return (!empty($this->_data)) ? true : false;
	}

	public function hasPermission($key) {
		$roles = $this->_db->get('roles', array('id', '=', $this->data()->role));

		if ($roles->count()) {
			$permissions = json_decode($roles->first()->permissions, true);
			if ($permissions[$key] == true) {
					return true;
				}	
		}
		return false;
	}

	public function logout() {
		$this->_db->delete('user_session', array('user_id', '=', $this->data()->id));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}
}