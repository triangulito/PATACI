<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'ChromePhp.php';
class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

	public function index() {
		$data['title'] = "Ingresar";
		ChromePhp::log('test');
		$this->load->adminView("login", $data);
	}

	public function loginAttempt() {
		$this->load->model('UserModel');
		$user = $this->UserModel->login();
		// $this->firephp->log($this->session->userdata('isLoggedIn'));

		if ($user != NULL) {
			$this->session->set_userdata('isLoggedIn', true);
			$this->session->set_userdata('userFirstName', $user->firstName);
			$this->session->set_userdata('userLastName', $user->lastName);
			$this->session->set_userdata('fullName', $user->firstName . ' ' . $user->lastName);
			$this->session->set_userdata('idUser', $user->id);
			$this->session->set_userdata('idRole', $user->idRole);
			redirect(base_url('Admin/News'));
		} else {
			redirect(base_url('login/index'));
		}
	}

	public function logout() {
		session_destroy();
		redirect(base_url('login/index'));
	}
}
