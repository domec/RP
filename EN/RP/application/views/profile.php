<?php
if ($this->session->userdata('username') == null)
	echo "<script>redirectFromProfile();</script>";

$attributes = array('id' => 'reg');

$username = array(
              'name' => 'username',
			  'placeholder' => $this->session->userdata('username'),
			  'value' => set_value('username'),
			  'id' => 'username');
$password = array(
              'name' => 'password',
			  'value' => set_value('password'),
              'id' => 'password');
$email = array(
              'name' => 'email',
			  'placeholder' => $this->session->userdata('email'),
			  'value' => set_value('email'),
			  'id' => 'email');
$sub = array(
              'name' => 'submit_profile',
			  'value' => 'Zmenit',
              'class' => 'submit_profile');
$firstName = array(
              'name' => 'firstName',
			  'value' => set_value('firstName'),
			  'placeholder' => $this->session->userdata('firstName'),
			  'id' => 'firstName');
$lastName = array(
              'name' => 'lastName',
			  'value' => set_value('lastName'),
			  'placeholder' => $this->session->userdata('lastName'),
			  'id' => 'lastName');
$phone = array(
              'name' => 'phone',
			  'value' => set_value('phone'),
			  'placeholder' => $this->session->userdata('phone'),
			  'id' => 'phone');
$street = array(
              'name' => 'street',
			  'value' => set_value('street'),
			  'placeholder' => $this->session->userdata('street'),
			  'id' => 'street');
$city = array(
              'name' => 'city',
			  'value' => set_value('city'),
			  'placeholder' => $this->session->userdata('city'),
			  'id' => 'city');
$psc = array(
              'name' => 'psc',
			  'value' => set_value('psc'),
			  'placeholder' => $this->session->userdata('psc'),
			  'id' => 'psc');
$newsletter = array(
              'name' => 'newsletter',
			  'checked' => $this->session->userdata('newsletter'),
			  'id' => 'newsletter');

$attributes = array('class' => 'profile');
?>
			<div id="content">
				<ul id="profile_list">
					<li><h2>Profile</h2></li>
					<div class="validation_errors">
					<?php echo validation_errors();?>
					</div>
					<li>To change, edit corresponding field and confirm by Change button.</li>
					<li><label for="username">Username:</label><?php
						echo form_open("project/update_profile/username",$attributes);
						echo form_input($username);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="password">Password:</label><?php
						echo form_open("project/update_profile/password",$attributes);
						echo form_password($password);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="email">Email:</label><?php
						echo form_open("project/update_profile/email",$attributes);
						echo form_input($email);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="phone">Phone number:</label><?php
						echo form_open("project/update_profile/phone",$attributes);
						echo form_input($phone);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="firstName">First name:</label><?php
						echo form_open("project/update_profile/firstName",$attributes);
						echo form_input($firstName);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="lastName">Last name:</label><?php
						echo form_open("project/update_profile/lastName",$attributes);
						echo form_input($lastName);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="street">Street:</label><?php
						echo form_open("project/update_profile/street",$attributes);
						echo form_input($street);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="city">City:</label><?php
						echo form_open("project/update_profile/city",$attributes);
						echo form_input($city);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="psc">Postal code:</label><?php
						echo form_open("project/update_profile/psc",$attributes);
						echo form_input($psc);
						echo form_submit($sub);
						echo form_close();?></li>
					<li><label for="newsletter">Mail newsletter:</label><?php
						echo form_open("project/update_profile/newsletter",$attributes);
						echo form_checkbox($newsletter);
						echo form_submit($sub);
						echo form_close();?></li>
				</ul>
			</div> <!-- end of content-->
