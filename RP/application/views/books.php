			<?php
			if ($this->session->flashdata('item_added'))
				echo "<div id=\"item_added\">
					<span>Položka bola úspešne vložená do košíka!</span>
					<div id=\"hide\">
						SKRYŤ
					</div>
					</div>";
			?>
			<div id="options">
				<ul>
					<li><strong>Zoradiť podľa:</strong></li>
					<?php
					$js = 'id="orderBy" onChange="submitOrderBy();"';
					$options = array(
					  'nameAsc'  => 'názvu vzostupne',
					  'nameDes'    => 'názvu zostupne',
					  'priceAsc'   => 'ceny vzostupne',
					  'priceDes' => 'ceny zostupne',
					);
						$formOrderBy = array('id' => 'formOrderBy');
						echo form_open('project/books',$formOrderBy);
						echo "<li>",form_dropdown('orderBy',$options,$orderBy,$js),"</li>";
						echo form_close();
					?>
				</ul>
				<ul>
					<li><strong>Počet kníh na stranu:</strong></li>
					<?php
					$js = 'id="perPage" onChange="submitPerPage();"';
					$options = array(
					  3  => 3,
					  5    => 5,
					  10   => 10,
					);
						$formPerPage = array('id' => 'formPerPage');
						echo form_open('project/books',$formPerPage);
						echo "<li>",form_dropdown('perPage',$options,$perPage,$js),"</li>";
						echo form_close();
					?>
				</ul>
					<?php
					echo '<div class="paginationOpt">';
							echo $this->pagination->create_links();
					echo '</div>';
					?>
			</div><!-- end of options-->

			<div id="content">
			<?php
			foreach ($results as $row){
				$name = $row->name;
				if ($this->session->userdata('username') == null)
					$price = $row->price;
				else
					$price = round(($row->price) * 0.98,2);
				$author = $row->author;
				$img_path = $row->img_path;
				$pages = $row->pages;
				$annotation = $row->annotation;
				$year = $row->year;
				$publisher = $row->publisher;
				$id = $row->id;
			?>

				<div class="item">
					<div class="item_img">
					<img src=" <?php echo base_url($img_path);?> " title="<?php echo $name;?> " width="100px" height="150px" alt=" <?php echo $name;?> ">
					</div><!-- end of item_img-->
					<div class="item_about">
						<ul>
							<li><span class="book_name"><?php echo $name;?></span></li>
							<li><?php echo $author;?> </li>
							<li><?php echo $pages;?> strán</li>
							<li><?php echo $price;?> &euro; s DPH </li>
							<li>Vydavateľstvo <?php echo $publisher;?> </li>
							<li>V roku <?php echo $year;?> </li>
							<li><?php echo anchor('project/add_to_cart/'.$id,'Pridat do kosika');?></li>
							<?php
							if ($this->session->userdata('username') != NULL)
								echo "<li>".anchor('project/reviews/'.$id,'Hodnotenia')."</li>";
							?>
						</ul>
					</div><!-- end of item_about-->
					<div class="item_annotation">
						<?php echo $annotation;?> 
					</div><!-- end of item_annotation-->
				</div><!-- end of item-->
			<?php } ?>
			</div><!-- end of content-->
