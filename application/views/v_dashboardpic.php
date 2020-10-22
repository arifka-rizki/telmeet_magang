<main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3>
            <b>Beranda </b>
          </h3>
        </div>
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <a href="#" class="btn btn-danger">Penanggung Jawab</a>
          <a href="<?php echo base_url('meetinv'); ?>" class="btn btn-outline-danger"
            >Undangan</a
          >
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row py-2">
              <div class="col-md-6 col-sm-12">
                <form class="form-inline mt-2" action="<?php echo site_url('meetpic/search_keyword')?>" method="post">
                  <input
                    class="form-control col-sm-8"
                    type="search"
                    name="keyword"
                    placeholder="Cari Agenda Rapat"
                    aria-label="Search"
                  />
                  <button
                    class="btn btn-danger my-2 col-md-2 col-sm-12"
                    type="submit"
                  >
                    Cari
                  </button>
                </form>
              </div>
              <div class="col-md-6 col-sm-12">
                <a href="<?php echo base_url('meetpic/add_meet'); ?>"
                  ><button
                    class="mt-3 btn btn-danger float-right col-md-4 col-sm-12"
                  >
                    <span class="m-1"><i class="fas fa-plus"></i></span>
                    Tambah Rapat
                  </button>
                </a>
              </div>
            </div>

            <div class="row p-3">
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Agenda Rapat</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Tipe Rapat</th>
                      <th>Lokasi</th>
                      <th>Aksi</th>
                      <th><!--button peserta--></th>
                      <th><!--button edit--></th>
                      <th><!--button delete--></th>
                      <th><!--button download--></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="border">
                    <!-- <?php var_dump($data) ?> -->
                      <?php foreach ($data as $key => $val): ?>
                        <tr>
                          <td><?php echo $key+1 ?></td>
                          <td><?php echo $val->NAMA_RAPAT; ?></td>
                          <td><?php echo $val->TANGGAL ?></td>
                          <td><?php echo $val->WAKTU_MULAI ?></td>
                          <td><?php echo $val->TIPE_RAPAT ?></td>
                          <td><?php echo $val->TEMPAT ?></td>             
                      <td>
                        <a href="<?php echo base_url('meetpic/detail').'/'.$val->ID_RAPAT ?>">
                          <button class="btn btn-outline-danger px-3 py-1">
                            Detail
                          </button>
                        </a>
                      </td>
                      <td>
                        <a href="<?php echo base_url('meetpic/daftar_peserta').'/'.$val->ID_RAPAT?>">
                          <button class="btn btn-outline-danger px-2 py-1">
                            <i class="fas fa-user-alt"></i>
                          </button>
                        </a>
                      </td>
                      <td>
                        <a href="<?php echo base_url('meetpic/update').'/'.$val->ID_RAPAT ?>">
                          <button class="btn btn-outline-danger px-2 py-1">
                            <i class="fas fa-pencil-alt"></i>
                          </button>
                        </a>
                      </td>
                      <td>
                        
                          <button 
                          class="btn btn-outline-danger px-2 py-1"
                          data-toggle="modal"
                          data-target="#batalkanRapatModal">
                            <i class="fas fa-trash-alt"></i>
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
                                  <a href="<?php echo base_url('meetpic/delete').'/'.$val->ID_RAPAT ?>">
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
                      </td>
                      <td>
                        <a href="<?php echo base_url('meetpic/download_rapat').'/'.$val->ID_RAPAT ?>">
                          <button class="btn btn-outline-danger px-2 py-1">
                            <i class="fas fa-download"></i>
                          </button>
                        </a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>