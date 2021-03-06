  <body class="bg-light">
    <div class="container">
      <div class="row justify-content-center pt-5 mt-5">
        <div class="col-md-6">
          <form class="needs-validation border p-5 rounded bg-white shadow-lg" novalidate method="POST" action="<?php echo base_url('auth/login_action'); ?>">
            <h4 class="mb-3"><b>Sign in</b></h4>
            <?= $this->session->flashdata('message'); ?>
            <div class="mb-3">
              <label for="nik"> <b>NIK/NIP</b></label>
              <input
                type="text"
                class="form-control"
                id="nik"
                placeholder=""
                required
                name="nik"
                value="<?php echo set_value('nik');?>"
              />
              <?php echo form_error('nik', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
            </div>

            <div class="mb-3">
              <label for="pass"><b>Password</b></label>
              <input
                type="password"
                class="form-control"
                id="pass"
                placeholder=""
                value=""
                required
                name="password"
              />
              <?= form_error('password', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
            </div>

            <hr class="mb-4" />

            <button class="btn btn-danger btn-lg btn-block" type="submit">
              Sign in
            </button>

            <p class="text-center my-4">Atau</p>

            <a
              href="<?php echo base_url('eksternal'); ?>"
              class="btn btn-outline-danger btn-lg btn-block"
              >Peserta Eksternal</a
            >
          </form>
        </div>
      </div>
    </div>