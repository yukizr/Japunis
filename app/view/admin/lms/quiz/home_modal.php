<style>
	.text-left {
		text-align: left !important;
	}
</style>
<!-- modal tambah -->
<div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Tambah</h2>
			</div>
			<!-- END Modal Header -->

			<!-- Modal Body -->
			<div class="modal-body">
				<div class="form-group form-actions">
					<label>Pilih Pelajaran</label>
					<select id="is_pelajaran_id" name="" class="form-control">
						<option value="">-- Pilih -- </option>
						<?php if(isset($pelajaran)){ foreach($pelajaran as $p){ ?>
						<!-- <option value="<?php echo $p->id; ?>"><?php echo substr($p->mata_pelajaran,0,60).'...'; ?></option> -->
						<option value="<?php echo $p->id; ?>"><?php echo $p->mata_pelajaran; ?></option>
						<?php } } ?>
					</select>
				</div>
				<div class="form-group form-actions">
					<a id="apilih_pelajaran_id" href="#" class="btn btn-info">Pilih</a>
				</div>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>


