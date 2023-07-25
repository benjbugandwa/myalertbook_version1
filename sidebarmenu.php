<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AlertLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AlertBook</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/User.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          
          <?php 
            if(isset($_SESSION['useremail']))
            {?>

              <a href="#" class="d-block"><?php echo $_SESSION['useremail'] ?></a>
              <a href="action_login.php" class="d-block">Se déconnecter</a>
              <?php    
            }
            else
            {
                ?>
                    <a href="form_login.php" class="d-block">Se connecter</a>

                <?php 
            }
          ?>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" hidden>
          <div class="input-group-append">
            <button class="btn btn-sidebar" hidden>
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
               <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Général
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            <li class="nav-item">
            <a href="form_listalertes.php?start=0" class="nav-link">
              <i class="nav-icon fa fa-bell"></i>
              <p>
                Alertes
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="form_listreponses.php" class="nav-link">
              <i class="nav-icon fa fa-cart-arrow-down"></i>
              <p>
                Réponses
                
              </p>
            </a>
          </li>

         

          <li class="nav-item">
            <a href="form_exportdata.php" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Exporter les données
               
              </p>
            </a>
          </li>

            </ul>
          </li>


          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Administration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
            <li class="nav-item">
            <a href="form_listusers.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Utilisateurs
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="form_listorganisations.php" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>
                Organisations
                
              </p>
            </a>
          </li>
            </ul>
          </li>



         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>