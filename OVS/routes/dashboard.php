<?php
session_start();
if(!isset($_SESSION['userdata'])){
    header("location: ../");
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['Status']==0){
    $status = "<b style='color:red'> Not voted </b>";
}
else{
    $status = "<b style='color:green'> Voted </b>";
}
?>


<html>
    <head>
        <title>Online Voting System</title>
        <link rel="stylesheet" href="../css/stylesheet.css">

    </head>
    <body>

    <style>
        #backbtn{
       padding: 8px;
       border-radius: 5px;
       background-color: #336699;
       color: white;
       font-size: 15px;
       float: left;
       margin:10px;
        }


         #logoutbtn{
        padding: 8px;
        border-radius: 5px;
        background-color: #336699;
         color: white;
        font-size: 15px;
        float: right;
        margin:10px;
        }

        #profile{
            background-color:white;
            width:30%;
            padding:10px;
            float:left;
        }
        #Group{
            background-color:white;
            width:60%;
            padding:10px;
            float:right;
        }
        #votebtn{
            padding: 8px;
       border-radius: 5px;
       background-color: #336699;
       color: white;
       font-size: 15px;
       float: left;
        }
        #mainsection{
            padding:10px;
        }
        #mainpanel{
            padding:10px;
        }
        #voted{
            padding: 8px;
       border-radius: 5px;
       background-color: green;
       color: white;
       font-size: 15px;
       float: left;
        }
        
    </style>




        <div id="mainsection">
             <div id="headersection">
                 <a href="../"> <button id="backbtn">Back</button></a>
                 <a href="logout.php"><button id="logoutbtn">Logout</button></a>
                 <h1>Online Voting System</h1>
             </div>
        </div>
        <hr><br>
        <div id="mainpanel">
          <div id="Profile">
            <center><img src="../uploads/<?php echo $userdata['photo']?>" height="120" width="120"></center><br><br>  
            <b>Name: </b><?php echo $userdata['Name']?><br><br>
            <b>Index No: </b><?php echo $userdata['Index_no']?><br><br>
            <b>Address: </b><?php echo $userdata['Address']?><br><br>
            <b>Status: </b><?php echo $status ?><br><br>
          </div>
          <div id="Group">
            <?php
                if($_SESSION['groupsdata']){
                    for ($i=0; $i<count($groupsdata);$i++){
                        ?>
                        <div> 
                            <img style = "float:right;" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" hieght="100" width="100" alt="">
                            <b style="float:left;">Group Name: <?php echo $groupsdata[$i]['Name']?></b><br><br>
                            <b style="float:left;">Votes: <?php echo $groupsdata[$i]['Votes']?></b><br><br>
                            <form action="../api/vote.php" method="post">
                                <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['Votes']?>">
                                <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                                <?php if($_SESSION['userdata']['Status']==0){
                                    ?>
                                   <input type="submit" name="votebtn" value="Vote" id="votebtn">
                                   <?php
                                }
                                else{
                                    ?>
                                    <button disabled type="submit" name="votebtn" value="Vote" id="voted">Voted</button>
                                    <?php
                                }
                                ?>
                                
                            </form> 
                        </div>
                        <hr>
           
        
                        
                        <?php
                    }
                }
                else{

                }
                ?>
            </div>
        </div>
    </body>
</html>