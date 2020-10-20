<body class="bg-light">
    <!--navbar-->
    <div class="shadow-sm p-0">
      <nav class="navbar navbar-expand navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="<?php echo base_url('meetpic'); ?>"><b>Telmeet</b></a>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="menuProfil"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="true"
              >
              <?php echo $this->session->userdata("nik"); ?>
              </a>
             
              <div
                class="dropdown-menu dropdown-menu-right"
                aria-labelledby="menuProfil"
              >
                <a class="dropdown-item" href="profil.html"> Ubah Profil </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>"> Sign Out </a>
              </div>
            </li>
          </ul>
          </div>
        </div>
      </nav>
    </div>
    