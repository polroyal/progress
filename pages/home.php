
	  <div class="">
		<div class="page-title">
		  <div class="title_left">
			<h3>Target <small>activities</small></h3>
		  </div>

		  <div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
			  <div class="input-group">
				<input type="text" class="form-control" placeholder="Search for..." id="search">
				<span class="input-group-btn">
				  <button type="button" class="btn btn-primary" onclick="window.location = 'index.php?p=requests_list&s=' + document.getElementById('search').value;"><strong>Go!</strong></button>
				</span>
			  </div>
			</div>
		  </div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
		  <div class="col-md-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2>
				<button class="btn btn-primary active" onclick="window.location = 'index.php?p=home';">View All Targets</button>
				<button class="btn btn-success" onclick="window.location = 'index.php?p=home&st=approved';">View Achieved Targets</button>
				<button class="btn btn-warning" onclick="window.location = 'index.php?p=home&st=pending';">View Pending Targets</button>
				<button class="btn btn-info" onclick="window.location = 'index.php?p=home&st=pending';">Milestone Status</button>
				<button class="btn btn-info" onclick="window.location = 'index.php?p=home&st=rejected';">Target Status</button></small></h2>
				<ul class="nav navbar-right panel_toolbox">
				 <li><a class="collapse-link"><i class="fa fa-chevron-up disabled"></i></a> 
				  </li>
				  <li class="dropdown disabled">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					<ul class="dropdown-menu" role="menu">
					  <li><a href="#">Settings 1</a>
					  </li>
					  <li><a href="#">Settings 2</a>
					  </li>
					</ul>
				  </li>
				  <!-- <li><a class="close-link"><i class="fa fa-close disabled"></i></a> -->
				  </li>
				</ul>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
			  <div class="row">
				<div class="col-md-8">
				<div id='calendar'></div>
				</div>

				<?php  include("echart.php"); ?>
				
				<div class="col-md-3" id="leaves">
				</div>
			  </div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
