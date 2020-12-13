@extends('layout.client')
@section('css')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>
body {background-color:#eee;}
.container-fluid {padding:50px;}
.container{background-color:white;padding:50px;   }
#title{font-family: 'Lobster', cursive;}
</style>
@endsection
@section('seo')
<title>Đăng nhập</title>
@endsection
@section('content')
<div class="container-fluid">
		<div class="container">
			
			<div class="row">
				<div class="col-md-5">
 					<form role="form" method="post" action="register.php">
					 @csrf
						<fieldset>							
							<p class="text-uppercase pull-center"> SIGN UP.</p>	
 							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control input-lg" placeholder="username">
							</div>

							<div class="form-group">
								<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
							</div>
								<div class="form-group">
								<input type="password" name="password2" id="password2" class="form-control input-lg" placeholder="Password2">
							</div>
							
 							<div>
 									  <input type="submit" class="btn btn-lg btn-primary   value="Register">
 							</div>
						</fieldset>
					</form>
				</div>
				
				<div class="col-md-2">
					<!-------null------>
				</div>
				
				<div class="col-md-5">
 				 		<form  method="post" action="{{route('logonUser')}}">
						  @csrf
						<fieldset>							
							<p class="text-uppercase"> Login using your account: </p>	
 								
							<div class="form-group">
								<input type="email" name="email" id="username" class="form-control input-lg" placeholder="username">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
							</div>
							<div>
								<input type="submit" class="btn btn-md" value="Sign In">
							</div>
								 
 						</fieldset>
				</form>	
				</div>
			</div>
		</div>
		
	</div>
@endsection
