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
            <a href="index.php" class="nav-link <?php if ($menu == "dashboard"): ?>
            active
          <?php endif ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if ($menu == "artikel"): ?>
            menu-open
          <?php endif ?>">
            <a href="artikel.php" class="nav-link <?php if ($menu == "artikel"): ?>
            active
          <?php endif ?>">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Artikel
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="artikel.php?show=all" class="nav-link <?php if ($menu ==  "artikel" && $menuItem == "all"): ?>
                  active
                <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Loker</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="artikel.php?show=active" class="nav-link <?php if ($menu ==  "artikel" && $menuItem == "active"): ?>
                  active
                <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loker Aktif</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="artikel.php?show=expired" class="nav-link <?php if ($menu ==  "artikel" && $menuItem == "expired"): ?>
                  active
                <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loker Expired</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if ($menu == "iklan"): ?>
            menu-open
          <?php endif ?>">
            <a href="iklan.php" class="nav-link <?php if ($menu == "iklan"): ?>
            active
          <?php endif ?>">
              <i class="nav-icon fas  fa-audio-description"></i>
              <p>
                Iklan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="iklan.php" class="nav-link <?php if ($menu ==  "iklan" && $menuItem == "daftar_iklan"): ?>
                  active
                <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Iklan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add_iklan.php" class="nav-link <?php if ($menu ==  "iklan" && $menuItem == "add_iklan"): ?>
                  active
                <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Iklan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if ($menu == "page"): ?>
            menu-open
          <?php endif ?>">
            <a href="iklan.php" class="nav-link <?php if ($menu == "page"): ?>
            active
          <?php endif ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Halaman
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="page.php?url=about" class="nav-link <?php if ($menu ==  "iklan" && $menuItem == "add_iklan"): ?>
                  active
                <?php endif ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="page.php?url=faq" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="page.php?url=contact" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="page.php?url=privacy-policy" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Privacy Policy</p>
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