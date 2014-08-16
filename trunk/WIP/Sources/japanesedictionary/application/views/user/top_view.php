<?php
    $u_username = array(
                        'name'        => 'u_username',
                        'id'          => 'u_username',
                        'size'        => '15',
                        'placeholder' =>'Tên đăng nhập'
                    );
    $u_password = array(
                        'name'        => 'u_password',
                        'id'          => 'u_password',
                        'size'        => '15',
                        'placeholder' => 'Mật khẩu'
                    );
    $submit = array(
                        "name"=>"dangnhap",
                        "value"=>"Đăng nhập",
                    );
?>
<div id="top">
    <div id="top-left">
        <ul>
            <li>
                <font size="6"><i><a href="<?php echo base_url();?>index.php/Home/verify/login">JS CAPSTONE PROJECT</a></i></font>
            </li>
        </ul>
    </div>
	<div id="top-right">       
           <?php if (isset($user_profile) && $user_profile){ 
            ?> 
                <ul>
                    <li  id="facebook-name"><h3 align="left" style="margin-top:2px;">Xin chào, 
                    <a href="<?php echo base_url();?>index.php/Home/user/viewFacebookAccount/<?php echo $user_profile['id']; ?>">
                    <?php echo $user_profile['name']?></a></h3></li>
                    <li><h3 align="left" style="margin-top:2px;"><a href="<?php echo $logout_url ?>"> | Thoát</a></h3></li>                                              
                </ul>
            <?php }else{ ?> 
            <ul>
                <li><h3 align="right" style="margin-top:1px;"><a href="<?php echo $login_url ?>"><img src="<?php echo base_url();?>public/image/fb.png" width="25" height="25"></a></h3></li>
                <li><a href="<?php echo base_url();?>index.php/Home/user/registration">Đăng ký</a> |</li>
                <li><a href="<?php echo base_url();?>index.php/Home/user/forgotInfo">Quên thông tin</a> |</li>
                <li>
                <?php
                    echo form_open(base_url()."index.php/Home/verify/login");
                    echo form_label("").form_input($u_username);
                    echo form_label("").form_password($u_password);
                    echo form_label("").form_submit($submit);
                    //--------------- ERROR
                    echo form_label("")."<span class=error>";
                        if (isset($error_login)) {
                            echo validation_errors();    
                        }                                                
                        if(isset($error_login) && $error_login!="")
                         echo $error_login;
                    echo "</span>";
                    //-----------------------
                    echo form_close(); 
                    ?>
                </li>
            </ul>
            <?php } ?>
        </div>
</div>