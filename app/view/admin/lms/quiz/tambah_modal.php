<!-- modal tambah -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Tambah</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
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
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Opsi Jawaban</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label for="ijawaban1">Opsi Jawaban 1</label>
								<textarea id="ijawaban1" name="jawaban1" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
							<label for="ijawaban2">Opsi Jawaban 2</label>
							<input id="ijawaban2" name="jawaban2" type="text" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
							<label for="ijawaban3">Opsi Jawaban 3</label>
							<input id="ijawaban3" name="jawaban3" type="text" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
							<label for="ijawaban4">Opsi Jawaban 4</label>
							<input id="ijawaban4" name="jawaban4" type="text" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="ijawaban5">Opsi Jawaban 5</label>
								<input id="ijawaban5" name="jawaban5" type="text" class="form-control" />
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
							<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>

<!-- modal edit -->
<div id="modal_edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Edit</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<form id="fedit" action="<?php echo base_url_admin(); ?>" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
					<input id="ieid" name="id" type="hidden" />
					<input name="d_learnpelajaran_id" type="hidden" value="<?php echo $pelajaran->id; ?>" />
					<fieldset><legend>Pertanyaan</legend>
						<div class="form-group">
							<div class="col-md-12">
								<textarea id="iepertanyaan" name="pertanyaan" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label" for="ieopsi">Jumlah Opsi</label>
								<select id="ieopsi" name="opsi" class="form-control">
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Opsi Jawaban</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label for="iejawaban1">Opsi Jawaban 1</label>
								<textarea id="iejawaban1" name="jawaban1" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
							<label for="iejawaban2">Opsi Jawaban 2</label>
							<!-- <input id="iejawaban2" name="jawaban2" type="text" class="form-control" /> -->
							<textarea id="iejawaban2" name="jawaban2" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
							<label for="iejawaban3">Opsi Jawaban 3</label>
							<!-- <input id="iejawaban3" name="jawaban3" type="text" class="form-control" /> -->
							<textarea id="iejawaban3" name="jawaban3" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
							<label for="iejawaban4">Opsi Jawaban 4</label>
							<!-- <input id="iejawaban4" name="jawaban4" type="text" class="form-control" /> -->
							<textarea id="iejawaban4" name="jawaban4" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="iejawaban5">Opsi Jawaban 5</label>
								<!-- <input id="iejawaban5" name="jawaban5" type="text" class="form-control" /> -->
								<textarea id="iejawaban5" name="jawaban5" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Jawaban benar</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label" for="iejawaban">Opsi Yang benar</label>
								<select id="iejawaban" name="jawaban" class="form-control">
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
							<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
							<button id="bhapus" type="button" class="btn btn-sm btn-default" >Hapus</button>
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>
