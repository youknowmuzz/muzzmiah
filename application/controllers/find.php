<?php

class Find extends CI_Controller{

function index()
{
	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'search_form';
	$this->load->view('includes/template', $data);

}

//find emp controller, echos out json
function findemp()
{
	$firstname = $this->input->get('firstname');
	$lastname = $this->input->get('lastname');
	$dept = $this->input->get('dept');
	$jobtitle = $this->input->get('jobtitle');
	$this->load->model('site_model');
	//checks to see if all fields are empty
	if (!empty($firstname) && !empty($lastname) && !empty($dept) && !empty($jobtitle)) {
		$res = $this->site_model->get_records($firstname, $lastname, $dept, $jobtitle);
	} else {
		$res['num_rows'] = 0;
		$res['rows'] = 0;
	}
	$data['count'] = $res['num_rows'];
	$data['results'] = $res['rows'];

	echo json_encode($data);
}

// loads add employee view
function add() {

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'add_view';
	$this->load->view('includes/template', $data);
}

//function to add employee to the database, using the add_record function in the site_model
public function addemployee() 
{		
		$birth_date = $this->input->get('birth_date');
		$first_name = $this->input->get('first_name');
		$last_name = $this->input->get('last_name');
		$gender = $this->input->get('gender');
		$hire_date = $this->input->get('hire_date');
		$this->load->model('site_model');
		$this->site_model->add_record($birth_date,$first_name,$last_name,$gender,$hire_date);
		$data['addMessage'] = 'Employee Added.';
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'add_view';
		$this->load->view('includes/template', $data);
		
	}

//used to update employee data
//loads update view and validates if employee number has been submitted.
function update()
{

	$emp_no = $this->input->get('emp_no');
	
	if ($emp_no == null)
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'update_view_noemp';
		$this->load->view('includes/template', $data);
	}
	else
	{
		$this->load->model('site_model');
		$res = $this->site_model->EmployeeData($emp_no);

		$data['rows'] = $res['rows'];
		$data['emp_no'] = $emp_no;

		$is_logged_in = $this->session->userdata('is_logged_in');
		$data['is_logged_in'] = $is_logged_in;
		$data['main_content'] = 'update_view';
		$this->load->view('includes/template', $data);

	}
}

//carries out the update employee database update
function updateemployee()
{

	$emp_no = $this->input->get('emp_no');
	$first_name = $this->input->get('first_name');
	$last_name = $this->input->get('last_name');
	$birth_date = $this->input->get('birth_date');
	$gender = $this->input->get('gender');
	$hire_date = $this->input->get('hire_date');
	

	$data = array(
	'first_name'=>$first_name,
	'last_name'=>$last_name,
	'birth_date'=>$birth_date,
	'emp_no'=>$emp_no,
	'gender'=>$gender
	);
	
	$this->load->model('site_model');
	$res = $this->site_model->update_record($data, $emp_no);

	$this->load->model('site_model');
	$res = $this->site_model->getEmployeeData($emp_no);

	$data['rows'] = $res['rows'];
	$data['emp_no'] = $emp_no;
	$data['updateMessage'] = 'Employee Details Updated.';

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'update_view';
	$this->load->view('includes/template', $data);

}

//loads delete view
function delete()
{
	$emp_no = $this->input->get('emp_no');

	$data['emp_no'] = $emp_no;

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'delete_view';
	$this->load->view('includes/template', $data);
}

//deletes employee from database
function deleteemployee()
{
	$emp_no = $this->input->get('emp_no');
	
	$this->load->model('site_model');
	$res = $this->site_model->delete_record($emp_no);
	
	$data['deleteMessage'] = 'Employee Deleted.';

	$is_logged_in = $this->session->userdata('is_logged_in');
	$data['is_logged_in'] = $is_logged_in;
	$data['main_content'] = 'delete_view';
	$this->load->view('includes/template', $data);
}

}