<div class="row">
	<div class="large-4 columns">
		<div class="card-product">
			<h4>Profil</h4>
			<table style="width: 100%;">
				<tr>
					<tr>
						<th>Nama</th>
						<td>:</td>
						<td><?=$sess->user->fnama?></td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:</td>
						<td><?=$sess->user->email?></td>
					</tr>
					<tr>
						<th>Kelas</th>
						<td>:</td>
						<td><?=$sess->user->kelas?></td>
					</tr>
				</tr>
			</table>
			<div class="button-group">
				<a href="<?php echo base_url('/')?>" class="button expand secondary">Beranda</a>
				<a href="<?php echo base_url('profil/edit/'); ?>" class="button expand">Edit Profil</a>
				<a href="<?php echo base_url('profil/edit_password/'); ?>" class="button alert expand">Ganti Password</a>
			</div>
		</div>
	</div>
	<div class="large-8 columns">
		<div class="card-product">
			<h4>History Quiz</h4>
			<table class="responsive" width="100%">
				<thead>
					<tr>
						<th>Quiz</th>
						<th>Tgl</th>
						<th>Nilai</th>
						<th>Jawaban Benar</th>
						<th>Jawaban Salah</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($hasil)){ foreach($hasil as $h){ ?>
					<tr>
						<td><a href="<?php echo base_url('pelajaran/detail/'.$h->d_learnpelajaran_id); ?>"><?=$h->pelajaran?></a></td>
						<td><?=date("d F Y H:i",strtotime($h->cdate))?></td>
						<td><?=$h->nilai_angka?></td>
						<td><?=$h->jawaban_benar?></td>
						<td><?=$h->jawaban_salah?></td>
					</tr>
					<?php } }else{ ?>
					<tr>
						<td colspan="5">Belum pernah mengikuti Quiz</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>