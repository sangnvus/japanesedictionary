<?php
    
    $con_id = array(
                        'name'        => 'con_id',
                        'id'          => 'con_id',
                        'size'        => '32',
                        'value'       => $info['con_id'],
                        'type' => 'hidden'
                    );
    $c_id = array(
                        'name'        => 'c_id',
                        'id'          => 'c_id',
                        'size'        => '32',
                        'value'       => $info['c_id'],
                        'type'        => 'hidden'
                    );
    $con_title = array(
                        'name'        => 'con_title',
                        'id'          => 'con_title',
                        'size'        => '32',
                        'value'       => $info['con_title']
                    );
    $con_hiragana = array(
                        'name'        => 'con_hiragana',
                        'id'          => 'con_hiragana',
                        'cols'        => '25',
                        'rows'         => '5',
                        'value'       => $info['con_hiragana']
                    );
    $con_romaji = array(
                        'name'        => 'con_romaji',
                        'id'          => 'con_romaji',
                        'cols'        => '25',
                        'rows'         => '5',
                        'value'       => $info['con_romaji']
                    ); 
    $con_meaning = array(
                        'name'        => 'con_meaning',
                        'id'          => 'con_meaning',
                        'cols'        => '25',
                        'rows'         => '5',
                        'value'       => $info['con_meaning']
                    );
    if(isset($info['con_file']) && $info['con_file'] !== "") {
    $con_file = array(
                        'name'        => 'con_file',
                        'id'          => 'con_file',
                        'size'        => '32',
                        'value'       => $info['con_file']
                    ); 
    } else {
    $con_file = array(
                        'name'        => 'con_file',
                        'id'          => 'con_file',
                        'size'        => '32',
                        'value'       => set_value('con_file'),
                    );
    }                  
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Content Coversation</title>
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
        <h2>Edit Content</h2>
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
            <?php echo form_open_multipart('admin/conversation/editContent');?>
                <table  border="0" cellpadding="10" id="table1">
                <tr align="left">
                    <td width="40%">Sub-Title: </td>
                    <td width="50%"><?php echo form_input($con_title);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Hiragana:</td>
                    <td width="50%"><?php echo form_textarea($con_hiragana);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Romaji: </td>
                    <td width="50%"><?php echo form_textarea($con_romaji);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="40%">Meaning: </td>
                    <td width="50%"><?php echo form_textarea($con_meaning);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr align="left">
                    <td width="20%">File: </td>
                    <?php if(isset($info['con_file']) && $info['con_file'] !=="") { ?>
                    <td width="60%"><audio controls><source src="<?php echo base_url();?>public/audio/<?php echo $info['con_file'];?>" type="audio/mpeg"></audio><br><?php echo $info['con_file']; ?><br>
                    <?php if(isset($error_file) && !is_null($error_file)){
                        echo "<font width='1%' style='color:red;'>".$error_file."</font><br>";
                    }                    
                    ?>
                    <input type="file" name="userfile" id="file"><br>
                    <?php }else{ ?>
                    <td><?php 
                        if(isset($error_file) && !is_null($error_file)){
                            echo "<font width='1%' style='color:red;'>".$error_file."</font><br>";
                        }
                     ?>No file<br><input type="file" name="userfile" id="file"></td>
                    <?php } ?>
                </tr>  
                <tr>
                    <td></td>
                    <td><input type="submit" name="ok" value="Edit" /></td>
                    <td></td>
                </tr>
                <tr align="left">
                    <td style="width:30%"></td>
                    <td style="width:60%"><?php echo form_input($con_id);?></td>
                    <td style="width:10%"></td>
                </tr>
                <tr align="left">
                    <td style="width:30%"></td>
                    <td style="width:60%"><?php echo form_input($c_id);?></td>
                    <td style="width:10%"></td>
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