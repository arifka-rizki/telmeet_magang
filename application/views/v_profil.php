    <main>
      <div class="container">
        <div
          class="row justify-content-center pt-3 shadow-sm rounded bg-white my-3"
        >
          <div class="col-md-6">
            <h4 class="my-3"><b>Identitas diri</b></h4>
            <form class="needs-validation" novalidate>
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

              <hr class="mb-4" />

              <button
                class="btn btn-danger btn-block col-md-3 mb-5"
                type="submit"
              >
                Ubah Profil
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>