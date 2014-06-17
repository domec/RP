			<div id="content">
<?php 
if ($this->session->flashdata('info') == 'mail_sent')
	echo '<span class="info">'."Na vašu emailovú adresu bol zaslaný mail. Pomocou neho potvrdíte registráciu. Ďakujeme.".'</span>';
else if ($this->session->flashdata('info') == 'mail_not_sent')
	echo '<span class="info">'."Nepodarilo sa zaslať email.".'</span>';
else if ($this->session->flashdata('info') == 'reg_failed')
	echo '<span class="info">'."Registrácia zlyhala".'</span>';
else if ($this->session->flashdata('info') == 'login_successful')
	echo '<span class="info">'."Boli ste úspešne prihlásený!".'</span>';
else if ($this->session->flashdata('info') == 'login_unsuccessful')
	echo '<span class="info">'."Zle zadané prihlasovacie meno alebo heslo!".'</span>';
else if ($this->session->flashdata('info') == 'logout_successful')
	echo '<span class="info">'."Boli ste úspešne odhlásený!".'</span>';
else if ($this->session->flashdata('info') == 'registration_successful')
	echo '<span class="info">'."Podarilo sa zaregistrovať vás!".'</span>';
else if ($this->session->flashdata('info') == 'registration_unseccessful')
	echo '<span class="info">'."Nepodarilo sa zaregistrovať vás!".'</span>';
else if ($this->session->flashdata('info') == 'invalid_key')
	echo '<span class="info">'."Použili ste neplatný odkaz!".'</span>';
else if ($this->session->flashdata('info') == 'edit_successful')
	echo '<span class="info">'."Údaj bol zmenený!".'</span>';
else if ($this->session->flashdata('info') == 'edit_unsuccessful')
	echo '<span class="info">'."Nepodarilo sa zmeniť údaj!".'</span>';
else if ($this->session->flashdata('info') == 'order_sent')
	echo '<span class="info">'."Na vasu emailovu adresu bol zaslany mail s informaciami o objednavke".'</span>';
else if ($this->session->flashdata('info') == 'order_not_sent')
	echo '<span class="info">'."Na vasu emailovu adresu nebol zaslany mail s informaciami o objednavke".'</span>';
else 
	echo "<script>redirectFromInfo();</script>";
?>
</div><!-- end of content-->
