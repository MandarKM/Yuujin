<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Yuujin | ECM</title>
</head>

<body>
    <?php include 'partials\nav.php' ?>
    <?php include 'partials\dbconnect.php'; ?>
    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result =  mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_desc'];

        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
    }

    ?>
    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $comment = $_POST['comment'];
        $comment = str_replace("<", "&lt", $comment);
        $comment = str_replace(">", "&gt", $comment);
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($con, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '
          <div class="alert alert-success" role="alert">
            Successfully replied!
          </div>';
        }
    }
    ?>
    <div class="hide">
        <p>------------</p>
        <p>------------</p>
    </div>
    <div class="jumbotron">
        <h4 class="display-4 my-4 mx-4"><?php echo $title;  ?></h4>
        <p class="lead mx-4"><?php echo $desc; ?></p>
        <hr class="my-4">
        <ul>
            <h4>Rules to be followed</h4>
            <li>Topics must be related to the board</li>
            <li>Do not use profanity against each other</li>
            <li>If you have nothing useful to add just read and move on</li>
            <li>Do not post NSFW related images</li>
        </ul>
        <em> OP</em>
    </div>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` WHERE thread_id =$id";
    $result =  mysqli_query($con, $sql);
    $noResult = true;
    while ($row = mysqli_fetch_assoc($result)) {
        $noResult = false;
        $id = $row['comment_id'];
        $content = $row['comment_content'];
        $comment_time = $row['comment_time'];
        $thread_user_id = $row['comment_by'];
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo '<div class="media my-3">
        <img class="mr-3" src="https://www.pngitem.com/pimgs/m/150-1503945_transparent-user-png-default-user-image-png-png.png" width="64px" alt="">
        <div class="media-body">
            <p class="font-weight-bold my-0"> Anon  at ' . $comment_time . '</p>

            ' . $content . '
        </div>
    </div>
</div>';
    }
    if ($noResult) {
        echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
            <h3>No topics on this board yet</h3>
            <p class="lead">Be the first to start off</p>
            </div>
        </div>';
    }
    ?>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

        echo '<form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
       <div class="mb-3">
           <label for="exampleFormControlTextarea1" class="form-label">Add to this thread</label>
           <textarea class="form-control" rows="3" id="comment" name="comment"></textarea>
           <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
       </div>
       <button type="submit" class="btn btn-success">Add</button>
   </form>';
    } else {
        echo '<div class="alert alert-warning my-0" role="alert">
        Login to post
      </div>';
    }
    ?>








    <?php include 'partials\footer.php'; ?>
    <?php include 'partials\sign_up.php'; ?>
    <?php include 'partials\login.php'; ?>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>