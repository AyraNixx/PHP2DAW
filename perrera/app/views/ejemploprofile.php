<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - Profile Settings Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel=stylesheet href="main.css">

    <title>Profile Settings Page</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        /* 
  Inspired from 
  Settings - Daily UI 007
  by Dillon Morris
  https://dribbble.com/shots/4290939-Settings-Daily-UI-007
*/

        body,
        html {
            height: 100%;
        }

        h2 {
            font-weight: bolder;
            color: #898dbf;
        }

        form {
            width: 550px;
        }

        form * {
            font-weight: bold;
        }

        form label {
            font-size: 18px;
            color: #8f9096;
        }

        form .form-control,
        form .form-control:focus {
            border-color: transparent;
            border-bottom-color: #bebcc1;
            box-shadow: none;
        }

        form .btn {
            border-radius: 0px;
            border-color: transparent;
        }

        .btn.btn-default {
            background: #ebebeb;
            color: #8f9096;
        }

        .btn.btn-primary {
            background: #6c63ff;
            color: white;
        }

        .sidebar {
            height: 100vh !important;
            bottom: 0;
            padding-left: 20px;
            font-size: 1.3rem;
            background: #6c63ff;
        }

        @media screen and (max-width:940px) {
            .sidebar {
                font-size: 1rem;
                padding-left: 0px;
            }
        }


        .sidebar .nav-link {
            margin-bottom: 20px;
            color: #dddce5;
        }

        .nav-link.active {
            color: #fff;
        }

        .main>.row {
            height: 100%;
        }

        @media screen and (max-width:768px) {
            .content {
                padding-left: 50px;
                width: 100%;
                padding-top: 200px;
                padding-bottom: 50px;
            }

            form {
                width: 100%;
                margin: auto;
            }

        }

        .menu {
            position: absolute;
            right: 10%;
            top: 30px;
            margin: auto;
            display: none;
            cursor: pointer;
            z-index: 5;
            height: 33px;
            width: 30px;
        }

        .bar,
        .bar:after,
        .bar:before {
            width: 30px;
            height: 3px;
            background: #6c63ff;
            transition: all 0.2s;
        }

        .bar {
            position: relative;
        }

        .bar:after {
            position: absolute;
            content: '';
            left: 0;
            top: 10px;
            transition: top 0.2s 0.2s, transform 0.2s;
        }

        .bar:before {
            position: absolute;
            content: '';
            left: 0;
            bottom: 10px;
            transition: bottom 0.2s 0.2s, transform 0.2s;
        }

        .bar.animate {
            background: transparent;
        }

        .bar.animate:after {
            top: 0;
            transform: rotate(45deg);
            transition: top 0.2s, transform 0.2s 0.2s;
            background: #fff;
        }

        .bar.animate:before {
            bottom: 0;
            transform: rotate(-45deg);
            transition: bottom 0.2s, transform 0.2s 0.2s;
            background: #fff;
        }

        .expand-menu {
            position: absolute;
            z-index: 1;
            height: 100%;
            width: 100%;
            background: #6c63ff;
            transition: width 0.5s;
            width: 0%;
        }

        .expand-menu .nav-link {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            color: #dddce5;
            font-size: 1.5rem;
            display: none;
            opacity: 0;
            transition: all 0.5s;
        }

        .expand-menu .nav-link.animate {
            display: block;
        }

        .expand-menu .nav-link.animate-show {
            opacity: 1;
        }

        .expand-menu .nav-link.active {
            color: #fff;
        }

        .expand-menu.animate {
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container-fluid main" style="height:100vh;padding-left:0px;">

        <div class="d-block d-md-none menu">

            <div class="bar"></div>

        </div>

        <div class="expand-menu nav flex-column">

            <a href="#" class="nav-link active mt-auto"><i class="far fa-user-circle"></i> Profile</a>
            <a href="#" class="nav-link"><i class="far fa-bell"></i> Notifications</a>
            <a href="#" class="nav-link"><i class="far fa-file-alt"></i> Billing Info</a>
            <a href="#" class="nav-link mb-auto"><i class="fas fa-cogs"></i> General</a>

        </div>

        <div class="row align-items-center" style="height:100%">

            <div class="col-md-3 d-none d-md-block" style="height:100%">

                <div class="container-fluid nav sidebar flex-column">

                    <a href="#" class="nav-link active mt-auto"><i class="far fa-user-circle"></i> Profile</a>
                    <a href="#" class="nav-link"><i class="far fa-bell"></i> Notifications</a>
                    <a href="#" class="nav-link"><i class="far fa-file-alt"></i> Billing Info</a>
                    <a href="#" class="nav-link mb-auto"><i class="fas fa-cogs"></i> General</a>

                </div>

            </div>

            <div class="col-md-9">

                <div class="container content clear-fix">

                    <h2 class="mt-5 mb-5">Profile Settings</h2>

                    <div class="row" style="height:100%">

                        <div class="col-md-3">

                            <div href=# class="d-inline"><img src="https://image.flaticon.com/icons/svg/236/236831.svg" width=130px style="margin:0;"><br>
                                <p class="pl-2 mt-2"><a href="#" class="btn" style="color:#8f9096;font-weight:600">Edit Picture</a></p>
                            </div>


                        </div>

                        <div class="col-md-9">

                            <div class="container">

                                <form>

                                    <div class="form-group">

                                        <label for=fullName>Full Name</label>
                                        <input type="text" class="form-control" id="fullName">

                                    </div>
                                    <div class="form-group">

                                        <label for=email>Email</label>
                                        <input type="email" class="form-control" id="email">

                                    </div>
                                    <div class="form-group">

                                        <label for=pass>Password</label>
                                        <input type="password" class="form-control" id="pass">

                                    </div>
                                    <div class="form-group ">

                                        <label for=birthday>Birthday</label>
                                        <input type="date" class="form-control" id="birthday">

                                    </div>

                                    <div class="row mt-5">

                                        <div class="col">

                                            <button type="button" class="btn btn-primary btn-block">Save Changes</button>

                                        </div>

                                        <div class="col">

                                            <button type="button" class="btn btn-default btn-block">Cancel</button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>