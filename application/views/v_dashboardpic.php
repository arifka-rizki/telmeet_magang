<main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3>
            <b>Beranda </b>
          </h3>
        </div>
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <a href="#" class="btn btn-danger">Penanggung Jawab</a>
          <a href="berandaundangan.html" class="btn btn-outline-danger"
            >Undangan</a
          >
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row py-2">
              <div class="col-md-6 col-sm-12">
                <form class="form-inline mt-2">
                  <input
                    class="form-control col-sm-8"
                    type="search"
                    placeholder="Search"
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
                      <td>1</td>
                      <td>Perencanaan kadal</td>
                      <td>12/02/30</td>
                      <td>01.01 AM</td>
                      <td>Pengambilan Keputusan</td>
                      <td>https://meet.google.com/nus-gzpt-gjw</td>
                      <td>
                        <a href="<?php echo base_url('meetpic/detail'); ?>">
                          <button class="btn btn-outline-danger px-3 py-1">
                            Detail
                          </button>
                        </a>
                      </td>
                      <td>
                        <a href="daftarpeserta.html">
                          <button class="btn btn-outline-danger px-2 py-1">
                            <i class="fas fa-user-alt"></i>
                          </button>
                        </a>
                      </td>
                      <td>
                        <a href="ubah.html">
                          <button class="btn btn-outline-danger px-2 py-1">
                            <i class="fas fa-wrench"></i>
                          </button>
                        </a>
                      </td>
                      <td>
                        <button class="btn btn-outline-danger px-2 py-1">
                          <i class="fas fa-trash-alt"></i>
                        </button>
                      </td>
                      <td>
                        <button class="btn btn-outline-danger px-2 py-1">
                          <i class="fas fa-download"></i>
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>