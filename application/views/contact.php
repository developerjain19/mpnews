<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>
<section class="section section-page">
    <div class="container-xl">
        <div class="row">
            <?php $this->load->view('includes/breadcrumb') ?>

            <div class="page-content">
                <div class="row">
                    <div class="col-12 mb-5 font-text">
                    </div>
                    <div class="col-12">
                        <h2 class="title-send-message">Send a Message</h2>
                        <?php
                        if ($this->session->has_userdata('msg')) {
                            echo $this->session->userdata('msg');
                            $this->session->unset_userdata('msg');
                        }
                        ?>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-contact">
                            <form action="" method="post" class="needs-validation">
                                <div class="mb-3">
                                    <input type="text" class="form-control form-input" name="name" placeholder="Name" maxlength="199" minlength="1" pattern=".*\S+.*" value="" required>
                                </div>
                                <div class="mb-3">
                                    <input type="email" class="form-control form-input" name="email" maxlength="199" placeholder="Email" value="" required>
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control form-input" name="message" placeholder="Message" maxlength="4970" minlength="5" required></textarea>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="checkboxContactTerms" required>
                                    <label class="form-check-label" for="checkboxContactTerms">
                                        I have read and agree to the&nbsp;<a href="<?= base_url() ?>/terms-conditions" class="font-weight-600" target="_blank"><strong>Terms & Conditions</strong></a>
                                    </label>
                                </div>
                                <div class="mb-3">
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-custom">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="contact-info">
                            <div class="d-flex justify-content-start align-items-center mb-3">
                                <div class="contact-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg>
                                </div>
                                7000027065
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer') ?>