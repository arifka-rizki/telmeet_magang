<main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3><b><?php echo $page_title?></b></h3>
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
                    <label for="judulRapat"><b>Judul Rapat*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="judulRapat"
                      name="NAMA_RAPAT"
                      placeholder=""
                      value="<?php if(isset($NAMA_RAPAT)){
                        echo $NAMA_RAPAT;
                      }else{
                        echo set_value('NAMA_RAPAT');
                      }?>"
                      required
                    />
                    <?php echo form_error('NAMA_RAPAT', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="mb-3">
                    <label for="notaDinas"><b>Nota Dinas*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="notaDinas"
                      name="NOTA_DINAS"
                      placeholder=""
                      value="<?php if(isset($NOTA_DINAS)){
                        echo $NOTA_DINAS;
                      }else{
                        echo set_value('NOTA_DINAS');
                      }?>"
                      required
                    />
                    <?php echo form_error('NOTA_DINAS', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="d-block my-3">
                    <h6 class="mb-3"><b>Tipe Rapat*</b></h6>
                    <div class="custom-control custom-checkbox">
                      <input
                        id="review"
                        name="TIPE_RAPAT[]"
                        type="checkbox"
                        class="custom-control-input"
                        value="Review" 
                        <?php if(isset($TIPE_RAPAT)){
                          if( preg_match('/Review/i', $TIPE_RAPAT)){
                            echo "checked";
                          }
                        } ?> 
                        required
                      />
                      <label class="custom-control-label" for="review"
                        >Review
                      </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input
                        id="koordinasi"
                        name="TIPE_RAPAT[]"
                        type="checkbox"
                        class="custom-control-input"
                        value="Koordinasi" 
                        <?php if(isset($TIPE_RAPAT)){
                          if( preg_match('/Koordinasi/i', $TIPE_RAPAT)){
                            echo "checked";
                          }
                        } ?> 
                        required
                      />
                      <label class="custom-control-label" for="koordinasi"
                        >Koordinasi
                      </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input
                        id="briefing"
                        name="TIPE_RAPAT[]"
                        type="checkbox"
                        class="custom-control-input"
                        value="Briefing" 
                        <?php if(isset($TIPE_RAPAT)){
                          if( preg_match('/Briefing/i', $TIPE_RAPAT)){
                            echo "checked";
                          }
                        } ?> 
                        required
                      />
                      <label class="custom-control-label" for="briefing"
                        >Briefing
                      </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input
                        id="decision"
                        name="TIPE_RAPAT[]"
                        type="checkbox"
                        class="custom-control-input"
                        value="Decision Making" 
                        <?php if(isset($TIPE_RAPAT)){
                          if( preg_match('/Decision Making/i', $TIPE_RAPAT)){
                            echo "checked";
                          }
                        } ?> 
                        required
                      />
                      <label class="custom-control-label" for="decision"
                        >Decision Making
                      </label>
                    </div>
                    <div class="custom-control custom-checkbox">
                      <input
                        id="other"
                        name="TIPE_RAPAT[]"
                        type="checkbox"
                        class="custom-control-input"
                        value="Other" 
                        <?php if(isset($TIPE_RAPAT)){
                          if( preg_match('/Other/i', $TIPE_RAPAT)){
                            echo "checked";
                          }
                        } ?> 
                        required
                      />
                      <label class="custom-control-label" for="other"
                        >Other
                      </label>
                    </div>
                    <?php echo form_error('TIPE_RAPAT[]', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="mb-3">
                    <label for="pengundang"> <b>Pengundang Rapat*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="pengundang"
                      name="PENGUNDANG"
                      placeholder=""
                      value="<?php if(isset($PENGUNDANG)){
                        echo $PENGUNDANG;
                      }else{
                        echo set_value('PENGUNDANG');
                      }?>"
                      required
                    />
                    <?php echo form_error('PENGUNDANG', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>
                </div>

                <div class="col-md-6 px-3">
                  <div class="mb-3">
                    <label for="tanggal"><b>Hari Tanggal*</b></label>
                    <input
                      type="date"
                      min="2015-01-01"
                      max="2030-01-01"
                      class="form-control"
                      id="tanggal"
                      name="TANGGAL"
                      placeholder=""
                      value="<?php if(isset($TANGGAL)){
                        echo $TANGGAL;
                      }else{
                        echo set_value('TANGGAL');
                      }?>"
                      required
                    />
                    <?php echo form_error('TANGGAL', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="waktuMulai"><b>Waktu Mulai*</b></label>
                      <input
                        type="time"
                        min="00-00-00"
                        max="24-00-00"
                        class="form-control"
                        id="wakruMulai"
                        name="WAKTU_MULAI"
                        placeholder=""
                        value="<?php if(isset($WAKTU_MULAI)){
                        echo $WAKTU_MULAI;
                      }else{
                        echo set_value('WAKTU_MULAI');
                      }?>"
                        required
                      />
                      <?php echo form_error('WAKTU_MULAI', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                    </div>
                    <div class="col mb-3">
                      <label for="waktuSelesai"><b>Waktu Selesai*</b></label>
                      <input
                        type="time"
                        min="00-00-00"
                        max="24-00-00"
                        class="form-control"
                        id="waktuSelesai"
                        name="WAKTU_SELESAI"
                        placeholder=""
                        value="<?php if(isset($WAKTU_SELESAI)){
                        echo $WAKTU_SELESAI;
                      }else{
                        echo set_value('WAKTU_SELESAI');
                      }?>"
                        required
                      />
                      <?php echo form_error('WAKTU_SELESAI', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="notulen"><b>Notulen*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="notulen"
                      name="NOTULEN"
                      placeholder=""
                      value="<?php if(isset($NOTULEN)){
                        echo $NOTULEN;
                      }else{
                        echo set_value('NOTULEN');
                      }?>"
                      required
                    />
                    <?php echo form_error('NOTULEN', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="mb-3">
                    <label for="lokasiRapat"><b>Lokasi Rapat*</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="lokasiRapat"
                      name="TEMPAT"
                      placeholder=""
                      value="<?php if(isset($TEMPAT)){
                        echo $TEMPAT;
                      }else{
                        echo set_value('TEMPAT');
                      }?>"
                      required
                    />
                    <?php echo form_error('TEMPAT', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
                  </div>

                  <div class="mb-3">
                    <label for="penandatangan"><b>Penandatangan</b></label>
                    <input
                      type="text"
                      class="form-control"
                      id="penandatangan"
                      name="PENANDATANGAN"
                      placeholder=""
                      value="<?php if(isset($PENANDATANGAN)){
                        echo $PENANDATANGAN;
                      }else{
                        echo set_value('PENANDATANGAN');
                      }?>"
                      required
                    />
                  </div>
                </div>
              </div>

              <hr class="mb-4" />
              <div class="row" >
                <div class="col-md-2 col-sm-12 ">
                  <a href="<?php echo site_url('meetpic')?>">
                    <button
                      type="button"
                      class="btn btn-danger col-sm-12 float-left mb-2"
                      data-dismiss="modal"
                    >
                      <span class="p-1"><i class="fas fa-arrow-left"></i></span>
                      Kembali
                    </button>
                  </a>
                </div>
                <div class="col-md-10 col-sm-12">
                  <input type="hidden" name="ID_RAPAT" value="<?php echo $ID_RAPAT; ?>" /> 
                
                  <button
                    class="btn btn-danger btn-block col-md-2 mb-3 float-right"
                    type="submit"
                  >
               
                  <?php echo $page_title ?>
                  </button>
                </div>
              </div>
             
            </form>
          </div>
        </div>
      </div>
    </main>