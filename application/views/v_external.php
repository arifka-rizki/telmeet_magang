<body class="bg-light">
    <main>
      <div class="container">
        <!-- <div class="row p-3 shadow-sm rounded bg-white my-3">
        
        </div> -->

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white my-3">
          <div class="col">
            <div>
            `<h3><b>Presensi Peserta Eksternal</b></h3>
            </div>
            <hr/>
            <div class="row px-3 py-3">
              <h4><b>Rapat</b></h4>
            </div>
            <div class="row">
              <div class="col-md-6 px-3">
                <div class="mb-3">
                  <form class="needs-validation" novalidate method="POST" action="<?= base_url('external/meet_check'); ?>">
                    <div class="mb-4">
                      <label for="kodeRapat"><b>Kode Rapat</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="kodeRapat"
                        placeholder=""
                        value="<?php if(isset($meet)){
                        echo $meet->KODE_RAPAT;
                      }else{
                        echo set_value('kodeRapat');
                      }?>"
                        required
                        name="kodeRapat"
                      />
                      <?php echo form_error('kodeRapat', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                    </div>
                    <div class="mb-3">
                      <label for="email"><b>Email</b></label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder=""
                        required
                        name="email"
                        value="<?php if(isset($user)){
                        echo $user->EMAIL;
                      }else{
                        echo set_value('email');
                      }?>"
                      />
                      <?php echo form_error('email', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                    </div>

                    <button
                      type="submit"
                      class="btn btn-danger float-right ml-1 mb-3"
                    >
                      Konfirmasi
                    </button>
                  </form>
                  <div class="float-left">
                    <a href="<?php echo base_url()?>">
                      <button
                        type="submit"
                        class="btn btn-danger float-right ml-1 mb-3"
                      ><span class="m-1"><i class="fas fa-arrow-left"></i></span>
                        Kembali
                      </button>
                    </a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 px-3">
                <div class="mb-3">
                  <label for="detailRapat"><b>Detail Rapat</b></label>
                  <!-- <textarea
                    class="form-control"
                    name=""
                    id="detailRapat"
                    cols="30"
                    rows="10"
                    readonly
                  ></textarea> -->
                  <div class="card" style="height: 100%;">
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <?php if(isset($meet)){ ?>
                        <li class="list-group-item">Nama: <?php echo $meet->NAMA_RAPAT?></li>
                        <li class="list-group-item">Tanggal: <?php echo $meet->TANGGAL?></li>
                        <li class="list-group-item">Waktu: <?php echo $meet->WAKTU_MULAI?></li>
                        <li class="list-group-item">Tempat: <?php echo $meet->TEMPAT?></li>
                        <?php } else{?>
                        <li class="list-group-item">Nama: </li>
                        <li class="list-group-item">Tanggal: </li>
                        <li class="list-group-item">Waktu: </li>
                        <li class="list-group-item">Tempat: </li>
                        <?php }?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center my-3 pt-1 shadow-sm rounded bg-white" <?php if(!isset($meet)){echo 'style="display: none;"';} ?>>
          <div class="col">
            <div class="row px-3 py-3">
              <h4><b>Identitas Peserta</b></h4>
            </div>
            <form class="needs-validation" novalidate method="POST" id="identitas" action="<?php echo base_url('external/presensi'); ?>">
              <div class="row">
                <div class="col-md-6 px-3">
                  <div id="hiraukan" style="display: none;">
                    <!-- div disembunyikan supaya input kode rapat dan email kekirim lagi ke controller -->
                    <input
                      type="text"
                      class="form-control"
                      id="kodeRapat"
                      name="kodeRapat"
                      value="<?php if(isset($meet)){
                      echo $meet->KODE_RAPAT;
                      }else{
                        echo set_value('kodeRapat');
                      }?>"
                    />
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      placeholder=""
                      required
                      name="email"
                      value="<?php if(isset($user)){
                      echo $user->EMAIL;
                      }else{
                        echo set_value('email');
                      }?>"
                      />
                  </div>
                  <div class="mb-3">
                    <label for="name"><b>Nama*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="nama"
                      placeholder=""
                      value="<?php if(isset($user)){
                        echo $user->NAMA;
                      }else{
                        echo set_value('nama');
                      }?>"
                      required
                      name="nama"
                    />
                    <?php echo form_error('nama', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="mb-3">
                    <label for="nik"> <b>Nomor Induk Karyawan/Nomor Induk Pegawai*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="nik"
                      placeholder=""
                      required
                      name="nik"
                      value="<?php if(isset($user)){
                        echo $user->NIK;
                      }else{
                        echo set_value('nik');
                      }?>"
                    />
                    <?php echo form_error('nik', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="d-block my-3">
                    <h6 class="mb-3"><b>Jenis Kelamin*</b></h6>
                    <div class="custom-control custom-radio">
                      <input
                        id="laki"
                        name="jenisKelamin"
                        type="radio"
                        class="custom-control-input"
                        value="l"
                        <?php if(isset($user)){
                          if($user->JENIS_KELAMIN == 'l'){
                            echo 'checked';
                          }
                        } else{
                          echo '';
                        } ?>
                        required
                      />
                      <label class="custom-control-label" for="laki"
                        >Laki-laki
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="perempuan"
                        name="jenisKelamin"
                        type="radio"
                        class="custom-control-input"
                        value="p"
                        <?php if(isset($user)){
                          if($user->JENIS_KELAMIN == 'p'){
                            echo 'checked';
                          }
                        } else{
                          echo '';
                        } ?>
                        required
                      />
                      <label class="custom-control-label" for="perempuan"
                        >Perempuan
                      </label>
                    </div>
                    <?php echo form_error('jenisKelamin', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>
                </div>

                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="instansi"><b>Instansi</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="instansi"
                      placeholder=""
                      required
                      name="instansi"
                      value="<?php if(isset($user)){
                        echo $user->INSTANSI;
                      }else{
                        echo set_value('instansi');
                      }?>"
                    />
                    <?php echo form_error('instansi', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="mb-3">
                    <label for="jabatan"><b>Jabatan</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="jabatan"
                      placeholder=""
                      required
                      name="jabatan"
                      value="<?php if(isset($user)){
                        echo $user->JABATAN;
                      }else{
                        echo set_value('jabatan');
                      }?>"
                    />
                    <?php echo form_error('jabatan', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="mb-3">
                    <label for="telefon"><b>Nomor Telefon</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="telefon"
                      placeholder=""
                      required
                      name="telefon"
                      value="<?php if(isset($user)){
                        echo $user->NO_TELEPON;
                      }else{
                        echo set_value('telefon');
                      }?>"
                    />
                    <?php echo form_error('telefon', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="input-group mt-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Unggah</span>
                    </div>
                    <div class="custom-file">
                      <input 
                        type="file" 
                        class="custom-file-input" 
                        id="buktiKehadiran"
                        value=""
                        required
                        accept="image/*"
                        name="buktiKehadiran"
                      >
                      <label class="custom-file-label" for="buktiKehadiran">Bukti Kehadiran</label>
                    </div>
                  </div>
                  <?php echo form_error('buktiKehadiran', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  <!-- <div class="mb-3" id="customFile">
                    <label for="buktiKehadiran"><b>Bukti Kehadiran*</b></label>
                    <input
                      type="file"
                      class="form-control-file"
                      id="buktiKehadiran"
                      placeholder=""
                      required
                      name="buktiKehadiran"
                      accept="image/*"
                      value=""
                    />
                    
                  </div> -->
                </div>
              </div>

              <hr class="mb-4" />

              <button
                class="btn btn-danger btn-block col-md-3 mb-3"
                type="submit"
              >
                Konfirmasi
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>