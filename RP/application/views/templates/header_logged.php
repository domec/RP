			<div id= "header">
				<div id = login>
					<?php
					echo '<span id="header_text">',"Ste prihlasený ako",'</span>';
					echo anchor('project/profile',$this->session->userdata('username').'.','id="user_profile"');
					echo anchor('project/logout_user','Odhlásiť.','id="log_out"');
					echo anchor('../../EN/RP/project/home','<img src="'.base_url("/img/en.png").'" alt="enlish">');
					if ($this->session->userdata('cart') == null)
						echo "<a href=\"/RP/project/cart\" title=\"košík je prázdny\"><img src=\"".base_url('img/shopping_cart.jpg')."\"></a>";
					else{
						$count = count($this->session->userdata('cart'));
						if ($count == 1)
							echo "<a href=\"/RP/project/cart\" title=\"v kosiku je 1 polozka\"><img src=\"".base_url('img/shopping_cart.jpg')."\"></a>"; 						
						else if ($count > 1 and $count < 5)
							echo "<a href=\"/RP/project/cart\" title=\"v kosiku su $count polozky\"><img src=\"".base_url('img/shopping_cart.jpg')."\"></a>";
						else
							echo "<a href=\"/RP/project/cart\" title=\"v kosiku je $count poloziek\"><img src=\"".base_url('img/shopping_cart.jpg')."\"></a>"; 					} 
					?>
				</div><!-- end of login-->
