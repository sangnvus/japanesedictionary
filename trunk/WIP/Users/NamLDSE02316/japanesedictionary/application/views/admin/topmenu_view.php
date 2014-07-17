<div id="top-menu">
		<div id="top-menu-left">
		<ul>
			<li><a href="<?php echo base_url();?>index.php/admin/home">Home</a></li>	
		</ul>
		</div>
		<div id="top-menu-right">
			<ul>				
				<li><?php echo '<a href="'.base_url().'index.php/admin/home/editAdmin/'.$this->my_auth->u_id.'" >'.$this->my_auth->u_username.'</a>'; ?></li>
				<li><a href="<?php echo base_url();?>index.php/admin/verify/logout">Logout</a></li>
			</ul>
		</div>
	</div>