<?php
$attributes = array('id' => 'buy');
echo form_open("",$attributes);
echo form_fieldset('Address');


$fn = array(
              'name' => 'firstName',
			  'value' => set_value('firstName'),
			  'id' => 'firstName');
$ln = array(
              'name' => 'lastName',
			  'value' => set_value('lastName'),
              'id' => 'lastName');
$tel = array(
              'name' => 'telephone',
			  'value' => set_value('telephone'),
              'id' => 'telephone');
$mail = array(
              'name' => 'email',
			  'value' => set_value('email'),
			  'id' => 'email');
$street = array(
              'name' => 'street',
			  'value' => set_value('street'),
			  'id' => 'street');
$city = array(
              'name' => 'city',
			  'value' => set_value('city'),
			  'id' => 'city');
$psc = array(
              'name' => 'psc',
			  'value' => set_value('psc'),
			  'id' => 'psc');
$sub = array(
              'name' => 'submit_reg',
			  'value' => 'Registrovať',
              'id' => 'submit_reg');
?>
				<ul>
					<li><label for="firstName">First name:</label><?php echo form_input($fn);?></li>
					<li><label for="lastName">Last name:</label><?php echo form_input($ln);?></li>
					<li><label for="telephone">Phone number:</label><?php echo form_input($tel);?></li>
					<li><label for="email">Email:</label><?php echo form_input($mail);?></li>
					<li><label for="street">Street:</label><?php echo form_input($street);?></li>
					<li><label for="city">City:</label><?php echo form_input($city);?></li>
					<li><label for="psc">Post code:</label><?php echo form_input($psc);?></li>
					<li><label for="submit_reg"></label><?php echo form_submit($sub);?></li>
				</ul>

<?php
echo form_fieldset_close();
echo form_close();
?>
