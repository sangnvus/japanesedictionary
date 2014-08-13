<div id="top">
    <div id="top-left">
        <ul>
            <li>
                <font size="6"><i><a href="<?php echo base_url();?>index.php/Home/verify/login">JS CAPTONE PROJECT</a></i></font>
            </li>
        </ul>
    </div>
	<div id="top-right">
		<ul>
            <li>
            <h2 align="rigt" style="margin-top:2px;"><?php echo '<a href="'.base_url().'index.php/Home/user/editUser/'.$this->my_auth->u_id.'" >'.$this->my_auth->u_username.'</a>'; ?></h2>
                </li>
                <li><h2 align="rigt" style="margin-top:2px;">|</h2></li>
                <li>
                    <h2 align="rigt" style="margin-top:2px;">
                    <a href="<?php echo base_url();?>index.php/Home/verify/logout">
                    Thoát</a></h2>
                </li>
            </ul>
	</div>
</div>