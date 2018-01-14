<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class Todo extends CI_Controller {

	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('user_model');

	}
  public function index() {
		if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) {
			$this->load->view('header');
	    $this->load->view('pages/todo');
	    $this->load->view('footer');
		}else{
			redirect("login");
		}
	}
}
