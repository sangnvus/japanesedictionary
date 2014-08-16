<?php
    //--- Giu gia tri cua form
    $test_title = array(
                        'name'        => 'test_title',
                        'id'          => 'test_title',
                        'size'        => '32',
                        'value'       => set_value('test_title'),
                    );
                             
    $test_category = array(
                        'name'        => 'test_category',
                        'id'          => 'test_category',
                        'size'        => '32',
                        'value'       => set_value('test_category'),
                    );
    $test_level = array(
                        'name'        => 'test_level',
                        'id'          => 'test_level',
                        'size'        => '32',
                        'value'       => set_value('test_level'),
                    );
    // $test_content = array(
    //                     'name'        => 'test_content',
    //                     'id'          => 'test_content',
    //                     'cols'        => '25',
    //                     'rows'		=> '8',
    //                     'value'       => set_value('test_content'),
    //                 );                 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add New Test</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />		
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
	<script type="text/javascript">
	function changeContent(){
		var x = document.getElementById("test_category").selectedIndex;
		var option = document.getElementsByTagName("option")[x].value;
		var newHTML = "<input type='file' name='userfile' id='file'>";
		var oldHTML = "<textarea name='test_content' id='test_content' cols='25' rows='8'></textarea>";
		if (option === "Listening") {
			document.getElementById("td-content-file").innerHTML = newHTML;			
		}else{
			document.getElementById("td-content-file").innerHTML = oldHTML;
		};
	}
	</script>
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
				<h2>Add New Test</h2>
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
			<?php echo form_open_multipart('admin/test/addTest');?>
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td width="40%">Title:</td>
					<td width="50%"><?php echo form_input($test_title);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Category:</td>
					<td width="50%">
						<select name="test_category" id="test_category" onchange="changeContent()">
							<option value=""></option>	
                    		<option value="Reading">Reading</option>
                    		<option value="Listening">Listening</option>
                    		<option value="Vocabulary">Vocabulary</option>
                    		<option value="Grammar">Grammar</option>
                    	</select>
					</td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Level</td>
					<td width="50%">
						<select name="test_level">
							<option value=""></option>
		        			<option value="N2">N2</option>
		        			<option value="N3">N3</option>
		        			<option value="N4">N4</option>
                    	</select>
                    </td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Content :</td>
					<td width="50%" id="td-content-file">
						<textarea name="test_content" id="test_content" cols="25" rows="8"></textarea>
					</td>
					<td width="10%"></td>
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