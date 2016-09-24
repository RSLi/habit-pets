<?php

class Users_main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}
	
	public function index()
	{
		//load
		$this->load->helper('url');
		//session validation
		if(!isset($_SESSION['uid']))
		{
			if(!isset($_POST['email']))//not logged in and with no form
			{
				redirect('','refresh');
			}
			else//just passed from form
			{
				//validate log-in form
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('password', 'Password', 'required');
				if ($this->form_validation->run() == FALSE)//form not validated
				{
					$data['has_error'] = TRUE;
					$data['error_msg'] = validation_errors();
					$data['title'] = 'Home';
					
					$this->load->view('templates/header',$data);
					$this->load->view('pages/home',$data);
					$this->load->view('templates/footer');
				}
				else//form validated
				{
					
					//connect to database to judge user information
					$sql = "SELECT * FROM users WHERE email = ?";
					$query = $this->db->query($sql,array($_POST['email']));
					if($query->num_rows() != 1)//user not found
					{
						$data['has_error'] = TRUE;
						$data['error_msg'] = 'This is not a valid user in the database. Please try again.';
						$data['title'] = 'Home';
							
						$this->load->view('templates/header',$data);
						$this->load->view('pages/home',$data);
						$this->load->view('templates/footer');
					}
					elseif (!password_verify($_POST['password'],$query->row(0)->password))//password incorrect
					{
						$data['has_error'] = TRUE;
						$data['error_msg'] = 'Password incorrect';
						$data['title'] = 'Home';
							
						$this->load->view('templates/header',$data);
						$this->load->view('pages/home',$data);
						$this->load->view('templates/footer');
					}
					else//all information correct, log in permitted
					{
						//Session register
						$_SESSION['uid'] = $query->row(0)->uid;
						$_SESSION['email'] = $query->row(0)->email;
						$_SESSION['username'] = $this->security->xss_clean($query->row(0)->username);
						//view
						$data['title'] = 'Home';
						$this->load->view('templates/header',$data);
						$this->load->view('loggedin/main',$data);
						$this->load->view('templates/footer');
					}
					
				}
			}
		}
		else 
		{
			//view
			$data['title'] = 'Home';
			$this->load->view('templates/header',$data);
			$this->load->view('loggedin/main',$data);
			$this->load->view('templates/footer');
			
			
		}
	}
	
	function logout()
	{
		$this->load->helper('url');
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('', 'refresh');
	}
	
	public function please_log_in()
	{
		$this->load->view('loggedin/please_log_in');
	}
	
	
	public function forget_password()
	{
		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
		$this->users_model->forget_password($email);
		redirect('', 'refresh');
	}
	
}
//end of file