    <main>
      <div class="container">
        <div
          class="row justify-content-center pt-3 shadow-sm rounded bg-white my-3"
        >
          <div class="col-md-6">
            <h4 class="my-3"><b>Identitas diri</b></h4>
            <hr>
            <?= $this->session->flashdata('message'); ?>
            <form class="needs-validation" novalidate method="POST" action="<?= base_url('auth/perbarui_profil')?>">
              <div class="mb-3">
                <label for="name"><b>Nama</b></label>
                <input
                  type="text"
                  class="form-control"
                  id="nama"
                  placeholder=""
                  value="<?= $NAMA?>"
                  name="NAMA"
                  readonly
                />
              </div>

              <div class="mb-3">
                <label for="email"><b>Email</b></label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="EMAIL"
                  placeholder=""
                  value="<?= $EMAIL?>"
                  readonly
                />
              </div>

              <div class="mb-3">
                <label for="nik"> <b>Nomor Induk Karyawan</b></label>
                <input
                  type="text"
                  class="form-control"
                  id="nik"
                  name="NIK"
                  required
                  value="<?= $NIK?>"
                  readonly
                />
              </div>

              <div class="d-block my-3">
                <h6 class="mb-3"><b>Jenis Kelamin</b></h6>
                <div class="custom-control custom-radio">
                  <input
                    id="laki"
                    name="JENIS_KELAMIN"
                    type="radio"
                    class="custom-control-input"
                    <?php if($JENIS_KELAMIN == 'l') {echo 'checked';} else echo "disabled" ?>
                    readonly
                  />
                  <label class="custom-control-label" for="laki"
                    >Laki-Laki
                  </label>
                </div>
                <div class="custom-control custom-radio">
                  <input
                    id="perempuan"
                    name="JENIS_KELAMIN"
                    type="radio"
                    class="custom-control-input"
                    <?php if($JENIS_KELAMIN == 'p') {echo 'checked';} else echo "disabled"; ?>
                    required
                  />
                  <label class="custom-control-label" for="perempuan"
                    >Perempuan
                  </label>
                </div>
              </div>

              <div class="mb-3">
                <label for="instansi"><b>Nama Unit</b></label>
                <input
                  type="text"
                  class="form-control"
                  id="namaUnit"
                  name="NAMA_UNIT"
                  placeholder=""
                  readonly
                  value="<?= $NAMA_UNIT?>"
                />
              </div>

              <div class="mb-3">
                <label for="jabatan"><b>Jabatan</b></label>
                <input
                  type="text"
                  class="form-control"
                  id="jabatan"
                  name="JABATAN"
                  placeholder=""
                  value="<?= $JABATAN?>"
                  readonly
                />
              </div>

              <div class="mb-3">
                <label for="telefon"><b>Nomor Telefon</b></label>
                <input
                  type="text"
                  class="form-control"
                  id="telefon"
                  name="NO_TELEPON"
                  placeholder=""
                  value="<?= $NO_TELEPON?>"
                  required
                />
                <?php echo form_error('NO_TELEPON', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
              </div>

              <hr class="mb-4" />
              <a href="<?php echo base_url('meetpic')?>">
                <button
                  type="button"
                  class="btn btn-danger float-left ml-1 mb-3"
                ><span class="m-1"><i class="fas fa-arrow-left"></i></span>
                  Kembali
                </button>
              </a>

              <button
                class="btn btn-danger btn-block col-md-3 mb-5 float-right"
                type="submit"
              >
                Perbarui Profil
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>