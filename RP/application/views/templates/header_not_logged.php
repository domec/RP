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

					echo form_submit('submit', 'Prihlásiť');
					echo anchor('project/registracia','Registrovať');
					echo "<span id=\"lang\">".anchor('../../EN/RP/project/home','<img src="'.base_url("/img/en.png").'" alt="enlish">')."</span>";
					if ($this->session->userdata('cart') == null)
						echo "<a href=\"cart\" title=\"košík je prázdny\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>";
					else{
						$count = count($this->session->userdata('cart'));
						if ($count == 1)
							echo "<a href=\"cart\" title=\"v kosiku je 1 polozka\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>";
						else if ($count > 1 and $count < 5)
							echo "<a href=\"cart\" title=\"v kosiku su $count polozky\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>";
						else 
							echo "<a href=\"cart\" title=\"v kosiku je $count poloziek\"><img src=\"".base_url('/img/shopping_cart.jpg')."\"></a>";
					}
					echo form_close();

					?>
				</div><!-- end of login-->
