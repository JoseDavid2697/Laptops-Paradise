<?php
    require_once 'public/header2.php';
?>
    <style type="text/css">

        .form-control {
            height: 40px;
            box-shadow: none;
            color: #969fa4;
        }

        .form-control:focus {
            border-color: #5cb85c;
        }

        .form-control, .btn {
            border-radius: 3px;
        }

        .signup-form {
            width: 400px;
            margin: 0 auto;
            padding: 30px 0;
            margin-top: 50px;
        }

        .signup-form h2 {
            color: #636363;
            margin: 0 0 15px;
            position: relative;
            text-align: center;
        }

        .signup-form .hint-text {
            color: #999;
            margin-bottom: 30px;
            text-align: center;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #f2f3f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form input[type="checkbox"] {
            margin-top: 3px;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            min-width: 140px;
            outline: none !important;
        }

        .signup-form .row div:first-child {
            padding-right: 10px;
        }

        .signup-form .row div:last-child {
            padding-left: 10px;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #5cb85c;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }
    </style>
    <div class="col-lg-12 col-sm-12 col-md-12">
        <div class="row">
            <div class="signup-form">
                <form action="?controlador=Admin&accion=signIn" method="post">
                    <h2>Sign In</h2>
                    <p class="hint-text">Welcome to the Admin Login</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                               required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password"
                               placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            Sign In
                        </button>
                    </div>
                    <div class="error_message" name="error_message" id="error_message">
                        <span id="login_result"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    require_once 'public/footer.php';
?>