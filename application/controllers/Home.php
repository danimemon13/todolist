<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{
		$Array = array('status' => 1);
		$data['list'] = $this->Main_models->selectrecords('list',$Array);
		$this->load->view('index',$data);
	}
	public function list_add(){
		$array = $_POST;
		$this->Main_models->saverecords('list',$array);
		$Array = array('status' => 1);
		$data['list'] = $this->Main_models->selectrecords('list',$Array);
		echo json_encode($data['list']);
	}
}
