    <main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h5>
            <b>Detail Rapat </b>
          </h5>
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
              <div class="col-md col-sm-12">
              <a href="<?php echo site_url('meetpic')?>">
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
                <a href="<?php echo base_url('meetpic/download_rapat').'/'.$ID_RAPAT ?>" target="_blank">
                  <button
                    type="button"
                    class="btn btn-danger col-md-3 col-sm-12 float-right ml-1 mb-2"
                    data-dismiss="modal"
                  >
                    <span class="p-1"><i class="fas fa-download"></i></span>
                    Download MoM
                  </button>
                </a>      
                <a href="<?php echo base_url('meetpic/daftar_peserta').'/'.$ID_RAPAT?>">
                  <button
                    type="button"
                    class="btn btn-outline-danger float-right ml-1 col-md-2 col-sm-12 mb-2 "
                  >
                    <span class="p-1">
                      <i class="fas fa-user-alt"></i>
                    </span>
                    Peserta
                  </button>
                </a>
                  <button
                    type="button"
                    class="btn btn-outline-danger float-right ml-1 col-md-2 col-sm-12 mb-2"
                    data-toggle="modal"
                    data-target="#batalkanRapatModal"
                  >
                    <span class="p-1">
                      <i class="fas fa-trash-alt"></i>
                    </span>
                    Batalkan
                  </button>
                
                <!-- modal-->
                <div
                  class="modal fade"
                  id="batalkanRapatModal"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                          <b>Batalkan Rapat</b>
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
                        
                          <h6 class="mt-3 mb-5" > Apakah anda yakin ingin membatalkal rapat?</h6>
                          <a href="<?php echo base_url('meetpic/delete').'/'.$ID_RAPAT ?>">
                            <button
                              type="button"
                              class="btn btn-danger float-right ml-1"
                            >
                              Batalkan Rapat
                            </button>
                            </a>
                            <button
                              type="button"
                              class="btn btn-outline-danger float-right"
                              data-dismiss="modal"
                            >
                              Kembali
                            </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!--modal-->
               
                <a href="<?php echo base_url('meetpic/update').'/'.$ID_RAPAT ?>">
                  <button
                    type="button"
                    class="btn col-md-2 col-sm-12  btn-outline-danger float-right ml-1 mb-2"
                  >
                    <span class="p-1">
                      <i class="fas fa-pencil-alt"></i>
                    </span>
                    Ubah
                  </button>
                </a>
                
                <a href="<?php echo base_url('meetpic/add_hasilmeet').'/'.$ID_RAPAT ?>">
                  <button
                    type="button"
                    class="btn col-md-2 col-sm-12  btn-outline-danger float-right ml-1 mb-2"
                  >
                    <span class="p-1">
                      <i class="fas fa-clipboard"></i>
                    </span>
                    Tambah Hasil 
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
