<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>
<section class="section section-page">
    <div class="container-xl">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/profileSetting/<?= sessionId('userslug') ?>"> Profile Settings</a></li>
                    <li class="breadcrumb-item active">Update Profile</li>
                </ol>
            </nav>
            <h1 class="page-title">Update Profile</h1>
            <div class="page-content">
                <div class="row">

                    <?php $this->load->view('common/profile-sidemenu'); ?>
                    <div class="col-sm-12 col-md-9">
                        <?php
                        if ($this->session->has_userdata('msg')) {
                            echo $this->session->userdata('msg');
                            $this->session->unset_userdata('msg');
                        }
                        ?>
                        <form action="<?= base_url('change-password'); ?>" method="post" class="needs-validation">
                            <div class="mb-3">
                                <label class="form-label">Old Password</label>
                                <input type="password" name="old_password" class="form-control form-input" value="" placeholder="Old Password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="new_password" class="form-control form-input" value="" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="c_new_password" class="form-control form-input" value="" placeholder="Confirm Password" required>
                            </div>
                            <button type="submit" class="btn btn-md btn-custom">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer') ?>