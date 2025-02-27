<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <?php 
            $isAdmin = isset($_SESSION['ACCOUNT_USERNAME']) && $_SESSION['ACCOUNT_USERNAME'] === 'admin';
            if ($isAdmin): 
        ?>
            <!-- Admin-specific menu -->
            <li class="nav-item">
                <a class="nav-link<?php echo ($_SERVER['REQUEST_URI'] == WEB_ROOT) ? '' : ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link<?php echo (strpos($_SERVER['REQUEST_URI'], 'employees') !== false) ? '' : ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>employees">
                    <i class="bi bi-people"></i>
                    <span>Employees</span>
                </a>
            </li>

            <li class="nav-heading">Maintenance</li>

            <li class="nav-item">
                <a class="nav-link<?php echo (strpos($_SERVER['REQUEST_URI'], 'attendance') !== false) ? '' : ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>attendance">
                    <i class="bi bi-briefcase"></i>
                    <span>Attendance</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link<?php echo (strpos($_SERVER['REQUEST_URI'], 'logs') !== false) ? '' : ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>logs">
                    <i class="bi bi-clock-history"></i>
                    <span>Logs</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link<?php echo (strpos($_SERVER['REQUEST_URI'], 'configurations') !== false) ? '' : ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>configurations">
                    <i class="bi bi-gear"></i>
                    <span>Configurations</span>
                </a>
            </li>

        <?php else: ?>
            <!-- Employee-specific menu -->
            <li class="nav-item">
                <a class="nav-link<?php echo ($_SERVER['REQUEST_URI'] == WEB_ROOT) ? '' : ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>">
                    <i class="bi bi-briefcase"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</aside>
