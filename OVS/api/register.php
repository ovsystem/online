<?php
include ('connect.php');
$name = $_POST ['Name'];
$indexno = $_POST['Index_no'];
$password = $_POST['Password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['Address'];
$image =$_FILES['photo']['name'];
$tmp_name =$_FILES['photo']['tmp_name'];
$role = $_POST['Role'];

if ($password==$cpassword){

    move_uploaded_file($tmp_name,"../uploads/$image");
    $query = "INSERT INTO usertb (Name, Index_no, Address, Password, photo, Role, Status, Votes) VALUES('$name','$indexno','$address','$password','$image','$role',0,0)";
    $insert= mysqli_query($connect,$query);
    
    if($insert){
        echo '
            <script>
            alert("Registration Successfull");
            window.location="../";
            </script>
        ';
    }
    else{
        echo "
        <script>
        alert('Some error occured" . mysqli_error($connect) . "';
        window.location = '../routes/register.html';
        ";
    }
}
else{
    echo '
    <script>
        alert("Password and Confirm Password does not match");
        window.location = "../routes/register.html";
        </script>
    ';
}

?>