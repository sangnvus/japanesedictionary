<?php
    //--- Giu gia tri cua form
if ($reading !== null) {
        foreach ($reading as $reading) { 
	$reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => $reading['reading_id'],
                        'readonly'    => 'readonly',
                        'type'        => 'hidden',
                     );
    } }
if ($article !== null) {
        foreach ($article as $info) { 
    $readingarticle_id = array(
                        'name'        => 'readingarticle_id',
                        'id'          => 'readingarticle_id',
                        'size'        => '32',
                        'value'       => $info['readingarticle_id'],
                        'readonly'    => 'readonly',
                        'type'        => 'hidden'
                    );
    $readingarticle_content = array(
                        'name'        => 'readingarticle_content',
                        'id'          => 'readingarticle_content',
                        'cols'        => '35',
                        'rows'        => '5',
                        'value'       => $info['readingarticle_content']
                    );
    $readingarticle_question = array(
                        'name'        => 'readingarticle_question',
                        'id'          => 'readingarticle_question',
                        'cols'        => '35',
                        'rows'        => '5',
                        'value'       => $info['readingarticle_question']
                    );
    $readingarticle_answer = array(
                        'name'        => 'readingarticle_answer',
                        'id'          => 'readingarticle_answer',
                        'cols'        => '35',
                        'rows'        => '5',
                        'value'       => $info['readingarticle_answer']
                    );
    $readingarticle_meaning = array(
                        'name'        => 'readingarticle_meaning',
                        'id'          => 'readingarticle_meaning',
                        'cols'        => '35',
                        'rows'        => '5',
                        'value'       => $info['readingarticle_meaning'],
                    ); 
    }
}
	                                                                              
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Edit Reading Article</title>
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
              <h2>Edit Reading Article</h2>
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
			<form name="editReading" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">    
                <table  border="0" cellpadding="10" id="table1" width="80%">
                <tr>
                    <td style="width:10%;">Content:</td>
                    <td style="width:75%;"><?php echo form_textarea($readingarticle_content);?></td>
                    <td style="width:10%;"><font width="1%" style="color:red;">(*)</font></td>
                    <td><?php echo form_input($reading_id);?></td>
                </tr>
                <tr>
                    <td width="40%">Question:</td>
                    <td width="50%"><?php echo form_textarea($readingarticle_question);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                    <td><?php echo form_input($readingarticle_id);?></td>
                </tr>
                <tr>
                    <td width="40%">Answer:</td>
                    <td width="50%"><?php echo form_textarea($readingarticle_answer);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                 <tr>
                    <td width="40%">Meaning:</td>
                    <td width="50%"><?php echo form_textarea($readingarticle_meaning);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
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