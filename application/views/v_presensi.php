    <main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3>
            <b>Presensi Rapat </b>
          </h3>
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
            <div class="col">
              <div class="row px-3 py-3">
                <h4><b>Rapat</b></h4>
              </div>
              <form class="needs-validation" novalidate>
                <div class="row">
                
                  <div class="col-md-6 px-3">
                    <div class="mb-3">
                      <label for="detailRapat"><b>Detail Rapat</b></label>
                      <textarea
                        class="form-control"
                        name=""
                        id="detailRapat"
                        cols="30"
                        rows="10"
                      ></textarea>
                      
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
  
          <div
            class="row justify-content-center my-3 pt-1 shadow-sm rounded bg-white"
          >
            <div class="col">
              <div class="row px-3 py-3">
                <h4><b>Identitas Peserta</b></h4>
              </div>
              <form class="needs-validation" novalidate>
                <div class="row">
                  <div class="col-md-6 px-3">
                    <div class="mb-3">
                      <label for="name"><b>Nama</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="nama"
                        placeholder=""
                        value=""
                        required
                      />
                     
                    </div>
  
                    <div class="mb-3">
                      <label for="nik"> <b>NIK/NIP</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="nik"
                        placeholder=""
                        required
                      />
                   
                    </div>
  
                    <div class="d-block my-3">
                      <h6 class="mb-3"><b>Jenis Kelamin</b></h6>
                      <div class="custom-control custom-radio">
                        <input
                          id="laki"
                          name="jenisKelamin"
                          type="radio"
                          class="custom-control-input"
                          required
                        />
                        <label class="custom-control-label" for="laki"
                          >Laki-Laki
                        </label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input
                          id="perempuan"
                          name="jenisKelamin"
                          type="radio"
                          class="custom-control-input"
                          required
                        />
                        <label class="custom-control-label" for="perempuan"
                          >Perempuan
                        </label>
                      </div>
                    </div>
  
                    <div class="mb-3">
                      <label for="instansi"><b>Instansi</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="instansi"
                        placeholder=""
                        required
                      />
                   
                    </div>
  
                    <div class="mb-3">
                      <label for="jabatan"><b>Jabatan</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="jabatan"
                        placeholder=""
                        required
                      />
                      
                    </div>
                  </div>
  
                  <div class="col-md-6 px-3">
                    <div class="mb-3">
                      <label for="telefon"><b>Nomor Telefon</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="telefon"
                        placeholder=""
                        required
                      />
                   
                    </div>
  
                    <div class="mb-3">
                      <label for="email"><b>Email</b></label>
                      <input
                        type="email"
                        class="form-control"
                        id="email"
                        placeholder=""
                        required
                      />
                
                    </div>
  
                    <div class="mb-3">
                      <label for="buktiKehadiran"><b>Bukti Kehadiran</b></label>
                      <input
                        type="file"
                        class="form-control-file"
                        id="buktiKehadiran"
                        placeholder=""
                        required
                      />
                   
                    </div>
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
      </div>
    </main>