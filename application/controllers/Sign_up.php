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
				$default_json = '{
		            "petname" : "Cute Puppy",
		            "level" : 1,
		            "exp" : 5,
		            "food" : 70,
		            "health" : 70,
		            "happiness" : 90,
		            "gold" : 10,

		            "tasks" : [
		                {"name" : "Brush Teeth", "type" : "dailies", "completed" : false, "difficulty" : 1, "reward" : "health"},
		                {"name" : "Exercise 1 hour", "type" : "dailies", "completed" : false, "difficulty" : 1, "reward" : "health"},
		                {"name" : "Eat no junk food", "type" : "dailies", "completed" : false, "difficulty" : 1, "reward" : "health"},
		                {"name" : "Pack your backpack", "type" : "dailies", "completed" : true, "difficulty" : 1, "reward" : "food"},
		                {"name" : "Finish all Homework", "type" : "dailies", "completed" : false, "difficulty" : 2, "reward" : "food"},
		                {"name" : "Do chores", "type" : "dailies", "completed" : false, "difficulty" : 1, "reward" : "happiness"},
		                {"name" : "Offer help to someone", "type" : "dailies", "completed" : false, "difficulty" : 3, "reward" : "happiness"},
		                {"name" : "Finish Math Group Project", "type" : "todo", "completed" : false, "difficulty" : 2, "reward" : "food"},
		                {"name" : "Purchase school supply", "type" : "todo", "completed" : false, "difficulty" : 1, "reward" : "happiness"},
		                {"name" : "Help clean the yard", "type" : "todo", "completed" : false, "difficulty" : 3, "reward" : "happiness"},
		                {"name" : "Attend school sport events", "type" : "todo", "completed" : false, "difficulty" : 2, "reward" : "health"}
		            ],


		            "items" : [
		                {"name" : "breadstick", "type" : "food", "value" : 10},
		                {"name" : "breadstick", "type" : "food", "value" : 10}
		            ]
		        }';
				//insert new account
				$sql = "INSERT INTO users VALUES (?,?,?,?,?,?)";
				$query = $this->db->query($sql,array(null,$_POST['username'],password_hash($_POST['password'], PASSWORD_BCRYPT),$_POST['email'],null,$default_json));
				//log the user in

				//TODO: log the user in immediately after registration

				//show success
				$data['has_error'] = FALSE;
				$this->load->view('templates/header',$data);
				$this->load->view('pages/sign_up_success');
				$this->load->view('templates/footer');
			}


		}
	}
}
