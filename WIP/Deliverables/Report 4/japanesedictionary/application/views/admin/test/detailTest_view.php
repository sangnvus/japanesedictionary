<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Detail Test</title>
	<link href="<?php echo base_url();?>public/css/admin/style_homepage.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript">
		
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
				<h2>Detail Test</h2>
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
			<!-- <form action="" method="POST" enctype="multipart-formdata"> -->
						<?php if($detailTest !==null){ 
							foreach ($detailTest as $row) {					
							?>						
	                	<div><h1><?php echo $row->test_category; ?></h1></div>
		                <table border="1">
		                    <tbody><tr>
		                        <td width="100">Cấp độ</td>
		                        <td width="100"><?php echo $row->test_level; ?></td>
		                    </tr>
		                    <tr>
		                        <td>Thời gian</td>
		                        <td>10 phút</td>
		                    </tr>
		                    <tr>
		                        <td>Số câu</td>
		                        <td>5</td>
		                    </tr>
		                </tbody></table><br>
		                <?php 
		                	if ($row->test_category == "Listening") {?>
		                		<audio controls><source src="<?php echo base_url();?>public/audio/<?php echo $row->test_content;?>" type="audio/mpeg"></audio>
		                	<?php } else {?>
		                		<div style="font-size:20px;margin-left:40px">
			                <?php echo $row->test_content; ?>
			                </div>
		                	<?php }
		                 	?>
		                
		                <?php 
		                	if ($detailQuestion!=null) {
		                		$stt = 0;
		                		foreach ($detailQuestion as $row1) {	
		                	    $stt++;   						
		                 ?>
		                <p align="left" style="margin-left:10px;"> 		                		                
		               <b><?php echo $stt; ?></b>.
		               <?php echo nl2br($row1->question_content); ?>  		              	
		               <?php echo '<a href="'.base_url().'index.php/admin/test/editQuestion/'.$row->test_id.'/'.$row1->question_id.'"><input type="submit" value="Edit"></a>'; ?>
		               	<?php echo '<a href="'.base_url().'index.php/admin/test/deleteQuestion/'.$row->test_id.'/'.$row1->question_id.'"><input type="submit" value="Delete"></a>'; ?>		               		               
		               <br>
		               <?php 
		               		foreach ($row1->detailAnswer as $detailAnswer) {
		                ?>
		                <div align="left" style="margin-left:160px;">		                
                        <label for="<?php echo $detailAnswer->answer_id; ?>">
                        <?php 
                        	if ($detailAnswer->answer_correct == 1) {?>
                        	<input type="radio" name="answer[<?php echo $row1->question_id; ?>]" id="<?php echo $detailAnswer->answer_id; ?>" value="<?php echo $detailAnswer->answer_id; ?>" checked/>
                        	<font color="red"><?php echo $detailAnswer->answer_content; ?></font>		
                        <?php } else {?>
                        <input type="radio" name="answer[<?php echo $row1->question_id; ?>]" id="<?php echo $detailAnswer->answer_id; ?>" value="<?php echo $detailAnswer->answer_id; ?>" />
                        	<?php echo $detailAnswer->answer_content; ?>	
                        <?php }                        	
                         ?>                        
                        </label><br>		
		               	</div>
		               	<?php  } } }?>
		               	</p>
		                <div align="center">
		                	<input type="hidden" name="hidden-id" value="<?php echo $row->test_id; ?>">
		                	<input type="hidden" name="hidden-level" value="<?php echo $row->test_level; ?>">
		                	<input type="hidden" name="hidden-category" value="<?php echo $row->test_category; ?>">		                    
		                </div>
		                <?php  } ?><br>
		                ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~<br>
		                <?php echo '<a href="'.base_url().'index.php/admin/test/addQuestion/'.$row->test_id.'"><input type="submit" value="Add New Question"></a>'; ?>
		                <?php } ?>
		                <!-- </form>	 --> 	
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