<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./banking.module.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        body {
            background-image: url('https://images.unsplash.com/photo-1574288061782-da2d3f79a72e?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mzl8fGJhbmt8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #firstBitch {
            width: 700px;
            margin: 50px 50px 50px 50px;
            display: inline-block;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="card" id='cardstyle'>
        <div class='card-header text-center'>
            <h1> Sparks Bank System </h1>
        </div>

        <div class='card-body text-center'>
            <?php

            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'aj';

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) 
            {
                echo '<h1> Not connected </h1>';
            } 
            else 
            {
                echo '<div class="alert alert-success">
                <strong>All Customers </strong> 
              </div>';

                $sql = "SELECT * FROM `transfer`";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<table class="table">
                        <thead>
                            <tr>
                            <th>Id</th>
                            <th>To :- Customer1 Id</th>
                            <th>From :- Customer2 Id</th>
                            <th>Amount Transfered(&#8377;)</th>
                            </tr>
                            </thead>
                            <tbody>
                ';
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr class="table-info">';
                        echo "<td>" . $row["tid"] . "</td><td>" . $row["customer1"] . "</td><td>" . $row["customer2"] . "</td><td> " . $row["amount"] . "</td></tr>";
                    }
                    echo '</tbody></table>';
                }
            }
            ?>

            <div class="card-footer">

                <button type="button" class="btn btn-primary" id="backMain"> Back to Main page</button>
                <script type="text/javascript">
                    document.getElementById("backMain").onclick = function() {
                        location.href = "main.html";
                    }
                </script>
            </div>
        </div>
    </div>

</body>

</html>