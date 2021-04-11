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

    .thead {
        background-color: coral;
    }
    </style>
    <title>All Users</title>
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
                    @if (session('user_type') == 'F')
                    <li class="active"><a href="/feedbacks">Feedback Results</a></li>
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

    <div class="container">
        @if (session('status_update'))
        
        <div class="card-body">
            <h3>{{ session('status_update') }}</h3>
        </div>
        @endif
        <div class="col-md-12">
            <h1>All users</h1>
        </div>

        <div>
            <table class="table table-striped table-hover">
                <thead class="thead-light thead">
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Date of Birth</th>
                        <th scope="col">Department</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop start here -->

                    @foreach($user as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->gender}}</td>
                        <td>{{$user->dob}}</td>
                        <td>{{$user->depertment}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            <form action="/edit_user" method="POST">
                                @csrf
                                <input type="hidden" name="search" value="{{$user->email}}">
                                <button class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                    <!-- Loop end here -->
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>