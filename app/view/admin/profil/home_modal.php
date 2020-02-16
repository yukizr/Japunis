<!-- modal option -->
<div id="modal_profil_foto" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header text-center">
				<h2 class="modal-title">Ganti Foto</h2>
			</div>
			<!-- END Modal Header -->

			<div class="modal-body">
				<form id="fmodal_profil_foto" method="post" enctype="multipart/form-data" action="<?=base_url_admin('profil/edit_foto')?>">
					<div class="form-group">
						<input id="iprofil_foto" type="file" name="foto" class="form-control" required />
					</div>
					<div class="form-group">
						<input type="submit" value="Submit" class="btn btn-primary" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
