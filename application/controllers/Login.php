<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$this->load->view('login/login_view');
	}

	public function check_login()
	{

		$username = $_POST['username'];
		$password = $_POST['password'];



		$res = $this->db->query('SELECT * FROM users WHERE username = "'.$username.'" AND password = '.$password.'');

		if($res->num_rows() > 0)
		{
			$row = $res->result_array();
			$DB_Password = $row[0]['password'];
			$username = $row[0]['username'];
			$id = $row[0]['id'];

			// $full_name = $row[0]['first_name'].' '.$row[0]['last_name'];

			// $newdata = ['user_id' => $id, 'mobile_no' => $mobile_no, 'full_name' => $full_name];
			$newdata = ['user_id' => $id, 'username' => $username];
			
			if($DB_Password == $password)
			{
				$this->session->set_userdata($newdata);

				redirect('dashboard');		
			}
			else{


				$message = "Invalid Password";
				$class = "alert-danger";
				$this->session->set_flashdata('message', $message);
				redirect("login");
			}

		}
		else{
			$message = 'Invalid Mobile number or Password';
			$class = "alert-danger";
			$this->session->set_flashdata('message', $message);
			redirect("login");
		}

	}



	public function logout()
	{
		if($this->session->userdata('user_id') == '')
		{
			redirect('login');
		}
		$this->session->sess_destroy();
		redirect('login');
	}
}
