<?php
$attributes = array('id' => 'reg');
?>
			<div id="content">
<?php
				echo form_open("project/registration_validation",$attributes);
				echo '<div class="validation_errors">';
					echo validation_errors();
				echo '</div>';

$log = array(
              'name' => 'username',
			  'value' => set_value('username'),
			  'id' => 'username');
$pwd = array(
              'name' => 'password',
			  'value' => set_value('password'),
              'id' => 'password');
$cpwd = array(
              'name' => 'cpassword',
			  'value' => set_value('cpassword'),
              'id' => 'cpassword');
$mail = array(
              'name' => 'email',
			  'value' => set_value('email'),
			  'id' => 'email');
$sub = array(
              'name' => 'submit_reg',
			  'value' => 'Registrovať',
              'id' => 'submit_reg');
?>
				<ul>
					<li><h2>Registrácia</h2>
					<span id="info">všetky polia sú povinné</span></li>
					<li><label for="username">Prihlasovacie meno:</label><?php echo form_input($log);?></li>
					<li><label for="password">Prihlasovacie heslo:</label><?php echo form_password($pwd);?></li>
					<li><label for="cpassword">Potvrdenie hesla:</label><?php echo form_password($cpwd);?></li>
					<li><label for="email">Email:</label><?php echo form_input($mail);?></li>
					<li><label for="submit_reg"></label><?php echo form_submit($sub);?></li>
				</ul>
<?php
echo form_close();
?>
		</div><!-- end of content-->
