<!--//contain row after container//-->
    <!--//container main //-->
    <div class="row">
    <div class="large-12 columns">
        <div class="medium-4 large-4 columns">
          &nbsp;
        </div>
        <div class="small-12 medium-4 large-4 columns text-center">
          <h3>Masukkan Email</h3>
          <hr>
          <?php //if(): ?>
          <div data-alert class="alert-box success radius">
            Email untuk mengubah password telah kami kirimkan
            <a href="#" class="close">&times;</a>
          </div>
          <?php //endif; ?>
          <?php //if()?>
          <div data-alert class="alert-box alert round"> 
            Email tidak terdaftar
            <a href="#" class="close">&times;</a>
          </div>
          <?php //endif; ?>
            <form id="fregister" action="<?php echo base_url("forget"); ?>" method="post" enctype="multipart/form-data" data-abide>
            <div class="row">
          <div class="large-12 columns">
            <label for="i_email">Email*</label>
            </div>
          </div>
          <div class="row">
            <div class="large-12 columns">
                <input type="email" pattern="email" name="email" id="i_email" class="input" placeholder="nama@email.com" required="required" />
                <small class="error">Email tidak valid</small>
            </div>
          </div>
            
            <div class="row">
              <div class="large-12 columns">
                <input type="submit" name="submit" value="Kirim" class="button expand" />
              </div>
            </div>
            </form>

        </div>
        <div class="medium-4 large-4 columns">
          &nbsp;
        </div>
      </div>
  </div>
<!--//contain row after container//-->
