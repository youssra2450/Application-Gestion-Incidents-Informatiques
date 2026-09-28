<!doctype html>
<html lang="en">
  <head>
  	<title>Login </title>
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
						<form action="/" class="login-form"  method="POST">
						@csrf
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
	            	<div class="icon d-flex align-items-center justify-content-center"><span class="fa fa-lock"></span></div>
	              <input type="password" class="form-control rounded-left" name="password" required minlength="8"   placeholder="Mot de passe">
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
									<p class="mb-1">Vous n'avez pas un compte? <a href="/register">Sign Up</a></p>
									
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

