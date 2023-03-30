<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>
<section class="section section-page">
    <div class="container-xl">
        <div class="row">
            <?php $this->load->view('includes/breadcrumb') ?>
            <div class="col-12">
                <div class="display-flex align-items-center justify-content-center">
                    <div class="section-account">
                        <div class="title">
                            <h1 class="page-title">Register</h1>
                            <?php
                            if ($this->session->has_userdata('msg')) {
                                echo $this->session->userdata('msg');
                                $this->session->unset_userdata('msg');
                            }
                            ?>
                        </div>
                        <div class="social-login">
                        </div>
                        <form action="" method="post" class="needs-validation">
                            <div class="mb-2">
                                <input type="text" name="username" class="form-control form-input input-account" placeholder="Username" value="" required autocomplete="off">
                            </div>
                            <div class="mb-2">
                                <input type="email" name="email" class="form-control form-input input-account" placeholder="Email" value="" required>
                            </div>
                            <div class="mb-2">
                                <input type="password" name="password" class="form-control form-input input-account" placeholder="Password" value="" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirm_password" class="form-control form-input input-account" placeholder="Confirm Password" value="" required>
                            </div>
                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" name="terms_conditions" value="1" id="checkboxContactTerms" required>
                                <label class="form-check-label" for="checkboxContactTerms">
                                    I have read and agree to the&nbsp;<a href="<?= base_url() ?>terms-conditions" class="font-weight-600" target="_blank"><strong>Terms & Conditions</strong></a>
                                </label>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 m-t-15">
                                    <button type="submit" class="btn btn-custom btn-account">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer') ?>