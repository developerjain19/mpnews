<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url('admin') ?>" class="brand-link">
    <!-- <img src="<?= base_url('uploads/logo/logo.jpeg') ?>" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-light"><?= $this->site_title ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/admin/') ?>dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= sessionId('email') ?></a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= base_url('dashboard') ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('categories') ?>" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Categories
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('subcategories') ?>" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
            <p>
              Subcategories
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('post-format') ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Add Post
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Posts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url() ?>view-posts" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Posts</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= base_url() ?>view-posts" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pending Posts</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= base_url() ?>scheduled-posts" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Scheduled Posts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>drafts    " class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Drafts</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-user"></i>
            <p>
              User Details
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('user-list'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> <?= trans("user list"); ?></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>settings" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?= trans("Settings"); ?></p>
              </a>
            </li>
          </ul>
        </li>



        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-comment"></i>
            <p>
              Comments
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('comments'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> All Comments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>comments?type=pending" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> Pending Comments</p>
              </a>
            </li>
          </ul>
        </li>




        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cogs"></i>
            <p>
              Setting
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url('general-settings'); ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> <?= trans("general_settings"); ?></p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>settings" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?= trans("Settings"); ?></p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('contact-query') ?>" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Contact
            </p>
          </a>
        </li>

      </ul>
    </nav>
  </div>
</aside>