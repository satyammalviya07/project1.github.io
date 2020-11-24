<aside id="sidebar_main">
    <div class="sidebar_main_header">

    </div>
    <?php
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = $components[2];
    ?>
    <div class="menu_section">
        <ul>
            <li class="<?php if ($first_part == 'vDashboard') {
                echo "current_section";
            } ?>" title="Dashboard">
                <a href="<?= base_url('vDashboard') ?>">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>
            <li class="<?php if ($first_part == 'vProfile') {
                echo "current_section";
            } ?>" title="profile">
                <a href="<?= base_url('vProfile') ?>">
                    <span class="menu_icon"><img src="<?= base_url('Assets/icons/user.svg') ?>" height="20" width="20"></span>
                    <span class="menu_title">Profile</span>
                </a>
            </li>
            <li class="<?php if ($first_part == 'vChangePassword') {
                echo "current_section";
            } ?>" title="profile">
                <a href="<?= base_url('vChangePassword') ?>">
                    <span class="menu_icon"><img src="<?= base_url('Assets/icons/password.svg') ?>" height="20"
                                                 width="20"></span>
                    <span class="menu_title">Change Password</span>
                </a>
            </li>
            <li class="<?php if ($first_part == 'vAllMachine') {
                echo "current_section";
            } ?>" title="class">
                <a href="<?= base_url('vAllMachine') ?>">
                    <span class="menu_icon"><img src="<?= base_url('Assets/icons/class.svg') ?>" height="20" width="20"></span>
                    <span class="menu_title">All Machine</span>
                </a>
            </li>
            <li class="<?php if ($first_part == 'vBookHistory') {
                echo "current_section";
            } ?>" title="class">
                <a href="<?= base_url('vBookHistory') ?>">
                    <span class="menu_icon"><img src="<?= base_url('Assets/icons/class.svg') ?>" height="20" width="20"></span>
                    <span class="menu_title">Booking History</span>
                </a>
            </li>

            <li class="" title="logout">
                <a href="<?= base_url('vendorLogout') ?>">
                    <span class="menu_icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="menu_title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
