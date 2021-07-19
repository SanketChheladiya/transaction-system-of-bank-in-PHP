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
            background-image: url('https://images.unsplash.com/photo-1591884641643-fe1e3163cf08?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MzB8fGJhbmt8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .cardstyle1{
            width: 100px;
        }
        thead {color: green;}
        tbody {color: blue;}
        tfoot {color: red;}
    </style>
</head>

<body>

    <div class="card" id='cardstyle'>

        <div class='card-header text-center'>
            <h1> Sparks Bank System</h1>
        </div>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
        <div class='card-body text-center'>

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
                        input = document.getElementById("myInput");
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
</body>

</html>