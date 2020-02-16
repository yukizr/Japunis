<div class="row">

	<div class="large-offset-3 large-6 medium-offset-3 medium-6 small-12 columns">

		<div class="card-product">

			<div class="text-center">

				<h2 style="font-weight:800;">Hasil Kuis</h2>

			</div>

			<table style="width: 100%;">

				<tr>

					<tr>

						<th>Nama</th>

						<td>:</td>

						<td><?=$sess->user->fnama?></td>

					</tr>

					<!-- <tr>

						<th>Email</th>

						<td>:</td>

						<td><?=$sess->user->email?></td>

					</tr> -->

					<!--<tr>

						<th>Kelas</th>

						<td>:</td>

						<td><?=$sess->user->kelas?></td>

					</tr>-->

					<tr>

						<th>Kuis</th>

						<td>:</td>

						<td><?=$hasil->pelajaran?></td>

					</tr>

					<tr>

						<th colspan="3" class="text-center">Nilai <br/><h1><?php echo $hasil->nilai_angka; ?></h1></th>

					</tr>

					<tr>

						<td class="text-center" width="50%">Benar</td>

						<td>&nbsp;</td>

						<td class="text-center" width="50%">Salah</td>

					</tr>

					<tr>

						<td class="text-center"><h2><?php echo $hasil->jawaban_benar; ?></h2></td>

						<td>&nbsp;</td>

						<td class="text-center"><h2><?php echo $hasil->jawaban_salah; ?></h2></td>

					</tr>

				</tr>

			</table>

			<div class="button-group">

				<a href="<?php echo base_url('pelajaran')?>" class="button  expand warning secondary">Pelajaran Selanjutnya</a>

				<a href="<?php echo base_url('pelajaran/quiz/'.$pelajaran_id); ?>" class="button alert expand">Coba Lagi</a>

			</div>

		</div>

	</div>

</div>