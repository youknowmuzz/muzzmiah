<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}
	
	//loads login view
	public function index()
	{
		$data['main_content'] = 'login_view';
		$this->load->view('login_view');
	}

	//validates login credentials
	public function validate_credentials()
	{
		
		$this->load->model('login_model');
		$query = $this->login_model->validate();

		if ($query) 
		{
			$data = array(
				'username' => $this ->input->post('username'),
				'is_logged_in' => true
			);
			$this->session->set_userdata($data);
			redirect ('find');
		}
		else
		{
			$this->index();
		}

		
	}

	//kills session to logout
	public function logout()
	{

		$this->session->sess_destroy();
		redirect('find');


	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

