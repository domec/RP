				<nav>
					<div id = "nav">
						<ul>
							<li <?php if ($navCurrent == 'home') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/home','Home'); ?>  </li>
							<li <?php if ($navCurrent == 'books') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/books','Books'); ?>  </li>
							<li <?php if ($navCurrent == 'bazaar') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/bazaar','Ads'); ?>  </li>
							<li <?php if ($navCurrent == 'about') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/about','About us'); ?>  </li>
							<li <?php if ($navCurrent == 'about_project') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/about_project','About project'); ?>  </li>
						</ul>
					</div><!-- end of nav-->
				</nav>
			</div><!-- end of header-->
