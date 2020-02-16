<style>
	.text-left {
		text-align: left !important;
	}
</style>
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
					<fieldset><legend>Produk</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="iutype">Jenis Produk*</label>
								<select id="iutype" name="utype" class="form-control">
									<option value="utama">Produk Utama</option>
									<option value="variasi">Produk Variasi</option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="ib_kategori_id">Kategori Produk</label>
								<select id="ib_kategori_id" name="b_kategori_id" class="form-control">
									<option value="null"> - </option>
									<?php if(isset($kategori)){ foreach($kategori as $kat){ ?>
									<option value="<?php echo $kat->id; ?>"><?php echo $kat->nama; ?></option>
									<?php if(count($kat->childs)){ foreach($kat->childs as $kc){ ?>
									<option value="<?php echo $kc->id; ?>">--&nbsp;<?php echo $kc->nama; ?></option>
									<?php }}}} ?>
								</select>
							</div>
							<div class="col-md-4">
								<label for="isku">SKU*</label>
								<input id="isku" type="text" name="sku" class="form-control" minlength="2" maxlength="20" placeholder="huruf, angka, titik, strip(-)" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="" for="inama">Nama Produk</label>
								<input id="inama" type="text" name="nama" class="form-control" minlength="1" placeholder="Nama Produk" required />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Properti</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label class="" for="islug">SLUG</label>
								<input id="islug" type="text" name="slug" class="form-control" minlength="1" placeholder="Slug" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label for="iukuran">Ukuran*</label>
								<select id="iukuran" name="ukuran" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="iwarna">Warna*</label>
								<select id="iwarna" name="warna" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="irasa">Rasa*</label>
								<select id="irasa" name="rasa" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Harga</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="iharga_beli">Harga Beli</label>
								<input id="iharga_beli" name="harga_beli" type="text" class="form-control" minlength="1" placeholder="harga beli" />
							</div>
							<div class="col-md-4">
								<label for="iharga_jual">Harga Jual*</label>
								<input id="iharga_jual" type="text" name="harga_jual" class="form-control" placeholder="harga jual" required />
							</div>
							<div class="col-md-4">
								<label for="iharga_retail">Harga Retail</label>
								<input id="iharga_retail" type="text" name="harga_retail" class="form-control" placeholder="harga retail" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Promo / Diskon</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="idiskon_harga">Diskon Harga</label>
								<input id="idiskon_harga" name="diskon_harga" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								<label for="idiskon_persen">Diskon Persen (%)</label>
								<input id="idiskon_persen" name="diskon_persen" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								<label for="idiskon_expired">Diskon Expired</label>
								<input id="idiskon_expired" type="text" name="diskon_expired" class="form-control input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="TTTT-BB-HH" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Packaging</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="iberat">Berat Packing (gram) *</label>
								<input id="iberat" name="berat" type="text" class="form-control" value="" required />
							</div>
							<div class="col-md-4">
								<label for="istok">Stok</label>
								<input id="istok" name="stok" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								&nbsp;
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Deskripsi Produk</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label" for="ideskripsi_singkat">Deskripsi Singkat</label>
								<textarea id="ideskripsi_singkat" name="deskripsi_singkat" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label" for="ideskripsi">Deskripsi Lengkap</label>
								<textarea id="ideskripsi" name="deskripsi" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Lain-lain</legend>
						<div class="form-group">
							<div class="col-md-3">
								<label for="ireview">Review</label>
								<input id="ireview" name="review" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="irating">Rating</label>
								<input id="irating" name="rating" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="iterjual">Terjual</label>
								<input id="iterjual" name="terjual" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="idilihat">Dilihat</label>
								<input id="idilihat" name="dilihat" type="text" class="form-control" value="0" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Penting</legend>
						<div class="form-group">
							<div class="col-md-3">
								<label for="iis_can_wait">Bisa PO?</label>
								<select id="iis_can_wait" name="is_can_wait" class="form-control">
									<option value="0">Tidak</option>
									<option value="1">Iya</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="iwaiting_day">Proses PO (Hari)</label>
								<input id="iwaiting_day" name="waiting_day" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="iis_visible">Dapat Dilihat</label>
								<select id="iis_visible" name="is_visible" class="form-control">
									<option value="1">Iya</option>
									<option value="0">Tidak</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="iis_active">Active</label>
								<select id="iis_active" name="is_active" class="form-control">
									<option value="1">Iya</option>
									<option value="0">Tidak</option>
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
					<fieldset>
						<div class="form-group">
							<div class="col-md-4">
								<label for="ieutype">Jenis Produk*</label>
								<select id="ieutype" name="utype" class="form-control">
									<option value="utama">Produk Utama</option>
									<option value="variasi">Produk Variasi</option>
								</select>
								<input id="ieid" name="id" type="hidden" value="" />
							</div>
							<div class="col-md-4">
								<label for="ieb_kategori_id">Kategori Produk</label>
								<select id="ieb_kategori_id" name="b_kategori_id" class="form-control">
									<option value="null"> - </option>
									<?php if(isset($kategori)){ foreach($kategori as $kat){ ?>
									<option value="<?php echo $kat->id; ?>"><?php echo $kat->nama; ?></option>
									<?php if(count($kat->childs)){ foreach($kat->childs as $kc){ ?>
									<option value="<?php echo $kc->id; ?>">--&nbsp;<?php echo $kc->nama; ?></option>
									<?php }}}} ?>
								</select>
							</div>
							<div class="col-md-4">
								<label for="iesku">SKU*</label>
								<input id="iesku" type="text" name="sku" class="form-control" minlength="2" maxlength="20" placeholder="huruf, angka, titik, strip(-)" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="" for="ienama">Nama Produk</label>
								<input id="ienama" type="text" name="nama" class="form-control" minlength="1" placeholder="Nama Produk" required />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Properti</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label class="" for="ieslug">SLUG</label>
								<input id="ieslug" type="text" name="slug" class="form-control" minlength="1" placeholder="Slug" required />
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label for="ieukuran">Ukuran*</label>
								<select id="ieukuran" name="ukuran" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="iewarna">Warna*</label>
								<select id="iewarna" name="warna" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
							<div class="col-md-4">
								<label for="ierasa">Rasa*</label>
								<select id="ierasa" name="rasa" class="form-control">
									<option value="null"> - </option>
								</select>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Harga</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="ieharga_beli">Harga Beli</label>
								<input id="ieharga_beli" name="harga_beli" type="text" class="form-control" minlength="1" placeholder="harga beli" />
							</div>
							<div class="col-md-4">
								<label for="ieharga_jual">Harga Jual*</label>
								<input id="ieharga_jual" type="text" name="harga_jual" class="form-control" placeholder="harga jual" required />
							</div>
							<div class="col-md-4">
								<label for="ieharga_retail">Harga Retail</label>
								<input id="ieharga_retail" type="text" name="harga_retail" class="form-control" placeholder="harga retail" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Promo / Diskon</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="iediskon_harga">Diskon Harga</label>
								<input id="iediskon_harga" name="diskon_harga" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								<label for="iediskon_persen">Diskon Persen (%)</label>
								<input id="iediskon_persen" name="diskon_persen" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								<label for="iediskon_expired">Diskon Expired</label>
								<input id="iediskon_expired" type="text" name="diskon_expired" class="form-control input-datepicker-close" data-date-format="yyyy-mm-dd" placeholder="TTTT-BB-HH" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Packaging</legend>
						<div class="form-group">
							<div class="col-md-4">
								<label for="ieberat">Berat Packing (gram) *</label>
								<input id="ieberat" name="berat" type="text" class="form-control" value="" required />
							</div>
							<div class="col-md-4">
								<label for="iestok">Stok</label>
								<input id="iestok" name="stok" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-4">
								&nbsp;
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Deskripsi Produk</legend>
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label" for="iedeskripsi_singkat">Deskripsi Singkat</label>
								<textarea id="iedeskripsi_singkat" name="deskripsi_singkat" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label class="control-label" for="iedeskripsi">Deskripsi Lengkap</label>
								<textarea id="iedeskripsi" name="ideskripsi" class="ckeditor" rows="5"></textarea>
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Lain-lain</legend>
						<div class="form-group">
							<div class="col-md-3">
								<label for="iereview">Review</label>
								<input id="iereview" name="review" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="ierating">Rating</label>
								<input id="ierating" name="rating" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="ieterjual">Terjual</label>
								<input id="ieterjual" name="terjual" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="iedilihat">Dilihat</label>
								<input id="iedilihat" name="dilihat" type="text" class="form-control" value="0" />
							</div>
						</div>
					</fieldset>
					<fieldset><legend>Penting</legend>
						<div class="form-group">
							<div class="col-md-3">
								<label for="ieis_can_wait">Bisa PO?</label>
								<select id="ieis_can_wait" name="iis_can_wait" class="form-control">
									<option value="0">Tidak</option>
									<option value="1">Iya</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="iewaiting_day">Proses PO (Hari)</label>
								<input id="iewaiting_day" name="waiting_day" type="text" class="form-control" value="0" />
							</div>
							<div class="col-md-3">
								<label for="ieis_visible">Dapat Dilihat</label>
								<select id="ieis_visible" name="is_visible" class="form-control">
									<option value="1">Iya</option>
									<option value="0">Tidak</option>
								</select>
							</div>
							<div class="col-md-3">
								<label for="ieis_active">Active</label>
								<select id="ieis_active" name="is_active" class="form-control">
									<option value="1">Iya</option>
									<option value="0">Tidak</option>
								</select>
							</div>
						</div>
					</fieldset>
					<div class="form-group form-actions">
						<div class="col-xs-12 text-right">
							<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
							<button id="bhapus" type="button" class="btn btn-sm btn-warning">Hapus</button>
							<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END Modal Body -->
		</div>
	</div>
</div>

