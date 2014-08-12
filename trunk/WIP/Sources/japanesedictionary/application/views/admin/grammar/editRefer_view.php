<?php
    //--- Giu gia tri cua form
if (isset($g_id)) {
	$g_id = array(
                        'name'        => 'g_id',
                        'id'          => 'g_id',
                        'size'        => '20',
                        'value'       => $g_id
                    );	
} else {
	$g_id = array(
                        'name'        => 'g_id',
                        'id'          => 'g_id',
                        'size'        => '20',
                        'value'       => $info['g_id'],
                    );
}
if (isset($s_id)) {
	$s_id = array(
                        'name'        => 's_id',
                        'id'          => 's_id',
                        'size'        => '20',
                        'value'       => $s_id
                    );              
} else {
	$s_id = array(
                        'name'        => 's_id',
                        'id'          => 's_id',
                        'size'        => '20',
                        'value'       => $info['s_id'],
                    );              
}       
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
		<h2>Edit Reference Sentence</h2>
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
			<form name="editRefer" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>g_id: </label><?php echo form_input($g_id);?><font width="1%" style="color:red;">(*)</font><br /><br />
		        <label>s_id: </label><?php echo form_input($s_id);?><font width="1%" style="color:red;">(*)</font><br /><br />		
		        <label>&nbsp;</label> <input type="submit" name="ok" value="Edit" /><br />
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