<!doctype html>
<html lang="en">
  <head>
  	<title>Sign Up </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{url('Login/css/style.css')}}">

	</head>
	<body>
		
	
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div >
		      		
					  
							
		      	</div>
				  <img src ="{{url('Login/images/2.png')}}" style="margin-left: 35px;margin-bottom: 20px;" >
						<form action="/register"  method="POST" class="login-form">
                        @csrf

                        @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    <!-- Flash message for error -->
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
		      		<div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="text" class="form-control rounded-left" name="matricule" placeholder="Martricule" required>
		      		</div>
                      <div class="form-group">
		      			<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
		      			<input type="email" class="form-control rounded-left" name="email" placeholder="Email" required>
		      		</div>
	            <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" class="form-control rounded-left" name="password" placeholder="Mot de passe" required>
	            </div>
                <div class="form-group">
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" class="form-control rounded-left" name="password_confirmation" placeholder="confirmation_du_mot_de_passe" required>
	            </div>
	            <div class="form-group">
													<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-user"></span></div>
													<select class="form-control" name="role" required>
					                                    <option value="FO">Front Office</option>
					                                    <option value="MO">Middle Office</option>
					                                    <option value="BO">Back Office</option>
					                                    
					                                </select>
												</div>
	            <div class="form-group d-flex align-items-center">
	            	<div class="w-100">
	            		
								</div>
								<div class="w-100 d-flex justify-content-end">
		            	<button type="submit" class="btn btn-primary rounded submit">Login</button>
	            	</div>
	            </div>
	            <div class="form-group mt-4">
								<div class="w-100 text-center">
									<p class="mb-1">Don't have an account? <a href="/">Sign In</a></p>
									
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{url('Login/js/jquery.min.js')}}"></script>
  <script src="{{url('Login/js/popper.js')}}"></script>
  <script src="{{url('Login/js/bootstrap.min.js')}}"></script>
  <script src="{{url('Login/js/main.js')}}"></script>

	</body>
</html>

