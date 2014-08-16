<?php
    //--- Giu gia tri cua form
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
	<title>Add Conversation Page</title>
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
		                if(isset($error) && $error!="" && !empty($error))
		                    echo $error;
		            ?>
		        </ul>
		    </div>
			<?php echo form_open_multipart('admin/conversation/addConversation');?>
		        <table  border="0" cellpadding="10" id="table1" width="90%">
                <tr align="left">
                    <td style="width:20%;">Title: </td>
                    <td style="width:60%;"><?php echo form_input($c_title);?></td>
                    <td style="width:10%;"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr>
                    <td>Level:</td>
                    <td>
                        <select name="c_level">                         
                           <option value=""></option>
                           <option value="Sơ cấp">Sơ cấp</option>
                           <option value="Trung cấp 1">Trung cấp 1</option>
                           <option value="Trung cấp 2">Trung cấp 2</option>
                           <option value="Giao tiếp">Giao tiếp</option>                        
                        </select></td>
                    <td><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                
                <tr>
                    <td>Image: </td>                    
                    <td>
                    <?php if(isset($error_file) && !is_null($error_file)){
                        echo "<font width='1%' style='color:#FF0066;'>".$error_file."</font><br>";
                    }else{ echo "No image";
                    }
                    ?><input type="file" name="userfile" id="file"></td>  
                    <td></td>                  
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