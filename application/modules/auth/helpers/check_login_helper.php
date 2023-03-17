<?php

// If access is requested from anywhere other than index.php then exit
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 |------------------------------------------------------------------------------
 |	USED ON ADMIN PAGES TO CHECK USER IS LOGGED IN
 |------------------------------------------------------------------------------
 |
 |	Checks that the user is logged in. This function should be called in every
 |	class __construct where the page requires user to be logged in.
 |
*/

if(!function_exists('check_user_login'))
{
	// Checks if user has verified email and is logged in by default. If email_verification is TRUE then it will also check if user has verified email address
	function check_user_login($email_verification = TRUE) {
		$ci =& get_instance();
		
		// Check that a login session has been set
		if($ci->session->userdata('logged_in'))
		{
			if($email_verification === TRUE)
			{
				// Check that user has verified their email address
				if($ci->session->userdata('email_verified') === FALSE)
				{
					$ci->load->model("mdl_login");
					$ci->mdl_login->set_table("auth_login");
					$user_id = $ci->session->userdata('user_id');
					$query = $ci->mdl_login->get_where($user_id);
					foreach($query->result() as $row)
					{
						$db_email_ver = $row->email_verified;
					}
					
					if($db_email_ver !== "yes")
					{
						// If they have not verified their email address direct them to the email verification page
						redirect(base_url() . custom_constants::email_verification_url);
					}
				}
			}
			
			$last_activity = $ci->session->userdata('last_activity');
			$current_time = time();
			$time_since_last_activity = ($current_time - $last_activity) / 60;
			
			if($time_since_last_activity > custom_constants::user_timeout)
			{
				$username = $ci->session->userdata('username');
				$ci->session->set_userdata('user_id', '');
				$ci->session->set_userdata('username', '');
				$ci->session->set_userdata('logged_in', '');
				$ci->session->set_userdata('account_type', '');
				$ci->session->set_userdata('email_verified', '');
				$ci->session->set_userdata('logged_in_since', '');
				
				$ci->session->set_flashdata('timed_out', 'TRUE');
				$ci->session->set_flashdata('username', $username);
				
				$requested_url = current_url();
				$ci->session->set_userdata('requested_url', $requested_url);
				
				redirect(base_url() . custom_constants::login_page_url);
			}
			else
			{
				$ci->session->unset_userdata('last_activity');
				$ci->session->set_userdata('last_activity', time());
			}
		}
		else
		{
			$requested_url = current_url();
			$ci->session->set_userdata('requested_url', $requested_url);
			
			redirect(base_url() . custom_constants::login_page_url);
		}
	}
}

?>