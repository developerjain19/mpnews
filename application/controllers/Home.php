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
		if ($this->session->has_userdata('login_user_id')) {
			redirect(base_url('Welcome/profile'));
		}
		$data['title'] = "register";

		$data['category'] = $this->CommonModal->getAllRows('categories');
		$data['popular'] =  $this->CommonModal->getAllRowsLimitByOrder('posts', 8, 'id', 'DESC');


		if (count($_POST) > 0) {
			$post = $this->input->post();
			if ($post['password'] == $post['confirm_password']) {
				$post['password'] = encryptId($post['password']);
				unset($post['confirm_password']);
				unset($post['terms_conditions']);
				$regid = $this->CommonModal->insertRowReturnId('users', $post);
				if (!empty($regid)) {
					userData('msg', '<h6 style="color:green;">You have registered successfully.</h6>');
				} else {
					userData('msg', '<h6 style="color:green;">You have registered successfully. check mail ID to get your password.</h6>');
				}
			} else {
				userData('msg', '<h6 style="color:green;">Password dont match</h6>');
			}

			redirect('/register');
		} else {
		}
		$this->load->view('register', $data);
	}
	public function news_details($url)
	{
		$data['posts'] =  $this->CommonModal->getSingleRowById('posts', array('title_slug' => $url));
		$data['post_category'] =  $this->CommonModal->getSingleRowById('categories', array('id' => $data['posts']['category_id']));
		$data['post_author'] =  $this->CommonModal->getSingleRowById('users', array('id' => $data['posts']['user_id']));
		$data['post_images'] =  $this->CommonModal->getRowById('post_images', 'post_id', $data['posts']['id']);
		$data['post_tags'] =  $this->CommonModal->getRowById('tags', 'post_id', $data['posts']['id']);
		$data['post_previous'] =  $this->CommonModal->runQuery("SELECT * FROM `posts` WHERE `id` < " . $data['posts']['id'] . " LIMIT 1");
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
}
