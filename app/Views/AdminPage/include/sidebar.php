<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard')?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <?php if(session()->get('role') == "Admin"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#staff" aria-expanded="false" aria-controls="staff">
                <span class="menu-title">Staff</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account menu-icon"></i>
            </a>
            <div class="collapse" id="staff">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('manageprofile')?>">Manage Profile</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('manageusers')?>">Manage Users</a></li>
                </ul>
            </div>
            <div class="collapse" id="staff">
                
            </div>
        </li>
        <?php endif;?>

        <?php if(session()->get('role') == "Admin"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#news" aria-expanded="false" aria-controls="news">
                <span class="menu-title">News</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-newspaper menu-icon"></i>
            </a>
            <div class="collapse" id="news">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('addnews')?>">Add News</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('managenews')?>">Manage News</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>

        <?php if(session()->get('role') == "Staff"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#news" aria-expanded="false" aria-controls="news">
                <span class="menu-title">News Staff</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-group menu-icon"></i> <!-- Changed icon class to mdi-account-group -->
            </a>
            <div class="collapse" id="news">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('createnews')?>">Create News</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('managenewstaff')?>">Manage News Staff</a></li>
            </div>
        </li>
        <?php endif;?>

        <?php if(session()->get('role') == "Admin"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#comments" aria-expanded="false" aria-controls="comments">
                <span class="menu-title">Comments</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-comment menu-icon"></i>
            </a>
            <div class="collapse" id="comments">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('managecomments')?>">Manage Comments</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>
        
        <?php if(session()->get('role') == "Staff"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#comments" aria-expanded="false" aria-controls="comments">
                <span class="menu-title">Comments</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-comment menu-icon"></i>
            </a>
            <div class="collapse" id="comments">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('managecommentStaff')?>">Manage Comments</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>

        <?php if(session()->get('role') == "Staff"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#collaboration" aria-expanded="false" aria-controls="collaboration">
                <span class="menu-title">Collaboration</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-group menu-icon"></i>
            </a>
            <div class="collapse" id="collaboration">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('chatStaff')?>">Contacts</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>

        <?php if(session()->get('role') == "Admin"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#collaboration" aria-expanded="false" aria-controls="collaboration">
                <span class="menu-title">Collaboration</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-group menu-icon"></i>
            </a>
            <div class="collapse" id="collaboration">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('chats')?>">Contacts</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>

        <?php if(session()->get('role') == "Admin"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder menu-icon"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('addcategory')?>">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('managecategory')?>">Manage Category</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>

        <?php if(session()->get('role') == "Staff"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-folder menu-icon"></i>
            </a>
            <div class="collapse" id="category">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('addcategoryStaff')?>">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('managecategoryStaff')?>">Manage Category</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>

        <?php if(session()->get('role') == "Admin"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
            </a>
            <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('archive')?>">Archive</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('newsAudit')?>">News History</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>


        <?php if(session()->get('role') == "Staff"):?>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                <span class="menu-title">Settings</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon"></i>
            </a>
            <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('archiveStaff')?>">Archive</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?= base_url('newsAuditStaff')?>">News History</a></li>
                </ul>
            </div>
        </li>
        <?php endif;?>

        <li class="nav-item">
            <a class="nav-link" href="logout">
                <span class="menu-title">Logout</span>
                <i class="mdi mdi-logout menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
