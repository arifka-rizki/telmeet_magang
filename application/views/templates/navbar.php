  <body class="bg-light">
    <!--navbar-->
    <div class="shadow-sm p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
          <a class="navbar-brand" href="<?php echo base_url('meetpic'); ?>"><b>Telmeet</b></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarProfil"
            aria-controls="navbarProfil"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarProfil">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a
                  class="nav-link"
                  href="#"
                  id="menuProfil"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  ><?php echo $this->session->userdata("nik"); ?></a
                >
                <div class="dropdown-menu" aria-labelledby="menuProfil">
                  <a class="dropdown-item" href="profil.html">Ubah Profil</a>
                  <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Sign Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>