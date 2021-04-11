<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Feedback System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <style>
    body {
        font-family: 'Nunito';
    }
    </style>
</head>

<body>
    <nav>
        <div class="bg-light pl-5 py-4 d-flex justify-content-between align-items-center">
            <h1 class="text-danger ">Student Feedback System</h1>
            <div class="pr-5">
                <a href="/signin" class="btn btn-primary">Login</a>
                <a href="/registration" class="btn btn-primary">Register</a>
            </div>
        </div>
    </nav>
    <div class="img-responsive d-flex align-items-center justify-content-around px-5 my-3 py-5">
        <img src="{{ asset('images/fd-5.jpg') }}" />
        <h2 class="text-info">
            This is an <span class="text-success">One Stop Solution</span> to the professional to help and make decision
            to create hope
            for the future.
        </h2>
    </div>
    <div class="container my-5">
        <div class="text-center pb-3 pt-2">
            <h3> Key Features</h3>
        </div>
        <div class="d-flex justify-content-around">
            <div class="card" style="width: 15rem;">
                <div class="card-header bg-primary text-white">
                    Cost Effective
                </div>
                <div class="card-body">
                    Using this system will reduce the cost of paper and professionals.
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <div class="card-header bg-primary text-white">
                    Time Saving
                </div>
                <div class="card-body">
                    It helps us to take survey really quick and save our valuable time so that we can focus on more
                    important aspect of our institution.
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <div class="card-header bg-primary text-white">
                    Ease of Aceess
                </div>
                <div class="card-body">
                    For both students and administrators it is easy to access from their won comfort.
                </div>
            </div>
            <div class="card" style="width: 15rem;">
                <div class="card-header bg-primary text-white">
                    Anonymous
                </div>
                <div class="card-body">
                    A student gives feedback as anonymously to avoid influence of teachers which is more accurate and
                    rightful.
                </div>
            </div>
        </div>
    </div>

    <footer class="d-flex justify-content-around align-items-center py-3 bg-secondary">
        <div>
            <span class="text-white">Online Student Feedback System</span>
        </div>
        <div class="d-flex">
            <img src="https://img.icons8.com/bubbles/30/000000/facebook-new.png" />
            <img src="https://img.icons8.com/bubbles/30/000000/instagram-new.png" />
            <img src="https://img.icons8.com/bubbles/30/000000/twitter.png" />
            <img src="https://img.icons8.com/bubbles/30/000000/youtube.png" />
            <img src="https://img.icons8.com/bubbles/30/000000/linkedin.png" />
        </div>
    </footer>
</body>

</html>