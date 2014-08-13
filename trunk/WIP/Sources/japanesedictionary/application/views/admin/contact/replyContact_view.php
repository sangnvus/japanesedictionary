<?php
    //--- Giu gia tri cua form
	$contact_id = array(
                        'name'        => 'contact_id',
                        'id'          => 'contacct_id',
                        'size'        => '32',
                        'value'       => $info['contact_id'],
                        'readonly'    => 'readonly',
                        'type'     => 'hidden'
                    );
	$contact_email = array(
                        'name'        => 'contact_email',
                        'id'          => 'contact_email',
                        'size'        => '32',
                        'value'       => $info['contact_email'],
                        'readonly'    => 'readonly'
                    );
	$contact_content = array(
                        'name'        => 'contact_content',
                        'id'          => 'contact_content',
                        'cols'		  =>'25',
                        'rows'        =>'8',
                        'value'       => $info['contact_content'],
                        'readonly'    => 'readonly'
                    );   
    $contact_reply = array(
                        'name'        => 'contact_reply',
                        'id'          => 'contact_reply',
                        'cols'		  =>'25',
                        'rows'        =>'8',
                        'value'       => set_value('contact_reply'),                                       
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
		<h1 style="color:blue;">Reply Contact</h1>
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
		<form name="replyContact" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">
					<label></label><?php echo form_input($contact_id);?><br />
					<label><b>Email: </b></label><?php echo form_input($contact_email);?><br><br />
					<label><b>Content:</b></label><?php echo form_textarea($contact_content);?><br><br />
					<label><b>Reply:</b></label><?php echo form_textarea($contact_reply);?><font width="1%" style="color:red;">(*)</font><br>
					<input type="submit" name="ok" value="Reply" /><br>		            
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