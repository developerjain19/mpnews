<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $get['title'] = "Admin Login";
        $get['favicon'] = "assets/images/logo.png";
        if ($this->session->userdata('id')) {
            redirect(base_url('dashboard'));
        } else {
            $this->load->view('admin/login', $get);
        }
        $setting  =  $this->CommonModal->getRowById('settings', 'id', '1');
        $this->site_title  = $setting[0]['site_title'];
    }

    public function adminlogin()
    {
        $data['title'] = "Admin Login";
        $setting  =  $this->CommonModal->getRowById('settings', 'id', '1');
        $this->site_title  = $setting[0]['site_title'];
        $this->form_validation->set_rules('email', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');
        if ($this->form_validation->run()) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data =  $this->CommonModal->getRowById('users', 'email', $email);
            if ($data) {
                $id = $data[0]['id'];
                $f_email = $data[0]['email'];
                $f_password = $data[0]['password'];

                if (!password_verify($password, $f_password)) {
                    flashData('login_error', 'Enter a valid Password.');
                } 
                else if ( $data[0]['status'] == '0') {
                    flashData('login_error', 'You are blocked.');
                }
                else {
                    $this->session->set_userdata(array('id' => $id, 'email' => $email, 'userslug' => $data[0]['slug'], 'role' => $data[0]['role'] ,  'username' => $data[0]['username']));
                    redirect('dashboard');
                }
            } else {
                flashData('login_error', 'Enter a valid Username ');
            }
        }
        $this->load->view('admin/login' ,  $data);
    }

    public function logout()
    {
        //load session library
        $this->load->library('session');
        $this->session->unset_userdata('id');
        redirect(base_url());
    }
}
