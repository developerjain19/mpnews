 <footer id="footer">
     <div class="footer-inner">
         <div class="container-xl">
             <div class="row justify-content-between">
                 <div class="col-sm-12 col-md-6 col-lg-4 footer-widget footer-widget-about">
                     <div class="footer-logo">
                         <img src="<?= $this->logo ?>" alt="logo" class="logo" width="240" height="90">
                     </div>
                     <div class="footer-about">
                     </div>
                 </div>
                 <div class="col-sm-12 col-md-6 col-lg-4 footer-widget">
                     <h4 class="widget-title">Most Viewed Posts</h4>
                     <div class="footer-posts">
                         <?php
                            $j = 0;
                            if (!empty($popular)) {
                                foreach ($popular as $row) {
                                    $category_row = getSingleRowById('categories', array('id' => $row['category_id']));
                                    $author = getSingleRowById('users', array('id' => $row['user_id']));
                                    if ($j >= 3) {
                                        break;
                                    }
                            ?>
                                 <div class="tbl-container post-item-small">
                                     <div class="tbl-cell left">
                                         <div class="image">
                                             <a href="<?= base_url($row['title_slug']) ?>">
                                                 <img src="<?= $row['image_mid'] ?>" alt="<?= $row['title'] ?>" class="img-fluid lazyload" width="130" height="91" />
                                             </a>
                                         </div>
                                     </div>
                                     <div class="tbl-cell right">
                                         <h3 class="title"><a href="<?= base_url($row['title_slug']) ?>"><?= $row['title'] ?></a></h3>
                                         <p class="small-post-meta"> <a href="profile/<?= $author['slug'] ?>" class="a-username"><?= $author['username'] ?></a>
                                             <span><?= convertDatedmy($row['created_at']); ?></span>
                                             <span><i class="icon-comment"></i>&nbsp;0</span>
                                             <span class="m-r-0"><i class="icon-eye"></i>&nbsp;37</span>
                                         </p>
                                     </div>
                                 </div>
                         <?php
                                    $j++;
                                }
                            }
                            ?>

                     </div>
                 </div>
                 <div class="col-sm-12 col-md-6 col-lg-4 footer-widget">
                     <h4 class="widget-title">Newsletter</h4>
                     <div class="newsletter">
                         <p class="description">Join our subscribers list to get the latest news, updates and special
                             offers directly in your inbox</p>
                         <form id="form_newsletter_footer" class="form-newsletter">
                             <div class="newsletter-inputs">
                                 <input type="email" name="email" class="form-control form-input newsletter-input" maxlength="199" placeholder="Email">
                                 <button type="submit" name="submit" value="form" class="btn btn-custom newsletter-button">Subscribe</button>
                             </div>
                             <input type="text" name="url">
                             <div id="form_newsletter_response"></div>
                         </form>
                     </div>
                     <div class="footer-social-links">
                         <ul>
                             <li><a class="facebook" href="https://www.facebook.com/mponlinenews" target="_blank" aria-label="facebook"><i class="icon-facebook"></i></a></li>
                             <li><a class="twitter" href="https://twitter.com/mponlinenews201?lang=en" target="_blank" aria-label="twitter"><i class="icon-twitter"></i></a></li>
                             <li><a class="instagram" href="https://www.instagram.com/mponlinenews2013/" target="_blank" aria-label="instagram"><i class="icon-instagram"></i></a></li>
                             <li><a class="rss" href="rss-feeds" aria-label="rss"><i class="icon-rss"></i></a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="footer-copyright">
         <div class="container-xl">
             <div class="row align-items-center">
                 <div class="col-sm-12 col-md-6">
                     <div class="copyright text-start">
                         Copyright 2023 Mp Online News - All Rights Reserved. </div>
                 </div>
                 <div class="col-sm-12 col-md-6">
                     <div class="nav-footer text-end">
                         <ul>
                             <li><a href="terms-conditions">Terms &amp; Conditions </a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <a href="#" class="scrollup"><i class="icon-arrow-up"></i></a>
 <script src="<?= base_url() ?>assets/themes/magazine/js/jquery-3.6.1.min.js "></script>
 <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js "></script>
 <script src="<?= base_url() ?>assets/themes/magazine/js/plugins.js"></script>
 <script src="<?= base_url() ?>assets/themes/magazine/js/muskan.js"></script>
 <script src="<?= base_url() ?>assets/themes/magazine/js/custom.js"></script>
 </body>

 </html>