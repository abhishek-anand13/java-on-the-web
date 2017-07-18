class kronos
{
 public static void main(String args[])
{
<!DOCTYPE html>

<html>
<head>
    <title>Kronos-16</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
    <script src="js/jquery-2.1.4.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="shortcut icon" href="images/logo1.png"/>
</head>
<body>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img src="images/logo.png" alt="Gaming World" title="Kronos-16"/>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="registrationform">
                <form id="regform" action="register.php" method="post">
                    <h3>New User Register Here</h3>

                    <div class="block">
                        <input id='username' type="text" name="username" placeholder="choose username"
                               class="form-control" required/>
                    </div>
                    <div class="block">
                        <input id='password' type="password" name="password" placeholder="choose password"
                               class="form-control" required/>
                    </div>
                    <div class="block">
                        <input id="passwordcnf" type="password" name="passwordcnf" placeholder="confirm password"
                               class="form-control" required/>
                    </div>

                    <div class="block">
                        <input id="email" type="email" name="email" placeholder="your email" class="form-control"
                               required/>
                    </div>

                    <div class="block">
                        <select id='gender' name="gender" class="form-control">
                            <option class='form-control' value="male">Male</option>
                            <option class='form-control' value="female">Female</option>
                        </select>
                    </div>

                    <div class="block">
                        <button class="mybutton btn btn-primary">Register</button>
                    </div>
                </form>

                <div class="block">
                    <label style="color: #ffffff;">Already Registered </label>
                    <button class="mybutton btn btn-success" data-toggle="modal" data-target="#loginModal">Login Here
                    </button>
                </div>

                <div class="block">
                    <p id="message"></p>
                </div>

                <div class="modal fade" id="#loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">User Login</h4>
                            </div>
 
                            <div class="modal-body">
                                <form action="login.php" method="post">
                                    <div class="block">
                                        <input type="text" name="username" placeholder="enter your username"
                                               class="form-control"/>
                                    </div>
                                    <div class="block">
                                        <input type="password" name="password" placeholder="enter your password"
                                               class="form-control"/>
                                    </div>
                                    <div class="block">
                                        <button class="btn btn-primary">Login</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>

                $('#message').hide();

                $('#regform').submit(function (e) {
                    e.preventDefault();

                    $.post($('#regform').attr('action'), $('#regform :input').serializeArray(), function(info){
                        if(info=="passworderror"){
                            $('#message').attr("class","alert alert-danger");
                            $('#message').html("<strong>Oops! </strong> Password did not match");
                            $('#message').slideDown("slow");


                        }
                        if(info=="success"){
                            $('#message').attr("class","alert alert-success");
                            $('#message').html("<strong>Great! </strong> Registered Successfully");
                            $('#message').slideDown("slow");

                        }
                        if(info=="failure"){
                            $('#message').attr("class","alert alert-danger");
                            $('#message').html("<strong>Oops! </strong> Could not register");
                            $('#message').slideDown("slow");
                        }

                        emptyFields();
                    });
                });

                function emptyFields(){
                    $('#username').val('');
                    $('#password').val('');
                    $('#passwordcnf').val('');
                    $('#email').val('');
                }

            </script>
        </div>
    </div>
</div>
</body>
</html>
}}