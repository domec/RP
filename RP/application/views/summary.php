<div id="content">
	<?php
	if ($this->session->flashdata('gainAccess') != true)
		redirect('project/home');
	else{
		
		foreach ($results as $rowQuery){
			foreach ($rowQuery as $row){
				$this->session->set_userdata('submitName',$row->name);
				echo $row->name;
				echo "<br />";
				if ($this->session->userdata('username') != null){
					$this->session->set_userdata('submitPrice',round($row->price * 0.98, 2));
					echo round($row->price * 0.98 ,2);
				}
				else {
					$this->session->set_userdata('submitPrice',$row->price);
					echo $row->price;
				}
				echo "<br />";
				echo "<hr>"."<br />";
			}
		}
		$this->session->set_userdata('submitUserData',$this->session->flashdata('data'));
		foreach ($this->session->flashdata('data') as $item)
			echo $item."<br />";
	}
	echo form_open('project/submit_order');
	echo form_submit('submit','Odoslat');
	echo form_close();

?>
	<div id="arrows">
<!--		<div id="leftArrow">
			<?php 
		//	echo anchor('#',"<img src=\"../img/arrowLeft.png\" title=\"LeftArrow\" alt=\"nazad\">");
			?>-->
		</div><!--end of leftArrow-->
		<!--<div id="rightArrow">
			<img src="../img/arrowRight.png" title="RightArrow" alt="pokracovat">-->
		</div><!--end of rightArrow-->
	</div><!--end of arrows-->
		
</div><!--end of content-->



