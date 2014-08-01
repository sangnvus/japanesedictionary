<?php
    //--- Giu gia tri cua form
	$lis_title = array(
                        'name'        => 'lis_title',
                        'id'          => 'lis_title',
                        'size'        => '32',
                        'value'       => set_value('lis_title'),
                    );
	$lis_level = array(
                        'name'        => 'lis_level',
                        'id'          => 'lis_level',
                        'size'        => '32',
                        'value'       => set_value('lis_level'),
                    );             
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Page</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />
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
		<div id="main-content">
		<div id="title">
		<h2>Add Traininglistening</h2>
		</div>
		<div id="table-vocabulary">
		<center>
			<div class="error">
		        <ul>
		            <?php
		                echo validation_errors('<li>','</li>');
		                if($error!="" && !empty($error))
		                    echo $error;
		            ?>
		        </ul>
		    </div>
			<form name="addTraininglistening" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">
		        <label>Title: </label><?php echo form_input($lis_title);?><font width="1%" style="color:red;">(*)</font><br/><br />		
		        <label>Level: </label><?php echo form_input($lis_level);?><font width="1%" style="color:red;">(*)</font><br/><br />
		        <label>&nbsp;</label> <input type="submit" name="ok" value="Add" /><br />
		    </form>
			</center>
		</div>
		</div>
	</div>
	<div style="clear:both"></div>
	</div>
	<div style="clear:both"></div>
	<div id="footer">Copyright © FPT University</div>
</body>
</html>