			<div id="content">
<?php 
if ($this->session->flashdata('info') == 'mail_sent')
	echo '<span class="info">'."Please, confirm your registration via the link we have emailed to your email address. Thank you.".'</span>';
else if ($this->session->flashdata('info') == 'mail_not_sent')
	echo '<span class="info">'."Error with mail sending occured".'</span>';
else if ($this->session->flashdata('info') == 'reg_failed')
	echo '<span class="info">'."Registration failed".'</span>';
else if ($this->session->flashdata('info') == 'login_successful')
	echo '<span class="info">'."Succesfully logged in!".'</span>';
else if ($this->session->flashdata('info') == 'login_unsuccessful')
	echo '<span class="info">'."Wrong username or password!".'</span>';
else if ($this->session->flashdata('info') == 'logout_successful')
	echo '<span class="info">'."Succesfully logged out!".'</span>';
else if ($this->session->flashdata('info') == 'registration_successful')
	echo '<span class="info">'."Succesfully registered!".'</span>';
else if ($this->session->flashdata('info') == 'registration_unseccessful')
	echo '<span class="info">'."Error with registration occured!".'</span>';
else if ($this->session->flashdata('info') == 'invalid_key')
	echo '<span class="info">'."You have used invalid link!".'</span>';
else if ($this->session->flashdata('info') == 'edit_successful')
	echo '<span class="info">'."Editation was succesfull!".'</span>';
else if ($this->session->flashdata('info') == 'edit_unsuccessful')
	echo '<span class="info">'."Editaion was not succesfull!".'</span>';
else 
	echo "<script>redirectFromInfo();</script>";
?>
</div><!-- end of content-->
