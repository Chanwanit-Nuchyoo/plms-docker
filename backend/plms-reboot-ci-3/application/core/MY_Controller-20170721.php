<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	/**
	 * '*' all user
	 * '@' logged in user
	 * 'Admin' for admin
	 * 'Editor' for editor group
	 * 'Author' for author group
	 * @var string
	 */
	protected $access = "*";

	public function __construct()
	{
		parent::__construct();

		$this->login_check();
	}

	public function login_check()
	{
		if ($this->access != "*") 
		{
			// here we check the role of the user
			if (! $this->permission_check()) {
				die("<h4>Access denied</h4>");
			} 

			// if user try to access logged in page
			// check does he/she has logged in
			// if not, redirect to login page
			if (! $this->session->userdata("logged_in")) {
				redirect("auth");
			}
		}
	}

	public function permission_check()
	{
		if ($this->access == "@") {
			return true;
		}
		else
		{
			$access = is_array($this->access) ? $this->access :	explode(",", $this->access);
			if (in_array($this->session->userdata("role"), array_map("trim", $access)) ) {
				return true;
			}

			return false;
		}
	}

	public function createLogFile($action='test')
	{
		$log_folder = APPPATH.'logs'.DIRECTORY_SEPARATOR;
		$today = date('Y-m-d');		
		$time = date('H:i:s');
		$ip = $_SERVER['REMOTE_ADDR'] ? $_SERVER['REMOTE_ADDR'] : 'NULL';
		$user = $_SESSION['username'] ? $_SESSION['username'] : 'NULL';
		$role = $_SESSION['role'] ? $_SESSION['role'] : 'NULL';
		$filename = $_SESSION['role'].'_'. $today.'.log';"";
		

		$fp = fopen(APPPATH.'logs'.DIRECTORY_SEPARATOR.$filename,'a') or exit("Can't open $filename!");
		fwrite($fp,'['.$today.' '.$time.'] ['.$user.'] ['.$role.'] ['.$action.'] ['.$ip.']');
		fwrite($fp,"\r\n");
		fclose($fp);
		
	}

	

}//class MY_Controller extends CI_Controller
