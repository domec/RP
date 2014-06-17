<?php
$attributes = array('id' => 'offer');
?>
			<div id="content">
<?php
				echo form_open("project/offer_book_submit",$attributes);
				echo '<div class="validation_errors">';
					echo validation_errors();
				echo '</div>';

$name = array(
              'name' => 'name',
			  'value' => set_value('name'),
			  'id' => 'name');
$price = array(
              'name' => 'price',
			  'value' => set_value('price'),
              'id' => 'price');
$text = array(
              'name' => 'text',
			  'value' => set_value('text'),
              'id' => 'text');
?>
				<ul>
					<li><label for="name">Názov:</label><?php echo form_input($name);?></li>
					<li><label for="price">Cena:</label><?php echo form_input($price);?></li>
					<li><label for="text">Popis:</label><?php echo form_textarea($text);?></li>
					<li><?php echo form_submit('offer_submit','Odoslat');?></li>
				</ul>
<?php
echo form_close();
?>
		</div><!-- end of content-->
