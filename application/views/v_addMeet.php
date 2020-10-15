<main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3><b>Tambah Rapat</b></h3>
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row px-3 py-2">
              <h4><b>Rapat</b></h4>
            </div>
            <form class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="judulRapat"><b>Judul Rapat</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="judulRapat"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>

                  <div class="d-block my-3">
                    <h6 class="mb-3"><b>Tipe Rapat</b></h6>
                    <div class="custom-control custom-radio">
                      <input
                        id="review"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="review"
                        >Review
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="koordinasi"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="koordinasi"
                        >Koordinasi
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="briefing"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="briefing"
                        >Briefing
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="decision"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="decision"
                        >Decision Making
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="other"
                        name="tipeRapat"
                        type="radio"
                        class="custom-control-input"
                        required
                      />
                      <label class="custom-control-label" for="other"
                        >Other
                      </label>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="pengundang"> <b>Pengundang Rapat</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="pengundang"
                      placeholder=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan NIK yang valid.
                    </div>
                  </div>
                </div>

                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="tanggal"><b>Hari Tanggal</b></label>
                    <input
                      type="date"
                      min="2015-01-01"
                      max="2030-01-01"
                      class="form-control"
                      id="tanggal"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="waktuMulai"><b>Waktu Mulai</b></label>
                      <input
                        type="time"
                        min="00-00-00"
                        max="24-00-00"
                        class="form-control"
                        id="wakruMulai"
                        placeholder=""
                        value=""
                        required
                      />
                      <div class="invalid-feedback">
                        Tolong masukkan nama yang valid
                      </div>
                    </div>
                    <div class="col mb-3">
                      <label for="waktuSelesai"><b>Waktu Selesai</b></label>
                      <input
                        type="time"
                        min="00-00-00"
                        max="24-00-00"
                        class="form-control"
                        id="waktuSelesai"
                        placeholder=""
                        value=""
                        required
                      />
                      <div class="invalid-feedback">
                        Tolong masukkan nama yang valid
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="notulen"><b>Notulen</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="notulen"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="lokasiRapat"><b>Lokasi Rapat</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="lokasiRapat"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="penandatangan"><b>Penandatangan</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="penandatangan"
                      placeholder=""
                      value=""
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>
                </div>
              </div>

              <hr class="mb-4" />

              <button
                class="btn btn-danger btn-block col-md-2 mb-3 float-right"
                type="submit"
              >
                Tambah Rapat
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>