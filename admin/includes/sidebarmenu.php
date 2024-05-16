<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="users.php">Users List</a></li>
                    <?php if (isset($_SESSION['userRole']) && $_SESSION['userRole'] === "admin") { ?>
                        <li><a href="addUser.php">Add User</a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> Posts <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="posts.php">Posts List</a></li>
                    <li><a href="addPost.php">Add Post</a></li>
                </ul>
            </li>
        </ul>
    </div>

</div>