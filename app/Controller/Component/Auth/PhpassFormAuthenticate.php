<?php
App::uses('PasswordHash', 'Vendor');
App::uses('FormAuthenticate', 'Controller/Component/Auth');

class PhpassFormAuthenticate extends FormAuthenticate {

	/**
	 * Password method used for logging in.
	 *
	 * @param string $password Password.
	 * @return string Hashed password.
	 */
    protected function _password($password) {
        return self::hash($password);
    }

	/**
	 * Find a user record using the standard options.
	 *
	 * @param string $username The username/identifier.
	 * @param string $password The unhashed password.
	 * @return Mixed Either false on failure, or an array of user data.
	 */
	protected function _findUser($username, $password) {
		$userModel = $this->settings['userModel'];
		list($plugin, $model) = pluginSplit($userModel);
		$fields = $this->settings['fields'];

		$conditions = array(
			$model . '.' . $fields['username'] => $username,
			//$model . '.' . $fields['password'] => $this->_password($password),
		);
		if (!empty($this->settings['scope'])) {
			$conditions = array_merge($conditions, $this->settings['scope']);
		}
		$result = ClassRegistry::init($userModel)->find('first', array(
			'conditions' => $conditions,
			'recursive' => 0
		));
		if (empty($result) || empty($result[$model])) {
			return false;
		}
		$hashed_password = $result[$userModel][$fields['password']];
		$hasher = new PasswordHash(
				Configure::read('phpass_hash_strength'),
				Configure::read('phpass_hash_portable'));
		if ($hasher->CheckPassword($password,$hashed_password)) {
			unset($result[$model][$fields['password']]);
			return $result[$model];
		} else {
			return false;
		}
	}


	/*
	public function authenticate(CakeRequest $request, CakeResponse $response) {
		debug($request); debug($response);
		die('aiuth attempt');
	}
	/**
	 * Create a Phpass hash.
	 * Individual salts are used to be even more secure.
	 *
	 * @param string $password Password.
	 * @return string Hashed password.
	 */
    public static function hash($password) {
		$hasher = new PasswordHash(
				Configure::read('phpass_hash_strength'),
				Configure::read('phpass_hash_portable'));
		return $hasher->HashPassword($password);
    }
}