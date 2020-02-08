<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row justify-content-center cards">
            <?php if (!empty($pictures)): ?>
                    <?php foreach ($pictures as $picture): ?>
                    <div class="col-md-4 card">
                        <img src="<?= $picture['src'] ?>" class="card-img-top" alt="<?= $picture['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $picture['size'] ?></h5>
                            <p class="card-text">Some <?= $picture['name'] ?> has <?= $picture['size'] ?> kb size
                                and <?= $picture['type'] ?> type</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php var_dump($_FILES); ?>
        <div class="row justify-content-center">
        </div>
        <div class="row justify-content-center">
            <form class="col-md-6" method="post" action="../index.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email-field">Укажите ваш email</label>
                    <input type="email" class="form-control" id="email-field">
                </div>
                <div class="form-group">
                    <label for="password-field">Введите пароль</label>
                    <input type="password" class="form-control" id="password-field">
                </div>
                <div class="form-group">
                    <label for="files-apload-field">Загрузить картинки в галерею</label>
                    <input type="file" class="form-control-file" id="files-apload-field" name="files[]" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>
