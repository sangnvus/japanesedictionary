<?php
    //--- Giu gia tri cua form
	$v_id = array(
                        'name'        => 'v_id',
                        'id'          => 'v_id',
                        'size'        => '32',
                        'value'       => $info['v_id'],
                        'type'    => 'hidden'
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
	if (isset($info['m_id'])) {
		$m_id = array(
                        'name'        => 'm_id',
                        'id'          => 'm_id',
                        'size'        => '32',
                        'value'       => $info['m_id'],
                        'type'        => 'hidden'
                    );
		$m_meaningvn = array(
                        'name'        => 'm_meaningvn',
                        'id'          => 'm_meaningvn',
                        'size'        => '32',
                        'value'       => $info['m_meaningvn'],
                    );                            
	    $m_kanji = array(
	                        'name'        => 'm_kanji',
	                        'id'          => 'm_kanji',
	                        'size'        => '32',
	                        'value'       => $info['m_kanji'],
	                    );
	    $m_specialized = array(
                        'name'        => 'm_specialized',
                        'id'          => 'm_specialized',
                        'size'        => '32',
                        'value'       => $info['m_specialized'],
                    );
	} else {
		$m_meaningvn = array(
                        'name'        => 'm_meaningvn',
                        'id'          => 'm_meaningvn',
                        'size'        => '32',
                        'value'       => set_value('m_meaningvn')
                    );
	                             
	    $m_kanji = array(
	                        'name'        => 'm_kanji',
	                        'id'          => 'm_kanji',
	                        'size'        => '32',
	                        'value'       => set_value('m_kanji')
	                    );
	    $m_specialized = array(
                        'name'        => 'm_specialized',
                        'id'          => 'm_specialized',
                        'size'        => '32',
                        'value'       => set_value('m_specialized'),
                    );
	}
	
	                
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Vocabulary Page</title>
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
		<h2>Edit Vocabulary</h2>
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
			<form name="addMeaning" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">		        		        
		        <table  border="0" cellpadding="10" id="table1">
				<tr align="left">
					<td></td>
					<td width="50%"><?php echo form_input($v_id);?></td>
					<td></td>
				</tr>
		        <tr align="left">
					<td width="40%">Hiragana:</td>
					<td width="50%"><?php echo form_input($v_hiragana);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Romaji:</td>
					<td width="50%"><?php echo form_input($v_romaji);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<?php 
			        	if (isset($info['m_id'])) { ?>			        	
		    	<tr align="left">
					<td width="40%">Meaning:</td>
					<td width="50%"><?php echo form_input($m_id); ?><?php echo form_input($m_meaningvn);?></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Category:</td>
					<td width="50%"><select name="m_category">
							<option value="<?php echo $info['m_category']; ?>"><?php echo $info['m_category']; ?></option>                        
                            <option value="Noun">Noun</option>
                            <option value="Verb">Verb</option>
                            <option value="Adjective">Adjective</option>
                            <option value="Adverb">Adverb</option>
                    </select></td>
					<td width="10%"><font width="1%" style="color:red;">(*)</font></td>
				</tr>
				<tr align="left">
					<td width="40%">Kanji:</td>
					<td width="50%"><?php echo form_input($m_kanji);?></td>
					<td width="10%"></td>
				</tr>
				<tr align="left">
					<td width="40%">Specialized:</td>
					<td width="50%"><?php echo form_input($m_specialized);?></td>
					<td width="10%"></td>
				</tr>
				<?php } else {
			        	}
			         ?>	
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