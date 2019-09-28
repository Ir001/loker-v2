<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
     
      <span class="brand-text font-weight-light">Lowongankerja.id - Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info d-block">
          <a href="#"><?php echo $_SESSION['admin']['fullname']; ?></a> | <a href="logout.php">Logout</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="artikel.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Artikel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="artikel.php?show=active" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loker Active</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="artikel.php?show=expired" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loker Expired</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="edit_about.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Page About
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="iklan.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Iklan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_iklan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Iklan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pengaturan.php" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Pengaturan
              </p>
            </a>
          </li>
          <li class="nav-item">
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>