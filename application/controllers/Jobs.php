<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends PS_Controller
{
	public $title = 'JOBS';
	public $error;

	public function __construct()
	{
		parent::__construct();
		$this->home = base_url(). "jobs";
	}


	public function index()
	{
		$tabs = ['tab' => 'home'];
		$this->load->view('jobs/jobs_list', $tabs);
	}


	public function add_new()
	{
		$this->load->view('jobs/jobs_add');
	}



} //--- end class
?>
