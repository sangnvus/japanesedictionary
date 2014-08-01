<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<link href="<?php echo base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>public/js/javascript.js"></script>
	<title></title>
</head>
<body>
<div id="container">
		<?php 
			if ($this->my_auth->is_User()) {
				$this->load->view("user/top_login_view");
			} else {
				$this->load->view("user/top_view");
			}
			
		 ?>		
	<div id="content">
		<?php $this->load->view("user/mainmenu_view");?>
		<div id="noidung">
			<center>
				<?php $this->load->view("user/search_view");?>
				<div id="main-content">
					<div id="left-content">
						<div id="intro-content">
							<center><h2 style="color:blue;">DANH SÁCH 60 BỘ CHỮ HÁN</h2></center>
	        	<table width="90%" border="1" cellpadding="10" cellspacing="0" id="table3" style="margin-left:5%;margin-right:5%;">
	<tbody>
		<tr>
			<td style="text-align: center;width:5%;  background-color:#80B2D9">STT</td>
			<td style="text-align: center;width:35%; background-color:#80B2D9;">Bộ</td>
			<td style="text-align: center;width:35%; background-color:#80B2D9;">Âm hán</td>
		</tr>
		<tr>
			<td>1</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_1.png" style="width: 30px; height: 30px;" ></td>
			<td>Nét nhất</td>
		</tr>
		<tr>
			<td>2</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_2.png" style="width: 30px; height: 30px;" ></td>
			<td>Nét cổn</td>
		</tr>
		<tr>
			<td>3</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_3.png" style="width: 30px; height: 30px;" ></td>
			<td>Chấm chủ</td>
		</tr>
		<tr>
			<td>4</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_4.png" style="width: 30px; height: 30px;" ></td>
			<td>Nét phiệt</td>
		</tr>
		<tr>
			<td>5</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_5.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ ất</td>
		</tr>
		<tr>
			<td>6</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_6.png" style="width: 30px; height: 30px;" ></td>
			<td>Nét quyết</p>
			</td>
		</tr>
		<tr>
			<td>7</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_7.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ đao</td>
		</tr>
		<tr>
			<td>8</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_8.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ tiết</td>
		</tr>
		<tr>
			<td>9</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_9.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ Phụ</td>
		</tr>
		<tr>
			<td>10</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_10.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ Ấp</td>
		</tr>
		<tr>
			<td>11</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_11.png" style="width: 30px; height: 30px;" ></td>
			<td>Nhân đứng</td>
		</tr>
		<tr>
			<td>12</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_12.png" style="width: 30px; height: 30px;" ></td>
			<td>Nhân nằm</td>
		</tr>
		<tr>
			<td>13</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_13.png" style="width: 30px; height: 30px;" ></td>
			<td>Nhân nónt</td>
		</tr>
		<tr>
			<td>14</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_14.png" style="width: 30px; height: 30px;" ></td>
			<td>Nhân đi</td>
		</tr>
		<tr>
			<td>15</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_15.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ chủy</td>
		</tr>
		<tr>
			<td>16</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_16.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ đầu</td>
		</tr>
		<tr>
			<td>17</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_17.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ miên</td>
		</tr>
		<tr>
			<td>18</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_18.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ mịch</td>
		</tr>
		<tr>
			<td>19</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_19.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ cân</td>
		</tr>
		<tr>
			<td>20</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_20.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ cân</td>
		</tr>
		<tr>
			<td>21</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_21.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ khẩu</td>
		</tr>
		<tr>
			<td>22</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_22.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ quynh</td>
		</tr>
		<tr>
			<td>23</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_23.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ hán</td>
		</tr>
		<tr>
			<td>24</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_24.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ nghiễm</td>
		</tr>
		<tr>
			<td>25</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_25.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ nạch</td>
		</tr>
		<tr>
			<td>26</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_26.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ bao</td>
		</tr>
		<tr>
			<td>27</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_27.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ cung</td>
		</tr>
		<tr>
			<td>28</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_28.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ thi</td>
		</tr>
		<tr>
			<td>29</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_29.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ hộ</td>
		</tr>
		<tr>
			<td>30</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_30.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ vô</td>
		</tr>
		<tr>
			<td>31</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_31.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ dặc</td>
		</tr>
		<tr>
			<td>32</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_32.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ qua</td>
		</tr>
		<tr>
			<td>33</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_33.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ đẩu</td>
		</tr>
		<tr>
			<td>34</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_34.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ thốn</td>
		</tr>
		<tr>
			<td>35</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_35.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ thủ</td>
		</tr><tr>
			<td>36</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_36.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ ngưu</td>
		</tr>
		<tr>
			<td>37</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_37.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ khuyển</td>
		</tr>
		<tr>
			<td>38</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_38.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ thị</td>
		</tr>
		<tr>
			<td>39</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_39.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ Y</td>
		</tr>
		<tr>
			<td>40</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_40.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ tâm</td>
		</tr>
		<tr>
			<td>41</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_41.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ dẫn</td>
		</tr>
		<tr>
			<td>42</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_42.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ sước</td>
		</tr>
		<tr>
			<td>43</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_43.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ băng</td>
		</tr>
		<tr>
			<td>44</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_44.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ thuỷ</td>
		</tr>
		<tr>
			<td>45</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_45.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ hỏa</td>
		</tr>
		<tr>
			<td>46</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_46.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ ký</td>
		</tr>
		<tr>
			<td>47</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_47.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ sam</td>
		</tr>
		<tr>
			<td>48</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_48.png" style="width: 30px; height: 30px;" ></td>
			<td>Sách</td>
		</tr>
		<tr>
			<td>49</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_49.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ bối</td>
		</tr>
		<tr>
			<td>50</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_50.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ hiệt</td>
		</tr>
		<tr>
			<td>51</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_51.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ môn</td>
		</tr>
		<tr>
			<td>52</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_52.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ dậu</td>
		</tr>
		<tr>
			<td>53</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_53.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ thù</td>
		</tr>
		<tr>
			<td>54</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_54.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ tịch/td>
		</tr>
		<tr>
			<td>55</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_55.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ ngạt</td>
		</tr>
		<tr>
			<td>56</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_56.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ thỉ</td>
		</tr>
		<tr>
			<td>57</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_57.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ bát</td>
		</tr>
		<tr>
			<td>58</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_58.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ trảo</td>
		</tr>
		<tr>
			<td>59</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_59.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ trúc</td>
		</tr>
		<tr>
			<td>60</td>
			<td><img src="<?php echo base_url();?>public/image/60_bo_co_ban_B_60.png" style="width: 30px; height: 30px;" ></td>
			<td>Bộ thảo</td>
		</tr>

	</tbody>
</table>
						</div>
					</div>
					<?php $this->load->view("user/popup_view");?>			
				</div>
			<div style="clear:both"></div>
			</center>
		</div>
	</div>
		<?php $this->load->view("user/footer_view");?>
</div>
	
</body>
</html>