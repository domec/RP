			<div id= "header">
				<div id = login>
					<?php
					echo '<span id="header_text">',"Logged in as",'</span>';
					echo anchor('project/profile',$this->session->userdata('username').'.','id="user_profile"');
					echo anchor('project/logout_user','Log out.','id="log_out"');
					echo anchor('../../RP/project/home','<img src="'.base_url("/img/sk.png").'" alt="slovak">');
					if ($this->session->userdata('cart') == null)
						echo "<a href=\"/EN/RP/project/cart\" title=\"empty cart\"><img src=\"".base_url('img/shopping_cart.jpg')."\"></a>";
					else{
						$count = count($this->session->userdata('cart'));
						if ($count == 1)
							echo "<a href=\"/RP/project/cart\" title=\"1 item in cart\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>"; 						
						//else if ($count > 1 and $count < 5)
							//echo "<a href=\"/RP/project/cart\" title=\"v kosiku su $count polozky\"><img src=\"".base_url('img/shopping_cart.jpg')."\"></a>";
						else
							echo "<a href=\"/RP/project/cart\" title=\"$count items in cart\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>"; 					} 
					?>
				</div><!-- end of login-->
