<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link<?php if ($_SERVER['REQUEST_URI'] == WEB_ROOT) echo ''; else echo ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link<?php if (strpos($_SERVER['REQUEST_URI'], 'employees')) echo ''; else echo ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>employees">
                <i class="bi bi-people"></i>
                <span>Employees</span>
            </a>
        </li>

        <li class="nav-heading">Maintenance</li>

        <li class="nav-item">
            <a class="nav-link<?php if (strpos($_SERVER['REQUEST_URI'], 'attendance')) echo ''; else echo ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>attendance">
                <i class="bi bi-briefcase"></i>
                <span>Attendance</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link<?php if (strpos($_SERVER['REQUEST_URI'], 'logs')) echo ''; else echo ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>logs">
                <i class="bi bi-clock-history"></i>
                <span>Logs</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link<?php if (strpos($_SERVER['REQUEST_URI'], 'configurations')) echo ''; else echo ' collapsed'; ?>" href="<?php echo WEB_ROOT ?>configurations">
                <i class="bi bi-gear"></i>
                <span>Configurations</span>
            </a>
        </li>

    </ul>
</aside>