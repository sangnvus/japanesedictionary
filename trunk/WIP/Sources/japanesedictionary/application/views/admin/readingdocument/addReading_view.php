<?php
    //--- Giu gia tri cua form
	$type=$this->uri->segment(4);
	$reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => set_value('reading_id'),
                    );
	$reading_title = array(
                        'name'        => 'reading_title',
                        'id'          => 'reading_title',
                        'size'        => '32',
                        'value'       => set_value('reading_title'),
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
		<h2>Add Reading</h2>
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
			<form name="addReading" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        		        
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td width="40%">ID :</td>
					<td width="50%"><?php echo form_input($reading_id);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td width="40%">Title :</td>
					<td width="50%"><?php echo form_input($reading_title);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td width="40%">Level:</td>
					<td width="50%">
						<select name="reading_level">
							<option value=""></option>                    
                            <option value="N1">N1</option>
                            <option value="N2">N2</option>
                            <option value="N3">N3</option>
                            <option value="N4">N4</option>
                            <option value="N5">N5</option>
                        </select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="ok" value="Add" /></td>
					<td></td>
				</tr>
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