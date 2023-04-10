<?php $this->load->view('includes/header-link') ?>
<?php $this->load->view('includes/header') ?>



<section class="section section-page section-profile">
    <div class="container-fluid">
        <div class="row">
            <div class="profile-header">
                <div id="edit_profile_cover" class="edit-profile-cover" style="background-image:url('<?= (($users[0]['cover_image'] != '') ?  base_url('uploads/profile/') . $users[0]['cover_image'] : '')  ?>')">
                    <div class="profile-info-container">
                        <div class="container-xl">
                            <div class="tbl-container profile-info">
                                <div class="tbl-cell cell-left">
                                    <div class="profile-image ">
                                        <img src="<?= (($users[0]['avatar'] != '') ?  base_url('uploads/profile/') . $users[0]['avatar'] :  base_url('assets/img/user.png'))  ?>" alt="Leena Salve" class="img-fluid" ">
                                    </div>
                                </div>
                                <div class=" tbl-cell profile-username">
                                        <h1 class="username text-black"><?= $users[0]['username'] ?></h1>
                                        <div class="profile-last-seen">
                                            <div class="item text-muted profile-email text-black">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill text-black" viewBox="0 0 16 16">
                                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                                </svg>
                                                &nbsp; <span class="text-black"><?= $users[0]['email'] ?></span>
                                            </div>
                                        </div>

                                        <?php if (sessionId('id') != '') { ?>

                                            <?php

                                            $isUserFollows =  getSingleRowById('followers', array('following_id' => $users[0]['id'], 'follower_id' => sessionId('id')));
                                            ?>
                                            <form method="post" action="<?= base_url('Home/add_follower') ?>">
                                                <input type="hidden" name="following_id" value="<?= $users[0]['id'] ?>">
                                                <input type="hidden" name="url" value="<?= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>">


                                                <?php if ($isUserFollows != '') {
                                                ?>
                                                    <input type="hidden" name="tag" value="0">
                                                    <button type="submit" class="btn btn-lg btn-custom btn-follow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                        </svg>
                                                        <span>UnFollow</span>
                                                    </button>

                                                <?php
                                                } else {
                                                ?>
                                                    <input type="hidden" name="tag" value="1">
                                                    <button type="submit" class="btn btn-lg btn-custom btn-follow">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                                        </svg>
                                                        <span> Follow</span>
                                                    </button>
                                                <?php
                                                }
                                                ?>
                                            </form>
                                        <?php } else { ?>

                                            <button type="submit" class="btn btn-lg btn-custom btn-follow" data-bs-toggle="modal" data-bs-target="#modalLogin">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                                </svg>
                                                <span>Follow</span>
                                            </button>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-xl container-profile">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-4 pt-2">
                        <div class="sticky-lg-top">
                            <div class="row">
                                <div class="col-12">
                                    <div class="profile-details">
                                        <p class="description"></p>
                                        <div class="d-flex flex-row mb-4 contact-details">
                                            <div class="item text-muted">Member since&nbsp;<?= convertDatedmy($users[0]['created_at']) ?></div>

                                        </div>
                                        <div class="d-flex flex-row mb-4">
                                            <!-- <ul class="profile-social-links">
                                            <li><a href="<?= base_url() ?>rss/author/leena-salve"><i class="icon-rss"></i></a></li>
                                        </ul> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="sidebar-widget">
                                        <div class="widget-head">
                                            <?php $Following =  getNumRows('followers', array('follower_id' => $users[0]['id']));  ?>
                                            <h4 class="title">Following&nbsp;(<?= $Following ?>)</h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="row">
                                                <div class="col-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <div class="sidebar-widget">
                                        <div class="widget-head">
                                            <?php $Follower =  getNumRows('followers', array('following_id' => $users[0]['id']));  ?>
                                            <h4 class="title">Followers&nbsp;(<?= $Follower ?>)</h4>
                                        </div>
                                        <div class="widget-body">
                                            <div class="row">
                                                <div class="col-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-8 pt-2">
                        <div class="row">


                            <?php
                            if (!empty($postid)) {
                                foreach ($postid as $row) {

                                    post($row, '6');
                                }
                            }
                            ?>


                            <div class="col-12 mt-3">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-end">
                                        <li class="page-item">
                                            <?php echo $this->pagination->create_links(); ?>

                                        </li>


                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<?php $this->load->view('includes/footer') ?>