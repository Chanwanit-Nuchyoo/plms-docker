<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	private $table = "user";
	private $_data = array();

	public function validate()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->where("username", $username);
		$query = $this->db->get($this->table);

		if ($query->num_rows()) 
		{
			// found row by username	
			$row = $query->row_array();

			// now check for the password
			if ($row['password'] == md5($password)) 
			{
				//update last login for user
				$this->db->set('last_login', date("Y-m-d H:i:s"));
				$this->db->where('username', $username);
				$this->db->update($this->table);

				//retrieve data to make sure
				$this->db->where("username", $username);
				$query = $this->db->get($this->table);
				$row = $query->row_array();

				// we not need password to store in session
				unset($row['password']);
				$this->_data = $row;
				return ERR_NONE;
			}

			// password not match
			return ERR_INVALID_PASSWORD;
		}
		else {
			// not found
			return ERR_INVALID_USERNAME;
		}
	}

	public function get_data()
	{
		return $this->_data;
	}

	public function update_user_lastlogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->db->where("username", $username);
		$query = $this->db->get($this->table);

		if ($query->num_rows()) 
		{
			// found row by username	
			$row = $query->row_array();

			// now check for the password
			if ($row['password'] == md5($password)) 
			{
				// we not need password to store in session
				unset($row['password']);
				$this->_data = $row;
				return ERR_NONE;
			}

			// password not match
			return ERR_INVALID_PASSWORD;
		}
		else {
			// not found
			return ERR_INVALID_USERNAME;
		}
	}

	public function get_password() {
		$this->db->where("id", $_SESSION['id']);
		$query = $this->db->get('user');
		$row = $query->row_array();
		return $row['password'];
	}

}