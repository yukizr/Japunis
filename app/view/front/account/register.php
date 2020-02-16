<div class="row">
	<div id="error-container">
		<div class="large-12 columns">
		    <h3>Pendaftaran</h3>
		    <hr>
	    </div>
		<div class="large-6 medium-12 columns">
			<p>Japunis diperuntukkan bagi para pemula, dituntun oleh pemaparan yang menarik dan interaktif untuk mempelajari bahasa dan kebudayaan Jepang.</p>
		    <p>Tidak ada persyaratan khusus untuk menjadi anggota. Cukup daftar, dan langsung belajar!</p>
		    <p><a href="<?php echo base_url("login"); ?>">Sudah punya akun?</a></p>
		</div>
		<div class="large-6 medium-12 columns">
			<div id="fregister_info" data-alert class="alert-box alert round" style="display:none;">
      			<a href="#" class="close">&times;</a>
      		</div>
			<form id="fregister" method="post" action="<?=base_url('login/proses')?>" class="" data-abide>
				<div class="row">
					
					<div class="columns large-12">
						<label for="ifnama">Nama*</label>
					</div>
					<div class="columns large-12">
						<input type="text" id="ifnama" name="fnama" placeholder="Nama" class="input" required />
						<small class="error">Lengkapi nama depan anda</small>
					</div>

					<div class="columns large-12">
						<label for="iusername">Email*</label>
					</div>
					<div class="columns large-12">
						<!-- <input type="text" id="iusername" name="username" placeholder="Email" required /> -->
						<input type="email" pattern="email" name="username" id="iusername" class="input" placeholder="nama@email.com" required="required" />
              			<small class="error">Email tidak valid</small>
					</div>

					<div class="columns large-12">
						<!-- <input type="password" id="ipassword" name="password" placeholder="password" required /> -->
						<input type="password" id="ipassword" class="input" name="password" placeholder="password" required="required" />
					</div>
					<div class="columns large-12">
						<!-- <input type="password" id="irepassword" name="repassword" placeholder="ulangi password" required /> -->
						<input type="password" id="irepassword" name="repassword" placeholder="Ketik Ulang Password" required="required" class="input" value="" data-equalto="ipassword" />
		        		<small class="error">Password harus sama.</small>
					</div>
					<div class="columns large-12">
						<!-- <input type="text" id="ikelas" name="kelas" placeholder="Kelas" required /> -->
						<select name="kelas" id="ikelas" placeholder="Pilih Kelas" required>
			              <option value="">-- Pilih Kelas --</option>
			              <option value="11 AP 1">11 AP 1</option>
			              <option value="11 AP 2">11 AP 2</option>
			              <option value="11 AP 3">11 AP 3</option>
			              <option value="11 AK 1">11 AK 1</option>
			              <option value="11 AK 2">11 AK 2</option>
			              <option value="11 RPL 1">11 RPL 1</option>
			              <option value="11 RPL 2">11 RPL 2</option>
			              <option value="11 PM 1">11 PM 1</option>
			              <option value="11 PM 2">11 PM 2</option>
			            </select>
			            <small class="error">Kelas harus dipilih.</small>
					</div>
				</div>
				<div class="row">
					<div class="columns large-12">
						<input type="submit" value="Daftar" class="button expand" />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>