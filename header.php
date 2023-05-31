
<?php include('connect.php'); ?>
<?php include('head.php'); ?>

<body>

  <div class="theme-loader">
    <div class="ball-scale">
      <div class='contain'>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper" >
      <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">
          <div class="navbar-logo">

            <a href="dashboard.php">

              <div class="text-center">
              <image class="profile-img" src="uploadImage/Logo/xx.png" style="width: 90%; border-radius: 50%;"></image>
              </div>
            </a>
            <a class="mobile-options">
              <i class="feather icon-more-horizontal"></i>
            </a>
          </div>
          <div class="navbar-container container-fluid">
            <ul class="nav-left">
              <li class="header-search">
                
              </li>
              <li>
                <a href="#!" onclick="javascript:toggleFullScreen()">
                  <i class="feather icon-maximize full-screen"></i>
                </a>
              </li>
            </ul>
            <ul class="nav-right">
              <li class="user-profile header-notification">
                <div class="dropdown-primary dropdown">
                  <div class="dropdown-toggle" data-toggle="dropdown">

                    <?php

                    if ($_SESSION['user'] == 'admin') {
                    ?>

                      <img src="uploadImage/Profile/<?php echo $_SESSION['image']; ?>" class="img-radius" alt="User-Profile-Image" /><?php } ?>
                    <span style="font-family: 'Unbounded', cursive;"><?php echo $_SESSION['fname']; ?></span>
                    <i class="feather icon-chevron-down"></i>
                  </div>
                  <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                    <li>
                      <a href="profile.php" style="font-family: 'Unbounded', cursive;">
                        <i class="feather icon-user" ></i> Profil
                      </a>
                    </li>
                    <li>
                      <a href="changepassword.php" style="font-family: 'Unbounded', cursive;">
                        <i class="feather icon-edit"></i> Ganti Password
                      </a>
                    </li>

                    <li>
                      <a href="logout.php" style="font-family: 'Unbounded', cursive;">
                        <i class="feather icon-log-out"></i> Logout
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>