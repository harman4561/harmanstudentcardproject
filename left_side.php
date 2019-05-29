<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <?php
            $active = "";
            if($currentOpenFileName == "index.php")
            {
                $active = "active";
            }
        ?>
        <li class="nav-item <?php echo $active; ?>">
            <a class="nav-link" href="index.php">
                <i class="mdi mdi-book-open-variant menu-icon"></i>
                <span class="menu-title">All Student Card</span>
            </a>
        </li>

        <?php
            $active = "";
            if($currentOpenFileName == "card_add.php")
            {
                $active = "active";
            }
        ?>
        <li class="nav-item <?php echo $active; ?>">
            <a class="nav-link" href="card_add.php">
                <i class="mdi mdi-book-plus menu-icon"></i>
                <span class="menu-title">Add Student Card</span>
            </a>
        </li>

    </ul>
</nav>
<!-- partial -->