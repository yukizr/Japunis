<div id="page-content">
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-show_big_thumbnails"></i>
				Quiz<br>
				<small>Tambah pertanyaan untuk <?php echo $pelajaran->mata_pelajaran; ?></small>
			</h1>
		</div>
	</div>		
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>LMS</li>
		<li><a href="<?=base_url_admin('lms/quiz/tambah/'.$pelajaran->id)?>">Quiz</a></li>
		<li>Tambah</li>
	</ul>
	
	<div class="block full row">
		<form id="ftambah" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
			<input name="d_learnpelajaran_id" type="hidden" value="<?php echo $pelajaran->id; ?>" />
			<fieldset><legend>Pertanyaan</legend>
				<div class="form-group">
					<div class="col-md-12">
						<textarea id="ipertanyaan" name="pertanyaan" class="ckeditor" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label class="control-label" for="iopsi">Jumlah Opsi</label>
						<select id="iopsi" name="opsi" class="form-control">
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4" selected>4</option>
							<option value="5">5</option>
						</select>
					</div>
				</div>
			</fieldset>
			<fieldset><legend>Opsi Jawaban</legend>
				<div class="form-group">
					<div class="col-md-12">
						<label for="ijawaban1">Opsi Jawaban 1</label>
						<!-- <input id="ijawaban1" name="jawaban1" type="text" class="form-control" /> -->
						<textarea id="ijawaban1" name="jawaban1" class="ckeditor" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<label for="ijawaban2">Opsi Jawaban 2</label>
					<!-- <input id="ijawaban2" name="jawaban2" type="text" class="form-control" /> -->
					<textarea id="ijawaban2" name="jawaban2" class="ckeditor" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<label for="ijawaban3">Opsi Jawaban 3</label>
					<!-- <input id="ijawaban3" name="jawaban3" type="text" class="form-control" /> -->
					<textarea id="ijawaban3" name="jawaban3" class="ckeditor" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<label for="ijawaban4">Opsi Jawaban 4</label>
					<!-- <input id="ijawaban4" name="jawaban4" type="text" class="form-control" /> -->
					<textarea id="ijawaban4" name="jawaban4" class="ckeditor" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label for="ijawaban5">Opsi Jawaban 5</label>
						<!-- <input id="ijawaban5" name="jawaban5" type="text" class="form-control" /> -->
						<textarea id="ijawaban5" name="jawaban5" class="ckeditor" rows="5"></textarea>
					</div>
				</div>
			</fieldset>
			<fieldset><legend>Jawaban benar</legend>
				<div class="form-group">
					<div class="col-md-12">
						<label class="control-label" for="ijawaban">Opsi Yang benar</label>
						<select id="ijawaban" name="jawaban" class="form-control">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
				</div>
			</fieldset>
			<div class="form-group form-actions">
				<div class="col-xs-12 text-right">
					<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
	
</div>	
