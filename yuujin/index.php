<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/x-icon" href="/daruma.png">
  <title>Welcome to Yuujin</title>
</head>

<body>
  <?php include 'partials\nav.php' ?>
  <?php
  if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success my-0" role="alert">
    Sign Up success!
  </div>';
  }
  ?>
  <div class="hide1">
    <p>------------</p>
    <p>------------</p>
  </div>

  <section class="top">

    <h2>Welcome to Yuujin!</h2>
    <p>Yuujin when translated from Japanese to English means friends or a collegue, let us gather around and talk freely with each other</p>
    <a href="#down"><button class="btn btn-primary">Find boards!</button></a>
  </section>




  <h2 class="my-5 text-center" id="down">Check out the boards</h2>

  <table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">Engineering</th>
        <th scope="col">Intrests</th>
        <th scope="col">Other</th>
        <th scope="col">Clubs</th>
      </tr>
    </thead>
  </table>
  <?php include 'partials\dbconnect.php'; ?>

  <?php
  $sql = "SELECT * FROM `categories`";
  $result =  mysqli_query($con, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['cat_name'];
    $id = $row['cat_id'];
    echo '<table class="table">
    <tbody>
        <tr>
            <td> <a href="ecm.php?catid=' . $id . '"> >' . $name . '</a></td>
           
        </tr>
    </tbody>
</table>';
  }
  ?>

  <h3 class="my-5 text-center">More boards coming soon!</h3>


  <?php include 'partials\footer.php'; ?>
  <?php include 'partials\sign_up.php'; ?>
  <?php include 'partials\login.php'; ?>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</body>

</html>