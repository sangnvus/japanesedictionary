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
			</div>
			</div>
			<div id="table-user">
			<center><h2>Contact Reply List</h2></center>
				<div id="paging" class="pagination">
	                  <?php
	                    if(isset($num_rows_reply) && $num_rows_reply>0){
	                        echo $links;
	                        echo " | Total record : ".$num_rows_reply;
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
				<th>Reply</th>
				<th>Delete</th>
				</tr>
				<?php if($num_rows_reply > 0){ ?>	
				<?php $stt = 1;
				foreach ($contact as $contact) { ?>
				<tr>
				<td><?php echo $stt++; ?></td>
				<td><?php echo $contact['contact_email']; ?></td>
				<td><?php echo $contact['contact_content']; ?></td>
				<td><?php echo $contact['contact_type']; ?></td>
				<?php 
					if ($contact['contact_status'] == 1) {
						echo "<td>Unanswered</td>";
					} else {
						echo "<td>Answered</td>";
					}
				 ?>				
				<td><?php echo $contact['contact_reply']; ?></td>
				<td><?php echo '<a href="'.base_url().'index.php/admin/contact/deleteReplyContact/'.$contact['contact_id'].'" >Delete</a>'; ?></td>
				</tr>
				<?php 
				}
				} ?>				
			</tbody></table>
			<?php }else
				echo "<div style="."float:left;width:70%".">No record !</div>";
			 ?>
			</div>
			<?php echo '<a href="'.base_url().'index.php/admin/contact/index"><input name="listgrammar" type="submit" value="List  Contact"></a>'; ?>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>