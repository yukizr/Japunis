
<div id="page-content">
	<!-- Static Layout Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="gi gi-show_big_thumbnails"></i>
				Detail Siswa<br>
				<small>Detail untuk data siswa dan quiznya</small>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Admin</li>
		<li>Akun</li>
		<li>Siswa</li>
		<li>Detail</li>
	</ul>
	<!-- END Static Layout Header -->
	
	<!-- Content -->
	<div class="block full">
		
		<div class="block-title">
			<h2><strong>Data Siswa</strong></h2>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th>Nama</th>
						<th>:</th>
						<td><?=$siswa->fnama?></td>
					</tr>
					<tr>
						<th>Kelas</th>
						<th>:</th>
						<td><?=$siswa->kelas?></td>
					</tr>
					<tr>
						<th>Email</th>
						<th>:</th>
						<td><?=$siswa->email?></td>
					</tr>
				</table>
			</div>
		</div>
		
	</div>
	
	<div class="block full">
		
		<div class="block-title">
			<h2><strong>Quiz</strong></h2>
		</div>
		
		<div class="table-responsive">
			<table id="drTable" class="table table-vcenter table-condensed table-bordered">
				<thead>
					<tr>
						<th class="text-center">Pelajaran</th>
						<th class="text-center">Waktu Quiz</th>
						<th>Nilai</th>
						<th>Jawaban Benar</th>
						<th>Jawaban Salah</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		
	</div>
	<!-- END Content -->
</div>	
