<?php 
    // start session
    session_start();

    //create a database
    $con = mysqli_connect('localhost', 'root');

    //create a database - userregistration at phpadmin
    mysqli_select_db($con, 'userregistration');

    // declare variables 
    $name = $_POST['user'];
    $passwd = $_POST['password'];

    //create table in the database
    $s = " select * from usertable where name = '$name'";

    //create a variable to store the database query
    $result = mysqli_query($con, $s);

    // create a variable to count no of times for name in the database table
    $num =mysqli_num_rows($result);

    //check for duplication of name
    if($num == 1) {
        echo 'Username already exist';
    } else {
        //create a new row
        $reg = "insert into usertable(name, password) values('$name', '$passwd')";
        
        //store in the database
        mysqli_query($con, $reg);

        echo 'Registration Successful';
    }

?>