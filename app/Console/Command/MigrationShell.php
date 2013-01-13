<?php
App::uses('Xml', 'Utility');
App::uses('PasswordHash', 'Vendor');

/**
 * MigrationShell script to migrate from Locbit 1.0 to Locbit Portal Ap
 *
 * @property User $User
 * @property UsersRole $UsersRole
 */
class MigrationShell extends AppShell {

	public $uses = array(
		'User',
		'UsersRole'
	);

	public function main() {
		$this->out('Migration script from Locbit 1.0 to Locbit Portal App:');
		$this->out(' 1) updateRoles: Updates the role_id column of the User from the UserRole');
		// delete all tournament data
	}

	public function updateRoles() {
		$this->out('Changing many-to-many relationship to many-to-one for Roles');
		$users = $this->User->find('all');
		foreach ($users as $user) {
			$this->out('Looking up '.$user['User']['username']. ' role...');
			$conditions = array('UsersRole.user_id'=>$user['User']['id']);
			$usersRoles = $this->UsersRole->find('all',compact('conditions'));
			if (empty($usersRoles)) {
				$this->out(' User '.$user['User']['username']. ' (id: '.$user['User']['id'].') does not have a Role. Please fix manually.');
			} else if (count($usersRoles)>1) {
				$this->out(' User '.$user['User']['username']. ' (id: '.$user['User']['id'].' ) has more than one Role. Please fix manually.');
				foreach ($usersRoles as $key=>$usersRole) {
					$this->out('  ['.$key.'] Role '.$usersRole['Role']['id']);
				}
			} else {
				$this->out(' updated role_id for User..');
				$data = array('role_id' => $usersRoles[0]['Role']['id']);
				$condition = array('User.id' => $user['User']['id']);
				$this->User->updateAll($data,$condition);
			}
		}
	}

	public function testPasswords() {
		$password = 'testit';
		$hashedPasswords = array(
			'$2a$08$SQObkXhucBmQl2YiTWIVJ.EFHx6emjkCtYshttl//lmKDra3sK9BS',
			'_zzD.ZZIE/fGnXOiPCPA',
			'_zzD.J5VhAn5k9ilea72',
			'_zzD.nWpdD0aZdR8H9w6',

		);

		$hasher = new PasswordHash(
				Configure::read('phpass_hash_strength'),
				Configure::read('phpass_hash_portable'));

		foreach ($hashedPasswords as $hashedPassword) {
			if ($hasher->CheckPassword($password,$hashedPassword)) {
				$this->out('OK!');
 			} else {
				$this->out('NO!');
			}
		}
		die('EOS');
	}
}