<div id="content">
	<?php
	    if ($this->session->userdata('username') == null)
			echo "Je potrebne sa najskor prihlasit.";
		else {
			$textarea = array(
				'name' => 'review_textarea',
				'placeholder' => 'Tu napiste svoje dojmy z knihy, svoje nazory, odporucania...'
			);
			$submit = array(
				'name' => 'review_submit',
				'value' => 'Odoslat'
			);
			if ($this->books->check_id($id)){
				echo form_open('project/submit_review/'.$id);
				echo form_textarea($textarea);
				echo form_submit($submit);
				echo form_close();

				$reviews = $this->books->get_reviews($id);
				foreach ($reviews->result() as $rev){
					echo "<strong>".$rev->author."</strong>";
					echo "<br />";
					echo $rev->review;
					echo "<br />";
					echo "<hr>";
				}
			}
			else
				echo "Zadana kniha u nas neexistuje!";
		}
	?>

</div>
