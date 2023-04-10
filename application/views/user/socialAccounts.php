<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>
<section class="section section-page">
    <div class="container-xl">
        <div class="row">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>/profileSetting/<?= sessionId('userslug') ?>"> Profile Settings</a></li>
                    <li class="breadcrumb-item active">Social Accounts</li>
                </ol>
            </nav>
            <h1 class="page-title">Social Accounts</h1>
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
                        <form action="" method="post" class="needs-validation">
                            <input type="hidden" name="token" value="38062f348def3ca61fde1114eb27fcf4" />
                            <div class="mb-3">
                                <label class="form-label">Facebook URL</label>
                                <input type="text" class="form-control form-input" name="facebook_url" placeholder="Facebook URL" value="<?= $users[0]['facebook_url'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Twitter URL</label>
                                <input type="text" class="form-control form-input" name="twitter_url" placeholder="Twitter URL" value="<?= $users[0]['twitter_url'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Instagram URL</label>
                                <input type="text" class="form-control form-input" name="instagram_url" placeholder="Instagram URL" value="<?= $users[0]['instagram_url'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pinterest URL</label>
                                <input type="text" class="form-control form-input" name="pinterest_url" placeholder="Pinterest URL" value="<?= $users[0]['pinterest_url'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Linkedin URL</label>
                                <input type="text" class="form-control form-input" name="linkedin_url" placeholder="Linkedin URL" value="<?= $users[0]['linkedin_url'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">VK URL</label>
                                <input type="text" class="form-control form-input" name="vk_url" placeholder="VK URL" value="<?= $users[0]['vk_url'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telegram URL</label>
                                <input type="text" class="form-control form-input" name="telegram_url" placeholder="Telegram URL" value="<?= $users[0]['telegram_url'] ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Youtube URL</label>
                                <input type="text" class="form-control form-input" name="youtube_url" placeholder="Youtube URL" value="<?= $users[0]['youtube_url'] ?>">
                            </div>
                            <button type="submit" class="btn btn-md btn-custom">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer') ?>