<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="./bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>

    body{
        background-image: url('https://images.unsplash.com/photo-1541354329998-f4d9a9f9297f?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NXx8YmFua3xlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.8;
    }
    .heading1{
        margin-left: 550px;
        
    }
    
</style>

<body>
    <div class="card" id='cardstyle'>
    
        <div class='card-header'>
            <h1 class='heading1'> Sparks Bank System </h1>
        </div>

        <div class='card-body'>
            <br>
            
            <?php

             $uname = $_POST['uname'];
             $password = $_POST['pswd']; 
 
             $flag=($uname=='sanket'||$uname=='sanketpatel@gmail.com')&&($password=='sanket');

            ?>

            <?php 
            if ($flag)
            {
                echo 
                
                    '<div class="alert alert-success">
                        Successfully Login with <strong>Entered Username = </strong>',$uname,'<strong> Entered Password = </strong>',$password, '! 
                    </div>

                    <br> 

                    <button type="button" class="btn btn-primary btn-block" id="transaction">Next</button><br><br> 

                    <div class="card-footer"> <button type="button" class="btn btn-primary" id="loginpage"> Log Out</button> 
                    
                    </div>

                    <script type="text/javascript">
                        document.getElementById("loginpage").onclick = function () {
                            location.href = "index.html";
                        }
                        document.getElementById("transaction").onclick = function () {
                            location.href = "main.html";
                        }
                    </script>
                ';

            } 
            else 
            {
                echo '

                    <div class="alert alert-danger ">
                        <strong>Invalid Id or Username!</strong>  
                    </div> 

                    <br>

                    <button type="button" class="btn btn-primary btn-block" id="backButton">Back To Login</button>

                    <script type="text/javascript">
                        document.getElementById("loginpage").onclick = function () {
                            location.href = "index.html";
                        }
                     </script>
                ';
            }

            ?>
            <br>
        </div>
    </div>

</body>

</html>