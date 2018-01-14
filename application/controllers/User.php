<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 *
 * @extends CI_Controller
 */
class User extends CI_Controller {

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


	}

	/**
	 * register function.
	 *
	 * @access public
	 * @return void
	 */
	public function register() {

		// creaza obiectul data
		$data = new stdClass();

		// incarca validatorul
		$this->load->helper('form');
		$this->load->library('form_validation');

		// seteaza regulile de inregistrare
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'Acest username exista deja.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique' => 'Acest email a mai fost folosit.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() === false) {

			// daca validarea nu este buan returneaza erraorea.
			$this->load->view('header');
			$this->load->view('pages/register', $data);
			$this->load->view('footer');

		} else {

			// pune valorile in variabile
			$username = $this->input->post('username');
			$email    = $this->input->post('email');
			$password = $this->input->post('password');

			if ($this->user_model->create_user($username, $email, $password)) {

				// returneaza success
				$this->load->view('header');
				$this->load->view('pages/login', $data);
				$this->load->view('footer');

			} else {

				$data->error = 'A fost intampinata o problema.';

				// send error to the view
				$this->load->view('header');
				$this->load->view('pages/register', $data);
				$this->load->view('footer');

			}

		}

	}

	/**
	 * login function.
	 *
	 * @access public
	 * @return void
	 */
	public function login() {
		$data['error'] = "";
		if(!isset($_SESSION["user_id"])){
				$data['error'] = "";
				// incarca validator
				$this->load->helper('form');
				$this->load->library('form_validation');

				// seteaza regulile de login
				$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
				$this->form_validation->set_rules('password', 'Password', 'required');

				if ($this->form_validation->run() == false) {

					// returneaza erraore la validare
					$this->load->view('header');
					$this->load->view('pages/login',$data);
					$this->load->view('footer');

				} else {

					// setam valorile din form
					$data = $this->input->post();
					if ($this->user_model->get_user_login($data['username'], $data['password'])) {
						$user    = $this->user_model->get_user($data['username']);
						// creaza sesiunea
						if(!isset($_SESSION['token'])){
							$_SESSION['token']      = bin2hex(openssl_random_pseudo_bytes(10));
						}
						$_SESSION['user_id']      = (int)$user->id;
						$_SESSION['username']     = (string)$user->username;
						$_SESSION['logged_in']    = (bool)true;
						// user login ok
						$this->load->view('header');
						$this->load->view('pages/todo', $data);
						$this->load->view('footer');
						$token["id_usser"] = $_SESSION['user_id'];
						$token["token"] = $_SESSION['token'] ;
						$set_token = $this->user_model->set_token($token);
					} else {
						$data['error'] = 'Parola sau username gresit';

						$this->load->view('header');
						$this->load->view('pages/login', $data);
						$this->load->view('footer');

					}

				}
			}else{
				redirect('todo');
			}
	}

	/**
	 * logout function.
	 *
	 * @access public
	 * @return void
	 */
	public function logout() {
		$this->load->model('todo_api');
		$data = new stdClass();
		//sterge token
		$this->todo_api->remove_token($_SESSION['user_id']);
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			// sterge sesiunea
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			redirect('/');

		} else {

			// user-ul nu este logat, face redirect la root
			redirect('/');

		}

	}

}
