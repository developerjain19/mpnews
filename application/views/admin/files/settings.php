<?php $this->load->view('admin/template/header_link'); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php $this->load->view('admin/template/header'); ?>

        <?php $this->load->view('admin/template/sidebar'); ?>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">

                        <div class="col-sm-6">
                            <h1 class="m-0">Setting</h1>
                        </div>

                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">

                            <?php if ($msg = $this->session->flashdata('msg')) :
                                $msg_class = $this->session->flashdata('msg_class') ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                    </div>
                                </div>
                            <?php
                                $this->session->unset_userdata('msg');
                            endif; ?>

                            <?php

                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>


                            <form action="" method="post" enctype='multipart/form-data'>
                                <div class="box-body row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Site Title</label>
                                            <input type="text" class="form-control" name="site_title" placeholder="Site Title" value="<?= $setting[0]['site_title'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Site Title</label>
                                            <input type="text" class="form-control" name="home_title" placeholder="Home Title" value="<?= $setting[0]['home_title'] ?>" maxlength="200">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Keywords</label>
                                            <input type="text" class="form-control" name="keywords" placeholder="Key Words" value="<?= $setting[0]['keywords'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Application Name</label>
                                            <input type="text" class="form-control" name="application_name" placeholder="Application Name" value="<?= $setting[0]['application_name'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Site Description</label>
                                            <textarea class="form-control" rows="3" name="site_description" placeholder="Site Description" spellcheck="false"><?= $setting[0]['site_description'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Facebook Url</label>
                                            <input type="text" class="form-control" name="facebook_url" placeholder="Facebook Url" value="<?= $setting[0]['facebook_url'] ?>" maxlength="200">
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Twitter Url</label>
                                            <input type="text" class="form-control" name="twitter_url" placeholder="Twitter Url" value="<?= $setting[0]['twitter_url'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Instagram Url</label>
                                            <input type="text" class="form-control" name="instagram_url" placeholder="Instagram Url" value="<?= $setting[0]['instagram_url'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Pinterest Url</label>
                                            <input type="text" class="form-control" name="pinterest_url" placeholder="Pinterest Url" value="<?= $setting[0]['pinterest_url'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Linkedin Url</label>
                                            <input type="text" class="form-control" name="linkedin_url" placeholder="Linkedin Url" value="<?= $setting[0]['linkedin_url'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Vk url</label>
                                            <input type="text" class="form-control" name="vk_url" placeholder="Vk Url" value="<?= $setting[0]['vk_url'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Telegram Url</label>
                                            <input type="text" class="form-control" name="telegram_url" placeholder="Telegram Url" value="<?= $setting[0]['telegram_url'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="control-label">Youtube Url</label>
                                            <input type="text" class="form-control" name="youtube_url" placeholder="Youtube Url" value="<?= $setting[0]['youtube_url'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>About Footer</label>
                                            <textarea class="form-control" rows="3" name="site_description" placeholder="About footer" spellcheck="false"><?= $setting[0]['about_footer'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Contact Address</label>
                                            <textarea class="form-control" rows="3" name="contact_address" placeholder="Contact Address" spellcheck="false"><?= $setting[0]['contact_address'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Contact Email</label>
                                            <input type="text" class="form-control" name="contact_email" placeholder="Contact Email" value="<?= $setting[0]['contact_email'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">Contact Phone</label>
                                            <input type="text" class="form-control" name="contact_phone" placeholder="Contact Phone" value="<?= $setting[0]['contact_phone'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Copyright</label>
                                            <input type="text" class="form-control" name="copyright" placeholder="Copyright" value="<?= $setting[0]['copyright'] ?>" maxlength="200">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary pull-right">Update</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    </div>
    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>