<?php
$insert=false;
if(isset($_POST['name'])){

$server="localhost";
$username="root";
$password="";

$con= mysqli_connect($server, $username, $password);
if(!$con){
die("connection to this database failed due to". mysqli_connect_error());
}
// echo "success connecting to db"
$name =$_POST['name'];
$gender =$_POST['gender'];
$age =$_POST['age'];
$email =$_POST['email'];
$phone =$_POST['phone'];
$desc =$_POST['desc'];

$sql= "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) 
     VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

// INSERT INTO `trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
//  VALUES ('test', '23', 'male', 'email@gmail.com', '1111111111', 'nknknnhbvjkjdfm ', current_timestamp());


if($con->query($sql) == true){
// echo "Successfully inserted";

$insert=true;
}
else{
    echo"error:$sql<br> $con->error";
}
$con->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <img class="bg" src="bg.jpg " alt="IIT Kharagpur">
    <div class="container">
        <h1>Welcome to iit kharagpur us trip form</h1>
        <p>enter your details and submit this form to confirm your participation in the trip</p>
       
       <?php
       if($insert==true){
        echo "<p class='submitMSG'>Thanks for submitting your form. 
        We are happy to see you joining the us trip.</p>";}
       ?>
       
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"> 
            </textarea>
        <button class="btn">Submit</button>
        <!-- <button class="btn">Reset</button> -->

        
        </form>
    </div>
    <script src="index.js"></script>

    
</body>
</html> 