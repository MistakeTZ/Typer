<?php
    include 'layout.php';

    require_once __DIR__ . '/../models/UserModel.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['register'])) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $user = UserModel::addUser(
                    htmlspecialchars($_POST['username']),
                    htmlspecialchars($_POST['password'])
                );
                
                session_start();

                $_SESSION['user'] = $user;
                header('Location: /');
            }
        }
        elseif (isset($_POST['login'])) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $check = UserModel::checkHash(
                    htmlspecialchars($_POST['username']),
                    htmlspecialchars($_POST['password'])
                );

                if ($check) {
                    session_start();

                    $_SESSION['user'] = $check;
                    header('Location: /');
                }
                else {
                    echo "<p style='color: red'>Неверное имя польлзователя или пароль</p>";
                }
            }
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Вход</h3>
                </div>
                <div class="card-body">
                    <form action="login" method="post">
                        <div class="form-group">
                            <label for="username">Имя пользователя</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div style="margin-top: 20px">
                            <button type="submit" name="login" class="btn btn-primary">Войти</button>
                            <button type="submit" name="register" class="btn btn-secondary">Зарегестрироваться</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .container {
        margin-top: 50px;
    }
    .btn {
        min-width: 80px;
        margin-right: 20px;
    }
</style>

<?php include 'footer.php' ?>