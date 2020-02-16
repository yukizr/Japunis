<!--//contain row after container//-->
  <div class="row">
		<!--//container main //-->
    <div class="large-12 columns">
      <h2 class="ttfos">Pelajaran</h2>
		  <hr />
		</div>

			<!--//content//-->

      <div class="small-12 medium-12 large-12 columns">
        <?php if (is_array($pelajaran)) {
          foreach($pelajaran as $h){
         ?>
        <?php echo $h->mapel; ?><br/>
        <?php echo $h->judul; ?><br/>
        <img src="<?php echo base_url("assets/img/pelajaran/".$h->gambar); ?>" /><br/>
        <?php echo $h->dialog_1; ?><br/>
        <?php echo $h->dialog_2; ?><br/>
        <?php }} ?>
      </div>

    </div>
<!--//contain row after container//-->
