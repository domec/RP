<div id="content">
	<?php

	if ($this->session->userdata('username') == null)
		echo "You need to be logged in.";
	else {
		echo "<div id=\"offerBook\">";
			echo "<h3>Add book.</h3>";
		echo "</div><!--end of offerBook-->";
		echo "<div id=\"offerBookForm\">";
			include('offerBookForm.php');
		echo "</div><!--end of offerBookForm-->";

		echo "<div id=\"bazaarOffers\">";
			echo "<h3>Browse offered books.</h3>";
		echo "</div><!--end of bazaarOffers-->";
		echo "<div id=\"bazaarOffersHidden\">";
			foreach ($results as $row){
				echo "<strong>Name:</strong> ".$row->book_name.'<br />';
				echo "<strong>Price:</strong> ".$row->book_price."&euro;".'<br />';
				echo "<strong>About:</strong> ".$row->book_description.'<br />';
				echo "<strong>Owner contact:</strong> ".$row->owner_email.'<br />';
				if ($row->owner_email == $this->session->userdata('email'))
					echo anchor('project/delete_offer/'.$row->id,'DELETE');
				echo "<hr>";
			}
		echo "</div><!--end of bazaarOffersHidden-->";


	}

	?>
</div><!-- end of content--> 
