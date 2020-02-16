<!--//contain row after container//-->
  <div class="row">
    <!--//container main //-->
    <div class="large-12 columns">
      <br/>
      <a href="#" class="small secondary radius button" style="float:left;" onclick="goBack()"><<</a>
      <h3 class="ttfos" style="padding-top:6px;">&nbsp;<?php echo $datalist->mapel; ?></h3>
      <!-- <hr /> -->
    </div>

      <!--//content//-->
        <?php //if (is_array($pelajaran)) {
          //foreach($pelajaran as $h){
         ?>
        <?php //echo $h->mapel; ?><br/>
        <?php //echo $h->judul; ?><br/>
        <img src="<?php //echo base_url("assets/img/pelajaran/".$h->gambar); ?>" /><br/>
        <?php //echo $h->dialog_1; ?><br/>
        <?php //echo $h->dialog_2; ?><br/>
        <?php //}} ?>
      <div class="large-12 columns">  
        <!-- <div class="card-product">
          <div class="card-product-img-wrapper">
            <a href="<?php //echo base_url("pelajaran") ?>"><img src="<?php echo base_url() ?>/assets/img/pelajaran/1.jpg"></a>
          </div>  
        </div> -->
        <h2 style="font-weight:800;text-align:center;"><?php echo $datalist->judul; ?></h2>
        <dl class="accordion" data-accordion="">
          <dd class="accordion-navigation">
            <a href="#panel1b">Dialog 1</a>
            <div id="panel1b" class="content">
              <img src="<?php echo base_url("assets/img/pelajaran/".$datalist->gambar); ?>" /><br/>
              <?php echo $datalist->dialog_1; ?>
            </div>
          </dd>
          <dd class="accordion-navigation">
            <a href="#panel2b">Tata Bahasa 1</a>
            <div id="panel2b" class="content">
              <?php echo $datalist->tatabahasa_1; ?>
            </div>
          </dd>
          <dd class="accordion-navigation">
            <a href="#panel3b">Dialog 2</a>
            <div id="panel3b" class="content">
              <?php echo $datalist->dialog_2; ?>
            </div>
          </dd>
          <dd class="accordion-navigation">
            <a href="#panel4b">Dialog 3</a>
            <div id="panel4b" class="content">
              <?php echo $datalist->dialog_3; ?>
            </div>
          </dd>
          <dd class="accordion-navigation">
            <a href="#panel5b">Tata Bahasa 2</a>
            <div id="panel5b" class="content">
              <?php echo $datalist->tatabahasa_2; ?>
            </div>
          </dd>
          <dd class="accordion-navigation">
            <a href="#panel6b">Kata & Ungkapan</a>
            <div id="panel6b" class="content">
              <?php echo $datalist->kata_ungkapan; ?>
            </div>
          </dd>
          <dd class="accordion-navigation">
            <a href="#panel7b">Kuis</a>
            <div id="panel7b" class="content">
              Lorem ipsum
            </div>
          </dd>
        </dl>
        <p>&nbsp;</p>  
      </div>  

  </div>
<!--//contain row after container//-->
