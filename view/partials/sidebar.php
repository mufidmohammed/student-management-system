<?php $link = $_SERVER['REQUEST_URI'] ?>
<!-- SIDEBAR -->
<section id="sidebar">
    <a href="#" class="brand">
        <i class='bx bxs-smile'></i>
        <span class="text">Admin</span>
    </a>
    <ul class="side-menu top">
        <li class="<?php if($link == $root . 'view/index.php') echo 'active' ?>">
            <a href="<?= $root . 'view/index.php' ?>">
                <i class='bx bxs-dashboard'></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="<?php if($link == $root . 'view/students/index.php') echo 'active' ?>">
            <a href="<?= $root . 'view/students/index.php' ?>">
                <i class='bx bxs-id-card'></i>
                <span class="text">Students</span>
            </a>
        </li>
        <li class="<?php if($link == $root . 'view/courses/index.php') echo 'active' ?>">
            <a href="<?= $root . 'view/courses/index.php' ?>">
                <i class='bx bxs-data'></i>
                <span class="text">Courses</span>
            </a>
        </li>
        <li class="<?php if($link == $root . 'view/enrollments/index.php') echo 'active' ?>">
            <a href="<?= $root . 'view/enrollments/index.php' ?>">
                <i class='bx bxs-folder-open'></i>
                <span class="text">Enrollments</span>
            </a>
        </li>
        <li class="<?php if($link == $root . 'view/instructors/index.php') echo 'active' ?>">
            <a href="<?= $root . 'view/instructors/index.php' ?>">
                <i class='bx bxs-group'></i>
                <span class="text">Instructors</span>
            </a>
        </li>
        <li class="<?php if($link == $root . 'view/sections/index.php') echo 'active' ?>">
            <a href="<?= $root . 'view/sections/index.php' ?>">
                <i class='bx bxs-detail'></i>
                <span class="text">Sections</span>
            </a>
        </li>
    </ul>
    <ul class="side-menu">
        <li class="<?php if($link == $root . 'view/profile/index.php') echo 'active' ?>">
            <a href="<?= $root . 'view/profile/index.php' ?>">
                <i class='bx bxs-cog'></i>
                <span class="text">Profile</span>
            </a>
        </li>
        <li>
            <a href="#" class="logout">
                <i class='bx bxs-log-out-circle'></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
<!-- SIDEBAR -->