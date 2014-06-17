			<?php
			if ($this->session->flashdata('item_added'))
				echo "<div id=\"item_added\">
					<span>Book succesfully added into cart!</span>
					<div id=\"hide\">
						HIDE
					</div>
					</div>";
			?>
			<div id="options">
				<ul>
					<li><strong>Order by:</strong></li>
					<?php
					$js = 'id="orderBy" onChange="submitOrderBy();"';
					$options = array(
					  'nameAsc'  => 'name ascending',
					  'nameDes'    => 'name descending',
					  'priceAsc'   => 'price ascending',
					  'priceDes' => 'price descending',
					);
						$formOrderBy = array('id' => 'formOrderBy');
						echo form_open('project/books',$formOrderBy);
						echo "<li>",form_dropdown('orderBy',$options,$orderBy,$js),"</li>";
						echo form_close();
					?>
				</ul>
				<ul>
					<li><strong>Books per page:</strong></li>
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
							<li><?php echo $pages;?> pages</li>
							<li><?php echo $price;?> &euro; s DPH </li>
							<li>Publisher <?php echo $publisher;?> </li>
							<li>Year <?php echo $year;?> </li>
							<li><?php echo anchor('project/add_to_cart/'.$id,'Add to cart');?></li>
							<?php
							if ($this->session->userdata('username') != NULL)
								echo "<li>".anchor('project/reviews/'.$id,'Reviews')."</li>";
							?>
						</ul>
					</div><!-- end of item_about-->
					<div class="item_annotation">
						<?php echo $annotation;?> 
					</div><!-- end of item_annotation-->
				</div><!-- end of item-->
			<?php } ?>
			</div><!-- end of content-->
