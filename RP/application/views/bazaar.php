<div id="content">
	<?php

	if ($this->session->userdata('username') == null)
		echo "Je potrebne sa najskor prihlasit.";
	else {
		echo "<div id=\"offerBook\">";
			echo "<h3>Pridať knihu do bazáru.</h3>";
		echo "</div><!--end of offerBook-->";
		echo "<div id=\"offerBookForm\">";
			include('offerBookForm.php');
		echo "</div><!--end of offerBookForm-->";

		echo "<div id=\"bazaarOffers\">";
			echo "<h3>Prezrieť si ponuku.</h3>";
		echo "</div><!--end of bazaarOffers-->";
		echo "<div id=\"bazaarOffersHidden\">";
			foreach ($results as $row){
				echo "<strong>Názov:</strong> ".$row->book_name.'<br />';
				echo "<strong>Cena:</strong> ".$row->book_price."&euro;".'<br />';
				echo "<strong>Popis:</strong> ".$row->book_description.'<br />';
				echo "<strong>Kontakt na majiteľa:</strong> ".$row->owner_email.'<br />';
				if ($row->owner_email == $this->session->userdata('email'))
					echo anchor('project/delete_offer/'.$row->id,'ZMAZAT');
				echo "<hr>";
			}
		echo "</div><!--end of bazaarOffersHidden-->";


	}

	?>
</div><!-- end of content--> 
