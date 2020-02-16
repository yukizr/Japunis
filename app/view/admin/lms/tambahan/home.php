<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="row" style="padding: 0.5em 2em;">
			<div class="col-md-12">
				<div class="btn-group">
					<a id="" href="<?=base_url_admin('lms/tambahan/tambah/'); ?>" class="btn btn-info"><i class="fa fa-plus"></i> Baru</a>
				</div>
			</div>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>E-Learning</li>
		<li>Tambahan</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<div class="block full">
		
		<div class="block-title">
			<h2><strong>Tambahan</strong></h2>
		</div>
		<div class="row" style="margin-bottom: 1em;">
			<div class="col-md-8">&nbsp;</div>
			<div class="col-md-2">
				<select id="filter_utype" class="form-control">
					<option value="">Semua Jenis</option>
					<option value="plain">Plain</option>
					<option value="angka">Angka</option>
					<option value="tanggal">Tanggal</option>
					<option value="waktu">Waktu</option>
					<option value="tata_bahasa">Tata Bahasa</option>
					<option value="kata_ungkapan">Kata Ungkapan</option>
				</select>
			</div>
			<div class="col-md-2">
				<a id="filter_do" href="#" class="btn btn-info btn-block">Filter</a>
			</div>
		</div>
		<div class="table-responsive">
			<table id="drTable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th>Jenis</th>
						<th>Judul</th>
						<th>Isi</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		
	</div>
	<!-- END Content -->
</div>	
