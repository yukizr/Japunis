<!--//contain row after container//-->
    <!--//container main //-->
    <div class="row">
    <div class="large-12 columns " style="min-height:590px;padding-top:3em;">
          <?php if($res=="berhasil" || $res=="gagal" || $res=="invalid"): ?>

          <?php if($res=="berhasil"): ?>
          <div data-alert class="alert-box success radius">
            Terima Kasih Akun Kamu Telah Terverifikasi, Silahkan Lanjutkan ke Halaman Login / Beranda
            <a href="#" class="close">&times;</a>
          </div>
          <?php endif; ?>

          <?php if($res=="gagal"): ?>
          <div data-alert class="alert-box warning radius">
            Akun Gagal Terverifikasi, silahkan kontak admin (redaksi@japunis.com)
            <a href="#" class="close">&times;</a>
          </div>
          <?php endif; ?>

          <?php if($res=="invalid"): ?>
          <div data-alert class="alert-box warning radius">
            Akun Gagal Terverifikasi, silahkan kontak admin (redaksi@japunis.com)
            <a href="#" class="close">&times;</a>
          </div>
          <?php endif; ?> 
          
          <?php endif; ?>
  </div>
  </div>
<!--//contain row after container//-->
