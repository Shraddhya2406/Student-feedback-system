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
                    <li class="active"><a href="#">Home</a></li>
                    @if (session('user_type') == 'S')
                    <li><a href="/questions">Provide Feedback</a></li>
                    @elseif (session('user_type') == 'F')
                    <li><a href="/feedbacks">Feedback Results</a></li>
                    @else
                    <li><a href="/get_feedbacks">Feedback Results</a></li>
                    <li><a href="/add_question">Add Questions</a></li>
                    <li><a href="/edit_question">Edit Questions</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="dropdown">
                        <a href="#"><img
                                src="https://img.icons8.com/bubbles/25/000000/see-female-account.png" />{{ session('name') }}</a>
                        <div class="all_items rounded_shape">
                            <ul class="all_items_list">
                                @if (session('user_type') == 'A')
                                <li> <a href="/admin_account" class="dropdown_item">Profile Details</a> </li>
                                <li> <a href="/add_user" class="dropdown_item">Add Users</a> </li>
                                <li> <a href="/edit_user" class="dropdown_item">Edit Users</a> </li>
                                @else
                                <li> <a href="/account" class="dropdown_item">Profile Details</a> </li>
                                @endif
                                <li> <a href="/signout" class="dropdown_item">Logout</a> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="padding-top:30px">
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
                    @if (session('status_update'))

                    <div class="card-body">
                        <h3>{{ session('status_update') }}</h3>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            @if (session('user_type') == 'S')
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">PROVIDE FEEDBACK</div>
                    <div class="panel-body">
                        <a href="/questions">
                            <img src="{{ asset('images/fd-2.jpg') }}" class="img-responsive" style="width:100%"
                                alt="Image">
                        </a>
                    </div>
                    <div class="panel-footer">Select a faculty and give your feedback</div>
                </div>
                <div class="col-sm-4"></div>
            </div>
            @else
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">FEEDBACK RESULTS</div>
                    <div class="panel-body">
                        @if (session('user_type') == 'F')
                        <a href="/feedbacks">
                            @else
                            <a href="/get_feedbacks">
                                @endif
                                <img src="{{ asset('images/fd-6.jpg') }}" class="img-responsive" style="width:100%"
                                    alt="Image">
                            </a>
                    </div>
                    <div class="panel-footer">Take a look at feedbacks and remarks</div>
                </div>
                <div class="col-sm-4"></div>
            </div>
            @endif
        </div>
</body>

</html>