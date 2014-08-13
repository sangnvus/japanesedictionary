<?php
    //--- Giu gia tri cua form
	$lis_id = array(
                        'name'        => 'lis_id',
                        'id'          => 'lis_id',
                        'size'        => '32',
                        'value'       => $info['lis_id'],
                        'readonly'    => 'readonly',
                        'type'        => 'hidden'
                    );
    $lis_title = array(
                        'name'        => 'lis_title',
                        'id'          => 'lis_title',
                        'size'        => '32',
                        'value'       => $info['lis_title']
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
		<h2>Edit TrainingListening</h2>
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
					
                    <label>lis_title: </label><?php echo form_input($lis_title);?><font width="1%" style="color:red;">(*)</font><br /><br />		
			        <?php if($info['lis_level'] == 'N2N3') { ?>
                    <label>lis_level: </label>
                        <select name="lis_level">                         
                            <option value="<?php echo $info['lis_level'];?>"><?php echo $info['lis_level'];?></option>
                            <option value="N4N5">N4N5</option>
                        </select><font width="1%" style="color:red;">(*)</font><br /><br />
                    <?php } else { ?>
                    <label>lis_level: </label>
                        <select name="lis_level">                         
                            <option value="<?php echo $info['lis_level'];?>"><?php echo $info['lis_level'];?></option>
                            <option value="N2N3">N2N3</option>
                        </select><font width="1%" style="color:red;">(*)</font><br /><br />
                    <?php } ?>
			        <label>&nbsp;</label> <input type="submit" name="ok" value="Edit" /><br />
                    <?php echo form_input($lis_id);?>
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