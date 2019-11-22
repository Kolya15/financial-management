<?php 
    include('connect_bd.php');
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
        $useremail = mysqli_real_escape_string($dbc, trim($_POST['useremail']));
        $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
        $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    if (!empty($username) && !empty($useremail) && !empty($password1) && !empty($password2) && $password1 == $password2){
        $queryUsername = "SELECT * FROM `signup` WHERE username ='$username'";
        $queryEmail = "SELECT * FROM `signup` WHERE  user_email='$useremail'";
        $dataUsername = mysqli_query($dbc, $queryUsername);
        $dataEmail = mysqli_query($dbc, $queryEmail);
        if(mysqli_num_rows($dataUsername) == 0){
            if(mysqli_num_rows($dataEmail) == 0 ){   
                $query = "INSERT INTO `signup` (username, user_email, password) VALUES ('$username', '$useremail', '$password1')";
                mysqli_query($dbc,$query);
                mysqli_close($dbc);
                header('Location: login.php');
                exit();
            }
            else{
                echo 'Email вже зареєстрований';
            }
        }
        else {
            echo 'Імя вже зареєстрованe';
        }
    }
    else {
        echo 'Паролі не співпадають';
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/signup.css">
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
            <input type="text" placeholder="Ім'я" name="username"class="name_user">
            <input type="text" placeholder="Email" name="useremail"class="email_user">
            <input type="password" placeholder="Пароль" name="password1" class="pass_user">
            <input type="password" placeholder="Підтвердження паролю" name="password2" class="pass_conf">
            <input type="submit" value="Реєстрація" class="btn_submit" name='submit'>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>
</html>