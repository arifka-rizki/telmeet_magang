    <main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3>
            <b>Beranda </b>
          </h3>
        </div>
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <a href="berandapic.html" class="btn btn-outline-danger"
            >Penanggung Jawab</a
          >
          <a href="" class="btn btn-danger">Undangan</a>
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
                <button
                  class="mt-3 btn btn-danger float-right col-md-4 col-sm-12"
                  data-toggle="modal"
                  data-target="#masukkanKodeModal"
                >
                  <span class="m-1"><i class="fas fa-sign-in-alt"></i></span>
                  Masuk Rapat
                </button>
              </div>
              <div
                class="modal fade"
                id="masukkanKodeModal"
                tabindex="-1"
                role="dialog"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
              >
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">
                        <b>Masukkan Kode Rapat</b>
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
                      <form class="needs-validation" novalidate>
                        <div class="mb-4">
                          <label for="kodeRapat"><b>Kode Rapat</b></label>
                          <input
                            type="text"
                            class="form-control"
                            id="kodeRapat"
                            placeholder=""
                            value=""
                            required
                          />
                        </div>

                        <a href="detailrapatundangan.html">
                          <button
                            type="button"
                            class="btn btn-danger float-right ml-1"
                          >
                            Konfirmasi
                          </button>
                        </a>
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
                      <th>Status</th>
                      <th>Aksi</th>
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
                      <td>Hadir</td>
                      <td>
                        <a href="detailrapatundangan.html">
                          <button class="btn btn-outline-danger px-3 py-1">
                            Detail
                          </button>
                        </a>
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