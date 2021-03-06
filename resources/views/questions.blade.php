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

    .compact {
        margin-left: 7%;
        margin-right: 7%;
    }

    .select_faculty {
        margin-left: 20px;
    }

    #dropdown:hover .all_items {
        display: block;
    }

    .all_items {

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

    .all_items_list {
        list-style: none;
        margin: 1px;
        padding: 2px;
    }

    .dropdown_item {
        color: black;
    }
    </style>
    <title>Questions</title>
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
                <a class="navbar-brand" href="#"><img src="{{ asset('images/fd-1.jpg') }}" class="img-responsive"
                        style="width:178px" alt="Image"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="/dashboard">Home</a></li>
                    <li class="active"><a href="#">Provide Feedback</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="dropdown">
                        <a href="#"><img
                                src="https://img.icons8.com/bubbles/25/000000/test-account.png" />{{ session('name') }}</a>
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
        <form method="POST" action="/dashboard">
            @csrf
            <div class="col-md-12" >
                <h1 style="margin-bottom:30px">Please give appropriate ratings and reviews</h1>
            </div>
            <div class="form-group">
                <div style="padding-left:15px">
                    <span class="h4">Select Faculty : </span>
                    <select class="custom-select" name="faculty" required>
                        <option value="">-- select --</option>
                        @foreach($faculty as $faculty)
                        <option value="{{$faculty->faculty_id}}">{{$faculty->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <!--</form>-->
    </div>
    </br>
    <div class="row justify-content-center compact">
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
                            <input type="text" class="form-control" name="comment{{$question->id}}"
                                placeholder="Add your reviews" required>
                        </div>
                    </blockquote>
                </div>
            </div>
            @endforeach
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                </div>
            </div>
            <!--loop end-->
        </div>
    </div>
    </form>
    </div>

</body>

</html>