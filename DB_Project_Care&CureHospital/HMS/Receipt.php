<!DOCTYPE html>
<?php
$pat_id = $_POST["patient_id"];
$username = 'root';
$password = '';
// Check connection
try 
{
    $conn = new PDO("mysql:host=localhost;dbname=hospital", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch(PDOException $e) 
{
    echo "Connection failed: " . $e->getMessage();
}
// session_start();
$query_1 = $conn->prepare("select * from patient where patient_id=?");
$query_1->execute([$pat_id]);
$result = $query_1->fetch(PDO::FETCH_OBJ);
$result->Patient_id;
// echo '<pre>';
// print_r($result);
// die;

?>
<html>

<head>
    <title>
        Receipt
    </title>
</head>

<body>
    <style>
    .bordered {
        width: 1350px;
        height: 650px;
        padding: 20px;
        border: 20px ridge black;
    }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3
.1/css/bootstrap.min.css" integrity="sha384-
ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="an
onymous">
    <style type="text/css">
    #side_bar {
        background-color: whitesmoke;
        padding: 50px;
        width: 300px;
        height: 450px;
    }
    </style>
    <style>
    h2 {
        text-align: center;
    }

    h1 {
        text-align: center;
    }

    p {
        text-align: center;
    }

    h3 {
        text-align: Right;
    }
    </style>
    </head>


    <body>

        <div class="bordered">
            <div class="card-body">
                <h2 style="background-color:#BA55D3;"> <strong> <em>Care & Cure Hospital </em> </strong>
                    </p>
                    <h2 style="background-color:#BA55D3;"> Treatment & Cure </h2>
                    <h3 style="color:black">7 January, 2021</h3>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <h4 style="color:black;">First Name:</h4>
                            <h4 style="color:black;">Last Name:</h4>
                            <h4 style="color:black;">Gender:</h4>
                            <h4 style="color:black;">Phone No:</h4>
                            <h4 style="color:black;">Address:</h4>
                            <h4 style="color:black;">Disease:</h4>
                            <!--sergical gyna heart Emergency-->
                            <h4 style="color:black;">Description:</h4>
                            <h4 style="color:black;">Daily Dose:</h4>
                            <h4 style="color:black;">Company:</h4>
                        </div>
                        <div class="col-md-5">
                            <h4 style="color:black;"><?php echo $result->First_Name;?></h4>
                            <h4 style="color:black;"><?php echo $result->Last_Name;?></h4>
                            <h4 style="color:black;"><?php echo $result->Gender;?></h4>
                            <h4 style="color:black;"><?php echo $result->Phone_no;?> </h4>
                            <h4 style="color:black;"><?php echo $result->Address;?></h4>
                            <!--sergical gyna heart Emergency-->
                            <h4 style="color:black;"> <em><strong> Betnowate Cream for one month </strong></em> </h4>
                            <h4 style="color:black;">Twice in a month</h4>
                            <h4 style="color:black;">CCC Medical Co.</h4>
                        </div>
                    </div>

                    <h2 style="background-color:#BA55D3;"> <em> <strong>May you heal soon !!! </strong></em></h2>
            </div>

    </body>

</html>