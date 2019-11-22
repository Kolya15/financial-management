<?php 
    include('connect_bd.php');
    session_start();
    if(isset($_POST['username']) and isset($_POST['password'])){
        $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

        $query = "SELECT * FROM `signup` WHERE username ='$user_username' AND password = '$user_password'";
        $result = mysqli_query($dbc, $query);
        
        if(mysqli_num_rows($result) == 1){
            $_SESSION['username'] = $user_username;
            $thisUserName = $_SESSION['username'];
            $queryId = "SELECT user_id FROM `signup` WHERE username ='$thisUserName'";
            $resultId = mysqli_query($dbc, $queryId);
              while ($row = mysqli_fetch_assoc($resultId)) {
                $thisUserId = $row["user_id"];
                $_SESSION['user_id'] = $thisUserId;
              }
        }
        else{
            echo 'Логін або пароль неправильний!';
        }
    }
        if(isset($_SESSION['username'])){
            header('Location: user.php');

        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <header>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="logo">ЗаФінанся</h1>
        </div>
      </div>
    </div>
  </header>
  <section class="form_login">
    <div class="container">
      <div class="row">
        <div class="col-12 d-flex justify-content-center">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <fieldset class="user-data">
            <input type="text" placeholder="Ім'я" name="username" class="email_input">
            <input type="password" placeholder="Пароль" name="password" class="pass_input">
            </fieldset>
            <input type="submit" value="Вхід" class="btn_submit">
            <a href="signup.php" class="btn_registration">Реєстрація</a>
            <a href="#" class="renew_pass">Забули пароль?</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>