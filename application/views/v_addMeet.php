<main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3><b><?php echo $button?></b></h3>
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row px-3 py-2">
              <h4><b>Rapat</b></h4>
            </div>
            <form method="post" action="<?php echo $action; ?>" class="needs-validation" novalidate>
              <div class="row">
                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="judulRapat"><b>Judul Rapat</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="judulRapat"
                      name="NAMA_RAPAT"
                      placeholder=""
                      value="<?php echo $NAMA_RAPAT; ?>"
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
                        name="TIPE_RAPAT"
                        type="radio"
                        class="custom-control-input"
                        value="Review" <?php if ( $TIPE_RAPAT=="Review") echo "selected"; ?> 
                        required
                      />
                      <label class="custom-control-label" for="review"
                        >Review
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="koordinasi"
                        name="TIPE_RAPAT"
                        type="radio"
                        class="custom-control-input"
                        value="Koordinasi" <?php if ( $TIPE_RAPAT=="Koordinasi") echo "selected"; ?>
                        required
                      />
                      <label class="custom-control-label" for="koordinasi"
                        >Koordinasi
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="briefing"
                        name="TIPE_RAPAT"
                        type="radio"
                        class="custom-control-input"
                        value="Briefing" <?php if ( $TIPE_RAPAT=="Briefing") echo "selected"; ?>
                        required
                      />
                      <label class="custom-control-label" for="briefing"
                        >Briefing
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="decision"
                        name="TIPE_RAPAT"
                        type="radio"
                        class="custom-control-input"
                        value="Decision Making" <?php if ( $TIPE_RAPAT=="Decision Making") echo "selected"; ?>
                        required
                      />
                      <label class="custom-control-label" for="decision"
                        >Decision Making
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input
                        id="other"
                        name="TIPE_RAPAT"
                        type="radio"
                        class="custom-control-input"
                        value="Other" <?php if ( $TIPE_RAPAT=="Other") echo "selected"; ?>
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
                      name="PENGUNDANG"
                      placeholder=""
                      value="<?php echo $PENGUNDANG; ?>"
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
                      name="TANGGAL"
                      placeholder=""
                      value="<?php echo $TANGGAL; ?>"
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
                        name="WAKTU_MULAI"
                        placeholder=""
                        value="<?php echo $WAKTU_MULAI; ?>"
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
                        name="WAKTU_SELESAI"
                        placeholder=""
                        value="<?php echo $WAKTU_SELESAI; ?>"
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
                      name="NOTULEN"
                      placeholder=""
                      value="<?php echo $NOTULEN; ?>"
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
                      name="TEMPAT"
                      placeholder=""
                      value="<?php echo $TEMPAT; ?>"
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
                      name="PENANDATANGAN"
                      placeholder=""
                      value="<?php echo $PENANDATANGAN; ?>"
                      required
                    />
                    <div class="invalid-feedback">
                      Tolong masukkan nama yang valid
                    </div>
                  </div>
                </div>
              </div>

              <hr class="mb-4" />

              <!--<input type="hidden" name="ID_RAPAT" value="<?php echo $ID_RAPAT; ?>" /> -->

              <button
                class="btn btn-danger btn-block col-md-2 mb-3 float-right"
                type="submit"
              >
              <?php echo $button ?>
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>