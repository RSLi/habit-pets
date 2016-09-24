<?php
class Sign_up extends CI_Controller
{
	public function index()
	{
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

		/**set rules for form validation
		 *
		 */
		$this->form_validation->set_rules(
		        'username', 'Username',
		        'required|min_length[5]|max_length[12]|is_unique[users.username]',
		        array(
		                'required'      => 'You have not provided %s.',
		                'is_unique'     => 'This %s already exists.'
		        )
		);
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');


		//title for display
		$data['title'] = 'Sign up';

		if($this->form_validation->run()==FALSE)
		{
			$data['has_error'] = TRUE;
			$data['error_msg'] = validation_errors();


			$this->load->view('templates/header',$data);
			$this->load->view('pages/sign_up_view',$data);
			$this->load->view('templates/footer');
		}
		else
		{
			//connect to database for further validation
			$sql = "SELECT * FROM users WHERE email = ?";
			$query = $this->db->query($sql,array($_POST['email']));
			if($query->num_rows() >0)//the email has been used
			{
				$data['has_error'] = TRUE;
				$data['error_msg'] = 'This email has already been used. Please use another';

				$this->load->view('templates/header',$data);
				$this->load->view('pages/sign_up_view',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				//insert new account
				$sql = "INSERT INTO users VALUES (?,?,?,?,?,?,?,?)";
				$query = $this->db->query($sql,array(null,$_POST['username'],password_hash($_POST['password'], PASSWORD_BCRYPT),$_POST['email'],0,0,'this is a test user',0));
				//log the user in

				//show success
				$data['has_error'] = FALSE;
				$this->load->view('templates/header',$data);
				$this->load->view('pages/sign_up_success');
				$this->load->view('templates/footer');
			}


		}
	}
}
