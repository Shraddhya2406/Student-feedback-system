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

        .compact{
            margin-left: 7%;
            margin-right: 7%;
        }

        .select_faculty{
            margin-left: 20px;
        }

        #dropdown:hover .all_items
        {
            display: block;
        }

        .all_items
        {
            
            display: none;
            background-color: blanchedalmond;
            position: absolute;
            top: 56px;
            left: 22px;
            min-height: 50px;
            width: 120px;
            padding: 7px;
            border-radius: 5px;
        }

        .all_items_list
        {
            list-style: none;
            margin: 1px;
            padding: 2px;
        }
        .dropdown_item{
            color: black;
        }
		.thead{
			    background-color: coral;
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
                    <li><a href="/feedbacks" class="active">Feedback Results</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="dropdown">
                        <a href="#"><img src="https://img.icons8.com/bubbles/25/000000/see-female-account.png"/>{{ session('name') }}</a>
                        <div class="all_items rounded_shape">
                            <ul class="all_items_list">
                                <li> <a href="/account" class="dropdown_item">Profile Details</a> </li>
                                <li> <a href="/signout" class="dropdown_item">Logout</a> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
		<div class="col-md-12"><h1>Feedbacks and Reviews</h1></div>
        @if(session('user_type')=='A')
			<div class="select_faculty">
				<p class="h4">Select Faculty : </p>
				<select class="form-select form-select-lg mb-3" name="faculty">
					<option selected>-- select --</option>
					<option value="1">Gurudev Adhikary</option>
					<option value="2">Hemant kr Mahato</option>
					<option value="3">Abhijit Bannerjee</option>
				</select>
        @endif
			</div>
			</br>
			<table class="table table-striped table-hover">
			  <thead class="thead-light thead">
				<tr>
				  <th scope="col">Faculty ID</th>
				  <th scope="col">Question</th>
				  <th scope="col">Feedback Marks</th>
				  <th scope="col">Comment</th>
				</tr>
			  </thead>
			  <tbody>
				  <!-- Loop start here -->
				  
				  @foreach($feedback as $feedback)
                    <tr>
                        <td>{{$feedback->faculty_id}}</td>
                        <td>{{$feedback->ques_description}}</td>
                        <td>{{$feedback->feedback_marks}}</td>
                        <td>{{$feedback->comment}}</td>
                    </tr>
				  @endforeach
				  
				  <!-- Loop end here -->
			  </tbody>
			 </table>
		</div>
    </div>

</body>

</html>