
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from hencework.com/theme/droopy/full-width-light/form-file-upload.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 12:25:13 GMT -->
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Tickets</title>
		<meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		
		<!-- Bootstrap Dropify CSS -->
		<link href="../vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
		
		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
             @extends('FrontOffice/FMenu')
              <div class="wrapper  theme-2-active pimary-color-green">
	<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href=""><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href=""><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href=""><i class="zmdi zmdi-more"></i></a>
				
			</div>
				
		</nav>
	</div>
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Ajouter un nouvaux ticket</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<li><a href="Fdashboard">Dashboard</a></li>
							<li class="active"><span>Ticket</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
										<form method="POST" action="{{ route('envoyer-email') }}" enctype="multipart/form-data">
        @csrf                                      
											   <div class="form-group">
    <label class="control-label mb-10 text-left">Nom Application</label>
    <select class="form-control" name="app" required>
        <!-- Option par défaut pour le champ select -->
        <option value="">Sélectionner une application</option>

      <?php
try {
    // Connexion à la base de données
    $conn = new mysqli("127.0.0.1", "root", "", "pfc");

    // Vérification de la connexion
    if ($conn->connect_error) {
        throw new mysqli_sql_exception("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Exécution de votre requête SQL
    $sql = "SELECT id , app FROM application";
    $result = $conn->query($sql);

    // Vérification des erreurs lors de l'exécution de la requête
    if (!$result) {
        throw new mysqli_sql_exception("Erreur lors de l'exécution de la requête : " . $conn->error);
    }

     if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["app"] . '">' . $row["app"] . '</option>';
            }
        }

        // Fermeture de la connexion
       
    $conn->close();
} catch (mysqli_sql_exception $e) {
    // Gestion des exceptions ici
    echo "Erreur : " . $e->getMessage();
}
?>

    </select>
</div>
												<div class="form-group">
													<label class="control-label mb-10 text-left">Priorité</label>
													<select class="form-control" name="priorite" required>
					                                    <option value="P1">P1</option>
					                                    <option value="P2">P2</option>
					                                    <option value="P3">P3</option>
					                                    <option value="P4">P4</option>
					                                    <option value="P5">P5</option>
					                                </select>
												</div>
												 <div class="form-group">
												<div class="form-group">
													<label class="control-label mb-10 text-left">Date d'ouverture</label>
													<input type="datetime-local" class="form-control" name="datedouverture" placeholder="date" required>
												</div>
                                               
												 <div class="form-group">
													<label class="control-label mb-10 text-left">Email</label>
													<input type="email" class="form-control" name="email" placeholder="email" required>
												</div>
												<div class="mt-40">
													<label class="control-label mb-10 text-left">Capture</label>
													<input type="file" id="capture" name="capture" placeholder="capture" class="dropify" required/>
												</div>
												 
												<br>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-success btn-rounded">Ajouter</button>
												</div>
											</form>
											
										</div>
										
									</div>
									
								</div>
							
								
								
									
										
								
							
						
					<!-- /Row -->

					<!-- Row -->
					
						
				</div>
				
				
				
				
			</div>
			<!-- /Main Content -->
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScripts -->
		
		<!-- jQuery -->
		<script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<!-- Bootstrap Daterangepicker JavaScript -->
		<script src="../vendors/bower_components/dropify/dist/js/dropify.min.js"></script>
		
		<!-- Form Flie Upload Data JavaScript -->
		<script src="../dist/js/form-file-upload-data.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="../dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="../dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- Owl JavaScript -->
		<script src="../vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
		<!-- Switchery JavaScript -->
		<script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
		<!-- Init JavaScript -->
		<script src="../dist/js/init.js"></script>
		
	</body>

<!-- Mirrored from hencework.com/theme/droopy/full-width-light/form-file-upload.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 12:25:19 GMT -->
</html>