    <main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3>
            <b>Detail Rapat </b>
          </h3>
        </div>
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <a href="<?php echo base_url('meetpic'); ?>" class="btn btn-outline-danger"
            >Penanggung Jawab</a
          >
          <a href="<?php echo base_url('meetinv'); ?>" class="btn btn-danger">Undangan</a>
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row p-3">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th>Judul Rapat</th>
                      <td><?php echo $NAMA_RAPAT;?></td>
                    </tr>
                    <tr>
                      <th>Nota Dinas</th>
                      <td><?php echo $NOTA_DINAS;?></td>
                    </tr>
                    <tr>
                      <th>Tipe Rapat</th>
                      <td><?php echo $TIPE_RAPAT;?></td>
                    </tr>
                    <tr>
                      <th>Pengundang Rapat</th>
                      <td><?php echo $PENGUNDANG;?></td>
                    </tr>
                    <tr>
                      <th>Tanggal</th>
                      <td><?php echo $TANGGAL;?></td>
                    </tr>
                    <tr>
                      <th>Waktu</th>
                      <td><?php echo $WAKTU_MULAI;?></td>
                    </tr>
                    <tr>
                      <th>Lokasi Rapat</th>
                      <td><?php echo $TEMPAT;?></td>
                    </tr>
                    <tr>
                      <th>Notulen</th>
                      <td><?php echo $NOTULEN;?></td>
                    </tr>
                    <tr>
                      <th>Penandatangan Rapat</th>
                      <td><?php echo $PENANDATANGAN;?></td>
                    </tr>
                    <tr>
                      <th>Kode Rapat</th>
                      <td><?php echo $KODE_RAPAT;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row p-3">
              <div class="col">
                <button
                  type="button"
                  class="btn btn-danger float-right ml-1"
                  data-dismiss="modal"
                >
                  <span class="p-2"><i class="fas fa-download"></i></span>
                  Download
                </button>
                <a href="berandaundangan.html">
                  <button
                    type="button"
                    class="btn btn-outline-danger float-right"
                  >
                    <span class="p-2">
                      <i class="fas fa-calendar-check"></i>
                    </span>
                    Presensi
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>