<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
	}

	public function index()
	{
		$this->load->model('Task');

		$result = $this->Task->get_all();

		$data['result'] = $result;

		$this->load->view('welcome_message', $data);
	}

	public function add()
	{
		$this->load->model('Task');

		$return = $this->Task->insert_entry();

		if($return == 'success'){
			echo json_encode($this->Task->last_id());
		}
	}

	public function edit()
	{
		$this->load->model('Task');

		$return = $this->Task->update_entry();

		if($return == 'success'){
			echo json_encode($this->Task->last());
		}
	}

	public function delete()
	{
		$this->load->model('Task');

		$return = $this->Task->delete_entry();

		if($return == 'success'){
			echo json_encode($this->Task->last());
		}
	}
}
