<?php
    //--- Giu gia tri cua form
	$vi_id = array(
                        'name'        => 'vi_id',
                        'id'          => 'vi_id',
                        'size'        => '32',
                        'value'       => $info['vi_id'],
                        'type'    => 'hidden'

                    );
	$vi_title = array(
                        'name'        => 'vi_title',
                        'id'          => 'vi_title',
                        'cols' 		  => '25',
                        'rows'		  => '5',
                        'value'       => $info['vi_title'],
                    );
	$vi_link = array(
                        'name'        => 'vi_link',
                        'id'          => 'vi_link',
                        'cols' 		  => '25',
                        'rows'		  => '5',
                        'value'       => $info['vi_link'],
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
		<h2>Edit Video</h2>
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
			<table>
				<tr><td><label></label></td>
				<td><?php echo form_input($vi_id);?></td></tr>
				<tr><td><label>Title: </label></td>
				<td><?php echo form_textarea($vi_title);?><font width="1%" style="color:red;">(*)</font></td></tr>
				<tr><td><label>Link: </label></td><td><?php echo form_textarea($vi_link);?><font width="1%" style="color:red;">(*)</font></td></tr>
				<tr><td><label>&nbsp;</label></td><td><input type="submit" name="ok" value="Edit" /></td></tr>
			</table>		        
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