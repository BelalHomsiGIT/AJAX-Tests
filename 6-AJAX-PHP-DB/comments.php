<?php
    include "dbconn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments-Database</title>
    <script src="jquery-3.6.1.min.js"></script>
    <style>
        body{
            margin: 20px;
        }
        #comments{
            width: 60%;
            min-height: 150px;
            margin: 10px;
            padding: 10px;
            border: 1px solid burlywood;
            border-radius: 10px;
            box-shadow: 1px 2px 12px lightslategrey;
        }
        button{
            margin: 10px;
            padding: 10px 15px;
            background-color: black;
            color: white;
            border: 1px solid white;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    Comments
    <div id="comments">
        <?php
            $myQry = "select * from comments LIMIT 2";
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
    </div>
    <button>Show More Comments</button>
    <script>
        $(function(){
            let commntsCount = 2;
            $("button").click(function(){
                commntsCount += 2;
                $("#comments").load("load-comments.php", {newCommentsCount: commntsCount})
            })
        })
    </script>
</body>
</html>