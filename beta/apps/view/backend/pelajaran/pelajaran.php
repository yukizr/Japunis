<!--//contain row after container//-->
<div class="row">
	<!--//container main //-->
    <div class="large-12 columns">
		<!--//title//-->
		<div class="row">
			<div class="large-12 columns">
				<h2 class="ttfos">Pelajaran<small></small></h2>
				<hr />
			</div>
		</div>

		<!--//content//-->
		<div class="row">
			<!--paragraf 1-->


			<?php $spage = "admin/pelajaran/index";
				$spage= $spage."/".$orderby."/".$asc."/".$page;
			?>

			<div class="small-12 medium-6 large-4 columns">
				<form method="POST"  action="<?php echo base_url().$spage.""; ?>">
					<?php $dayum = base_url().$spage."";
					?>
					<div class="row collapse postfix-round">
						<div class="small-3 columns">
							<input style="height:3.3125rem;" type="submit" value="Cari" class="button postfix"></input>
						</div>

						<div class="small-9 columns">
							<input  style="text-align:right;height:3.3125rem;" type="text" placeholder="Mata Pelajaran/Judul" name="keyword" value="<?php
								if(!empty($keyword))echo"$keyword";
							?>"/>
						</div>

					</div>
				</form>
			</div>

			<?php

				$spage= "admin/pelajaran/index/1/".$orderby."/".$asc."/?keyword=".$keyword;
			?>

			<div class="small-12 medium-6 large-2 columns ">
				<a role="button" id="" href="<?php
				echo base_url('admin/pelajaran/');?>" class="button secondary expand">&nbsp; Reset Filter</a>
			</div>
			<!-- <div class="small-12 medium-6 large-2 columns ">
				<a role="button" id="" href="<?php echo base_url().$spage= $spage."/".$orderby."/".$asc."/".$page."/1";?>" class="button success  expand">&nbsp; Rollback Log</a>
				<?php $spage= $spage."/".$orderby."/".$asc."/".$page;?>
			</div> -->

			<div class="small-12 medium-12 large-2 columns right">
				<?php if(isset($sess['admin'])){ ?>
				<!-- <a id="aadd" href="#" class="button expand">Add New</a> -->
				<a id="aadd" href="<?php echo base_url("admin/pelajaran/create/"); ?>" class="button expand">Tambah</a>
				<?php }else{} ?>
			</div>

		</div>
		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
				<div id='div_pb_rollback'class="progress small-12 meter radius">
					<span id='pb_rollback' class="meter" style="width: 0%"></span>
				</div>
			</div>
		</div>



		<div class="row">
			<div class="small-12 medium-12 large-12 columns">
				<table id="tdata" width="100%">
					<thead>
						<tr>
							<?php

								$spage = "admin/pelajaran/index";
								$desc = 0;
								if(empty($asc)) $desc=1;
								$tpage = "".$desc."/".$page;
								$keyword="?keyword=".$keyword;
							?>
							<th width="50">
									No
							</th>
							<th>
								<a href="<?php echo base_url().$spage."/mapel/".$tpage."/".$keyword; ?>">
									Mata Pelajaran
								</a>
							</th>
							<th>
								<center>
								<a href="<?php echo base_url().$spage."/judul/".$tpage."/".$keyword; ?>">
									Judul
								</a>
								</center>
							</th>
							<th>
								<center>
									Gambar
								</center>
							</th>

							<th></th>
							<th width="50"></th>
							<?php if(isset($sess['admin'])){ ?>
							<th width="50"><center>Action</center></th>
							<?php }else{echo "<td width='50'></td>";} ?>
							<th width="50"></th>
							<th></th>
						</tr>
					</thead>
					<tbody >
						<?php if (is_array($pelajaran)){
							$i=0;
							foreach($pelajaran as $h){
								$i++;
							?>
							<tr>
								<td><?php echo"$i"; ?></td>
								<!-- <td><?php echo $h->id; ?></td> -->
								<td><?php echo $h->mapel; ?></td>
								<td><center><?php echo $h->judul; ?></center></td>
								<td style="width:25%;"><center><img src="<?php echo base_url("assets/img/pelajaran/".$h->gambar); ?>" /></center></td>

								<td></td>
								<td></td>
								<?php if(isset($sess['admin'])){ ?>
								<?php
								echo '<td><center>';
								?>
									<a id="aedit" href="<?php echo base_url("admin/pelajaran/edit/".$h->id); ?>"><i class="fi-pencil"></i></a>
									<a id="adelete" data-id="<?php echo $h->id; ?>" href="#"><i class="fi-x"></i></a>
									
								<?php
								echo '</center></td>';
								?>
								<?php }else{echo "<td></td>";} ?>
								<td></td>
								<td></td>
							</tr>
								<?php }} ?>
								<?php $jml_data = $row;?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2"><center><b>Jumlah data &nbsp; : &nbsp; <?php echo"$jml_data"; ?></b></center></td>
										<td></td>
										<td></td>
										<td></td>
										<td><center><a href="<?php echo base_url().$spage."/".$orderby."/".$asc."/"."1"; ?>">Awal</a></center></td>
										<td><center>
											<?php
												$jml=20;
												$jumpage = ceil($jml_data/$jml);
												$i=0;
												for($i=1;$i<=$jumpage;$i++){
													if($i==$page){
														echo"<b> $i </b>";
													}
													else{
													?>
													<a href="<?php echo base_url().$spage."/".$orderby."/".$asc."/"."$i"; ?>"><?php echo"$i"; ?></a>
													<?php
													}
												}
												?>
										</center></td>
										<td><center><a href="<?php echo base_url().$spage."/".$orderby."/".$asc."/".$jumpage; ?>">Akhir</a></center></td>
										<td></td>
									</tr>
								</tfoot>
						</table>



					</div>
				</div>

				<div class="row">&nbsp;</div>
			</div>
		</div>
		<!--//contain row after container//-->
