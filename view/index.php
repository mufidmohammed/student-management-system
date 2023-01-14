<?php include_once('partials/header.php') ?>

<?php include_once('partials/sidebar.php') ?>

<!-- CONTENT -->
<section id="content">

    <?php include_once('partials/navbar.php') ?>

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3>1020</h3>
                    <p>New Order</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3>2834</h3>
                    <p>Visitors</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle'></i>
                <span class="text">
                    <h3>$2543</h3>
                    <p>Total Sales</p>
                </span>
            </li>
        </ul>

        <div class="table-data">
            <div class="ls-tables">
                <div class="head">
                    <h3>All Students</h3>
                </div>
                <table id="students-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Level</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ibn</td>
                            <td>Abass</td>
                            <td>abas@ibn.com</td>
                            <td>Male</td>
                            <td>400</td>
                            <td><span class="status completed">enrolled</span></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Ibn</td>
                            <td>Abass</td>
                            <td>abas@ibn.com</td>
                            <td>Male</td>
                            <td>400</td>
                            <td><span class="status pending">pending</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<?php include_once('partials/footer.php') ?>

<script>
$(document).ready(function() {
    $('#students-table').DataTable();
})
</script>