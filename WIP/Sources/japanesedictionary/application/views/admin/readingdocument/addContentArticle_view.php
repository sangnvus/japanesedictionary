<?php
    //--- Giu gia tri cua form
    if ($info !== null) {
        foreach ($info as $info) { 
    $reading_id = array(
                        'name'        => 'reading_id',
                        'id'          => 'reading_id',
                        'size'        => '32',
                        'value'       => $info['reading_id'],
                        'readonly'    => 'readonly',
                        'type'        => 'hidden'
                    );
    } }
    $readingarticle_content = array(
                        'name'        => 'readingarticle_content',
                        'id'          => 'readingarticle_content',
                        'cols'        => '35',
                        'rows'        => '5',
                        'value'       => set_value('readingarticle_content')
                    );
    $readingarticle_question = array(
                        'name'        => 'readingarticle_question',
                        'id'          => 'readingarticle_question',
                        'cols'        => '35',
                        'rows'        => '5',
                        'value'       => set_value('readingarticle_question')
                    );
    $readingarticle_answer = array(
                        'name'        => 'readingarticle_answer',
                        'id'          => 'readingarticle_answer',
                        'cols'        => '35',
                        'rows'        => '5',
                        'value'       => set_value('readingarticle_answer')
                    ); 
    $readingarticle_meaning = array(
                        'name'        => 'readingarticle_meaning',
                        'id'          => 'readingarticle_meaning',
                        'cols'        => '35',
                        'rows'        => '5',
                        'value'       => set_value('readingarticle_meaning'),
                    );             
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Article</title>
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
        <h2>Add Article</h2>
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
            <form name="addContent" id="addNewAdmin" action="" method="post" enctype="multipart-formdata">                              
                <table  border="0" cellpadding="10" id="table1" width="80%">
                <tr align="left">
                    <td style="width:10%;"></td>
                    <td style="width:75%;"><?php echo form_input($reading_id);?></td>
                    <td style="width:15%;"></td>
                </tr>
                <tr>
                    <td width="40%">Content:</td>
                    <td width="50%"><?php echo form_textarea($readingarticle_content);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
                </tr>
                <tr>
                    <td width="40%">Question:</td>
                    <td width="50%"><?php echo form_textarea($readingarticle_question);?></td>
                    <td width="10%"><font width="1%" style="color:red;">(*)</font></td>
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