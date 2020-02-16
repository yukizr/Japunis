<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="aback" href="<?php echo base_url_admin('quiz/'); ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Kembali</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>E-Learning</li>
		<li>Quiz</li>
		<li>Edit</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<form id="fedit" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
		<input id="ieid" name="id" type="hidden" />
		<input name="d_learnpelajaran_id" type="hidden" value="<?php echo $elqm->id; ?>" />
		<fieldset><legend>Pertanyaan</legend>
			<div class="form-group">
				<div class="col-md-12">
					<textarea id="iepertanyaan" name="pertanyaan" class="ckeditor" rows="5"><?php echo $elqm->pertanyaan; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="ieopsi">Jumlah Opsi</label>
					<select id="ieopsi" name="opsi" class="form-control">
						<option <?php if($elqm->opsi == '2') echo 'selected';?> value="2">2</option>
						<option <?php if($elqm->opsi == '3') echo 'selected';?> value="3">3</option>
						<option <?php if($elqm->opsi == '4') echo 'selected';?> value="4">4</option>
						<option <?php if($elqm->opsi == '5') echo 'selected';?> value="5">5</option>
					</select>
				</div>
			</div>
		</fieldset>
		<fieldset><legend>Opsi Jawaban</legend>
			<div class="form-group">
				<div class="col-md-12">
					<label for="iejawaban1">Opsi Jawaban 1</label>
					<textarea id="iejawaban1" name="jawaban1" class="ckeditor" rows="5"><?php echo $elqm->jawaban1; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
				<label for="iejawaban2">Opsi Jawaban 2</label>
				<!-- <input id="iejawaban2" name="jawaban2" type="text" class="form-control" /> -->
				<textarea id="iejawaban2" name="jawaban2" class="ckeditor" rows="5"><?php echo $elqm->jawaban2; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
				<label for="iejawaban3">Opsi Jawaban 3</label>
				<!-- <input id="iejawaban3" name="jawaban3" type="text" class="form-control" /> -->
				<textarea id="iejawaban3" name="jawaban3" class="ckeditor" rows="5"><?php echo $elqm->jawaban3; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
				<label for="iejawaban4">Opsi Jawaban 4</label>
				<!-- <input id="iejawaban4" name="jawaban4" type="text" class="form-control" /> -->
				<textarea id="iejawaban4" name="jawaban4" class="ckeditor" rows="5"><?php echo $elqm->jawaban4; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<label for="iejawaban5">Opsi Jawaban 5</label>
					<!-- <input id="iejawaban5" name="jawaban5" type="text" class="form-control" /> -->
					<textarea id="iejawaban5" name="jawaban5" class="ckeditor" rows="5"><?php echo $elqm->jawaban5; ?></textarea>
				</div>
			</div>
		</fieldset>
		<fieldset><legend>Jawaban benar</legend>
			<div class="form-group">
				<div class="col-md-12">
					<label class="control-label" for="iejawaban">Opsi Yang benar</label>
					<select id="iejawaban" name="jawaban" class="form-control">
						<option <?php if($elqm->jawaban == '1') echo 'selected'; ?> value="1">1</option>
						<option <?php if($elqm->jawaban == '2') echo 'selected'; ?> value="2">2</option>
						<option <?php if($elqm->jawaban == '3') echo 'selected'; ?> value="3">3</option>
						<option <?php if($elqm->jawaban == '4') echo 'selected'; ?> value="4">4</option>
						<option <?php if($elqm->jawaban == '5') echo 'selected'; ?> value="5">5</option>
					</select>
				</div>
			</div>
		</fieldset>
		<div class="form-group form-actions">
			<div class="col-xs-12 text-right">
				<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
				<button id="bhapus" type="button" class="btn btn-sm btn-default" >Hapus</button>
				<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
			</div>
		</div>
	</form>
	<!-- END Content -->
</div>	
