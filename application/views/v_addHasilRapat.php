<main>
      <div class="container mt-5">
        <div class="row p-3 shadow-sm rounded bg-white my-3">
          <h3><b>Tambah Hasil Rapat <?= $NAMA_RAPAT; ?></b></h3>
        </div>

        <div class="row justify-content-center pt-1 shadow-sm rounded bg-white">
          <div class="col">
            <div class="row px-3 py-2">
              <h4><b>Rapat</b></h4>
            </div>
            <form  method="post" action="<?php echo $action; ?>" class="needs-validation" novalidate>
              <div class="form-group">
                <label for="backgroundRapat"><b> Background </b></label>
                <textarea
                  class="form-control"
                  rows="4"
                  name="BACKGROUND"
                  id="backgroundRapat"
                  placeholder=""
                ><?php if(isset($BACKGROUND)){
                        echo $BACKGROUND;
                      }else{
                        echo set_value('BACKGROUND');
                      }?></textarea>
              </div>
              <div class="form-group">
                <label for="resultRapat"><b> Result* </b></label>
                <textarea
                  class="form-control"
                  rows="4"
                  name="RESULT"
                  id="resultRapat"
                  placeholder=""
                ><?php if(isset($RESULT)){
                        echo $RESULT;
                      }else{
                        echo set_value('RESULT');
                      }?></textarea>
                <?= form_error('RESULT', '<p class = "alert alert-danger" role="alert">', '</p>'); ?>
              </div>
              <div class="form-group">
                <label for="actionPlanRapat"><b> Action Plan </b></label>
                <textarea
                  class="form-control"
                  rows="4"
                  name="ACTION_PLAN"
                  id="actionPlanRapat"
                  placeholder=""
                ><?php if(isset($ACTION_PLAN)){
                        echo $ACTION_PLAN;
                      }else{
                        echo set_value('ACTION_PLAN');
                      }?></textarea>
              </div>

              <hr class="mb-4" />
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
              <input type="hidden" name="ID_RAPAT" value="<?php echo $ID_RAPAT; ?>" /> 

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