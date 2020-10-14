  <body class="bg-light">
    <div class="container shadow-sm p-0">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#"><b>Telmeet</b></a>
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
                href="http://example.com"
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
      </nav>
    </div>

    <main>
      <div class="container">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3><b>Beranda Rapat</b></h3>
        </div>
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <a href="#" class="btn btn-danger">Penanggung Jawab</a>
          <a href="" class="btn btn-outline-danger">Undangan</a>
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row px-3 py-2 border">
              <div class="col-md-6">
                <form class="form-inline my-2">
                  <input
                    class="form-control"
                    type="search"
                    placeholder="Search"
                    aria-label="Search"
                  />
                  <button class="btn btn-danger my-2 my-sm-0" type="submit">
                    Cari
                  </button>
                </form>
              </div>
              <div class="col-md-6">
                <button class="my-2 btn btn-danger float-right">
                  Tambah Rapat
                </button>
              </div>
            </div>
            <div class="row p-3">
              <div class="table-responsive-md">
                <table class="table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Agenda Rapat</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Tipe Rapat</th>
                      <th>Lokasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Perencanaan blablabla</td>
                      <td>12/02/30</td>
                      <td>01.01 AM</td>
                      <td>Other</td>
                      <td>Zoom Link</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>Perencanaan blablabla</td>
                      <td>12/02/30</td>
                      <td>01.01 AM</td>
                      <td>Other</td>
                      <td>Zoom Link</td>
                      <td></td>
                    </tr>
                    <tr class="border">
                      <td>1</td>
                      <td>Perencanaan asolole jembrik kadal</td>
                      <td>12/02/30</td>
                      <td>01.01 AM</td>
                      <td>Pengambilan Keputusan</td>
                      <td>https://meet.google.com/nus-gzpt-gjw</td>
                      <td>
                        <button class="btn btn-danger mx-2 p-1">detail</button>
                        <button class="btn btn-success mx2 p-1">@</button>
                        <button class="btn btn-danger mx-2 p-1">@</button>
                        <button class="btn btn-success mx2 p-1">@</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!--<form class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="judulRapat"><b>Judul Rapat</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="judulRapat"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>

                  <div class="d-block my-3">
                    <h6 class="mb-3"><b>Tipe Rapat</b></h6>
                    <div class="custom-control custom-radio">
                      <input
                        id="review"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="review"
                        >Review
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="koordinasi"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="koordinasi"
                        >Koordinasi
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="briefing"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="briefing"
                        >Briefing
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="decision"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="decision"
                        >Decision Making
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="other"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="other"
                        >Other
                      </label>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="pengundang"> <b>Pengundang Rapat</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="pengundang"
                      placeholder=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan NIK yang valid.
                    </div>
                  </div>
                </div>

                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="tanggal"><b>Hari Tanggal</b></label>
                    <input
                      type="date"
                      min="2015-01-01"
                      max="2030-01-01"
                      class="form-control"
                      id="tanggal"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="waktuMulai"><b>Waktu Mulai</b></label>
                      <input
                        type="time"
                        min="00-00-00"
                        max="24-00-00"
                        class="form-control"
                        id="wakruMulai"
                        placeholder=""
                        value=""
                        required
                      />
                      <div class="invalid-feedback">
                        Tolong masukkan nama yang valid
                      </div>
                    </div>
                    <div class="col mb-3">
                      <label for="waktuSelesai"><b>Waktu Selesai</b></label>
                      <input
                        type="time"
                        min="00-00-00"
                        max="24-00-00"
                        class="form-control"
                        id="waktuSelesai"
                        placeholder=""
                        value=""
                        required
                      />
                      <div class="invalid-feedback">
                        Tolong masukkan nama yang valid
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="notulen"><b>Notulen</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="notulen"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="penandatangan"><b>Penandatangan</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="penandatangan"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>
                </div>
              </div>

              <hr class="mb-4" />

              <button
                class="btn btn-danger btn-block col-md-2 mb-3 float-right"
                type="submit"
              >
                Tambah Rapat
              </button>
            </form>-->
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
