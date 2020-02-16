<?php
	if(!isset($this->current_page)) $this->current_page = "";
	if(!isset($this->current_parent)) $this->current_parent = "";
	$current_page = $this->current_page;
	$current_parent = $this->current_parent;
	$parent = array();
	foreach($sess->admin->menus->left as $key=>$v){
		$parent[$v->identifier] = 0;
		if(count($v->childs)>0){
			foreach($v->childs as $f){
				if($current_page==$f->identifier){
					$current_page = $v->identifier;
					$parent[$v->identifier] = 1;
				}
			}
		}
	}
	$admin_foto = '';
	if(isset($sess->admin->foto))$admin_foto = $sess->admin->foto;
	if(empty($admin_foto)) $admin_foto = 'media/pengguna/default.png';
	$admin_foto = base_url($admin_foto);
?>
<div id="sidebar">
	<!-- Wrapper for scrolling functionality -->
	<div id="sidebar-scroll">
		<!-- Sidebar Content -->
		<div class="sidebar-content">
			<!-- Brand -->
			<a href="<?php echo base_url_admin(); ?>" class="sidebar-brand">
				<img src="<?php echo $this->skins->admin; ?>img/logo.jpg" style="width: 75%;" />
			</a>
			<!-- END Brand -->

			<!-- User Info -->
			<div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
				<div class="sidebar-user-avatar">
					<a href="<?php echo base_url_admin('profil/'); ?>">
						<img src="<?=$admin_foto?>" alt="avatar" />
					</a>
				</div>
				<div class="sidebar-user-name"><?php echo $sess->admin->username; ?></div>
				<div class="sidebar-user-links">
					<a href="<?php echo base_url_admin('profil/'); ?>" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
					<a href="<?php echo base_url_admin("logout"); ?>" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
				</div>
			</div>
			<!-- END User Info -->

			<!-- Sidebar Navigation -->
			<ul class="sidebar-nav">
				<?php foreach($sess->admin->menus->left as $key=>$v){ ?>
					<?php if(count($v->childs)>0){ ?>
						<li class="<?php if($parent[$v->identifier]==1) echo 'active'; ?>">
							<a href="#" class="sidebar-nav-menu ">
								<i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
								<i class="<?php echo $v->fa_icon; ?> sidebar-nav-icon"></i>
								<span class="sidebar-nav-mini-hide"><?php echo $v->name; ?></span>
							</a>
							<ul class="">
							<?php foreach($v->childs as $f){ ?>
								<?php if($f->utype=="external"){ ?>
								<li>
									<a href="<?php echo $f->path; ?>" class="<?php if($this->current_page==$f->identifier) echo 'active'; ?>">
										<?php echo $f->name; ?>
									</a>
								</li>
								<?php } else { ?>
								<li >
									<a href="<?php echo base_url_admin($f->path); ?>" class="<?php if($this->current_page==$f->identifier) echo 'active'; ?>">
										<?php echo $f->name; ?>
									</a>
								</li>
								<?php } ?>
							<?php } ?>
							</ul>
						</li>
					<?php }else{ ?>
					<li class="<?php if($current_page==$key) echo 'active'; ?>"><a href="<?php echo base_url_admin($v->path); ?>" class="<?php if($current_page==$key) echo 'active'; ?>"><i class="<?php echo $v->fa_icon; ?>"></i> <span><?php echo $v->name; ?></span></a></li>
					<?php } ?>
				<?php } ?>
			</ul>
			<!-- END Sidebar Navigation -->
		</div>
		<!-- END Sidebar Content -->
	</div>
	<!-- END Wrapper for scrolling functionality -->
</div>
