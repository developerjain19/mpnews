<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$setting  =  $this->CommonModal->getRowById('settings', 'id', '1');
		$Isetting =  $this->CommonModal->getRowById('general_settings', 'id', '1');
		$this->site_title  = $setting[0]['site_title'];
		$this->description  = $setting[0]['site_description'];
		$this->keywords  = $setting[0]['keywords'];
		$this->author  = $setting[0]['application_name'];
		$this->og_title  = $setting[0]['site_title'];
		$this->og_description  = $setting[0]['site_description'];
		$this->logo  = $Isetting[0]['logo'];
		$this->shortcut_logo  = $Isetting[0]['favicon'];


		$this->facebook  = $setting[0]['facebook_url'];
		$this->twitter  = $setting[0]['twitter_url'];
		$this->instagram  = $setting[0]['instagram_url'];
		$this->linkedin = $Isetting[0]['linkedin_url'];
		$this->copyright  = $Isetting[0]['copyright'];
	}
	public function index()
	{

		$data['title'] = "Welcome To";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['breaking'] = $this->CommonModal->getRowByIdInOrder('posts', array('is_breaking' => '0'), 'id', 'DESC');

		$data['slider'] = $this->CommonModal->getRowByIdInOrder('posts', array('is_slider' => '0'), 'id', 'DESC');
		$data['featured'] = $this->CommonModal->getRowByIdInOrder('posts', array('is_featured' => '0'), 'id', 'DESC');
		$data['latest'] = $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');
		$this->load->view('welcome_message', $data);
	}
	public function contact()
	{
		$data['title'] = "Contact";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');

		if (count($_POST) > 0) {
			$post = $this->input->post();
			$insert = $this->CommonModal->insertRowReturnId('contacts', $post);
			if ($insert) {
				$this->session->set_userdata('msg', '<div class="alert alert-success">Your query is successfully submit.</div>');
			} else {
				$this->session->set_userdata('msg', '<div class="alert alert-danger">We are facing technical error ,please try again later or get in touch with Email ID provided in contact section.</div>');
			}
		} else {
		}
		$this->load->view('contact', $data);
	}
	public function register()
	{
		if ($this->session->has_userdata('id')) {
			redirect(base_url('dashboard'));
		}
		$data['title'] = "register";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');
		if (count($_POST) > 0) {
			$post = $this->input->post();
			$get = $this->CommonModal->getSingleRowById('users', array("email" => $this->input->post('email')));
			if ($get['email'] != $post['email']) {
				if ($post['password'] == $post['confirm_password']) {
					$post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
					unset($post['confirm_password']);
					unset($post['terms_conditions']);
					$post['role'] = 'user';
					$post['slug'] =  translate(url_title($this->input->post('username')));
					$regid = $this->CommonModal->insertRowReturnId('users', $post);
					if (!empty($regid)) {
						userData('msg', '<div class="alert alert-success"><h6>You have registered successfully.</h6></div>');
					} else {
						userData('msg', '<div class="alert alert-success">h6>You have registered successfully. check mail ID to get your password.</h6>');
					}
				} else {
					userData('msg', '<div class="alert alert-danger">h6>Password does not match</h6></div>');
				}

				redirect('/register');
			} else {
				userData('msg', '<div class="alert alert-danger">h6>This username is already registered</h6></div>');
			}
		}
		$this->load->view('register', $data);
	}

	public function login()
	{

		$mydata = [];
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data =  $this->CommonModal->getRowById('users', 'email', $email);
		if ($data) {
			$id = $data[0]['id'];
			$f_email = $data[0]['email'];
			$f_password = $data[0]['password'];

			if (!password_verify($password, $f_password)) {
				$mydata['error_message'] = '<div class="alert alert-danger" >Enter a valid Password</div>';
				$mydata['result'] = '0';
			} else if ($data[0]['status'] == '0') {
				$mydata['error_message'] = '<div class="alert alert-danger" >You are blocked </div>';
				$mydata['result'] = '0';
			} else {
				$this->session->set_userdata(array('id' => $id, 'email' => $email, 'userslug' => $data[0]['slug'], 'role' => $data[0]['role'],  'username' => $data[0]['username']));

				$mydata['error_message'] = '';
				$mydata['result'] = '1';
			}
		} else {
			$mydata['error_message'] = '<div class="alert alert-danger" >Enter a valid Username</div>';
			$mydata['result'] = '0';
		}
		return json_encode($mydata);
	}


	public function news_details($url)
	{
		$data['posts'] =  $this->CommonModal->getSingleRowById('posts', array('title_slug' => $url));
		$data['post_category'] =  $this->CommonModal->getSingleRowById('categories', array('id' => $data['posts']['category_id']));
		$data['post_author'] =  $this->CommonModal->getSingleRowById('users', array('id' => $data['posts']['user_id']));
		$data['post_images'] =  $this->CommonModal->getRowById('post_images', 'post_id', $data['posts']['id']);
		$data['post_tags'] =  $this->CommonModal->getRowById('tags', 'post_id', $data['posts']['id']);
		$data['post_previous'] =  $this->CommonModal->runQuery("SELECT * FROM `posts` WHERE `id` < " . $data['posts']['id'] . " LIMIT 1");

		$data['getreaction'] =  $this->CommonModal->getRowById('reactions', 'post_id', $data['posts']['id']);

		$data['post_next'] =  $this->CommonModal->runQuery("SELECT * FROM `posts` WHERE `id` > " . $data['posts']['id'] . " LIMIT 1");

		$data['details'] = "1";
		$data['title'] = " " . $data['posts']['title'];

		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');
		$data['related'] =  $this->CommonModal->getRowByMoreIdOrderLimit('posts', array('category_id' => $data['post_category']['id']), 'id', 'DESC', 3);

		$this->load->view('news_details', $data);
	}
	public function policy($policy)
	{
		$data['title'] = "Terms and condition";

		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');


		$this->load->view('policy', $data);
	}
	public function category($news)
	{
		$data['category_news'] =  $this->CommonModal->getSingleRowById('categories', array('name_slug' => $news));
		$data['category_news_list'] =  $this->CommonModal->getRowByMoreIdOrder('posts', array('category_id' => $data['category_news']['id']), 'id', 'DESC');
		$data['title'] = "Latest Posts";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');
		$this->load->view('news_listing', $data);
	}

	public function addReaction()
	{
		$postId = $this->input->post('post_id');
		$reaction = $this->input->post('reaction');
		$getreaction =  $this->CommonModal->getRowById('reactions', 'post_id', $postId);
		$re = 're_' . $reaction;
		if ($getreaction != '') {

			$addiiton = $getreaction[0][$re] + 1;
			updateRowById('reactions', 'post_id', $postId, array($re  => $addiiton));

			echo $addiiton;
		} else {
			$data = [
				'post_id' => $postId,
				're_like' => 0,
				're_dislike' => 0,
				're_love' => 0,
				're_funny' => 0,
				're_angry' => 0,
				're_sad' => 0,
				're_wow' => 0
			];
			$this->CommonModal->insertRow('reactions', $data);
			echo $addiiton = 1;
		}
	}

	public function push_comment()
	{

		if (count($this->input->post()) > 0) {
			$post = $this->input->post();
			$post['ip_address'] = $_SERVER['REMOTE_ADDR'];

			$save  = $this->CommonModal->insertRowReturnId('comments', $post);
			if ($save) {
				echo '<div class="alert alert-success">Your comment has been sent. It will be published after being reviewed by the site management.</div>';
			} else {
				echo '<div class="alert alert-success">server error . please try again later</div>';
			}
		}
	}

	public function profileSetting()
	{
		$data['title'] = "Update Profile";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');

		$data['users'] = $this->CommonModal->getRowById('users', 'id', sessionId('id'));
		if (count($_POST) > 0) {
			$post = $this->input->post();

			$temp_image = $data['users'][0]['avatar'];

			if ($_FILES['file']['name'] != '') {
				$file = imageUploadWithRatio('file', 'uploads/profile/', '250', '250');
				$post['avatar'] = $file;
				if ($temp_image != "") {
					unlink('uploads/profile/' . $temp_image);
				}
			}
			$temp_image = $data['users'][0]['cover_image'];

			if ($_FILES['image_cover']['name'] != '') {
				$image_cover = imageUploadWithRatio('image_cover', 'uploads/profile/', '800', '400');
				$post['cover_image'] = $image_cover;
				if ($temp_image != "") {
					unlink('uploads/profile/' . $temp_image);
				}
			}


			$savedata = $this->CommonModal->updateRowById('users', 'id', sessionId('id'), $post);
			if ($savedata) {
				$this->session->set_userdata('msg', '<div class="alert alert-success">User profile Updated Successfully</div>');
			} else {
				$this->session->set_userdata('msg', '<div class="alert alert-success">User profile Updated Successfully</div>');
			}
			redirect('profileSetting' . '/' . $data['users'][0]['slug']);
		} else {

			$this->load->view('user/profileSetting', $data);
		}
	}

	public function socialAccounts()
	{
		$data['title'] = "Update Profile";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');

		$data['users'] = $this->CommonModal->getRowById('users', 'id', sessionId('id'));
		if (count($_POST) > 0) {
			$post = $this->input->post();
			$savedata = $this->CommonModal->updateRowById('users', 'id', sessionId('id'), $post);
			if ($savedata) {
				$this->session->set_userdata('msg', '<div class="alert alert-success">User profile Updated Successfully</div>');
			} else {
				$this->session->set_userdata('msg', '<div class="alert alert-success">User profile Updated Successfully</div>');
			}
			redirect('social-accounts');
		} else {

			$this->load->view('user/socialAccounts', $data);
		}
	}

	public function changepassword()
	{
		$data['title'] = "Change Password";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');

		$exist = $this->CommonModal->getRowById('users', 'id', sessionId('id'));
		if (count($_POST) > 0) {
			$post = $this->input->post();

			if (password_verify($post['old_password'], $exist[0]['password'])) {
				if ($post['new_password'] == $post['c_new_password']) {
					$mydata = array('password' => password_hash($post['new_password'], PASSWORD_DEFAULT));
					unset($post['c_new_password']);

					$savedata = $this->CommonModal->updateRowById('users', 'id', sessionId('id'), $mydata);
					if ($savedata) {
						$this->session->set_userdata('msg', '<div class="alert alert-success">Password Changed Successfully</div>');
					}
					redirect(base_url() . 'change-password');
				} else {
					$this->session->set_userdata('msg', '<div class="alert alert-danger">The Confirm Password field does not match the Password field.</div>');
				}
			} else {
				$this->session->set_userdata('msg', '<div class="alert alert-danger">Wrong Old Password</div>');
			}
			redirect(base_url() . 'change-password');
		} else {

			$this->load->view('user/change-password', $data);
		}
	}



	public function forgot_password()
	{
		$data['title'] = "Update Profile";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');
		if (count($_POST) > 0) {

			$email = $this->input->post('email');
			$table = 'users';

			$getcandidate = $this->CommonModal->getRowById($table, 'email', $email);
			if (!empty($getcandidate)) {
				$passwordcode = md5($email . time());
				$mydata = array('password_reset' => $passwordcode);
				$update = $this->CommonModal->updateRowById($table, 'email', $email, $mydata);
				$message = reset_password($getcandidate[0]['username'],  base_url('new_password/' . $passwordcode));
				$mailing = mailmsg($email, 'Reset Password With' . $this->site_title, $message);
				print_r($message);
				exit();
				$this->session->set_userdata('msg', '<h6 class="alert alert-suiccess">please check mail</h6>');
				redirect(base_url('forgot-password'));
			} else {
				$this->session->set_userdata('msg', '<h6 class="alert alert-danger">No Account found with your email address</h6>');
				redirect(base_url('forgot-password'));
			}
		} else {
			$this->load->view('user/forgot-password', $data);
		}
	}


	public function new_password($pcode)
	{
		$table = 'users';
		$data['title'] = "Reset Password";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');
		$getcandidate = $this->CommonModal->getRowById($table, 'password_reset', $pcode);
		$data['userid'] = $getcandidate[0]['id'];
		if (!empty($getcandidate)) {
			$this->load->view('user/new_password', $data);
		} else {
			$this->session->set_userdata('msg', '<h6 class="alert alert-danger">Invalid Link</h6>');
			redirect(base_url('user/forgot-password'));
		}
	}

	public function set_password_candidate()
	{

		if (count($_POST) > 0) {
			$post = $this->input->post();
			$mydata = array('password' => password_hash($post['password'], PASSWORD_DEFAULT));
			$table = 'users';
			$update = $this->CommonModal->updateRowById($table, 'id', $post['userid'], $mydata);
			if ($update) {
				$this->session->set_userdata('msg', '<h6 class="alert alert-success">Password reset successfully Login Now.</h6>');

				redirect(base_url('Forgot Password'));
			}
		}
	}

	public function profile($id, $title)
	{
		$id = decryptId($id);
		$data['title'] = "Update Profile";
		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');
		$data['users'] = $this->CommonModal->getRowById('users', 'id', $id);
		$this->load->library('pagination');
		$config['base_url'] = base_url('profile/' . $id . '/' . $title);
		$config['per_page'] = 10;
		$config['total_rows'] = $this->CommonModal->getNumRows('posts', array('user_id' => $id));

		// $data['postid'] = $this->CommonModal->getRowByIdInOrder('posts', array('user_id' => $id), 'id', 'DESC');
		$this->pagination->initialize($config);

		$data['postid']	 = $this->CommonModal->getAllDataWithLimitInOrder('posts', array('user_id' => $id), $config['per_page'], $this->uri->segment(3));


		$this->load->view('user/profile', $data);
	}

	public function add_follower()
	{

		if (count($this->input->post()) > 0) {
			$post = $this->input->post();
			$post['follower_id'] = sessionId('id');
			$tag = $this->input->post('tag');
			$url = $this->input->post('url');
			unset($post['tag']);
			unset($post['url']);
			if ($tag == '0') {
				$save  = $this->CommonModal->deleteRowById('followers', array('following_id' => $post['following_id'], 'follower_id' => sessionId('id')));
			} else {
				$save  = $this->CommonModal->insertRowReturnId('followers', $post);
			}

			redirect(base_url($url));
		}
	}
}
