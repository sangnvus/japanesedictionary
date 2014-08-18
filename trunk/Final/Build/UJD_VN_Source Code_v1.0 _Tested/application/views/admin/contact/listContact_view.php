<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact List</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />	 
	<link href="<?php echo base_url();?>public/css/admin/paging.css" rel="stylesheet" type="text/css" />	 
</head>
<body>
	<!--header-->
	<?php $this->load->view("admin/header_view");?>
	<!-- end-header-->
	<div id="content">
	<!-- top menu-->
	<?php $this->load->view("admin/topmenu_view");?>
	<!--end top-menu-->
	<div id="giua">
		<?php $this->load->view("admin/leftcontent_view");?>
		<div id="main-content-vocab">
			<div id="box-search">
			<div id="boxsearch">
				<form action="<?php echo site_url('/admin/contact/getContactByContactType') ?>" method="GET">				
				Type: <select name="txtType">
						<option value="Q&A">Q&A</option>
						<option value="Opinion">Opinion</option>
					  </select>
				<input type="submit" name="search" value="Search"> 
				</form>

			</div>
			<?php echo '<a href="'.base_url().'index.php/admin/contact/listReplyContact"><input name="listgrammar" type="submit" value="List Reply Contact"></a>'; ?>
			</div>
			<div id="table-user">
			<center><h2>Contact List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if($num_rows>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows;
	                    }
	                  ?>
	            </div>
	        <?php if ($contact !== null) {?>
			<table border="1" cellpadding="10" width="100%" id="table-substring">
				<tbody><tr>
				<th>No.</th>
				<th>Email</th>
				<th>Content</th>
				<th>Type</th>
				<th>Status</th>
				<th>Action</th>
				</tr>
				<?php if(isset($num_rows) && $num_rows > 0){ ?>	
				<?php $stt = 1;
				foreach ($contact as $contact) { ?>
				<tr>
				<td style="text-align:center"><?php echo $stt++; ?></td>
				<td><?php echo $contact['contact_email']; ?></td>
				<td><p><?php echo nl2br($contact['contact_content']); ?></p></td>
				<td><?php echo $contact['contact_type']; ?></td>
				<?php 
					if ($contact['contact_status'] == 1) {
						echo "<td>Unanswered</td>";
					} else {
						echo "<td>Answered</td>";
					}
				 ?>
				<td><?php echo '<a href="'.base_url().'index.php/admin/contact/replyContact/'.$contact['contact_id'].'" >Reply</a>'; ?> | 
				<?php echo '<a href="'.base_url().'index.php/admin/contact/deleteContact/'.$contact['contact_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "<div style="."float:left;width:70%".">No record !</div>";
			 ?>
			</div>
			
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>