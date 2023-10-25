<?php $active_page = basename($_SERVER['PHP_SELF']); ?>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100">
    <a href="javascript:void(0)" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="index.php" class="nav-link text-white <?php if ($active_page == "index.php") { echo "active"; } ?>" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                Home
            </a>
        </li>
        <li>
            <a href="rooms.php" class="nav-link text-white <?php if ($active_page == "rooms.php") { echo "active"; } ?>">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                Rooms
            </a>
        </li>
        <li>
            <a href="reservations.php" class="nav-link text-white <?php if ($active_page == "reservations.php") { echo "active"; } ?>">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                Reservations
            </a>
        </li>
    </ul>
</div>