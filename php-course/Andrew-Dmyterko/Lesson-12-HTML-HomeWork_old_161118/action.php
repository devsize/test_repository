
<?php
/**
 * Отрабатывае по кнопке submit
 * User: sky_fox
 * Date: 01.11.18
 * Time: 9:08
 */

require_once './helpers/my_functions.php';
require_once './add_bootstrap.php';

$params = $_POST;
if (!empty($params)) {
//    print_r($params);
//    print_r($_FILES);
}

// База данных пользователей
getUsersArray();
//var_dump($users);
// проверяем наличие сессии и обновляем ее
$ec = exists_session();


?>
<!-- если нажата кнопка меняем парсер -->
<?php if (!empty($params['Parser'])){
    changeParser($params['Parser'], $params['session_time']);
}; ?>

<?php if (!empty($params) && empty($params["active_session"])):
//    var_dump($params);

    $error=0;
    if ($params['passwd']!==$params['passwd_confirm']): $error++?>
                <div class="alert alert-primary" role="alert">
                  Пароли не совпадают!!!!
                </div>
    <?php endif;
    if (empty($params['email'])): $error++ ?>
                <div class="alert alert-primary" role="alert">
                    ВВедите E-Mail!!!!
                </div>
    <?php endif; ?>
    <?php if ((pass($params['email'], $params['passwd'], $users))>=0 && $error==0):
                new_session(pass($params['email'], $params['passwd'], $users), $params['email'], $users[pass($params['email'], $params['passwd'], $users)]['name']);?>

                <!-- если пароль правильный Выводим заставку Secret Area-->
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4"><u><?php echo $users[pass($params['email'], $params['passwd'], $users)]['name'],"<br>";  ?>Welcome to the Secret Area!!!!</u></h1>
                        <p class="lead"><em> Your password is -- <?php echo $params['passwd']; ?> </em></p>
                        <p class="lead"><em> Your MD5 password hash  -- <?php echo md5($params['passwd']); ?> </em></p>
                        <p class="lead"><em> Your E-Mail is  -- <?php echo $params['email']; ?> </em></p>
                        <p class="lead"><em> Your parser is  -- <?php echo $config['PARSER']; ?> </em></p>
                        <form name="form2" enctype="multipart/form-data" action="./action.php" method="post" >
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="wwww">Время сессии в сек.</label>
                                <input type="text" name="session_time" id="wwww" class="form-group mx-sm-3 mb-2" size="5" value="<?php echo $config['SESSION_TIME']; ?>" pattern="[0-9]{1,5}">
                            </div>
                            <fieldset class="form-group">
                            <legend class="col-form-label col-sm-2 pt-0">Выбор парсера</legend>
                            <div class="row">
<!--                                <input type="text"   class="form-control" size="5" value="--><?php //echo $config['SESSION_TIME']; ?><!--">-->
                                <input type="submit" class="btn btn-success active" aria-pressed="true" value="Сменить парсер">
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Parser" id="gridRadios1" value="JSON" <?php echo (($config['PARSER']==="JSON") ? "checked" : ""); ?> >
                                        <label class="form-check-label" for="gridRadios1">
                                            JSON парсер
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="Parser" id="gridRadios2" value="MY" <?php echo (($config['PARSER']==="MY") ? "checked" : ""); ?> >
                                        <label class="form-check-label" for="gridRadios2">
                                            Moй парсер
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        </form>
                        <div class="row">
                            <a class="btn btn-primary active" aria-pressed="true" href="./index.php#login" role="button">Вернуться назад</a>

                            <form name="form1" enctype="multipart/form-data" action="./admin.php" method="post">
<!--                        <a class="btn btn-danger" href="./admin.php" role="button">Добавить картинку</a>-->
                                <input type="hidden" name="add_pic" value="add_pic">
                                <input type="submit" class="btn btn-danger active" aria-pressed="true" value="Добавить картинку">
                            </form>

                            <form name="form1" enctype="multipart/form-data" action="./admin.php" method="post">
                                <input type="hidden" name="change" value="change">
                                <input type="submit" class="btn btn-primary" value="Изменить данные">
                            </form>
                            <button class="btn btn-info" data-toggle="collapse" data-target="#hide-me">Collapse Bootstrap.js</button>

<!--                        <a class="btn btn-danger" href="./admin1.php" name="change" role="button">Изменить данные</a>-->
                        </div>
                        <hr class="my-8">
                        <p><b>Note:</b> This is a secret data do not pass them on to third persons.</p>
                        <div id="hide-me" class="collapse in">
                            <!--Форма добавления картинки ввод картинки -->
                            <div class="jumbotron jumbotron-fluid">
                                <p class="lead"><b>Выберите картинку и загрузите на сервер</b></p>
                                <!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
                                <form name="form" enctype="multipart/form-data" action="" method="post">
                                    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                                    <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                                    <!-- Название элемента input определяет имя в массиве $_FILES -->
                                    Отправить этот файл: <input name="userfile" class="form-control-file" type="file">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Отправить файл">
                                    <a class="btn btn-primary" href="./index.php" role="button">Вернуться на центральную страницу</a>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>


    <?php elseif($error==0): $error++;  ?>
                <div class="alert alert-primary" role="alert">
                    Неправильный логин пароль!!!
                </div>
    <?php endif; ?>

    <?php if ($error): ?>
                <form class="col-sm-6" id="main-form" name="form" method="post" enctype="multipart/form-data" action="./index.php#login">
                    <button type="submit" class="btn btn-primary">Вернуться назад</button>
                </form>
    <?php endif; ?>

<?php endif; ?>

<?php if (!empty($params) && (isset($params["active_session"]))):
    $ec = exists_session();

//var_dump($ec); var_dump($users);

//    echo $users[$ec['user_id']]['name'];

    ?>


    <!-- если пароль правильный Выводим заставку Secret Area-->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4"><u><?php echo $users[$ec['user_id']]['name'],"<br>";  ?>Welcome to the Secret Area!!!!</u></h1>
            <p class="lead"><em> Your password is -- <?php echo $users[$ec['user_id']]['password']; ?> </em></p>
            <p class="lead"><em> Your MD5 password hash  -- <?php echo md5($users[$ec['user_id']]['name']); ?> </em></p>
            <p class="lead"><em> Your E-Mail is  -- <?php echo $users[$ec['user_id']]['user']; ?> </em></p>
            <p class="lead"><em> Your parser is  -- <?php echo $config['PARSER']; ?> </em></p>
            <form name="form2" enctype="multipart/form-data" action="./action.php" method="post" >
                <div class="form-group mx-sm-3 mb-2">
                    <label for="wwww">Время сессии в сек.</label>
                    <input type="text" name="session_time" id="wwww" class="form-group mx-sm-3 mb-2" size="5" value="<?php echo $config['SESSION_TIME']; ?>" pattern="[0-9]{1,5}">
                </div>

                <fieldset class="form-group">
                    <legend class="col-form-label col-sm-2 pt-0">Выбор парсера</legend>
                    <div class="row">
                        <input type="submit" class="btn btn-success active" aria-pressed="true" value="Сменить парсер">
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Parser" id="gridRadios1" value="JSON" <?php echo (($config['PARSER']==="JSON") ? "checked" : ""); ?> >
                                <label class="form-check-label" for="gridRadios1">
                                    JSON парсер
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Parser" id="gridRadios2" value="MY" <?php echo (($config['PARSER']==="MY") ? "checked" : ""); ?> >
                                <label class="form-check-label" for="gridRadios2">
                                    Moй парсер
                                </label>
                            </div>
                            <!--                                    <div class="form-check disabled">-->
                            <!--                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>-->
                            <!--                                        <label class="form-check-label" for="gridRadios3">-->
                            <!--                                            Third disabled radio-->
                            <!--                                        </label>-->
                            <!--                                    </div>-->
                        </div>
                    </div>
                </fieldset>
            </form>
            <div class="row">
                <a class="btn btn-primary active" aria-pressed="true" href="./index.php#login" role="button">Вернуться назад</a>

                <form name="form1" enctype="multipart/form-data" action="./admin.php" method="post">
                    <!--                        <a class="btn btn-danger" href="./admin.php" role="button">Добавить картинку</a>-->
                    <input type="hidden" name="add_pic" value="add_pic">
                    <input type="submit" class="btn btn-danger active" aria-pressed="true" value="Добавить картинку">
                </form>

                <form name="form1" enctype="multipart/form-data" action="./admin.php" method="post">
                    <input type="hidden" name="change" value="change">
                    <input type="submit" class="btn btn-primary" value="Изменить данные">
                </form>
                <button class="btn btn-info" data-toggle="collapse" data-target="#hide-me">Collapse Bootstrap.js</button>

                <!--                        <a class="btn btn-danger" href="./admin1.php" name="change" role="button">Изменить данные</a>-->
            </div>
            <hr class="my-8">
            <p><b>Note:</b> This is a secret data do not pass them on to third persons.</p>
            <div id="hide-me" class="collapse in">
                <!--Форма добавления картинки ввод картинки -->
                <div class="jumbotron jumbotron-fluid">
                    <p class="lead"><b>Выберите картинку и загрузите на сервер</b></p>
                    <!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
                    <form name="form" enctype="multipart/form-data" action="" method="post">
                        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                        <input type="hidden" name="MAX_FILE_SIZE" value="30000">
                        <!-- Название элемента input определяет имя в массиве $_FILES -->
                        Отправить этот файл: <input name="userfile" class="form-control-file" type="file">
                        <br>
                        <input type="submit" class="btn btn-primary" value="Отправить файл">
                        <a class="btn btn-primary" href="./index.php" role="button">Вернуться на центральную страницу</a>
                    </form>
                </div>
            </div>

        </div>
    </div>









<?php    endif ?>

<?php require_once './footer.php'; ?>