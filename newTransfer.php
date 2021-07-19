<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./banking.module.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background-image: url('https://c8.alamy.com/comp/W6CCX2/various-banknotes-thai-baht-close-up-money-background-blue-color-toned-W6CCX2.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="container">
    <div class="card col-md-5" id='cardstyle'>

        <div class='card-header text-center'>
            <h1> Sparks Bank System </h1>
        </div>

        <div class='card-body'>

            <br>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="needs-validation" method='POST' novalidate>

                <div class="form-group">
                    <label for="idone">Customer Sender Id:- </label>
                    <input type="number" class="form-control" id="idone" name="idone" onkeyup="myFunction()" placeholder="Enter Money Sender ID" title="Type in a name" required>
                </div>

                <div class="form-group">
                    <label for="idtwo">customer Reciever Id:- </label>
                    <input type="number" class="form-control" id="idtwo" name="idtwo" onkeyup="myFunction1()" placeholder="Enter Money Reciever ID" title="Type in a name" required>
                </div>

                <div class="form-group">
                    <label for="amount">Amount in (&#8377;) :-</label>
                    <input type="number" class="form-control" id="amount" placeholder="Enter Amount to be transferred" name="amount" required>
                </div>

                <button type="submit" name='submit' class="btn btn-success btn-block">Submit</button>

                <div class="card-footer">

                <button type="button" class="btn btn-primary" id="Home"> Back to Main page</button>

                <script type="text/javascript">
                    document.getElementById("Home").onclick = function() 
                    {
                        location.href = "main.html";
                    }
                </script>

                </div>
            </form>
            <script>
                (function() {
                    'use strict';
                    window.addEventListener('load', function() 
                    {
                        var forms = document.getElementsByClassName('needs-validation');
                        var validation = Array.prototype.filter.call(forms, function(form) 
                        {
                            form.addEventListener('submit', function(event) 
                            {
                                if (form.checkValidity() === false) 
                                {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();
            </script>

            <?php

            if (isset($_POST['submit'])) {

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "aj";

                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    echo '<h1> Not connected </h1>';
                } else {

                    $idone = $_POST['idone'];
                    $idtwo = $_POST['idtwo'];
                    $amount = $_POST['amount'];
                    $sql = "SELECT balance FROM customer where id = $idone";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();

                    if ($row['balance'] >= $amount) {
                        $row['balance'] = $row['balance'] - $amount;
                        $temp = $row['balance'];
                        $sql = "UPDATE customer SET balance = $temp WHERE id = $idone";
                        $conn->query($sql);

                        $sql = "SELECT balance FROM customer where id = $idtwo";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $row['balance'] = $row['balance'] + $amount;
                        $temp = $row['balance'];
                        $sql = "UPDATE customer SET balance = $temp WHERE id = $idtwo";
                        $conn->query($sql);

                        $sql = "INSERT INTO `transfer`(`customer2`, `customer1`, `amount`) VALUES ($idone,$idtwo,$amount)";
                        
                        if ($conn->query($sql) === TRUE) 
                        {
                            echo 
                            '
                                <div class="alert alert-success">
                                    Successfully Transfered 
                                </div>

                                <br>
                                ';
                        } 
                        else 
                        {
                            echo 
                            '<br>
                                <div class="alert alert-danger ">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Invalid Amount or Id !</strong> Try Again !
                                </div> 
                                
                                
                        ';
                        }
                       } 
                       else 
                       {
                        echo 
                        
                        '       <br>
                                <div class="alert alert-danger ">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Invalid Amount or Id !</strong> Try Again !
                                </div>    
           
                        ';
                    }
                }
            }
            ?>

        </div>
        </div>

        <div class='card col-md-7'  id='cardstyle'>
       
            <?php

            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'aj';

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) 
            {
                echo '<h1> MySQL server Not connected </h1>';
            } 
            else 
            {
                echo '

                <div class="alert alert-success">
                    <strong>All Customers </strong> 
                </div>';

                $sql = "SELECT * FROM `customer`";
                $result = $conn->query($sql);

                if ($result->num_rows) 
                {
                    echo 
                    '<table class="table" id="myTable">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Bank Balance (&#8377;)</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';

                    while ($row = $result->fetch_assoc()) 
                    {
                        echo 
                            '<tr class="table-info">';
                            echo 
                                "<td>" . $row["id"] . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td> " . $row["balance"] . "</td>
                            
                            </tr>";
                    }
                    echo '</tbody>
                    
                    </table>';
                }
            }
            ?>

            <div class="card-footer">

                <button type="button" class="btn btn-primary" id="Home"> Back to Main page</button>

                <script type="text/javascript">
                    document.getElementById("Home").onclick = function() 
                    {
                        location.href = "main.html";
                    }
                    function myFunction() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("idone");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0];
                            if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                            }       
                        }
                        }
                        function myFunction1() {
                        var input, filter, table, tr, td, i, txtValue;
                        input = document.getElementById("idtwo");
                        filter = input.value.toUpperCase();
                        table = document.getElementById("myTable");
                        tr = table.getElementsByTagName("tr");
                        for (i = 0; i < tr.length; i++) {
                            td = tr[i].getElementsByTagName("td")[0];
                            if (td) {
                            txtValue = td.textContent || td.innerText;
                            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = "";
                            } else {
                                tr[i].style.display = "none";
                            }
                            }       
                        }
                        }
                </script>
            </div>
            </div>
        </div>
        </div>
    </div>
</body>

</html>