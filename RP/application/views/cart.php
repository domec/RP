<div id="content">
	<?php
	if (!$isEmpty){
		foreach ($results as $rowQuery){
			foreach ($rowQuery as $row){
				$data = array(
					'name' => 'zrusit',
					'id' => 'del_button',
					'value' => 'Odstranit polozku z kosika'
				);
				echo $row->name;
				echo "<br />";
				if ($this->session->userdata('username') != null)
					echo round($row->price * 0.98,2);
				else
					echo $row->price;
				echo "<br />";
				echo form_open('project/del_from_cart/'.$row->id);
				echo form_submit($data);
				echo form_close();
				echo "<hr>"."<br />";
			}
		}


		if ($this->session->userdata('username') != null)
			$values = array(
				'firstName' => $this->session->userdata('firstName'),
				'lastName' => $this->session->userdata('lastName'),
				'email' => $this->session->userdata('email'),
				'phone' => $this->session->userdata('phone'),
				'city' => $this->session->userdata('city'),
				'street' => $this->session->userdata('street'),
				'psc' => $this->session->userdata('psc')
			);
		else
			$values = array(
				'firstName' => set_value('firstName'),
				'lastName' => set_value('lastName'),
				'email' => set_value('email'),
				'phone' => set_value('telephone'),
				'city' => set_value('city'),
				'street' => set_value('street'),
				'psc' => set_value('psc')
			);


		$shopping_cart_form = array(
			'id' => 'shopping_cart_form'
		);
		echo form_open('project/check_cart',$shopping_cart_form);
		echo '<div class="validation_errors">';
			echo validation_errors();
		echo '</div>';
		echo form_fieldset('Dodacia adresa');

		echo "Vsetky polozky su povinne";
		$fn = array(
					  'name' => 'firstName',
					  'value' => $values['firstName'],
					  'id' => 'firstName');
		$ln = array(
					  'name' => 'lastName',
					  'value' => $values['lastName'],
					  'id' => 'lastName');
		$tel = array(
					  'name' => 'telephone',
					  'value' => $values['phone'],
					  'id' => 'telephone');
		$mail = array(
					  'name' => 'email',
					  'value' => $values['email'],
					  'id' => 'email');
		$street = array(
					  'name' => 'street',
					  'value' => $values['street'],
					  'id' => 'street');
		$city = array(
					  'name' => 'city',
					  'value' => $values['city'],
					  'id' => 'city');
		$psc = array(
					  'name' => 'psc',
					  'value' => $values['psc'],
					  'id' => 'psc');
		?>
				<ul>
					<li><label for="firstName">Meno:</label><?php echo form_input($fn);?></li>
					<li><label for="lastName">Priezvisko:</label><?php echo form_input($ln);?></li>
					<li><label for="telephone">Telefonne cislo:</label><?php echo form_input($tel);?></li>
					<li><label for="email">Email:</label><?php echo form_input($mail);?></li>
					<li><label for="street">Ulica:</label><?php echo form_input($street);?></li>
					<li><label for="city">Mesto:</label><?php echo form_input($city);?></li>
					<li><label for="psc">PSC:</label><?php echo form_input($psc);?></li>
				</ul>

		<?php
		echo form_fieldset_close();

		echo form_fieldset('Sposob platby');
		echo "<ul>";
		echo "<li>".form_radio('payment','payment_cash',set_radio('payment','payment_cash'), 'id="payment_cash"')."<label for=\"payment_cash\">Platba v hotovosti pri prevzati</label></li>";
		echo "<li>".form_radio('payment','payment_ib',set_radio('payment','payment_ib'), 'id="payment_ib"')."<label for=\"payment_ib\">Platba vopred bankovym prevodom na ucet</li></label>";
		echo "<li>".form_radio('payment','payment_personally',set_radio('payment','payment_personally'), 'id="payment_personally"')."<label for=\"payment_personally\">Platba osobne na pobocke</li></label>";
		echo "</ul>";
		echo form_fieldset_close();

		echo form_fieldset('Sposob dopravy');
		echo "<ul>";
		echo "<li>".form_radio('delivery','delivery_post',set_radio('delivery','delivery_post'), 'id="delivery_post"')."<label for=\"delivery_post\">Dorucenie postou - 3-5 pracovnych dni</label></li>";
		echo "<li>".form_radio('delivery','delivery_courier',set_radio('delivery','delivery_courier'), 'id="delivery_courier"')."<label for=\"delivery_courier\">Dorucenie kurierom - 1-3 pracovne dni</li></label>";
		echo "<li>".form_radio('delivery','delivery_personally',set_radio('delivery','delivery_personally'), 'id="delivery_personally"')."<label for=\"delivery_personally\">Osobny odber - nasledujuci pracovny den</li></label>";
		echo "</ul>";
		echo form_fieldset_close();
		$discount = array(
			'name'        => 'discount',
			'id'          => 'discount',
			);
		echo form_fieldset('Dodatocna zlava');
		echo "<label for=\"discount\">Cislo ISIC karty</label>".form_input($discount);
		echo form_fieldset_close();
		$note = array(
			'name' => 'note',
			'id' => 'note'
		);
		echo form_fieldset('Poznamka k objednavke');
		echo form_textarea($note);
		echo form_fieldset_close();
		echo form_submit('cart_checkout','Suhrn');
		echo form_close();
		//echo "<div id=\"cart_to_summary\">DALEJ</div>";
	}
?>
	<div id="arrows">
		<!--<div id="leftArrow">
			<img src="../img/arrowLeft.png" title="LeftArrow" alt="nazad">
		</div>end of leftArrow-->
<!--		<div id="rightArrow">
			<?php 
			//echo anchor($next,"<img src=\"../img/arrowRight.png\" title=\"RightArrow\" alt=\"pokracovat\">");
			?>-->
		</div><!--end of rightArrow-->
	</div><!--end of arrows-->
		
</div><!--end of content-->

