<?php
    include 'layout.php';

    require_once __DIR__ . '/../models/UserModel.php';
    session_start();

    if (isset($_SESSION['user'])) {
        $username = UserModel::getUsername($_SESSION['user']);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_POST['register'])) {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $user = UserModel::addUser(
                    htmlspecialchars($_POST['username']),
                    htmlspecialchars($_POST['password'])
                );

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
                    $_SESSION['user'] = $check;
                    header('Location: /');
                }
                else {
                    echo "<p style='color: red'>Неверное имя польлзователя или пароль</p>";
                }
            }
        }
        elseif (isset($_POST['home'])) {
            header('Location: /');
        }
        elseif (isset($_POST['logout'])) {
            session_destroy();
            header('Location: /login');
        }
    }
?>

<div class="container">
    <?php if (isset($username)): ?>
        <div class="success">
            Вы вошли как: <strong><?= $username ?></strong>
        </div>
        <form method="post" action="login" class="logout">
            <button type="submit" name="home" class="btn btn-primary">Домой</button>
            <button type="submit" name="logout" class="btn btn-secondary">Выйти</button>
        </form>
    <?php else: ?>
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
    <?php endif; ?>
</div>

<style>
    .container {
        margin-top: 50px;
    }
    .btn {
        min-width: 80px;
        margin-right: 20px;
    }
    .success {
        margin-top: 20px;
        color: green;
        font-size: 20px;
        text-align: center;
    }

    .logout {
        margin-top: 20px;
        text-align: center;
    }
</style>

<?php include 'footer.php' ?>