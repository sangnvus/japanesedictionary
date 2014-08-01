<?php
    $u_username = array(
                        'name'        => 'u_username',
                        'id'          => 'u_username',
                        'size'        => '20',
                        'placeholder' =>'Tên đăng nhập'
                    );
    $u_password = array(
                        'name'        => 'u_password',
                        'id'          => 'u_password',
                        'size'        => '20',
                        'placeholder' => 'Mật khẩu'
                    );
    $submit = array(
                        "name"=>"dangnhap",
                        "value"=>"Đăng nhập",
                    );
?>
<div id="top">
	<div id="top-right">
		<ul>
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
		<div id="social-login">    	
        <!--<a title="Đăng nhập bằng nick Facebook." href="http://lophoctiengnhat.com/dang-nhap.html" id="facebook-bt"></a>
        <a title="Đăng nhập bằng nick Gmail." href="http://lophoctiengnhat.com/dang-nhap.html" id="google-bt"></a>
        --></div>
	</div>
</div>