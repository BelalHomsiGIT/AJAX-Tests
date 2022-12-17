<?php
    include "dbconn.php";

    $newCommentsCount = $_POST['newCommentsCount'];
    $myQry = "select * from comments LIMIT $newCommentsCount";
    $result = mysqli_query($conn, $myQry);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<p>";
            echo $row['author'];
            echo "<br>";
            echo $row['message'];
            echo "<br>";
            echo "</br>";
        }
    }else{
        echo "No Comments!";
    }
?>