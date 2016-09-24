<?php
class Pages extends CI_Controller {

        /**
        * Browse pages with template header and footer
        * @param $page the name of the body file without php extension
        */

        public function view($page = 'home')
        {
            if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }

            $data['title'] = ucfirst($page); // Capitalize the first letter
			$data['has_error'] = FALSE;//designed for 'home' form validation in controller Users_main

            $this->load->helper('url');

            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/footer');
        }

        public function userpage($uid)
        {
            if(isset($_SESSION['uid']))
            {
                if($_SESSION['uid'] == $uid)
                {
                    
                }
                else // logged in but not this user
                {

                }
            }
            else //no session
            {

            }
        }


}


//end of file
