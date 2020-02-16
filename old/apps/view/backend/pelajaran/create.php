<!--//contain row after container//-->

<div class="row">
	<div class="large-6 columns">
		<h2 class="ttfos"><small>Tambah</small> Mata Pelajaran</h2>
	</div>
	<div class="large-6 columns left">
		<br>
		<div class="right ttfos">
			<ul class="stack-for-small  secondary button-group right">
				<li><a href="<?php echo base_url("admin/pelajaran/"); ?>" class="button secondary tiny">Kembali</a></li>
		</div>
	</div>
	<hr>
</div>

<div class="row">
  <div class="small-12 medium-12 large-12 columns">
    <!-- <h2>Tambah Grup Jenis</h2> -->

    <form id="fpelajaran" name="fpelajaran" action="<?php echo base_url("admin/pelajaran/input"); ?>"  method="post" enctype="multipart/form-data">
      <label>Mata Pelajaran</label><input id="mapel" name="mapel"  placeholder="Pelajaran 1" type="text" required="required" /><br />
      <label>Judul</label><input id="judul" name="judul"  placeholder="Hajimemashite" type="text" required="required" /><br />
      <label>Gambar</label><input type=file name="gambar" size=25 ><br />
			<label>Dialog 1</label><textarea id="dialog_1" name="dialog_1" required="required" style="height:100%;"></textarea><br />
			<label>Dialog 2</label><textarea id="dialog_2" name="dialog_2" required="required" style="height:100%;"></textarea><br />
      <input name="submit" type="submit" class="button expand" value="Input"></input>
    </form>
  </div>
</div>
<div class="row"><div class="large-12 columns">&nbsp;</div></div>
<!--//contain row after container//-->
