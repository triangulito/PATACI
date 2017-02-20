<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	var $id;
	var $username;
	var $password;
	var $firstName;
	var $lastName;
	var $idRole;
    var $active;

	function __construct()
    {
        parent::__construct();
    }

    function insert() {
    	$username = $this->input->post('username');
    	$password = $this->input->post('password');
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $idRole = $this->input->post('idRole');
        $active = $this->input->post('active');

    	$this->db->insert('user', $this);

    }

    function update() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $idRole = $this->input->post('idRole');
        $active = $this->input->post('active');
    	
        $this->db->where('id', $id);    
    	$this->db->update('user', $this);
    }

    function selectById($id) {
    	$userQuery = $this->db->query('SELECT * FROM user WHERE id = '. $id);
    	$user = $userQuery->result();
        $user = $user[0];

    	return $user;
    }

    function select() {
    	$query = $this->db->get('user');
        return $query->result();
    }

    function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->firephp->log($username);
        $this->firephp->log($password);

        $userQuery = $this->db->query('SELECT * FROM user WHERE username = \''. $username. '\' AND password = \''.$password.'\'');
        $user = $userQuery->result();
        if (isset($user[0])) {
            $user = $user[0];
            return $user;
        }

        return NULL;
    }


}
