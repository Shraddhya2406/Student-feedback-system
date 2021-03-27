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
                    @if (session('user_type') == 'S')
                        <li><a href="/questions">Provide Feedback</a></li>
                    @elseif (session('user_type') == 'F')
                        <li><a href="/feedbacks">Feedback Results</a></li>
                    @else
                        <li><a href="/get_feedbacks">Feedback Results</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="dropdown">
                        <a href="#"><img src="https://img.icons8.com/bubbles/25/000000/see-female-account.png"/>{{ session('name') }}</a>
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
    @if (session('user_type') == 'A')
    <form action="/edit_user" method="post">
        @csrf
            <div class="form-group row">
                <select class="form-control" name="user_type" required>
                    <option value='S'>Student</option>
                    <option value='F'>Faculty</option>
                </select>
                <label for="search" class="col-md-4 col-form-label text-md-right">{{ __('Search Email') }}</label>

                <div class="col-md-6">
                    <input id="search" type="text" class="form-control @error('search') is-invalid @enderror" name="search" required autocomplete="search">

                </div>
                <button type="submit" class="btn btn-primary">
                    {{ __('Search') }}
                </button>
            </div>
    </form>
    @endif
    @if(isset($user)) 
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ __('Profile Details') }}</h2>
                    </div>
                    </br>
                    <div class="card-body">
                    @if (session('user_type') == 'A')
                        <form method="POST" action="/edit_user">
                        {{ method_field('PUT') }}
                    @else
                        <form method="POST" action="/account">
                    @endif
                        @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" disabled>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" disabled>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                        <option>-- select --</option>
                                        <option value='M' @if ($user->gender == "M") {{ 'selected' }} @endif>Male</option>
                                        <option value='F' @if ($user->gender == "F") {{ 'selected' }} @endif>Female</option>
                                    </select>
                                    
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" required value="{{ $user->dob }}">

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="depertment" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                                <div class="col-md-6">
                                    <input id="depertment" type="text" class="form-control @error('depertment') is-invalid @enderror" name="depertment" required value="{{ $user->depertment }}">

                                    @error('depertment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" required value="{{ $user->address }}">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save Details') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        @if (session('user_type') == 'A')
                        <form method="POST" action="/delete_user">
                        @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</body>

</html>
