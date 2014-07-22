<?php
    //--- Giu gia tri cua form
	$v_id = array(
                        'name'        => 'v_id',
                        'id'          => 'v_id',
                        'size'        => '32',
                        'value'       => $info['v_id'],
                    );
	$v_hiragana = array(
                        'name'        => 'v_hiragana',
                        'id'          => 'v_hiragana',
                        'size'        => '32',
                        'value'       => $info['v_hiragana'],
                    );
	$v_romaji = array(
                        'name'        => 'v_romaji',
                        'id'          => 'v_romaji',
                        'size'        => '32',
                        'value'       => $info['v_romaji'],
                    );
	$v_specialized = array(
                        'name'        => 'v_specialized',
                        'id'          => 'v_specialized',
                        'size'        => '32',
                        'value'       => $info['v_specialized'],
                    );
	$m_meaningvn = array(
                        'name'        => 'm_meaningvn',
                        'id'          => 'm_meaningvn',
                        'size'        => '32',
                        'value'       => $info['m_meaningvn'],
                    );
    $m_category = array(
                        'name'        => 'm_category',
                        'id'          => 'm_category',
                        'size'        => '32',
                        'value'       => $info['m_category'],
                    );
                             
    $m_kanji = array(
                        'name'        => 'm_kanji',
                        'id'          => 'm_kanji',
                        'size'        => '32',
                        'value'       => $info['m_kanji'],
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
		<h2>Add Meaning</h2>
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
			<form name="addMeaning" id="addMeaning" action="" method="post" enctype="multipart-formdata">		        		        
		        <label>v_id: </label><?php echo form_input($v_id);?><br />
		        <label>v_hiragana: </label><?php echo form_input($v_hiragana);?><br />		
		        <label>v_romaji: </label><?php echo form_input($v_romaji);?><br />
		        <label>v_specialized: </label><?php echo form_input($v_specialized);?><br />
		        <label>m_meaning: </label><?php echo form_input($m_meaningvn);?><br />
		        <label>m_category: </label><?php echo form_input($m_category);?><br />
		        <label>m_kanji: </label><?php echo form_input($m_kanji);?><br />
		        <label>&nbsp;</label> <input type="submit" name="ok" value="Add" /><br />
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