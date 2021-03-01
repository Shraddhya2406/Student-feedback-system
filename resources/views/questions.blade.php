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

        .navbar-brand {
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
                <a class="navbar-brand" href="#"><img src="https://placehold.it/150x80?text=IMAGE"
                        class="img-responsive" style="width:100px" alt="Image"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="/dashboard">Home</a></li>
                    <li class="active"><a href="#">Provide Feedback</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
		<form method="POST" action="/dashboard">
			@csrf
			<div class="col-md-12"><h1>Please give appropriate ratings and reviews</h1></div>
				<div class="select_faculty">
					<p class="h4">Select Faculty : </p>
					<select class="form-select form-select-lg mb-3" name="faculty">
						<option selected>-- select --</option>
						<option value="1">Guru</option>
						<option value="2">Hemu</option>
						<option value="3">Goru</option>
					</select>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
				<!--loop start-->
				@foreach($question as $question)
					<div class="card">
						<div class="card-header"></div>
						<div class="card-body">
							<blockquote class="blockquote mb-0">
								<p>{{$question->ques_description}}</p>
								<input type="range" class="form-range" min="0" max="10" name="range{{$question->id}}" value="0">
								</br>
								<div class="form-floating mb-3">
									<input type="text" class="form-control" name="comment{{$question->id}}" placeholder="Add your reviews">
								</div>
							</blockquote>
						</div>
					</div>
				@endforeach
				<button type="submit" class="btn btn-outline-secondary" >{{__('Submit')}}</button>
				<!--loop end-->
				</div>
			</div>
		</form>
    </div>

</body>

</html>