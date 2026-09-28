
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hencework.com/theme/droopy/full-width-light/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 12:25:35 GMT -->
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Applications</title>
	<meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	
</head>

<body>
@extends('MiddleOffice/MMenu')
	
	<!--/Preloader-->
    <div class="wrapper  theme-1-active pimary-color-green">
           <div class="wrapper  theme-2-active pimary-color-green">
	<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href=""><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href=""><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href=""><i class="zmdi zmdi-more"></i></a>
				<form id="search_form" action="{{ route('MAsearch') }}" method="GET" role="search" class="top-nav-search collapse pull-left">
				    <div class="input-group">
				        <input type="text" name="app" id="search_input" class="form-control" placeholder="Search">
				        <span class="input-group-btn">
				            <button type="button" class="btn btn-default" data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true">
				                <i class="zmdi zmdi-search"></i>
				            </button>
				        </span>
				    </div>
				</form>
			</div>
				
		</nav>
	</div>
		<div class="page-wrapper">
			<div class="container-fluid">
				
				<!-- Title -->
				<div class="row heading-bg">
					<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					  <h5 class="txt-dark">Listes des Applications</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="index.html">Dashboard</a></li>
						<li><a href="#"><span>table</span></a></li>
						
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<div class="row">
					<!-- Basic Table -->
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Applications</h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap mt-40">
										<div class="table-responsive">
										@if(session() -> has('ajouter'))
												<div class="alert alert-success">
													{{ session() -> get('ajouter') }}
												</div>
												@endif
												
												

											<table class="table mb-0" id="myTable">
												<thead>
												  <tr>
													<th>#</th>
													<th>App</th>
													<th>URL</th>
													<th>Editeur</th>
													<th>Direction</th>
                                                    <th>SLA</th>
                                                    <th>Action</th>
													 
												  </tr>
												  @foreach($application as $application)

												  <tr>
													<td>{{$application->id}}</td>
													<td>{{$application->app}}</td>
													<td><a style ="color:blue;text-decoration-line:underline;"target="_blank" href ="{{$application->url}}">{{$application->url}}</a></td>
													<td>{{$application->editeur}}</td>
													<td>{{$application->direction}}</td>
													<td>
										                <a style="color: blue; text-decoration-line: underline;" target="_blank" href="{{ asset('images/' . $application->sla) }}">
										                    Voir le PDF
										                </a>
										            </td>
										            <td>
														<a href="/Mdeleteapp/{{$application ->id}}" ><i class="fa fa-trash"  style ="color:red ;"></i></a>
														<div class="w3-ul">
														<a href="{{ route('MshowUpdateForm', ['id' => $application->id]) }}" ><i class="fa fa-edit"></i></i></a>
														</div>


														
													</td>
												  </tr>
												  @endforeach
												</thead>
												
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Basic Table -->
				</div>	
			</div>
		</div>
		<!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<!-- Piety JavaScript -->
	<script src="vendors/bower_components/peity/jquery.peity.min.js"></script>
	<script src="dist/js/peity-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
</body>


<!-- Mirrored from hencework.com/theme/droopy/full-width-light/basic-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 12:25:35 GMT -->
</html>
