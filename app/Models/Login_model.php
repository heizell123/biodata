<?php namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model
{
    protected $table      = 'user';
    function first_verify($email, $password){

    	$user = $this->db->table('user')
    	->select('user.user_id,user.password,user.role_id,user.full_name,user.email')
    	->where('user.email',$email)
    	->where('user.password=MD5("'.$password.'")')
    	->get()->getResultArray();

		if (empty($user)) {
			return FALSE;
		}else{

			session()->set('user_id',$user[0]['user_id']);
			session()->set('email',$user[0]['email']);
			session()->set('full_name',$user[0]['full_name']);
			session()->set('password',$user[0]['password']);
			session()->set('role_id',$user[0]['role_id']);
			session()->set('is_login',TRUE);
			return TRUE;
		}
	}

	function verify($username, $password){
		$user = $this->db->table('user')
		->where('username',$username)
    	->where('user.password=MD5("'.$password.'")')
		->get()->getResultArray();

		if (empty($user)) {
			return FALSE;
		}
		
		return TRUE;
	}
}