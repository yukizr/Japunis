<!--//contain row after container//-->
    <!--//container main //-->
    <div class="row">
    <div class="large-12 columns" style="min-height:590px;">
        <div class="medium-4 large-4 columns">
          &nbsp;
        </div>
        <div class="small-12 medium-4 large-4 columns" style="padding-top:3em;">
          <h3>Reset Ulang Password</h3>
          <hr>
          <?php if($res=="berhasil" || $res=="gagal"): ?>
            <?php if($res=="berhasil"): ?>
            <div data-alert class="alert-box success radius">
              Email untuk mengubah password telah kami kirimkan
              <a href="#" class="close">&times;</a>
            </div>
            <?php endif; ?>
            <?php if($res=="gagal"): ?>
            <div data-alert class="alert-box warning radius">
              Gagal.
              <a href="#" class="close">&times;</a>
            </div>
            <?php endif; ?>
            <?php if($res=="emailnotfound"): ?>
            <div data-alert class="alert-box warning radius">
              Email Tidak Terdaftar.
              <a href="#" class="close">&times;</a>
            </div>
            <?php endif; ?>
          <?php endif; ?>

            <form id="fregister" action="<?php echo base_url("forget/reset/$code"); ?>" method="post" enctype="multipart/form-data" data-abide>
            <div class="row">
              <div class="large-12 columns">
                <label for="i_password">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <input type="password" id="i_password" class="input" name="password" placeholder="password" required="required" />
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <input type="hidden" name="code" value="<?php echo $code ?>"/> 
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <label for="i_konfirmasi">Konfirmasi</label>
                <input type="password" id="i_konfirmasi" name="password" placeholder="Ketik Ulang Password" required="required" class="input" value="" data-equalto="i_password" />
                <small class="error">Password harus sama.</small>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <input type="submit" name="submit" value="Ubah Password" class="button expand" />
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
