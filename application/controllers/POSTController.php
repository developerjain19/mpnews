<?php
defined('BASEPATH') or exit('no direct access allowed');

class POSTController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (sessionId('id') == "") {
            redirect(base_url('admin'));
        }
        date_default_timezone_set("Asia/Kolkata");
    }


    public function post_format()
    {
        $data['title'] = "Post Format";
        $this->load->view('admin/post/postformat', $data);
    }

    public function addPost()
    {
        $type = $this->input->get('type');
        $data['categories'] = $this->CommonModal->getAllRows('categories');
        $data['subcategories'] = $this->CommonModal->getAllRows('categories');
        $data['tag'] = 'new';

        if (count($_POST) > 0) {

            $title = $this->input->post('title');
            $title_slug = url_title($this->input->post('title_slug'));
            $summary = $this->input->post('summary');
            $keywords = $this->input->post('keywords');
            $optional_url = $this->input->post('optional_url');

            $content = $this->input->post('content');
            $image_description = $this->input->post('image_description');
            $status = $this->input->post('status');
            $scheduled_post = $this->input->post('scheduled_post');
            $date_published = $this->input->post('date_published');
            if (!empty($date_published)) {
                $created_at =   date("Y-m-d", strtotime($date_published)) . ' ' . date("H:i:s");
            } else {
                $created_at = date('Y-m-d H:i:s');
            }
            $category_id = $this->input->post('category_id');
            $lang_id = $this->input->post('lang_id');
            $location = 'uploads/images/' . date("Ym");
            if (!is_dir($location)) {
                $dir =  mkdir($location, 0755);
            }
            $image_big = imageUploadWithRatio('image',  $location, '870', '580');
            $image_default = imageUploadWithRatio('image',  $location, '870', '600');
            $image_slider = imageUploadWithRatio('image',  $location, '694', '532');
            $image_mid = imageUploadWithRatio('image',  $location, '430', '256');
            $image_small = imageUploadWithRatio('image',  $location, '140', '98');

            $table = "posts";
            $data = array('lang_id' => $lang_id, 'title' => $title, 'title_slug' => $title_slug, 'keywords' => $keywords, 'summary' => $summary, 'content' => $content, 'category_id' => $category_id, 'image_big' =>  $location . '/' . $image_big, 'image_default' => $location . '/' . $image_default, 'image_slider' => $location . '/' . $image_slider, 'image_mid' => $location . '/' . $image_mid, 'image_small' => $location . '/' . $image_small, 'image_mime' => 'jpg', 'image_storage' => 'local', 'is_scheduled' => $scheduled_post, 'created_at' => $created_at, 'user_id' => sessionId('id'), 'status' => $status,  'image_description' => $image_description, 'optional_url' => $optional_url, 'post_type' => $type);
            $postId = $this->CommonModal->insertRowReturnId($table, $data);

            $tags = explode(',', $this->input->post('tags'));
            $counttag = count($tags);
            for ($i = 0; $i <= $counttag; $i++) {
                $no = rand();
                if (!empty($tags[$i])) {
                    $get_tag =  $tags[$i];
                    $tag_slug = url_title($tags[$i]);
                    $this->CommonModal->insertRowReturnId('tags', array('tag' => $get_tag, 'tag_slug' => $tag_slug, 'post_id' => $postId));
                }
            }

            $countImg = count($_FILES['moreimage']);
            for ($i = 0; $i <= $countImg; $i++) {
                $no = rand();
                if (!empty($_FILES["moreimage"]["name"][$i])) {
                    $_FILES['multiimages'] = array(
                        'name' => $_FILES["moreimage"]["name"][$i],
                        'type' => $_FILES["moreimage"]["type"][$i],
                        'tmp_name' => $_FILES["moreimage"]["tmp_name"][$i],
                        'error' => $_FILES["moreimage"]["error"][$i],
                        'size' => $_FILES["moreimage"]["size"][$i],
                    );
                    $image_big1 = imageUploadWithRatio('multiimages',  $location, '870', '580');

                    $image_big1 = $location . '/' . $image_big1;

                    $this->CommonModal->insertRowReturnId('post_images', array('post_id' => $postId, 'image_big' =>  $image_big1, 'image_default' =>  $image_big1, 'storage' => 'local'));
                }
            }




            $filelocation = 'uploads/files/' . date("Ym");
            if (!is_dir($filelocation)) {
                $dir2 =  mkdir($filelocation, 0755);
            }

            $file = $_FILES['file_name']['name'];
            $tmpfile = $_FILES['file_name']['tmp_name'];
            $folder = (($file == '') ? '' : date("dmYHis") . $file);
            move_uploaded_file($tmpfile, $filelocation . '/' . $folder);
            $fileid =  $this->CommonModal->insertRowReturnId('files', array('file_name' =>   $folder, 'file_path' => $filelocation, 'user_id' => sessionId('id'), 'storage' => 'local'));

            $this->CommonModal->insertRowReturnId('post_files', array('file_id' => $fileid, 'post_id' => $postId));

            if ($postId) {
                $this->session->set_flashdata('msg', 'Post  Added successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'view-posts');
        }
        $title = "Add " . $type;
        $data['title'] = $title;
        $data['postType'] = $type;

        $this->load->view('admin/post/add-post', $data);
    }


    public function editPost($id)
    {

        $data['categories'] = $this->CommonModal->getAllRows('categories');
        $data['subcategories'] = $this->CommonModal->getAllRows('categories');
        $data['tag'] = 'edit';

        $id =  decryptId($id);

        $data['post'] =  $this->CommonModal->getRowById('posts', 'id', $id);
        $tags =  $this->CommonModal->getRowById('tags', 'post_id', $id);
        if ($tags) {
            foreach ($tags as $ptags) {
                $multitag[] =  $ptags['tag'];
            }
            $data['post_tags'] = implode(",", $multitag);
        }
        $data['files'] =  $this->CommonModal->runQuery("SELECT * FROM `post_files` JOIN  files ON post_files.file_id = files.id WHERE post_files.post_id = " . $id);

        $getfileid = getRowById('post_files',  'post_id', $id);



        if (count($_POST) > 0) {

            $title = $this->input->post('title');
            $title_slug = url_title($this->input->post('title_slug'));
            $summary = $this->input->post('summary');
            $keywords = $this->input->post('keywords');
            $optional_url = $this->input->post('optional_url');

            $content = $this->input->post('content');
            $image_description = $this->input->post('image_description');
            $status = $this->input->post('status');
            $scheduled_post = $this->input->post('scheduled_post');
            $date_published = $this->input->post('date_published');
            if (!empty($date_published)) {
                $created_at =   date("Y-m-d", strtotime($date_published)) . ' ' . date("H:i:s");
            } else {
                $created_at = date('Y-m-d H:i:s');
            }
            $category_id = $this->input->post('category_id');
            $lang_id = $this->input->post('lang_id');
            $type =  $data['post'][0]['post_type'];
            $location = 'uploads/images/' . date("Ym");
            if (!is_dir($location)) {
                $dir =  mkdir($location, 0755);
            }
            if ($_FILES['image']['name'] != '') {
                $image_big = imageUploadWithRatio('image',  $location, '870', '580');

                $image_default = imageUploadWithRatio('image',  $location, '870', '600');
                $image_slider = imageUploadWithRatio('image',  $location, '694', '532');
                $image_mid = imageUploadWithRatio('image',  $location, '430', '256');
                $image_small = imageUploadWithRatio('image',  $location, '140', '98');

                $image_big =  $location . '/' . $image_big;
                $image_default =  $location . '/' . $image_default;
                $image_slider =  $location . '/' . $image_slider;
                $image_mid =  $location . '/' . $image_mid;
                $image_small =  $location . '/' . $image_small;
                if ($data['post'][0]['image_big'] != "") {
                    unlink($data['post'][0]['image_big']);
                    unlink($data['post'][0]['image_default']);
                    unlink($data['post'][0]['image_slider']);
                    unlink($data['post'][0]['image_mid']);
                    unlink($data['post'][0]['image_small']);
                }
            } else {

                $image_big = $data['post'][0]['image_big'];
                $image_default = $data['post'][0]['image_default'];
                $image_slider = $data['post'][0]['image_slider'];
                $image_mid = $data['post'][0]['image_mid'];
                $image_small = $data['post'][0]['image_small'];
            }



            $table = "posts";
            $data = array('lang_id' => $lang_id, 'title' => $title, 'title_slug' => $title_slug, 'keywords' => $keywords, 'summary' => $summary, 'content' => $content, 'category_id' => $category_id, 'image_big' =>  $image_big, 'image_default' => $image_default, 'image_slider' => $image_slider, 'image_mid' => $image_mid, 'image_small' => $image_small, 'image_mime' => 'jpg', 'image_storage' => 'local', 'is_scheduled' => $scheduled_post, 'created_at' => $created_at, 'user_id' => sessionId('id'), 'status' => $status,  'image_description' => $image_description, 'optional_url' => $optional_url, 'post_type' => $type);

            $postId = $this->CommonModal->updateRowById($table,  'id', $id, $data);


            $this->CommonModal->deleteRowById('tags', array('post_id' => $id));

            $tags = explode(',', $this->input->post('tags'));
            $counttag = count($tags);
            for ($i = 0; $i <= $counttag; $i++) {
                $no = rand();
                if (!empty($tags[$i])) {
                    $get_tag =  $tags[$i];
                    $tag_slug = url_title($tags[$i]);
                    $this->CommonModal->insertRowReturnId('tags', array('tag' => $get_tag, 'tag_slug' => $tag_slug, 'post_id' => $id));
                }
            }

            $countImg = count($_FILES['moreimage']);

            for ($i = 0; $i <= $countImg; $i++) {
                $no = rand();
                if (!empty($_FILES["moreimage"]["name"][$i])) {


                    $_FILES['multiimages'] = array(
                        'name' => $_FILES["moreimage"]["name"][$i],
                        'type' => $_FILES["moreimage"]["type"][$i],
                        'tmp_name' => $_FILES["moreimage"]["tmp_name"][$i],
                        'error' => $_FILES["moreimage"]["error"][$i],
                        'size' => $_FILES["moreimage"]["size"][$i],
                    );
                    $image_big1 = imageUploadWithRatio('multiimages',  $location, '870', '580');

                    $image_big1 = $location . '/' . $image_big1;

                    $this->CommonModal->insertRowReturnId('post_images', array('post_id' => $id, 'image_big' =>  $image_big1, 'image_default' =>  $image_big1, 'storage' => 'local'));
                }
            }
            $filelocation = 'uploads/files/' . date("Ym");
            if (!is_dir($filelocation)) {
                $dir2 =  mkdir($filelocation, 0755);
            }
            if ($_FILES['file_name']['name'] != '') {
                $file = $_FILES['file_name']['name'];
                $tmpfile = $_FILES['file_name']['tmp_name'];
                $folder = (($file == '') ? '' : date("dmYHis") . $file);
                move_uploaded_file($tmpfile, $filelocation . '/' . $folder);

                if ($_POST['file_name_img'] != "") {
                    unlink($filelocation . $_POST['file_name_img']);
                }
            } else {
                $folder = $_POST['file_name_img'];
            }



            if (!empty($folder)) {

                if ($getfileid != '') {
                    $fileid =  $this->CommonModal->updateRowById('files',  'id', $getfileid[0]['file_id'], array('file_name' =>  $folder, 'file_path' => $filelocation));
                } else {

                    $fileid = $this->CommonModal->insertRowReturnId('files', array('file_name' => $folder, 'file_path' => $filelocation, 'user_id' => sessionId('id'), 'storage' => 'local'));
                    $this->CommonModal->insertRowReturnId('post_files', array('post_id' => $id, 'file_id' => $fileid));
                }
            }
            if ($postId) {
                $this->session->set_flashdata('msg', 'Post  Edit successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'view-posts');
        }
        $title = "Edit Post";
        $data['title'] = $title;
        $data['type'] =  $data['post'][0]['post_type'];


        $this->load->view('admin/post/add-post', $data);
    }

    public function viewposts()
    {
        $data['title'] = "Post | Admin Mp Online News";
        $data['posts'] = $this->CommonModal->getAllRowsInOrder('posts', 'id', 'desc');
        $this->load->view('admin/post/viewposts', $data);
    }

    public function get_subcategory()
    {
        $category_id = $_POST['category_id'];
        $data = $this->CommonModal->getRowById('categories', 'parent_id', $category_id);
        echo '<option>Select Sub Category</option>';
        foreach ($data as $da) {
            echo '<option value="' . $da['id'] . '">' . $da['name'] . '</option>';
        }
    }

    public function delete_add_images()
    {
        $id = $_POST['id'];
        $filename = $_POST['filename'];
        unlink($filename);
        $this->CommonModal->deleteRowById('post_images', array('id' => $id));
    }

    public function deletePostFile()
    {
        $id = $_POST['id'];
        $filename = $_POST['filename'];
        unlink($filename);
        $this->CommonModal->deleteRowById('post_files', array('file_id' => $id));
        $this->CommonModal->deleteRowById('files', array('id' => $id));
    }
}
