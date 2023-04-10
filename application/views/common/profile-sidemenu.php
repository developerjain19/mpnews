<div class="col-sm-12 col-md-3">
    <div class="profile-list-group">
        <ul class="list-group">
            <li class="list-group-item active">
                <a href="<?= base_url() ?>profileSetting/<?= sessionId('userslug') ?>">Update Profile</a>
            </li>
            <li class="list-group-item ">
                <a href="<?= base_url() ?>social-accounts">Social Accounts</a>
            </li>
           
            <li class="list-group-item ">
                <a href="<?= base_url() ?>change-password">Change Password</a>
            </li>
            <li class="list-group-item ">
                <a href="<?= base_url() ?>logout">Logout</a>
            </li>
        </ul>
    </div>
</div>