<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from jesus.gallery/cloud2/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Aug 2015 12:11:45 GMT -->
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Cloud Admin Dashboard</title>
		<meta name="description" content="Cloud Admin Panel" />
		<meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Bootstrap, Light weight Admin Dashboard,Light weight, Light weight Admin, Light weight Dashboard" />
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="shortcut icon" href="img/favicon.html">
		
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="css/animate.css" rel="stylesheet" media="screen">

		<!-- date range -->
		<link rel="stylesheet" type="text/css" href="css/daterange.css">

		<!-- Main CSS -->
		<link href="css/main.css" rel="stylesheet" media="screen">

		<!-- Slidebar CSS -->
		<link rel="stylesheet" type="text/css" href="css/slidebars.css">

		<!-- Font Awesome -->
		<link href="fonts/font-awesome.min.css" rel="stylesheet">

		<!-- Metrize Fonts -->
		<link href="fonts/metrize.css" rel="stylesheet">

		<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>  

	<body>

		<!-- Left sidebar start -->
		<aside id="sidebar">

			<!-- Logo starts -->
			<a href="#" class="logo">
				<img src="img/logo.png" alt="logo">
			</a>
			<!-- Logo ends -->

			<!-- Menu start -->
			<div id='menu'>
				<ul>
					<li>
						<a href='index.html'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe007;"></div>
							<span>Dashboard</span>
						</a>
					</li>
					<li>
						<a href='graphs.html'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe0f8;"></div>
							<span>Graphs</span>
						</a>
					</li>
					<li class='has-sub '>
						<a href='#'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe052;"></div>
							<span>Ui Elements</span>
						</a>
						<ul>
							<li>
								<a href='panels.html'>
									<span>Panel &amp; List Groups</span>
								</a>
							</li>
							<li>
								<a href='buttons.html'>
									<span>Buttons</span>
								</a>
							</li>
							<li>
								<a href='grid.html'>
									<span>Grid</span>
								</a>
							</li>
							<li>
								<a href='ui-elements.html'>
									<span>More</span>
								</a>
							</li>
						</ul>
					</li>
					<li class='has-sub'>
						<a href='#'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe0ab;"></div>
							<span>Forms</span>
						</a>
						<ul>
							<li>
								<a href='form.html'>
									<span>Form Elements</span>
								</a>
							</li>
							<li>
								<a href='form-wizard.html'>
									<span>Form Wizards</span>
								</a>
							</li>
							<li>
								<a href="editor.html">
									<span>Wysihtml Editor</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href='gallery.html'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe0e6;"></div>
							<span>Gallery</span>
						</a>
					</li>
					<li>
						<a href="tables.html">
							<div class="fs1" aria-hidden="true" data-icon="&#xe0f2;"></div>
							<span>Tables</span>
						</a>
					</li>
					<li class='has-sub highlight active'>
						<a href='#'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></div>
							<span>Bonus Pages</span>
						</a>
						<ul style="display: block">
							<li>
								<a href='invoice.html' class="select">
									<span>Invoice</span>
								</a>
							</li>
							<li>
								<a href='calendar.html'>
									<span>Calendar</span>
								</a>
							</li>
							<li>
								<a href='login.html'>
									<span>Login</span>
								</a>
							</li>
							<li>
								<a href='404.html'>
									<span>404</span>
								</a>
							</li>
							<li>
								<a href='default.html'>
									<span>Default</span>
								</a>
							</li>
						</ul>
					</li>
					<li>
						<a href='maps.html'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe089;"></div>
							<span>Vector Maps</span>
						</a>
					</li>
					<li>
						<a href='notifications.html'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe0e9;"></div>
							<span>Notifications</span>
						</a>
					</li>
					<li>
						<a href='typography.html'>
							<div class="fs1" aria-hidden="true" data-icon="&#xe019;"></div>
							<span>Typography</span>
						</a>
					</li>
				</ul>
			</div>
			<!-- Menu End -->

		</aside>
		<!-- Left sidebar end -->

		<!-- Dashboard Wrapper Start -->
		<div class="dashboard-wrapper">

			<!-- Header start -->
			<header>
				<ul class="pull-left" id="left-nav">
					<li class="hidden-lg hidden-md hidden-sm">
						<div class="logo-mob clearfix">
							<h2><div class="fs1" aria-hidden="true" data-icon="&#xe0db;"></div><span>Cloud Admin</span></h2>
						</div>
					</li>
					<li class="hidden-xs">
						<a href="#" class="btn btn-info btn-sm">V1</a>
					</li>
					<li>
						<div class="custom-search hidden-sm hidden-xs pull-left">
							<input type="text" class="search-query" placeholder="Search here">
							<i class="fa fa-search"></i>
						</div>
					</li>
				</ul>
				<div class="pull-right">
					<ul id="mini-nav" class="clearfix">
						<li class="list-box hidden-xs">
							<a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<div class="fs1" aria-hidden="true" data-icon="&#xe129;"></div>
							</a>
							<span class="info-label red-bg animated rubberBand">7</span>
							<ul class="dropdown-menu flipInX animated messages">
								<li class="dropdown-header">You have 7 messages</li>
								<li>
									<div class="icon">
										<img src="img/admin10.png" alt="Browser">
									</div>
									<div class="details">
										<strong class="text-danger">Willams</strong>
										<span>Firefox is a free, open-source web browser from Mozilla.</span>
									</div>
								</li>
								<li>
									<div class="icon">
										<img src="img/admin6.png" alt="Browser">
									</div>
									<div class="details">
										<strong class="text-info">Sunny</strong>
										<span>Internet Explorer is a free web browser from Microsoft.</span>
									</div>
								</li>
								<li>
									<div class="icon">
										<img src="img/admin3.png" alt="Browser">
									</div>
									<div class="details">
										<strong class="text-info">James</strong>
										<span>Safari is known for its sleek design and ease of use.</span>
									</div>
								</li>
							</ul>
						</li>
						<li class="list-box hidden-xs">
							<a id="drop2" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<div class="fs1" aria-hidden="true" data-icon="&#xe0e3;"></div>
							</a>
							<span class="info-label blue-bg animated rubberBand">3</span>
							<ul class="dropdown-menu fadeInUp animated messages">
								<li class="dropdown-header">Recent Chat</li>
								<div class="chats clearfix">
									<p class="chat them">
									James, I'm going to be a little late.
									</p>
									<p class="chat me">
									S'Okay, Dude. You know your lines...?
									</p>
									<p class="chat them">
									I know em, I don't know what order they come in...
									</p>
									<p class="chat me">
									We'll work it out...
									</p>
								</div>
							</ul>
						</li>
						<li class="list-box hidden-xs dropdown">
							<a id="drop3" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
								<div class="fs1" aria-hidden="true" data-icon="&#xe0ca;"></div>
							</a>
							<span class="info-label green-bg animated rubberBand">6</span>
							<ul class="flipInX animated dropdown-menu stats-widget clearfix">
							<li>
								<h5 class="text-success">$37895</h5>
								<p>Revenue <span class="text-success">+2%</span></p>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete (success)</span>
									</div>
								</div>
							</li>
							<li>
								<h5 class="text-info">47,892</h5>
								<p>Downloads <span class="text-info">+39%</span></p>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete (info)</span>
									</div>
								</div>
							</li>
							<li>
								<h5 class="text-danger">28214</h5>
								<p>Uploads <span class="text-danger">-7%</span></p>
								<div class="progress progress-xs">
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete (danger)</span>
									</div>
								</div>
							</li>
						</ul>
						</li>
						<li class="list-box hidden-xs dropdown">
							<a id="drop1" href="#" role="button" class="dropdown-toggle current-user" data-toggle="dropdown">
								Sandy <b class="caret"></b>
							</a>
							<ul class="dropdown-menu sm fadeInUp animated messages">
								<li class="dropdown-content">
									<a href="#">Edit Profile</a>
									<a href="#">Change Password</a>
									<a href="#">Settings</a>
									<a href="login.html">Logout</a>
								</li>
							</ul>
						</li>
						<li class="list-box hidden-lg hidden-md hidden-sm" id="mob-nav">
							<a href="#">
								<i class="fa fa-reorder"></i>
							</a>
						</li>
					</ul>
				</div>
			</header>
			<!-- Header ends -->

			<!-- Right sidebar start -->
			<div class="sb-slidebar sb-right sb-close">

				<!-- User Profile Start -->
        <section class="user-profile">
          <div class="profile-container">
            <img src="img/admin1.png" class="user-img" alt="User Image">
            <div class="desc">
              <h4>John Doe</h4>
              <p class="text-info">UX Designer</p>
            </div>
          </div>
          <ul class="ftr-link">
            <li class="active">
              <a href="javascript:;">
                <div class="fs1" aria-hidden="true" data-icon="&#xe033;"></div>985
              </a>
            </li>
            <li>
              <a href="javascript:;" class="text-success">
                <div class="fs1" aria-hidden="true" data-icon="&#xe0b9;"></div> 999
              </a>
            </li>
            <li>
              <a href="javascript:;" class="text-pink">
                <div class="fs1" aria-hidden="true" data-icon="&#xe0e3;"></div> 143
              </a>
            </li>
          </ul>
        </section>
        <!-- User Profile End -->

        <!-- Online Users start -->
        <div class="block">
          <div class="heading">Users Online</div>
          <div class="wrapper">
            <!-- Online Users Start -->
            <ul class="online-users">
              <li>
                <a href="#" data-lastname="Sandhya" data-status="online" data-original-title="">
                  <span>Sunny</span>
                  <div class="user-status online"></div>
                </a>
              </li>
              <li>
                <a href="#" data-lastname="Sandhya" data-status="online" data-original-title="">
                  <span>Henrik</span>
                  <div class="user-status online"></div>
                </a>
              </li>
              <li>
                <a href="#" data-lastname="Sandhya" data-status="online" data-original-title="">
                  <span>John Doe</span>
                  <div class="user-status busy"></div>
                </a>
              </li>
              <li>
                <a href="#" data-lastname="Sandhya" data-status="online" data-original-title="">
                  <span>Fleming</span>
                  <div class="user-status away"></div>
                </a>
              </li>
              <li>
                <a href="#" data-lastname="Sandhya" data-status="online" data-original-title="">
                  <span>Wills</span>
                  <div class="user-status"></div>
                </a>
              </li>
            </ul>
            <!-- Online Users End -->
          </div>
        </div>
        <!-- Online Users end -->

        <!-- Checkout start -->
        <div class="block">
          <div class="heading">Checkout</div>
          <ul class="cart">
            <li class="cart-item">
              <span class="cart-item-pic">
                <img src="img/admin2.png" alt="EarthSquare">
              </span>
              Item #1
              <span class="cart-item-desc">Description</span>
              <span class="cart-item-price">$16.80</span>
            </li>
            <li class="cart-item">
              <span class="cart-item-pic">
                <img src="img/admin4.png" alt="EarthSquare">
              </span>
              Item #2
              <span class="cart-item-desc">Description</span>
              <span class="cart-item-price">$15.00</span>
            </li>
            <li class="cart-item">
              <span class="cart-item-pic">
                <img src="img/admin8.png" alt="EarthSquare">
              </span>
              Item #3
              <span class="cart-item-desc">Description</span>
              <span class="cart-item-price">$23.00</span>
            </li>
          </ul>
          <div class="cart-bottom">
            Total: $54.80
            <a href="#" class="cart-button">Continue</a>
          </div>
        </div>
        <!-- Checkout end -->

        <!-- Notifications Start -->
        <div class="block">
          <div class="heading">Notifications</div>
          <!-- Notifications -->
          <ul class="infos">
            <li>
              <span class="label label-success pull-left">
                <div class="fs1" aria-hidden="true" data-icon="&#xe128;"></div>
              </span>
              <div class="info">
                <h6>Guru Tweeted</h6>
                <p class="designation">Few seconds ago</p>
              </div>
            </li>
            <li>
              <span class="label label-danger pull-left">
                <div class="fs1" aria-hidden="true" data-icon="&#xe0e9;"></div>
              </span>
              <div class="info">
                <h6>Server #999 Crashed</h6>
                <p class="designation">2 minutes ago</p>
              </div>
            </li>
            <li>
              <span class="label label-info pull-left">
                <div class="fs1" aria-hidden="true" data-icon="&#xe0e3;"></div>
              </span>
              <div class="info">
                <h6>Kiri's account was created</h6>
                <p class="designation">5 days ago</p>
              </div>
            </li>
          </ul>
        </div>
        <!-- Notifications End -->

			</div>
			<!-- Right sidebar end -->

			<!-- Main Container Start -->
			<div class="main-container">

				<!-- Top Bar Starts -->
				<div class="top-bar clearfix">
					<div class="page-title">
						<h4><div class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></div>Invoice <a href="invoice.html" class="samll">Bonus Pages</a></h4>
					</div>
					<ul class="right-stats hidden-xs" id="mini-nav-right">
						<li class="reportrange btn btn-success">
							<i class="fa fa-calendar"></i>
							<span></span> <b class="caret"></b>
						</li>
						<li>
							<a href="#" class="btn btn-info sb-open-right sb-close">
								<div class="fs1" aria-hidden="true" data-icon="&#xe06a;"></div>
							</a>
						</li>
					</ul>
				</div>
				<!-- Top Bar Ends -->

				<!-- Container fluid Starts -->
				<div class="container-fluid">

					<!-- Spacer starts -->
					<div class="spacer-xs">

						<!-- Row start -->
			      <div class="row no-gutter">
			        <div class="col-md-12 col-sm-12 col-sx-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4>Invoice</h4>
										<ul class="links">
											<li>
												<a href="#">
													<i class="fa fa-sliders"></i>
												</a>
											</li>
										</ul>
									</div>
			            <div class="panel-sub-heading">
			              <a href="#">Invoice No - 55789 / Date - 15:02:2015</a>
			            </div>
			            <div class="panel-body">
			              <div class="row">
			                <div class="col-md-3 col-sm-3 col-sx-6">
			                  <div class="img-responsive">
			                    <img src="img/logo-blue.png" alt="Cloud Admin" />
			                  </div>
			                </div>
			                <div class="col-md-9 col-sm-9 col-sx-6">
			                  <div class="pull-right">
			                    <button type="button" class="btn btn-info">Print</button>
			                    <button type="button" class="btn btn-danger">Download</button>
			                  </div>
			                </div>
			              </div>

			              <br>

			              <div class="table-responsive">
			                <table class="table">
			                  <tbody>
			                    <tr>
			                      <td style="width:30%">
			                        <p class="lead">To, </p>
			                        <address class="no-margin">
			                          <strong>Cloud 9 Technologies,</strong><br>
			                          Walnut Creek, CA 46589<br>
			                          <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">name@company.com</a><br> 
			                          <abbr title="Work Phone">phone:</abbr> (000) 123-456-789<br>
			                          <abbr title="Work Fax">fax:</abbr> (000) 123-456-789
			                        </address>
			                      </td>
			                      <td class="right-align-text">
			                        <p class="lead">From, </p>
			                        <address class="no-margin">
			                          <strong>Business manager</strong> at 
			                          <strong><a href="#">Harrison Group</a></strong><br> 
			                          <abbr title="Work email">e-mail:</abbr> <a href="mailto:#">srinu@mail.com</a><br> 
			                          <abbr title="Work Phone">phone:</abbr> (000) 123-456-789<br>
			                          <abbr title="Work Fax">fax:</abbr> (000) 123-456-789
			                        </address>

			                        <hr>

			                        <p class="alert alert-block alert-info fade in no-margin">
			                          <strong>Note: </strong>With 3D transforms, we can make simple elements more interesting by setting them into three dimensional space. Together with CSS transitions, these elements can be moved in 3D space and create a realistic effect.
			                        </p>
			                      </td>
			                    </tr>
			                  </tbody>
			                </table>
			              </div>

			              <div class="table-responsive">
			                <table class="table table-condensed table-striped">
			                  <thead>
			                    <tr>
			                      <th style="width:10%">Sl. No.</th>
			                      <th style="width:20%">Product Name</th>
			                      <th style="width:40%">Description</th>
			                      <th style="width:10%">Quantity</th>
			                      <th style="width:10%">VAT</th>
			                      <th style="width:10%">Total</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <tr>
			                      <td>001</td>
			                      <td>Product 1</td>
			                      <td>
			                        Incentivize platforms Incentivize user-contributed...
			                      </td>
			                      <td>4</td>
			                      <td>2.24%</td>
			                      <td>50.00$</td>
			                    </tr>
			                    <tr>
			                      <td>002</td>
			                      <td>Product 2</td>
			                      <td>
			                        Enable innovate leverage tagclouds Incentivize platforms...
			                      </td>
			                      <td>21</td>
			                      <td>6.59%</td>
			                      <td>130.00$</td>
			                    </tr>
			                    <tr>
			                      <td>003</td>
			                      <td>Product 3</td>
			                      <td>
			                        E-business web services Enable innovate leverage tagclouds...
			                      </td>
			                      <td>9</td>
			                      <td>2.50%</td>
			                      <td>220.00$</td>
			                    </tr>
			                    <tr>
			                      <td class="total" colspan="5">Subtotal</td>
			                      <td>400.00$</td>
			                    </tr>
			                    <tr>
			                      <td class="total" colspan="5">Tax (9.25%)</td>
			                      <td>3000.00$</td>
			                    </tr>
			                    <tr>
			                      <td class="total" colspan="5">Discount</td>
			                      <td>400%</td>
			                    </tr>
			                    <tr class="info">
			                      <td class="total text-info" colspan="5">Total</td>
			                      <td class="hidden-phone text-info">3000.00$</td>
			                    </tr>
			                    <tr>
			                      <td colspan="6">
			                        <a href="#" class="btn btn-warning btn-lg pull-right" data-original-title="">Pay Now</a>
			                      </td>
			                    </tr>
			                  </tbody>
			                </table>
			              </div>
			            </div>
			          </div>
			        </div>
			      </div>
			      <!-- Row end -->

			      <!-- Row start -->
			      <div class="row no-gutter">
			        <div class="col-md-12 col-sm-12 col-sx-12">
			          <div class="panel panel-default">
			            <div class="panel-heading">
										<h4>Invoice Activity</h4>
										<ul class="links">
											<li>
												<a href="#">
													<i class="fa fa-sliders"></i>
												</a>
											</li>
										</ul>
									</div>
			            <div class="panel-sub-heading">
			              <a href="#">Last 30 days</a>
			            </div>
			            <div class="panel-body">
			              <div id="dt_example" class="table-responsive example_alt_pagination clearfix">
			                <table class="table table-condensed table-striped table-bordered pull-left" id="data-table">    
			                  <thead>
			                    <tr>
			                      <th style="width:3%">
			                        <input type="checkbox">
			                      </th>
			                      <th style="width:12%">Date</th>
			                      <th style="width:10%">Number</th>
			                      <th style="width:30%">Client &amp; Summary</th>
			                      <th style="width:15%">Status</th>
			                      <th style="width:15%">Total</th>
			                      <th style="width:15%">Outstanding</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 1167</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Honey - <small>Consultancy fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $198
			                      </td>
			                      <td>
			                        <span class="text-success">$89</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 12</td>
			                      <td>IN - 3981</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           James - <small>Testing</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Success</span>
			                      </td>
			                      <td>
			                        $2187
			                      </td>
			                      <td>
			                        <span class="text-info">$2187</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 4482</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           Selva - <small>Web Design</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-warning">Warning</span>
			                      </td>
			                      <td>
			                        $650
			                      </td>
			                      <td>
			                        <span class="text-warning">$490</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 29</td>
			                      <td>IN - 3289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sweet Dreams - <small>Web Developement</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $1289
			                      </td>
			                      <td>
			                        <span class="text-error">$1184</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 23</td>
			                      <td>IN - 1093</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Kohli - <small>Photography fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $663
			                      </td>
			                      <td>
			                        <span class="text-success">$280</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 28</td>
			                      <td>IN - 2289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Nyra - <small>Fireworks</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $110
			                      </td>
			                      <td>
			                        <span class="text-error">$110</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeX">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Feb 09</td>
			                      <td>IN - 1145</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Henrik - <small>Design works</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Sent</span>
			                      </td>
			                      <td>
			                        $95
			                      </td>
			                      <td>
			                        <span class="text-info">$27</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 01</td>
			                      <td>IN - 5120</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sandy - <small>Salary</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $600
			                      </td>
			                      <td>
			                        <span class="text-error">$600</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 1167</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Honey - <small>Consultancy fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $198
			                      </td>
			                      <td>
			                        <span class="text-success">$89</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 12</td>
			                      <td>IN - 3981</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           James - <small>Testing</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Success</span>
			                      </td>
			                      <td>
			                        $2187
			                      </td>
			                      <td>
			                        <span class="text-info">$2187</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 4482</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           Selva - <small>Web Design</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-warning">Warning</span>
			                      </td>
			                      <td>
			                        $650
			                      </td>
			                      <td>
			                        <span class="text-warning">$490</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 29</td>
			                      <td>IN - 3289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sweet Dreams - <small>Web Developement</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $1289
			                      </td>
			                      <td>
			                        <span class="text-error">$1184</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 23</td>
			                      <td>IN - 1093</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Kohli - <small>Photography fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $663
			                      </td>
			                      <td>
			                        <span class="text-success">$280</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 28</td>
			                      <td>IN - 2289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Nyra - <small>Fireworks</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $110
			                      </td>
			                      <td>
			                        <span class="text-error">$110</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeX">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Feb 09</td>
			                      <td>IN - 1145</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Henrik - <small>Design works</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Sent</span>
			                      </td>
			                      <td>
			                        $95
			                      </td>
			                      <td>
			                        <span class="text-info">$27</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 01</td>
			                      <td>IN - 5120</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sandy - <small>Salary</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $600
			                      </td>
			                      <td>
			                        <span class="text-error">$600</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 1167</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Honey - <small>Consultancy fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $198
			                      </td>
			                      <td>
			                        <span class="text-success">$89</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 12</td>
			                      <td>IN - 3981</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           James - <small>Testing</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Success</span>
			                      </td>
			                      <td>
			                        $2187
			                      </td>
			                      <td>
			                        <span class="text-info">$2187</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 4482</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           Selva - <small>Web Design</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-warning">Warning</span>
			                      </td>
			                      <td>
			                        $650
			                      </td>
			                      <td>
			                        <span class="text-warning">$490</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 29</td>
			                      <td>IN - 3289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sweet Dreams - <small>Web Developement</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $1289
			                      </td>
			                      <td>
			                        <span class="text-error">$1184</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 23</td>
			                      <td>IN - 1093</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Kohli - <small>Photography fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $663
			                      </td>
			                      <td>
			                        <span class="text-success">$280</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 28</td>
			                      <td>IN - 2289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Nyra - <small>Fireworks</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $110
			                      </td>
			                      <td>
			                        <span class="text-error">$110</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeX">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Feb 09</td>
			                      <td>IN - 1145</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Henrik - <small>Design works</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Sent</span>
			                      </td>
			                      <td>
			                        $95
			                      </td>
			                      <td>
			                        <span class="text-info">$27</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 01</td>
			                      <td>IN - 5120</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sandy - <small>Salary</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $600
			                      </td>
			                      <td>
			                        <span class="text-error">$600</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 1167</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Honey - <small>Consultancy fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $198
			                      </td>
			                      <td>
			                        <span class="text-success">$89</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 12</td>
			                      <td>IN - 3981</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           James - <small>Testing</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Success</span>
			                      </td>
			                      <td>
			                        $2187
			                      </td>
			                      <td>
			                        <span class="text-info">$2187</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 4482</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           Selva - <small>Web Design</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-warning">Warning</span>
			                      </td>
			                      <td>
			                        $650
			                      </td>
			                      <td>
			                        <span class="text-warning">$490</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 29</td>
			                      <td>IN - 3289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sweet Dreams - <small>Web Developement</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $1289
			                      </td>
			                      <td>
			                        <span class="text-error">$1184</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 23</td>
			                      <td>IN - 1093</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Kohli - <small>Photography fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $663
			                      </td>
			                      <td>
			                        <span class="text-success">$280</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 28</td>
			                      <td>IN - 2289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Nyra - <small>Fireworks</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $110
			                      </td>
			                      <td>
			                        <span class="text-error">$110</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeX">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Feb 09</td>
			                      <td>IN - 1145</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Henrik - <small>Design works</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Sent</span>
			                      </td>
			                      <td>
			                        $95
			                      </td>
			                      <td>
			                        <span class="text-info">$27</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 01</td>
			                      <td>IN - 5120</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sandy - <small>Salary</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $600
			                      </td>
			                      <td>
			                        <span class="text-error">$600</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 1167</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Honey - <small>Consultancy fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $198
			                      </td>
			                      <td>
			                        <span class="text-success">$89</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 12</td>
			                      <td>IN - 3981</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           James - <small>Testing</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Success</span>
			                      </td>
			                      <td>
			                        $2187
			                      </td>
			                      <td>
			                        <span class="text-info">$2187</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 4482</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                           Selva - <small>Web Design</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-warning">Warning</span>
			                      </td>
			                      <td>
			                        $650
			                      </td>
			                      <td>
			                        <span class="text-warning">$490</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 29</td>
			                      <td>IN - 3289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sweet Dreams - <small>Web Developement</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $1289
			                      </td>
			                      <td>
			                        <span class="text-error">$1184</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 23</td>
			                      <td>IN - 1093</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Kohli - <small>Photography fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $663
			                      </td>
			                      <td>
			                        <span class="text-success">$280</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 28</td>
			                      <td>IN - 2289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Nyra - <small>Fireworks</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $110
			                      </td>
			                      <td>
			                        <span class="text-error">$110</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeX">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Feb 09</td>
			                      <td>IN - 1145</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Henrik - <small>Design works</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Sent</span>
			                      </td>
			                      <td>
			                        $95
			                      </td>
			                      <td>
			                        <span class="text-info">$27</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 01</td>
			                      <td>IN - 5120</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sandy - <small>Salary</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $600
			                      </td>
			                      <td>
			                        <span class="text-error">$600</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 1167</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Honey - <small>Consultancy fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $198
			                      </td>
			                      <td>
			                        <span class="text-success">$89</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 12</td>
			                      <td>IN - 3981</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          James - <small>Testing</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Success</span>
			                      </td>
			                      <td>
			                        $2187
			                      </td>
			                      <td>
			                        <span class="text-info">$2187</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Jan 10</td>
			                      <td>IN - 4482</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Selva - <small>Web Design</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-warning">Warning</span>
			                      </td>
			                      <td>
			                        $650
			                      </td>
			                      <td>
			                        <span class="text-warning">$490</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 29</td>
			                      <td>IN - 3289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sweet Dreams - <small>Web Developement</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $1289
			                      </td>
			                      <td>
			                        <span class="text-error">$1184</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeA">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 23</td>
			                      <td>IN - 1093</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Kohli - <small>Photography fee</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-success">Sent</span>
			                      </td>
			                      <td>
			                        $663
			                      </td>
			                      <td>
			                        <span class="text-success">$280</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeU">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 July 28</td>
			                      <td>IN - 2289</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Nyra - <small>Fireworks</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $110
			                      </td>
			                      <td>
			                        <span class="text-error">$110</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeX">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2015 Feb 09</td>
			                      <td>IN - 1145</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Henrik - <small>Design works</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-info">Sent</span>
			                      </td>
			                      <td>
			                        $95
			                      </td>
			                      <td>
			                        <span class="text-info">$27</span>
			                      </td>
			                    </tr>
			                    <tr class="gradeC">
			                      <td>
			                        <input type="checkbox">
			                      </td>
			                      <td>2014 Dec 01</td>
			                      <td>IN - 5120</td>
			                      <td>
			                        <a href="invoice.html" class="text-info">
			                          Sandy - <small>Salary</small>
			                        </a>
			                      </td>
			                      <td>
			                        <span class="label label-danger">Pending</span>
			                      </td>
			                      <td>
			                        $600
			                      </td>
			                      <td>
			                        <span class="text-error">$600</span>
			                      </td>
			                    </tr>
			                  </tbody>
			                </table>
			              </div>
			            </div>
			          </div>
			        </div>
			      </div>

					</div>
					<!-- Spacer ends -->

				</div>
				<!-- Container fluid ends -->

			</div>
			<!-- Main Container Start -->

			<!-- Footer Start -->
			<footer>
				Copyright Cloud Admin <span>2015</span>. All Rights Reserved.
			</footer>
			<!-- Footer end -->
			
		</div>
		<!-- Dashboard Wrapper End -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="js/jquery.js"></script>

		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Animated Right Sidebar -->
		<script src="js/slidebars.js"></script>

		<!-- Data tables -->
    <script src="js/jquery.datatables.js"></script>

		<!-- Date Range -->
		<script src="js/daterange/moment.js"></script>
		<script src="js/daterange/daterangepicker.js"></script>

		<!-- Custom JS -->
		<script src="js/custom.js"></script>

		<script type="text/javascript">
      //Data Tables
      $(document).ready(function () {
        $('#data-table').dataTable({
          "sPaginationType": "full_numbers"
        });
        $("#data-table_length").css("display","none")
      });
    </script>

	</body>

<!-- Mirrored from jesus.gallery/cloud2/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Aug 2015 12:11:46 GMT -->
</html>