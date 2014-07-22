<?php
    //--- Giu gia tri cua form
	$vi_title = array(
                        'name'        => 'vi_title',
                        'id'          => 'vi_title',
                        'size'        => '32',
                        'value'       => set_value('vi_title'),
                    );
	$vi_link = array(
                        'name'        => 'vi_link',
                        'id'          => 'vi_link',
                        'size'        => '32',
                        'value'       => set_value('vi_link'),
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
		<h2>Add Video</h2>
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
			<form name="editVideo" id="editVideo" action="" method="post" enctype="multipart-formdata">		        		        		        
		        <label>vi_title: </label><?php echo form_input($vi_title);?><br />		
		        <label>vi_link: </label><?php echo form_input($vi_link);?><br />
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