<?php
  include('connect_bd.php');
  session_start();
  // echo $_SESSION['user_id'];
  $thisId = $_SESSION['user_id'];
  // echo $thisId;
  $date = date("d.m.Y");
  // echo $date;
  $query = "SELECT sum(`income`) FROM `user_page` WHERE id = '$thisId'";
  $sumIncome = mysqli_query($dbc, $query);

  while ($row = mysqli_fetch_assoc($sumIncome)) {
    $sumIncomeUser = $row["sum(`income`)"];
    // $_SESSION['user_id'] = $thisUserId;
  }
  echo $thisUserId;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/user.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body>
    <a href="logout.php">Click!!!</a>
    <header>
      <div class="container header-container">
        <div class="row">
          <div class="col-12 d-flex justify-content-between">
            <div class="wrapper_logo">
              <h1 class="logo">За<span class="leter__color">Ф</span>інанся</h1>
            </div>
            <div class="wrapper_servis-menu">
              <button class="btn_report"></button>
              <button class="btn_user"></button>
              <button class="btn_drop-nav">
                <span class="btn_drop-nav_line"></span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section>
      <div class="container date-and-income">
        <div class="row d-flex align-items-center justify-content-between">
          <div class="col-4 ">
            <div class="wrapper-select_date d-flex align-items-center">
              <button class="btn_drop-select_date">
                <span class="btn-line__top"></span>
                <span class="btn-line__bottom"></span>
              </button>
              <ul class="list-select_date">
                <li class="list-select_date-item">День</li>
                <li class="list-select_date-item">Місяць</li>
                <li class="list-select_date-item">Усі</li>
              </ul>
            </div>
          </div>
          <div class="col-3">
            <div class="wrapper_income">
              <h2><?php if ($sumIncomeUser > 0){echo $sumIncomeUser; }
              else {echo "0";}?></h2>
            </div>
          </div>
          <div class="col-3">
            <div class="wrapper_date">
              <h2>11.11</h2>
            </div>
          </div>
        </div>
        <div class="row d-flex  justify-content-center line_wrapper-category ">
          <div class="col-3">
            <div class="wrapper-category">
              <img
                src="https://picua.org/images/2019/11/19/dc147511881756240b853d5529cd7b77.png"
              />
              <p>20%</p>
            </div>
          </div>
          <div class="col-3">
            <div class="wrapper-category">
              <img
                src="https://picua.org/images/2019/11/19/37337455791396710a3a2f26578458f7.png"
              />
              <p>20%</p>
            </div>
          </div>
          <div class="col-3">
            <div class="wrapper-category">
              <img
                src="https://picua.org/images/2019/11/19/6f922a5d0f33243e2a0b4c878984bdd9.png"
              />
              <p>20%</p>
            </div>
          </div>
        </div>
        <div class="row d-flex  justify-content-center line_wrapper-category ">
          <div class="col-3">
            <div class="wrapper-category">
              <img
                src="https://picua.org/images/2019/11/19/a73d69bdbbde4d48cd03bef877c15ab6.png"
              />
              <p>20%</p>
            </div>
          </div>
          <div class="col-3">
            <div class="wrapper-category">
              <img
                src="https://picua.org/images/2019/11/19/b973788b5af8870f779680ad9d8ad6f6.png"
              />
              <p>20%</p>
            </div>
          </div>
          <div class="col-3">
            <div class="wrapper-category">
              <img
                src="https://picua.org/images/2019/11/19/bd0246b89462f7dd4bfcfa1ecd8718c2.png"
              />
              <p>20%</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            <div
              class="btn-add-income d-flex justify-content-center  align-items-center"
            >
              <span class="first_line"></span>
              <span class="second_line"></span>
            </div>
            <div
              class="btn-add-expense d-flex justify-content-center  align-items-center"
            >
              <span class="expense-line "></span>
            </div>
          </div>
        </div>
        <form action="AddIncome.php" method="POST" class="form-add-income">
          <img
            src="https://picua.org/images/2019/11/19/bc030dd823f80710ad2a3fc045aa10d9.png"
            class="close-modal_form"
          />
          <h2>Додати дохід</h2>
          <input type="text" placeholder="Введіть сумму доходу" name="addincome" />
          <input type="text" placeholder="Введіть опис доходу" name="description" />
          <input type="submit" value="Зберегти" name="submit" />
        </form>
        <form action="AddExpense.php" method="POST"class="form-add-expense">
          <img
            src="https://picua.org/images/2019/11/19/bc030dd823f80710ad2a3fc045aa10d9.png"
            class="close-modal_form"
          />
          <h2>Додати витрати</h2>
          <input type="text" name="addexpense" placeholder="Введіть сумму витрат" />
          <input type="text" placeholder="Введіть опис доходу" name="description" />
          <select name="category-expense" size="1">
            <option value="food">Їжа</option>
            <option value="clothes">Одяг</option>
            <option value="transport">Транспорт</option>
            <option value="health">Здоров'я</option>
            <option value="communication">Зв'язок</option>
            <option value="entertainment">Розваги</option>
          </select>
          <input type="submit" value="Зберегти" />
        </form>
      </div>
    </section>
    <div class="shadow"></div>
    <script src="js/user.js"></script>
  </body>
</html>
