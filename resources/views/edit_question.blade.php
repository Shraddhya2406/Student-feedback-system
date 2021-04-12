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
    <title>Edit Questions</title>
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
                    <li><a href="/get_feedbacks">Feedback Results</a></li>
                    <li><a href="/add_question">Add Questions</a></li>
                    <li class="active"><a href="/edit_question">Edit Questions</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="dropdown">
                        <a href="#"><img
                                src="https://img.icons8.com/bubbles/25/000000/test-account.png" />{{ session('name') }}</a>
                        <div class="all_items rounded_shape">
                            <ul class="all_items_list">
                                <li> <a href="/admin_account" class="dropdown_item">Profile Details</a> </li>
                                <li> <a href="/add_user" class="dropdown_item">Add Users</a> </li>
                                <li> <a href="/edit_user" class="dropdown_item">Edit Users</a> </li>
                                <li> <a href="/signout" class="dropdown_item">Logout</a> </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if(session('status'))
                <div class="card">
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <span class="text-dark">{{ session('status') }}</span>
                        </div>
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>{{ __('Edit Questions') }}</h2>
                    </div>
                    </br>
                    @foreach($question as $question)
                    <div class="card-body">
                        <form method="POST" action="/edit_question">
                            @csrf

                            <div class="form-group row">
                                <input type="hidden" name="id" value="{{$question->id}}">

                                <div class="col-md-8">
                                    <textarea id="question" type="text"
                                        class="form-control @error('question') is-invalid @enderror" name="question"
                                        required autocomplete="question">{{$question->ques_description}}</textarea>

                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>

                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</body>

</html>