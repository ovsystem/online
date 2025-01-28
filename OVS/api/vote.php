<?php
session_start();
include('connect.php');

$votes = $_POST['gvotes'];
$total_votes = $votes+1;
$gid = $_POST['gid'];
$uid = $_SESSION['userdata']['id'];

$update = mysqli_query($connect, "UPDATE usertb SET Votes = '$total_votes' WHERE id = '$gid'");
$update_user_status = mysqli_query($connect, "UPDATE usertb SET status =1 WHERE id='$uid' ");

if($update_votes and $update_user_votes){
    $groups = mysqli_query($connect,"SELECT * FROM usertb WHERE role = 2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
    $_SESSION['userdata']['Status'] =1;
    $_SESSION['groupsdata'] = $groupsdata;
    echo '
    <script>
        alert("Some error occured!");
        window.location = "../routes/dashboard.php";
    </script>
';


}
else{
    echo '
    <script>
    alert("Voting Successful!");
    window.location = "../routes/dashboard.php";
    </script>
';
}
?>








?>