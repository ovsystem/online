<?php
session_start();
include("connect.php");

$indexno = $_POST['Index_no'];
$password = $_POST['Password'];
$role = $_POST['Role'];

$check = mysqli_query($connect,"SELECT * FROM usertb WHERE Index_no ='$indexno' AND Password='$password' AND Role='$role'");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connect,"SELECT * FROM usertb WHERE role = 2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata;

    echo'
    <script>
        window.location = "../routes/dashboard.php";
    </script>
    ';
}
else{
    echo '
        <script>
        alert("Invalid Credentials or user not found!");
        window.location="../";
        </script>
    ';
}

 











?>
