<?php
    //--- Giu gia tri cua form
	$c_id = array(
                        'name'        => 'c_id',
                        'id'          => 'c_id',
                        'size'        => '32',
                        'value'       => set_value('c_id'),
                    );
    $c_title = array(
                        'name'        => 'c_title',
                        'id'          => 'c_title',
                        'size'        => '32',
                        'value'       => set_value('c_title'),
                    );
    $c_image = array(
    					'name'        => 'c_image',
                        'id'          => 'c_image',
                        'size'        => '32',
                        'value'       => set_value('c_image'),
    				)              
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
		<h2>Add Conversation</h2>
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
			<form name="addConversation" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        		        
		        <table  border="0" cellpadding="10" id="table1">
                <tr align="left">
                    <td width="40%">C_id: </td>
                    <td width="50%"><?php echo form_input($c_id);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Level:</td>
                    <td width="50%">
                        <select name="c_level">                         
                           <option value=""></option>
                           <option value="SC">SC</option>
                           <option value="TC1">TC1</option>
                           <option value="TC2">TC2</option>
                           <option value="Communication">Communication</option>
                        </select></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">C_title: </td>
                    <td width="50%"><?php echo form_input($c_title);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">C_image: </td>
                    <td width="50%"><?php echo form_input($c_image);?></td>
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