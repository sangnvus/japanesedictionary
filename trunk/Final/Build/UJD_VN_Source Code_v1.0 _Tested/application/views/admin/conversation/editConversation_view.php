<?php
    //--- Giu gia tri cua form
	$c_id = array(
                        'name'        => 'c_id',
                        'id'          => 'c_id',
                        'size'        => '32',
                        'value'       => $info['c_id'],
                        'type'        => 'hidden'
                    );
	$c_level = array(
                        'name'        => 'c_level',
                        'id'          => 'c_level',
                        'size'        => '32',
                        'value'       => $info['c_level']
                    ); 
    $c_title = array(
                        'name'        => 'c_title',
                        'id'          => 'c_title',
                        'size'        => '32',
                        'value'       => $info['c_title']
                    );
    if(isset($info['c_image']) && $info['c_image'] !== "") {
    $c_image = array(
                        'name'        => 'c_image',
                        'id'          => 'c_image',
                        'size'        => '32',
                        'value'       => $info['c_image'],
                        'type'        => 'hidden'
                    );
    }
    else {
    $c_image = array(
                        'name'        => 'c_image',
                        'id'          => 'c_image',
                        'size'        => '32',
                        'value'       => set_value('c_image'),
                    );
    }                                                                             
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Conversation Page</title>
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
		<h2>Edit Conversation</h2>
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
			<!-- <form name="addConversation" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">							 -->
            <?php echo form_open_multipart('admin/conversation/editConversation');?>
			<table  border="0" cellpadding="10" id="table1">
                <tr align="left">
                    <td style="width:10%"></td>
                    <td style="width:60%"><?php echo form_input($c_id);?></td>
                </tr>
                <tr align="left">
                    <td width="20%">Title: </td>
                    <td width="60%"><?php echo form_input($c_title);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <?php if($info['c_level'] == 'Sơ cấp') { ?> 
                <tr align="left">
                    <td width="20%">Level:</td>
                    <td width="60%">
                        <select name="c_level">                         
                            <option value="<?php echo $info['c_level'];?>">Sơ cấp</option>
                            <option value="Trung cấp 1">Trung cấp 1</option>
                            <option value="Trung cấp 2">Trung cấp 2</option>
                            <option value="Giao tiếp">Giao tiếp</option>                            
                        </select></td>    
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <?php } else {?>
                <?php if($info['c_level'] == 'Trung cấp 1') { ?> 
                <tr align="left">
                    <td width="20%">Level:</td>
                    <td width="60%">
                        <select name="c_level">                         
                            <option value="<?php echo $info['c_level'];?>">Trung cấp 1</option>
                            <option value="Sơ cấp">Sơ Cấp</option>
                            <option value="Trung cấp 2">Trung cấp 2</option>
                            <option value="Giao tiếp">Giao tiếp</option>                            
                        </select></td>    
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <?php } else {?>
                <?php if($info['c_level'] == 'Trung cấp 2') { ?> 
                <tr align="left">
                    <td width="20%">Level:</td>
                    <td width="60%">
                        <select name="c_level">                         
                            <option value="<?php echo $info['c_level'];?>">Trung cấp 2</option>
                            <option value="Sơ cấp">Sơ Cấp</option>
                            <option value="Trung cấp 1">Trung cấp 1</option>
                            <option value="Giao tiếp">Giao tiếp</option>                            
                        </select></td>    
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <?php } else {?>
                <?php if($info['c_level'] == 'Giao tiếp') { ?> 
                <tr align="left">
                    <td width="20%">Level:</td>
                    <td width="60%">
                        <select name="c_level">                         
                            <option value="<?php echo $info['c_level'];?>">Giao tiếp</option>
                            <option value="Sơ cấp">Sơ Cấp</option>
                            <option value="Trung cấp 1">Trung cấp 1</option>
                            <option value="Trung cấp 2">Trung cấp 2</option>                           
                        </select></td>    
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <?php } } } } ?>
                <tr align="left">
                    <td width="20%">Image: </td>
                    <?php if(isset($info['c_image']) && $info['c_image'] !=="") { ?>
                    <td width="60%"><img src="<?php echo base_url();?>public/image/<?php echo $info['c_image'];?>" width="150" height="100"><br>
                    <?php if(isset($error_file) && !is_null($error_file)){
                        echo "<font width='1%' style='color:red;'>".$error_file."</font><br>";
                    }                    
                    ?>
                    <input type="file" name="userfile" id="file"><br><?php echo form_input($c_image);?></td>
                    <?php }else{ ?>
                    <td>
                    <?php if(isset($error_file) && !is_null($error_file)){
                        echo "<font width='1%' style='color:red;'>".$error_file."</font><br>";
                    } ?>
                    No image<br><input type="file" name="userfile" id="file"></td>
                    <?php } ?>

                </tr>
                <tr>
                    <td></td>   
                    <td><input type="submit" name="ok" value="Edit" /></td>
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