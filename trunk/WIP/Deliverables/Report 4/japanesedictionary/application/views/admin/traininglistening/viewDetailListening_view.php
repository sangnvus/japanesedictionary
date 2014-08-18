<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Detail Listening Page</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
        <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
<script type="text/javascript"> 
function showdetail(id) {
		$('.test-' + id).slideToggle();
	} 
</script> 	 
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
				<h2 align="center">View Detail Listening</h2>
			</div>
			<div id="table-user">
				<?php foreach ($listen as $listen) {?>	
						<h3>Title :&nbsp<?php echo $listen['lis_title']; ?></h3>
						<?php 
							if (isset($detailSource) && $detailSource !==null) {
								foreach ($detailSource as $row) {					
						 ?>
							<div align="left" style="color:red; margin-left:30px;font-size:16px;"><i><h4 style="font-weight: normal;">Tình huống :
							<audio controls><source src="<?php echo base_url();?>public/audio/<?php echo $row->sourcefile_file;?>" type="audio/mpeg"></audio></h4></i></div>
							<div align="left"><h5 style="margin-left:80px;"><?php echo nl2br($row->sourcefile_question)?></h5></div>
							<a href="javascript:void(0)" class="an_hien" onclick="showdetail('<?php echo $row->sourcefile_id; ?>')"><i><p align="left" style="color:blue; margin-left:40px;font-size:14px;">Dịch&Đáp án</p></i></a>
							<div class="test-<?php echo $row->sourcefile_id;?>" align="left" style="display: none;margin-left:40px;" >
							<h5 style="margin-left:80px;"><?php echo nl2br($row->sourcefile_script);?></h5>
							<h5 style="margin-left:80px;"><?php echo nl2br($row->sourcefile_meaning);?></h5>
							<h5 style="margin-left:80px;color:red;">Đáp án đúng: &nbsp;&nbsp;<?php echo nl2br($row->sourcefile_answer);?></h5>
							</div>

							<?php echo '<a href="'.base_url().'index.php/admin/traininglistening/editSourcefile/'.$row->sourcefile_id.'/'.$row->lis_id.'" ><input type="submit" name="Edit" value="Edit"></a>'; ?>&nbsp<?php echo '<a href="'.base_url().'index.php/admin/traininglistening/deleteSourcefile/'.$row->sourcefile_id.'/'.$row->lis_id.'" ><input type="submit" name="Edit" value="Delete"></a>'; ?></h4></i><br>
							~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						<?php }?>
						<?php } else {?>
							<font style="color:red; font-size:20px;">No records!</font>
						<?php } ?>
						<?php }?>
						<br>
						<?php echo '<a href="'.base_url().'index.php/admin/traininglistening/addSourcefile/'.$listen['lis_id'].'" ><input type="submit" name="Add" value="Add New Sourcefile"></a>'; ?>
			</div>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>