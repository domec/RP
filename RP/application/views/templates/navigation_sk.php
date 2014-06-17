				<nav>
					<div id = "nav">
						<ul>
							<li <?php if ($navCurrent == 'home') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/home','Domov'); ?>  </li>
							<li <?php if ($navCurrent == 'books') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/books','Knihy'); ?>  </li>
							<li <?php if ($navCurrent == 'bazaar') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/bazaar','Bazár kníh'); ?>  </li>
							<li <?php if ($navCurrent == 'about') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/about','O nás'); ?>  </li>
							<li <?php if ($navCurrent == 'about_project') echo 'id="navCurrent"';  ?>> <?php echo anchor('project/about_project','O projekte'); ?>  </li>
						</ul>
					</div><!-- end of nav-->
				</nav>
			</div><!-- end of header-->
