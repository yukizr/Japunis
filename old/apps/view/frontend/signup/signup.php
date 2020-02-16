<div class="row">
  <div class="large-12 columns" style="padding-top:3em;">
    <h3>Pendaftaran</h3>
    <hr>
  </div>

	<?php if($res=="berhasil" || $res=="gagal"): ?>
	<div class="large-12 columns">
		<?php if($res=="berhasil"): ?>
		<div data-alert class="alert-box success radius">
			Pendaftaran telah berhasil, silakan lanjutkan untuk masuk.
			<a href="#" class="close">&times;</a>
		</div>
		<a href="<?php echo base_url("login"); ?>"><input type="submit" name="submit" value="Masuk" class="button expand" /></a>
	</div>
	<div class="large-12 columns">
		<br />
		<br />
		<br />
		<?php endif; ?>
		<?php if($res=="gagal"): ?>
		<div data-alert class="alert-box warning radius">
			Pendaftaran gagal, silakan coba email dan/atau nomor HP yang lain.
			<a href="#" class="close">&times;</a>
		</div>
		<?php endif; ?>
	</div>
	<?php endif; ?>


  <div class="large-6 medium-12 columns <?php if($res=="berhasil") echo 'hidden'; ?>">
    <p>Fujitsu Guide Japanese diperuntukkan bagi para pemula, dituntun oleh pemaparan yang menarik dan interaktif untuk mempelajari bahasa dan kebudayaannya.</p>
    <p>Tidak ada persyaratan khusus untuk menjadi anggota. Cukup daftar, konfirmasi, belajar!</p>
    <p><a href="<?php echo base_url("login"); ?>">Sudah punya akun?</a></p>
  </div>
  <div class="large-6 medium-12 columns <?php if($res=="berhasil") echo 'hidden'; ?>">
      <?php if(isset($warn)): ?>
      <div data-alert class="alert-box alert round">
        <?php echo $warn; ?>
        <a href="#" class="close">&times;</a>
      </div>
      <?php endif; ?>
        <form id="fregister" action="<?php echo base_url("signup"); ?>" method="post" enctype="multipart/form-data" data-abide>
        <div class="row">
          <div class="large-12 columns">
            <label for="i_namefirst">Nama*</label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
              <input type="text" id="i_namefirst" name="name_first" placeholder="Nama Depan" required="required" class="input" value="" />
              <small class="error">Lengkapi nama anda</small>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
              <input type="text" id="i_namelast" name="name_last" placeholder="Nama Belakang" class="input" value="" />
              <small class="error">Lengkapi nama anda</small>
          </div>
        </div>
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
            <label for="i_konfirmasi">Konfirmasi</label>
		        <input type="password" id="i_konfirmasi" name="password" placeholder="Ketik Ulang Password" required="required" class="input" value="" data-equalto="i_password" />
		        <small class="error">Password harus sama.</small>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label for="i_kelas">Kelas*</label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <!-- <input type="hidden" id="i_kelas" name="s_kelas" placeholder="Pilih Kelas" required="required" class="input" value="" /> -->
            <select name="s_kelas" id="s_kelas" placeholder="Pilih Kelas">
              <option value="">-- Pilih Kelas --</option>
              <option value="11 AK 1">11 AK 1</option>
              <option value="11 AK 2">11 AK 2</option>
              <option value="11 RPL 1">11 RPL 1</option>
              <option value="11 RPL 2">11 RPL 2</option>
              <option value="11 RPL 3">11 RPL 3</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <input type="submit" name="submit" id="i_submit" value="Daftar" class="button expand" />
          </div>
        </div>
        </form>
  </div>
</div>
<!--//contain row after container//-->
