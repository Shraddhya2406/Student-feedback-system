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
    <title>Feedbacks</title>
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
                    <li class="active"><a href="/get_feedbacks">Feedback Results</a></li>
                    <li><a href="/add_question">Add Questions</a></li>
                    <li><a href="/edit_question">Edit Questions</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="dropdown">
                        <a href="#"><img
                                src="https://img.icons8.com/bubbles/25/000000/test-account.png" />{{ session('name') }}</a>
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
        <div class="col-md-12">
            <h1>Feedbacks and Reviews</h1>
        </div>
        @if(session('user_type')=='A' && isset($faculty))
        <form action="/feedbacks" method="GET">
            @csrf
            <div class="form-group">
                <div class="d-flex ">
                    <span class="h4">Select Faculty : </span>
                    <select class="custom-select" name="faculty" required>
                        <option value="">-- select --</option>
                        @foreach($faculty as $faculty)
                        <option value="{{$faculty->faculty_id}}">{{$faculty->name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Get Feedback') }}
                    </button>
                </div>
            </div>
        </form>
        @endif
        @if(isset($feedback))
        <div class="form-group d-flex">
            <label for="avg" class="col-md-4 col-form-label text-md-right">{{ __('Average Marks : ') }}</label>

            <div class="col-md-6">
                <input id="avg" type="text" class="form-control" name="avg" value="{{ $avg_feedback}}" required
                    autocomplete="average" disabled>
            </div>
        </div>
        <div style="margin-top: 130px">
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
    @endif
    </div>

</body>

</html>