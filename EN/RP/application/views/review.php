<div id="content">
	<?php
		if ($this->session->userdata('username') == null)
			echo "You need to be logged in.";
		else {
			$textarea = array(
				'name' => 'review_textarea',
				'placeholder' => 'Here you can write anything you think about book, your feelings, recommendations...'
			);
			$submit = array(
				'name' => 'review_submit',
				'value' => 'Send'
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
				echo "We have no such books!";
		}
	?>

</div>
