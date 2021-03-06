    <main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3>
            <b>Daftar Peserta </b>
          </h3>
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row py-2">
              <div class="col-md-6 col-sm-12">
                <h5><b> <?php echo $NAMA_RAPAT?></b></h5>
                <p><?php 
                  $datestring = 'l, d F Y';
                  echo date($datestring, strtotime($TANGGAL)) . " " . $WAKTU_MULAI;
                  ?></p>
              </div>
              <div class="col-md-6 col-sm-12"></div>
            </div>

            <div class="row p-3">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Unit</th>
                      <th>Jabatan</th>
                      <th>Waktu Presensi</th>
                      <th>Bukti Kehadiran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!--<?php var_dump($data)?>-->
                      <tr class="border">
                      <?php foreach ($data as $key => $val): ?>
                        <td><?php echo $key+1 ?></td>
                        <td><?php echo $val->NAMA; ?></td>
                        <td><?php echo $val->NAMA_UNIT; ?></td>
                        <td><?php echo $val->JABATAN; ?></td>
                        <td><?php echo $val->WAKTU_PRESENSI ?></td>
                        <td><img src="<?php echo base_url('upload/presensi/'.$val->FOTO); ?>" alt="bukti presensi"></td>
                      </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>

            <div class="row p-3">
              
              <div class="col-md-2 col-sm-12 ">
                <a href="<?php echo site_url('meetpic')?>">
                  <button
                    type="button"
                    class="btn btn-danger col-sm-12 float-left mb-2"
                    data-dismiss="modal"
                  >
                    <span class="p-1"><i class="fas fa-arrow-left"></i></span>
                    Kembali
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>