<div id="main-content">
		<div id="box-search">
			<div><form action="<?php echo site_url('/admin/home/getUserByUsername') ?>" method="GET">
				Username: <input name="txtUsername" maxlength="32" value="<?php if(isset($txtUsername)){ echo $txtUsername;} ?>"> 
				Email: <input name="txtEmail" maxlength="100" value="<?php if(isset($txtEmail)){ echo $txtEmail;} ?>">
				<input type="submit" name="submit" value="Search"> 
			</form></div>		
		</div>
		<div id="table-user">
			<center><h2>User List</h2></center>
			<div id="paging" class="pagination">
                  <?php
                    if($num_rows>0){
                        echo $links;
                        echo " | Total member : ".$num_rows;
                    }
                  ?>
                  </div>						
			<?php if ($users !== null) {?>
			<table border="1" width="100%" id="table-substring">
				<tr>
				<th>No.</th>
				<th>UserName</th>
				<th>Email</th>				
				<th>Role</th>
				<th>Ban/Unban</th>
				<th>Status</th>
				<th>Action</th>				
				</tr>		
				<?php if($num_rows > 0){ ?>	
				<?php $stt = 1;
				foreach ($users as $user) { ?>								
				<tr>
					<td style="text-align:center"><?php echo $stt++; ?></td>
					<td><?php echo $user['u_username']; ?></td>
					<td><?php echo $user['u_email']; ?></td>
					<?php 
						if ($user['u_role'] == 1) {
							echo "<td>Admin</td>";
						} else {
							echo "<td>Member</td>";
						}						
					 ?>
					<?php if ($user['u_status']==1) {?>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/banUser/'.$user['u_id'].'" >Ban</a>'; ?></td>
					<?php }else if ($user['u_status']==0) {?>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/unbanUser/'.$user['u_id'].'" >UnBan</a>'; ?></td>
					<?php } ?>
					<?php 
					 	if ($user['u_status'] == 1) {
							echo "<td>Active</td>";
						} else {
							echo "<td>Deactive</td>";
						}
					  ?>
					<td><?php echo '<a href="'.base_url().'index.php/admin/home/deleteUser/'.$user['u_id'].'" >Delete</a>'; ?></td>					
				</tr>	
				<?php 
				}
				} ?>
			</table><br>
			<?php }else
				echo "<div style="."float:left;width:70%".">No record !</div>";
			 ?>						
		</div>
	</div>