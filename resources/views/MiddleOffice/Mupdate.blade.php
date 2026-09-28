<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from hencework.com/theme/droopy/full-width-light/form-file-upload.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 12:25:13 GMT -->
<head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>update</title>
        <meta name="description" content="Droopy is a Dashboard & Admin Site Responsive Template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Droopy Admin, Droopyadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>
        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        
        <!-- Bootstrap Dropify CSS -->
        <link href="../../vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- Custom CSS -->
        <link href="../dist/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
             @extends('MiddleOffice/MMenu')
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
                          <h5 class="txt-dark">Modifier Application</h5>
                        </div>
                        <!-- Breadcrumb -->
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                          <ol class="breadcrumb">
                            <li><a href="Mdashboard">Dashboard</a></li>
                            <li><a href="Mupdate"><span>forms</span></a></li>
                            
                          </ol>
                        </div>
                        <!-- /Breadcrumb -->
                    </div>
                    <!-- /Title -->
                    
                    <!-- Row -->
                    <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="form-wrap">
                                        <form method="POST" action="{{ route('updateData', ['id' => $application->id]) }}" enctype="multipart/form-data">
                                                  @csrf
                                                <div class="form-group">
                                                    <label class="control-label mb-10 text-left">Nom Application</label>
                                                    <input type="text" class="form-control" name="app" placeholder="app" value="{{$application-> app}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10 text-left">URL</label>
                                                    <input type="text" class="form-control" name="url" placeholder="URL" value="{{$application -> url}}">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10 text-left">Editeur</label>
                                                    <input type="text" class="form-control" name="editeur" placeholder="Editeur" value="{{$application->editeur}}" required>
                                                </div>
                                                                                                <div class="form-group">
                                                    <label class="control-label mb-10 text-left">Direction</label>
                                                    <input type="text" class="form-control" name="direction" placeholder="Direction" value="{{$application -> direction}}">
                                                </div>
                                                
                                                <br>
                                                
                                                
                                                <br>
                                                <label for="image"  class="control-label mb-10 text-left">Current SLA:</label>
                                                <br>
                                                <img src="{{ asset('images/' . $application->sla) }}" alt="Current Image">
                                                    
                                                    <input type="file"   class="dropify" name="sla"/>
                                                </div>
                                                <br>
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-success btn-rounded">Modifier</button>
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
        <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        
        <!-- Bootstrap Daterangepicker JavaScript -->
        <script src="vendors/bower_components/dropify/dist/js/dropify.min.js"></script>
        
        <!-- Form Flie Upload Data JavaScript -->
        <script src="dist/js/form-file-upload-data.js"></script>
        
        <!-- Slimscroll JavaScript -->
        <script src="dist/js/jquery.slimscroll.js"></script>
    
        <!-- Fancy Dropdown JS -->
        <script src="dist/js/dropdown-bootstrap-extended.js"></script>
        
        <!-- Owl JavaScript -->
        <script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
    
        <!-- Switchery JavaScript -->
        <script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
    
        <!-- Init JavaScript -->
        <script src="dist/js/init.js"></script>
        
    </body>

<!-- Mirrored from hencework.com/theme/droopy/full-width-light/form-file-upload.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 May 2023 12:25:19 GMT -->
</html>