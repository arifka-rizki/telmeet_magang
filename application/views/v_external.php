  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">TelkomMeet</a>
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
            <!-- <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="http://example.com"
                id="menuProfil"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                >Nama Profil</a
              >
              <div class="dropdown-menu" aria-labelledby="menuProfil">
                <a class="dropdown-item" href="profil.html">Ubah Profil</a>
                <a class="dropdown-item" href="pass.html">Ubah Password </a>
                <a class="dropdown-item" href="#">Sign Out</a>
              </div>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <main>
      <div class="container">
        <div class="row p-3">
          <h3><b>Presensi Peserta Eksternal</b></h3>
        </div>

        <div class="row justify-content-center pt-1 border">
          <div class="col">
            <div class="row px-3 py-2">
              <h4><b>Rapat</b></h4>
            </div>
            <form class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="kodeRapat"><b>Kode Rapat</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="kodeRapat"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>
                  <button
                    class="btn btn-danger btn-block col-md-3"
                    type="submit"
                  >
                    Konfirmasi
                  </button>
                </div>

                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="detailRapat"><b>Detail Rapat</b></label>
                    <textarea
                      class="form-control"
                      name=""
                      id="detailRapat"
                      cols="30"
                      rows="10"
                    ></textarea>
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>
                </div>
              </div>

              <hr class="mb-2" />
            </form>
          </div>
        </div>

        <div class="row justify-content-center pt-1 border">
          <div class="col">
            <div class="row px-3 pt-0 pb-2">
              <h4><b>Identitas Peserta</b></h4>
            </div>
            <form class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="name"><b>Nama</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="nama"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="nik"> <b>NIK/NIP</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="nik"
                      placeholder=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan NIK yang valid.
                    </div>
                  </div>

                  <div class="d-block my-3">
                    <h6 class="mb-3"><b>Jenis Kelamin</b></h6>
                    <div class="custom-control custom-radio">
                      <input
                        id="laki"
                        name="jenisKelamin"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="laki"
                        >Laki-Laki
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="perempuan"
                        name="jenisKelamin"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="perempuan"
                        >Perempuan
                      </label>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="instansi"><b>Instansi</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="instansi"
                      placeholder=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama instansi.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="jabatan"><b>Jabatan</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="jabatan"
                      placeholder=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama jabatan.
                    </div>
                  </div>
                </div>

                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="telefon"><b>Nomor Telefon</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="telefon"
                      placeholder=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nomor telefon yang valid
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="email"><b>Email</b></label>
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      placeholder=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan alamat email yang valid.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="buktiKehadiran"><b>Bukti Kehadiran</b></label>
                    <input
                      type="file"
                      class="form-control-file"
                      id="buktiKehadiran"
                      placeholder=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan alamat email yang valid.
                    </div>
                  </div>
                </div>
              </div>

              <hr class="mb-4" />

              <button class="btn btn-danger btn-block col-md-3" type="submit">
                Konfirmasi
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>

    <footer class="my-4 pt-4 text-muted text-center text-small">
      <div class="mb-1">
        <small>
          &copy; 2020 PT Telkom Indonesia (Persero) Tbk. Hak Cipta Dilindungi
          Undang-Undang.
        </small>
      </div>
    </footer>