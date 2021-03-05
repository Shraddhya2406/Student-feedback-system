<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
		 <style>
			/* Remove the navbar's default rounded borders and increase the bottom margin */ 
			.navbar {
			  margin-bottom: 50px;
			  border-radius: 0;
			}
			
			.navbar-brand{
				padding: 0px;
			}
			
			/* Remove the jumbotron's default bottom margin */ 
			 .jumbotron {
			  margin-bottom: 0;
			}
		   
			/* Add a gray background color and some padding to the footer */
			footer {
			  background-color: #f2f2f2;
			  padding: 25px;
			}
		</style>
    </head>
    <body>
    <nav class="navbar-dashboard navbar-inverse">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand" href="#"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100px" alt="Image"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="/questions">Provide Feedback</a></li>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="#"><img src="https://img.icons8.com/bubbles/25/000000/see-female-account.png"/>{{ session('name') }}</a></li>
			  </ul>
			</div>
		  </div>
		</nav>

		<div class="container">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
			@if (session('status'))
			
                 <div class="card-body">
                        <h2>{{ session('name') }}
                        {{ __('You are logged in!') }}</h2>
                 </div>
				 <div class="card-body">
                        <h3>{{ session('status') }}</h3>
                 </div>
            @endif
            </div>
        </div>
    </div>
		  <div class="row">
		    <div class="col-sm-4"></div>
			<div class="col-sm-4">
			   <div class="panel panel-primary">
				<div class="panel-heading">PROVIDE FEEDBACK</div>
				<div class="panel-body">
					<a href="/questions">
						<img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
					</a>
				</div>
				<div class="panel-footer">Select a faculty and give your feedback</div>
			</div>
			<div class="col-sm-4"></div>
		  </div>
		</div>
    </body>
</html>
		