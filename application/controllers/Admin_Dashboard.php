<?php
defined('BASEPATH') or exit('no direct access allowed');

class Admin_Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (sessionId('id') == "") {
            redirect(base_url('admin'));
        }
        date_default_timezone_set("Asia/Kolkata");
    }

    public function index()
    {
        $data['title'] = "Home";
        $this->load->view('admin/dashboard', $data);
    }



    public function fetchorder()
    {
        $filter_status = $this->input->post('filter_status');
        if ($filter_status == '') {
            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('viewfield' => '0'), 'id', 'desc');
        } else {
            $data['checkout'] = $this->CommonModal->getRowByIdInOrder('checkout', array('status' => $filter_status, 'viewfield' => '0'), 'id', 'desc');
        }

        $this->load->view('admin/orderlist', $data);
    }

    public function categories()
    {

        $data['title'] = "Category";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('categories', array('id' => decryptId($BdID)));
            redirect('categories');
            exit;
        }
        $data['type'] = 'parent';
        $data['categories'] = $this->CommonModal->runQuery("SELECT * FROM `categories` WHERE `parent_id` = '0' order by `id` DESC");
        $this->load->view('admin/category/categories', $data);
    }


    public function add_category()
    {
        $data['title'] = "Add Category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['tag'] = "add";
        $data['type'] = 'parent';

        $data['parentCategories'] = $this->CommonModal->runQuery("SELECT * FROM `categories` WHERE `parent_id` = '0' order by `id` DESC");

        if (count($_POST) > 0) {
            $post = $this->input->post();

            if ($this->input->post('name_slug') != '') {
                $post['name_slug'] = translate(url_title($this->input->post('name_slug')));
            } else {
                $post['name_slug'] = translate(url_title($this->input->post('name')));
            }
            $savedata = $this->Dashboard_model->insertdata('categories', $post);
            if ($savedata) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Category Add Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Category Add Successfully</div>');
            }
            redirect('categories');
        } else {
            $this->load->view('admin/category/add-category', $data);
        }
    }

    public function edit_category($id)
    {

        $data['title'] = 'Update Category';
        $tid = decryptId($id);
        $data['category'] = $this->CommonModal->getRowById('categories', 'id', $tid);
        $data['type'] = 'parent';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $category_id = $this->CommonModal->updateRowById('categories', 'id', $tid, $post);
            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">category Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">category Updated successfully</div>');
            }
            redirect('categories');
        } else {
            $this->load->view('admin/category/edit-category', $data);
        }
    }


    public function subcategories()
    {

        $data['title'] = "Category";
        $BdID = $this->input->get('BdID');
        if (decryptId($BdID) != '') {
            $delete = $this->CommonModal->deleteRowById('categories', array('id' => decryptId($BdID)));
            redirect('subcategories');
            exit;
        }
        $data['type'] = 'sub';
        $data['categories'] = $this->CommonModal->runQuery("SELECT * FROM `categories` WHERE `parent_id` != '0' order by `id` DESC");
        $this->load->view('admin/category/subcategories', $data);
    }


    public function add_subcategory()
    {
        $data['title'] = "Add Sub-Category";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['tag'] = "add";
        $data['type'] = 'sub';

        $data['parentCategories'] = $this->CommonModal->runQuery("SELECT * FROM `categories` WHERE `parent_id` = '0' order by `id` DESC");

        if (count($_POST) > 0) {
            $post = $this->input->post();

            if ($this->input->post('name_slug') != '') {
                $post['name_slug'] = translate(url_title($this->input->post('name_slug')));
            } else {
                $post['name_slug'] = translate(url_title($this->input->post('name')));
            }
            $savedata = $this->Dashboard_model->insertdata('categories', $post);
            if ($savedata) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Sub-Category Add Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Sub-Category Add Successfully</div>');
            }
            redirect('subcategories');
        } else {
            $this->load->view('admin/category/add-category', $data);
        }
    }

    public function edit_subcategory($id)
    {

        $data['title'] = 'Update Sub-Category';
        $tid = decryptId($id);
        $data['category'] = $this->CommonModal->getRowById('categories', 'id', $tid);
        $data['parentCategories'] = $this->CommonModal->runQuery("SELECT * FROM `categories` WHERE `parent_id` = '0' order by `id` DESC");

        $data['type'] = 'sub';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $category_id = $this->CommonModal->updateRowById('categories', 'id', $tid, $post);
            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Subcategory Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Subcategory Updated successfully</div>');
            }
            redirect('subcategories');
        } else {
            $this->load->view('admin/category/edit-category', $data);
        }
    }

    public function general_settings()
    {
        $data['title'] = "General Settings";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['setting'] = $this->CommonModal->getRowById('general_settings', 'id', '1');
        if (count($_POST) > 0) {
            $post = $this->input->post();

            $logotemp = $post['logo'];
            if ($_FILES['logo_temp']['name'] != '') {
                $logo = imageUploadWithRatio('logo_temp', 'uploads/logo/', '300', '300');
                $post['logo'] = 'uploads/logo/' . $logo;
                if ($logotemp != "") {
                    unlink($logotemp);
                }
            }


            $logo_footertemp = $post['logo_footer'];
            if ($_FILES['logo_footer_temp']['name'] != '') {
                $logo_footer = imageUploadWithRatio('logo_footer_temp', 'uploads/logo/', '300', '300');
                $post['logo_footer'] = 'uploads/logo/' . $logo_footer;
                if ($logo_footertemp != "") {
                    unlink($logo_footertemp);
                }
            }

            $favicontemp = $post['favicon'];
            if ($_FILES['favicon_temp']['name'] != '') {
                $favicon = imageUploadWithRatio('favicon_temp', 'uploads/logo/', '300', '300');
                $post['favicon'] = 'uploads/logo/' . $favicon;
                if ($favicontemp != "") {
                    unlink($favicontemp);
                }
            }

            $savedata = $this->CommonModal->updateRowById('general_settings', 'id', '1', $post);
            if ($savedata) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Logos Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Logos Updated Successfully</div>');
            }
            redirect('general-settings');
        } else {

            $this->load->view('admin/files/general_settings', $data);
        }
    }

    public function settings()
    {
        $data['title'] = "Settings";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $data['setting'] = $this->CommonModal->getRowById('settings', 'id', '1');
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $savedata = $this->CommonModal->updateRowById('settings', 'id', '1', $post);
            if ($savedata) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Settings Updated Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Settings Updated Successfully</div>');
            }
            redirect('settings');
        } else {

            $this->load->view('admin/files/settings', $data);
        }
    }
    public function changepassword()
    {
        $data['title'] = "Change Password";
        $data['favicon'] = base_url() . 'assets/images/favicon.png';
        $exist = $this->CommonModal->getRowById('users', 'id', sessionId('id'));
        if (count($_POST) > 0) {
            $post = $this->input->post();
            if ($post['old_password'] == $exist[0]['password']) {
                if ($post['new_password'] == $post['c_new_password']) {
                    $mydata = array('password' => $post['new_password']);
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

            $this->load->view('admin/files/change-password', $data);
        }
    }
}
