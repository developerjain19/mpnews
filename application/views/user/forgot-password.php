<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>
<section class="">
    <div class="container-xl">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/profileSetting/<?= sessionId('userslug') ?>"> Profile Settings</a></li>
                    <li class="breadcrumb-item active">Forgot Password</li>
                </ol>
            </nav>
            <div class="col-12">
                <?php
                if ($this->session->has_userdata('msg')) {
                    echo $this->session->userdata('msg');
                    $this->session->unset_userdata('msg');
                }
                ?>
                <div class="display-flex align-items-center justify-content-center">

                    <div class="section-account">
                        <div class="title">
                            <h3 class="page-title pb-2">Forgot Password</h3>
                        </div>

                        <p class="display-block text-center text-muted mb-2">Enter your email address</p>
                        <form action="" method="post" class="needs-validation">

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control form-input input-account" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-custom btn-account">Reset Password</button>
                            </div>
                        </form>


                        <div class="mb-3 col-sm-6" style="margin:auto">
                            <h6 class="text-center">OR</h6>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalLogin" class="btn btn-primary btn-sm btn-account">Back To Login</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer') ?>