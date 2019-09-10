<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=site_url('member')?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <!--<i class="fas fa-laugh-wink"></i>-->
          <i class="fab fa-bandcamp"></i>
        </div>
        <div class="sidebar-brand-text mx-3">GENTA Profile</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!--Query for User and Dashboard view-->
      <?php
         $role_id = $this->session->userdata('role_id');
         $queryMenu = "SELECT `user_menu`.`id`,`menu`
                         FROM `user_menu` INNER JOIN `access_menu` 
                           ON `user_menu`.`id` = `access_menu`.`menu_id`
                        WHERE `access_menu`.`role_id` = $role_id
                     ORDER BY `access_menu`.`menu_id` ASC";
        $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- Heading Menu-->
      <?php foreach ($menu as $Menu): ?>
        <div class="sidebar-heading">
          <?=$Menu['menu']?>
        </div>

        <!--Sub Menu-->
        <?php
          $menuId = $Menu['id'];
          $querySubMenu="SELECT *
                           FROM `user_sub_menu` JOIN `user_menu` 
                             ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                            AND `user_sub_menu`.`is_active` = 1";
          $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sub_menu): ?>
          <!-- Nav Item - Dashboard -->
          <?php if($title==$sub_menu['title']): ?>
            <li class="nav-item active">
          <?php else: ?>
            <li class="nav-item">
          <?php endif; ?>
            <a class="nav-link pb-0" href="<?=site_url($sub_menu['url'])?>">
              <i class="<?=$sub_menu['icon']?>"></i>
              <span><?= $sub_menu['title'] ?></span></a>
            </li>
        <?php endforeach; ?>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
      <?php endforeach; ?>
      <!-- End of the query -->

      <li class="nav-item">
        <a class="nav-link" href="<?=site_url('home/signout')?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Sign Out</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

      </ul>
          <!-- End of Sidebar -->