<?php 
    // start session
    session_start();


    //connect to a database
    $con = mysqli_connect('localhost', 'root');

    //select and create a database - userregistration at phpadmin
    mysqli_select_db($con, 'userregistration');

    // declare variables 
    $name = $_POST['user'];
    $passwd = $_POST['password'];

    //create table in the database
    $s = " select * from usertable where name = '$name' && password = '$passwd'";

    //create a variable to store the database query
    $result = mysqli_query($con, $s);

    // create a variable to count no of times for name in the database table
    $num =mysqli_num_rows($result);

   
    if($num == 1) {
        $_SESSION['username'] = $name ;
        header('location: home.php');

    } else {
       header('location: login.php');
    }

?>