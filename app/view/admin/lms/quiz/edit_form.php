<div id="page-content">
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-show_big_thumbnails"></i>
				Quiz<br>
				<small>Edit pertanyaan untuk <?php echo $pelajaran->mata_pelajaran; ?></small>
			</h1>
		</div>
	</div>		
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>LMS</li>
		<li><a href="<?=base_url_admin('lms/quiz/tambah/'.$pelajaran->id)?>">Quiz</a></li>
		<li>Edit</li>
	</ul>
	
	<div class="block full row">
		<form id="fedit" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
			<input name="id" type="hidden" value="<?php echo $quiz->id; ?>" />
			<input name="d_learnpelajaran_id" type="hidden" value="<?php echo $pelajaran->id; ?>" />
			<fieldset><legend>Pertanyaan</legend>
				<div class="form-group">
					<div class="col-md-12">
						<textarea id="ipertanyaan" name="pertanyaan" class="ckeditor" rows="5"><?=$quiz->pertanyaan?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label class="control-label" for="iopsi">Jumlah Opsi</label>
						<select id="iopsi" name="opsi" class="form-control">
							<option value="2" <?php if($quiz->opsi=="2") echo 'selected'; ?>>2</option>
							<option value="3" <?php if($quiz->opsi=="3") echo 'selected'; ?>>3</option>
							<option value="4" <?php if($quiz->opsi=="4") echo 'selected'; ?>>4</option>
							<option value="5" <?php if($quiz->opsi=="5") echo 'selected'; ?>>5</option>
						</select>
					</div>
				</div>
			</fieldset>
			<fieldset><legend>Opsi Jawaban</legend>
				<div class="form-group">
					<div class="col-md-12">
						<label for="ijawaban1">Opsi Jawaban 1</label>
						<textarea id="ijawaban1" name="jawaban1" class="ckeditor" rows="5"><?=$quiz->jawaban1?></textarea>
						<!-- <input id="ijawaban1" name="jawaban1" type="text" class="form-control" value="<?=$quiz->jawaban1?>" /> -->
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<label for="ijawaban2">Opsi Jawaban 2</label>
					<textarea id="ijawaban2" name="jawaban2" class="ckeditor" rows="5"><?=$quiz->jawaban2?></textarea>
					<!-- <input id="ijawaban2" name="jawaban2" type="text" class="form-control" value="<?=$quiz->jawaban2?>" /> -->
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<label for="ijawaban3">Opsi Jawaban 3</label>
					<textarea id="ijawaban3" name="jawaban3" class="ckeditor" rows="5"><?=$quiz->jawaban3?></textarea>
					<!-- <input id="ijawaban3" name="jawaban3" type="text" class="form-control" value="<?=$quiz->jawaban3?>" /> -->
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
					<label for="ijawaban4">Opsi Jawaban 4</label>
					<textarea id="ijawaban4" name="jawaban4" class="ckeditor" rows="5"><?=$quiz->jawaban4?></textarea>
					<!-- <input id="ijawaban4" name="jawaban4" type="text" class="form-control" value="<?=$quiz->jawaban4?>" /> -->
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<label for="ijawaban5">Opsi Jawaban 5</label>
						<textarea id="ijawaban5" name="jawaban5" class="ckeditor" rows="5"><?=$quiz->jawaban5?></textarea>
						<!-- <input id="ijawaban5" name="jawaban5" type="text" class="form-control" value="<?=$quiz->jawaban5?>" /> -->
					</div>
				</div>
			</fieldset>
			<fieldset><legend>Jawaban benar</legend>
				<div class="form-group">
					<div class="col-md-12">
						<label class="control-label" for="ijawaban">Opsi Yang benar</label>
						<select id="ijawaban" name="jawaban" class="form-control">
							<option value="1" <?php if($quiz->jawaban=="1") echo 'selected'; ?>>1</option>
							<option value="2" <?php if($quiz->jawaban=="2") echo 'selected'; ?>>2</option>
							<option value="3" <?php if($quiz->jawaban=="3") echo 'selected'; ?>>3</option>
							<option value="4" <?php if($quiz->jawaban=="4") echo 'selected'; ?>>4</option>
							<option value="5" <?php if($quiz->jawaban=="5") echo 'selected'; ?>>5</option>
						</select>
					</div>
				</div>
			</fieldset>
			<div class="form-group form-actions">
				<div class="col-xs-12 text-right">
					<button id="bhapus" type="button" class="btn btn-sm btn-danger" >Hapus</button>
					<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
				</div>
			</div>
		</form>
	</div>
	
</div>	
