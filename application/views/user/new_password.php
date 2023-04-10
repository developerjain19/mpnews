<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>
<section class="section section-page">
    <div class="container-xl">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/profileSetting/<?= sessionId('userslug') ?>">Reset Password</a></li>
                    <li class="breadcrumb-item active">Reset Password</li>
                </ol>
            </nav>

            <div class="page-content">
                <div class="row justify-content-center">


                    <div class="col-sm-12 col-md-5">
                        <?php
                        if ($this->session->has_userdata('msg')) {
                            echo $this->session->userdata('msg');
                            $this->session->unset_userdata('msg');
                        }
                        ?>
                        <div class="title text-center">
                            <h3 class="page-title pb-2">Reset Password</h3>
                        </div>
                        <form action="<?php echo base_url() . 'Home/set_password_candidate' ?>" method="post" class="needs-validation">
                            <input type="hidden" name="userid" value="<?= $userid ?>" />
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control form-input" value="" placeholder="new Password" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control form-input" value="" placeholder="Confirm Password" required>
                            </div>
                            <button type="submit" class="btn btn-md btn-custom">Save Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer') ?>