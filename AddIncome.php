<?php
  include('connect_bd.php');
  session_start();
  $thisId = $_SESSION['user_id'];
  if(isset($_POST['addincome'])){
    $addIncome = mysqli_real_escape_string($dbc, trim($_POST['addincome']));
    $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    $date = date("Y.m.d");
    $query = "INSERT INTO `user_page` (id, income, description,  date) VALUES ('$thisId', '$addIncome','$description', '$date')";
    mysqli_query($dbc,$query);
//     if (mysqli_query($dbc, $query)) {
//         echo "New record created successfully";
//    }
//    else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
//   }
    mysqli_close($dbc);
    header('Location: user.php');
}
?>