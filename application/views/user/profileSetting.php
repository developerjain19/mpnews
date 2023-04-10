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
                        <form action="" method="post" enctype="multipart/form-data" class="needs-validation">
                            <input type="hidden" name="token" value="3551131a87b2bf210beb60250a92d2ed" />
                            <div id="edit_profile_cover" class="edit-profile-cover edit-cover-no-image" style="background-image:url('<?= (($users[0]['cover_image'] != '') ?  base_url('uploads/profile/') . $users[0]['cover_image'] : '')  ?>')">
                                <div class="edit-avatar">
                                    <a class="btn btn-md btn-custom btn-file-upload">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                                        </svg>
                                        <input type="file" name="file" size="40" accept=".png, .jpg, .jpeg, .gif" data-img-id="img_preview_avatar" onchange="showImagePreview(this);">
                                    </a>


                                    <img src="<?= (($users[0]['avatar'] != '') ?  base_url('uploads/profile/') . $users[0]['avatar'] :  base_url('assets/img/user.png'))  ?>" alt=<?= sessionId('email') ?>" id="img_preview_avatar" class="img-thumbnail" width="180" height="180">
                                </div>

                                <a class="btn btn-md btn-custom btn-file-upload btn-edit-cover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-camera-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path d="M2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2zm.5 2a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm9 2.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0z" />
                                    </svg>
                                    <input type="file" name="image_cover" size="40" accept=".png, .jpg, .jpeg, .gif" data-img-id="edit_profile_cover" onchange="showImagePreview(this, true);">
                                </a>
                            </div>
                            <p class="mb-5"><small class="text-muted">*Click on the save changes button after selecting your image</small></p>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control form-input" value="<?= sessionId('email') ?>" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control form-input" value="<?= $users[0]['username'] ?>" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control form-input" value="<?= sessionId('userslug') ?>" placeholder="Slug" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">About Me</label>
                                <textarea name="about_me" class="form-control form-textarea" placeholder="About Me"><?= $users[0]['about_me'] ?></textarea>
                            </div>
                            <button type="submit" value="update" class="btn btn-md btn-custom">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('includes/footer') ?>