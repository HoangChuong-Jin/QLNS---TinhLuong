<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{ asset('resources/css/style.css') }}">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('resources/images/favicon-16x16.png') }}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{ asset('resources/images/bg2.jpg') }}">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">SAO KHUÊ</h2>
				</div>
			</div>
            @include('admin.alert')
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Login</h3>
		      	<form action="{{route('store')}}" class="signin-form" method="post">
                    @csrf
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Gmail" name="email" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="password" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" >
									  <span class="checkmark"></span>
									</label>
								</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('resources/js/jquery.min.js') }}"></script>
  <script src="{{ asset('resources/js/popper.js') }}"></script>
  <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('resources/js/main.js') }}"></script>

	</body>
</html>

