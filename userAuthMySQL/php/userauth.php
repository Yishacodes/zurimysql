<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $email, $password, $gender, $country){
    //create a connection variable using the db function in config.php
    $conn = db('students');

    $sql = "INSERT INTO `students` (`full_names`,`email`,`password`,`gender`,`country`)"
     VALUES ('$fullnames','$email','$password','$gender','$country')";

    if(mysqli_query($conn, $sql))
    {
        echo "<script> alert('user sucessfully created!!')</script>
    }

   //check if user with this email already exist in the database
}


//login users
function loginUser($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    $query = "SELECT * FROM students WHERE email='$email' AND password='$password'"
    $result =mysqli_query($conn, $query);
    if(mysqli_num_rows($result) >= 1){
        session_start();
        $_SESSION['username'] =$email;
        header("location: ../dashboard.php")
    }
    else{
        header("location: ''/forms/login.php?message=invalid");
    }

    echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    //open connection to the database and check if username exist in the database
    //if it does, check if the password is the same with what is given
    //if true then set user session for the user and redirect to the dasbboard
}


function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();
    if(mysqli_num_rows($conn, "SELECT * FROM students WHERE email='$email'"))>=1{
        $sql = "UPDATE table set password 'where email='$email'";
        if(mysqli_query($conn, $sql)){
            echo "<script> alert ('password successfully updated!!')" </script>;
        }
    }

    

    echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";
    //open connection to the database and check if username exist in the database
    //if it does, replace the password with $password given
}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] . 
                "</td> <td style='width: 150px'>" . $data['country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

 function deleteaccount($id){
     $conn = db();
     //delete user with the given id from the database
 }
