    <main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3>
            <b>Detail Rapat </b>
          </h3>
        </div>        

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row p-3">
              <div class="table-responsive">
                <table class="table table-striped">                  
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
                      <th>Kode Rapat</th>
                      <td><?php echo $KODE_RAPAT;?></td>
                    </tr>
                    <tr>
                      <th>Nama PIC</th>
                      <td><?php echo $NAMA_PIC;?></td>
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
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row p-3">
<<<<<<< HEAD
            <div class="col-md col-sm-12">
              <a href="<?php echo site_url('meetinv')?>">
                  <button
                    type="button"
                    class="btn btn-danger col-sm-12 float-left ml-0  mb-2"
                    data-dismiss="modal"
                  >
                    <span class="p-1"><i class="fas fa-arrow-left"></i></span>
                    Kembali
                  </button>
                </a>
              </div>
              <div class="col-md-10 col-sm-12">
=======
              <div class="col">
              <?php if (!$show_button) { ?>
>>>>>>> 1b385b4... upload and view image, change MoM
                <button
                  type="button"
                  class="btn btn-danger col-md-3 col-sm-12 float-right ml-1 b mb-2"
                  data-dismiss="modal"
                >
                  <span class="p-2"><i class="fas fa-download"></i></span>
                  Download MoM
                </button>
                <?php } ?>
                <?php if ($show_button) { ?>                
                  <button
                    type="button"
                    class="btn btn-outline-danger col-md-3 col-sm-12 float-right ml-1 b mb-2"
                    data-toggle="modal"
                    data-target="#presensiInternalModal"                    
                  >
                    <span class="p-2">
                      <i class="fas fa-calendar-check"></i>
                    </span>
                    Presensi
                  </button>                
                <?php } ?>
                <div
                class="modal fade"
                id="presensiInternalModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        <b>Bukti Rapat</b>
                      </h5>
                      <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                      >
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form class="needs-validation" novalidate action="<?php echo site_url('meetinv/presensi_rapat_action');?>" method="post" enctype="multipart/form-data">
                        <div class="mb-4">
                          <label for="buktiRapat"><b>Upload Bukti Rapat</b></label>
                          <input
                            type="file"
                            class="form-control"
                            name="PHOTO"
                            id="PHOTO"
                            accept="image/*"
                            required
                          />
                        </div>

                        <input type="hidden" name="ID_RAPAT" value="<?php echo $ID_RAPAT; ?>" /> 

                        <!--<a href="detailrapatundangan.html">-->
                          <button
                            type="submit"
                            class="btn btn-danger float-right ml-1"
                          >
                            Konfirmasi
                          </button>
                        <!--</a>-->
                        <!--<button
                          type="button"
                          class="btn btn-secondary float-right"
                          data-dismiss="modal"
                        >
                          Close
                        </button>-->
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>