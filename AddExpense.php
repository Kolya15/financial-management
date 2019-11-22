<?php
  include('connect_bd.php');
  session_start();
  $thisId = $_SESSION['user_id'];


  if(isset($_POST['addexpense'])){
    $addExpense = mysqli_real_escape_string($dbc, trim($_POST['addexpense']));
    $description = mysqli_real_escape_string($dbc, trim($_POST['description']));
    $categoryExpense = $_POST['category-expense'];
    // echo $categoryExpense;
    $date = date("Y.m.d");
    $query = "INSERT INTO `user_page` (id, $categoryExpense, description,  date) VALUES ('$thisId', '$addExpense','$description', '$date')";
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