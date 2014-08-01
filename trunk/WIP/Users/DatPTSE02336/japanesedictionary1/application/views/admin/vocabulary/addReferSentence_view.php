<?php
    //--- Giu gia tri cua form
	$m_id = array(
                        'name'        => 'm_id',
                        'id'          => 'm_id',
                        'size'        => '20'
                    );
	$s_id = array(
                        'name'        => 's_id',
                        'id'          => 's_id',
                        'size'        => '20'                        
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
		<h2>Add Reference Sentence</h2>
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
			<form name="addRefer" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>m_id: </label><?php echo form_input($m_id);?><font width="1%" style="color:red;">(*)</font><br />
		        <label>s_id: </label><?php echo form_input($s_id);?><font width="1%" style="color:red;">(*)</font><br />		
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