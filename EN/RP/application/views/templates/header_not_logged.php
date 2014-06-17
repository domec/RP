			<div id= "header">
				<div id = login>
					<?php
					$attributes = array('id' => 'log');
					$log = array(
								  'name' => 'username',
								  'placeholder' => 'login');

					$pwd = array(
								  'name' => 'password',
								  'placeholder' => 'heslo');

					echo form_open('project/login_user', $attributes);
					echo form_input($log);
					echo form_password($pwd);

					echo form_submit('submit', 'Log in');
					echo anchor('project/registracia','Register');
					echo "<span id=\"lang\">".anchor('../../RP/project/home','<img src="'.base_url("/img/sk.png").'" alt="slovak">')."</span>";
					if ($this->session->userdata('cart') == null)
						echo "<a href=\"cart\" title=\"cart is empty\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>";
					else{
						$count = count($this->session->userdata('cart'));
						if ($count == 1)
							echo "<a href=\"cart\" title=\"1 item in cart\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>";
						//else if ($count > 1 and $count < 5)
							//echo "<a href=\"cart\" title=\"v kosiku su $count polozky\"><img src=\"../img/shopping_cart.jpg\"></a>";
						else 
							echo "<a href=\"cart\" title=\"$count items in cart\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>";
					}
					echo form_close();

					?>
				</div><!-- end of login-->
