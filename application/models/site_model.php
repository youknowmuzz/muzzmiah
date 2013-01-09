<?php

	class Site_model extends CI_Model{

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	//gets all records for findemp 
	function get_records($first_name, $last_name, $dept_name, $job_title)
	{
		$q = $this->db->select('e.emp_no, e.first_name as firstname ,e.last_name as lastname, t.title as jobtitle, d.dept_name as dept, d.dept_no as deptid')
			->select("IF (`e`.`emp_no` = `m`.`emp_no` AND `m`.`to_date` = '9999-01-01', 1, 0) AS ismanager", false)
			->from('employees e')
			->join('dept_emp dp', 'dp.emp_no = e.emp_no')
			->join('departments d', 'dp.dept_no = d.dept_no')
			->join('titles t', 'e.emp_no = t.emp_no')
			->join('dept_manager m', 'm.emp_no = e.emp_no', 'left')
			->where('dp.to_date', '9999-01-01')
			->where('t.to_date', '9999-01-01');
			if (!empty($first_name)) {
		    	$this->db->where('e.first_name', $first_name);
	        }
	        if (!empty($last_name)) {
	       	    $this->db->where('e.last_name', $last_name);
	        }
	        if (!empty($dept_name)) {
	       	    $this->db->where('d.dept_name', $dept_name);
	        }
	        if (!empty($job_title)) {
	            $this->db->where('t.title', $job_title);
	        }
		$res['rows'] = $this->db->get()->result();
		$res['num_rows'] = count($res['rows']);
		return $res;
	}

	//returns data from employee table
	function EmployeeData($emp_no)
	{

		$query = $this->db->where('emp_no', $emp_no)
				->from('employees');

		$res['rows'] = $query->get()->result();
	 
		return $res;
	}

	//adds records add record to employees
	function add_record($birth_date,$first_name,$last_name,$gender,$hire_date)
	{
		$this->db->set('birth_date',$birth_date);
		$this->db->set('first_name',$first_name);
		$this->db->set('last_name',$last_name);
		$this->db->set('gender',$gender);
		$this->db->set('hire_date',$hire_date);
		$query = $this ->db ->insert('employees');
		return true;
	}
	
	//updates the record with the data being passed in
	function update_record($data, $emp_no)
	{
		$this->db->where('emp_no', $emp_no);
		$this->db->update('employees', $data);
	}

	//deletes the record where employee no is passed in
	function delete_record($emp_no)
	{
		$this->db->where('emp_no', $emp_no);
		$this->db->delete('employees');
	}
}