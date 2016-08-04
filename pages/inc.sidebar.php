<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img style="border-radius:100%;" src="../dist/img/user2-160x160.png" class="user-image" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['login_name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php 
        $access = $_SESSION['login_access'];
        if ($access == "admin") {
          include "_admin.php";
        } else if ($access == "pelaksana") {
          include "_pelaksana.php";
        } else {
            header("Location: ../index.php");
        }
      ?>
    </section>
    <!-- /.sidebar -->
  </aside>