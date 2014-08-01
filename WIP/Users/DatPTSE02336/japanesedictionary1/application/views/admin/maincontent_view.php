<div id="main-content">
		<div id="box-search">
			<div><form action="<?php echo site_url('/admin/home/getUserByUsername') ?>" method="GET">
				Username: <input name="txtUsername" value="<?php if(isset($txtUsername)){ echo $txtUsername;} ?>"> 
				Email: <input name="txtEmail" value="<?php if(isset($txtEmail)){ echo $txtEmail;} ?>">
				<input type="submit" name="submit" value="Search"> 
			</form></div>		
		</div>
		<div id="table-user">
			<center><h2>List User</h2></center>
			<div id="paging" class="pagination">
                  <?php
                    if($num_rows>0){
                        echo $links;
                        echo " | Total member : ".$num_rows;
                    }
                  ?>
                  </div>						
			<?php if ($users !== null) {?>
			<table border="1">
				<tr>
				<th>User ID</th>
				<th>User Name</th>
				<th>Email</th>				
				<th>Role</th>
				<th>Ban/Unban</th>
				<th>Status</th>
				<th>Delete</th>				
				</tr>		
				<?php if($num_rows > 0){ ?>	
				<?php foreach ($users as $user) { ?>								
				<tr>
					<td><?php echo $user['u_id']; ?></td>
					<td><?php echo $user['u_username']; ?></td>
					<td><?php echo $user['u_email']; ?></td>
					<td><?php echo $user['u_role']; ?></td>
					<?php if ($user['u_status']==1) {?>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/banUser/'.$user['u_id'].'" >Ban</a>'; ?></td>
					<?php }else if ($user['u_status']==0) {?>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/unbanUser/'.$user['u_id'].'" >UnBan</a>'; ?></td>
					<?php } ?>
					<td><?php echo $user['u_status']; ?></td>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/deleteUser/'.$user['u_id'].'" >Delete</a>'; ?></td>					
				</tr>	
				<?php 
				}
				} ?>
			</table><br>
			<?php }else
				echo "No record !";
			 ?>						
		</div>
	</div>