<?php
if (!isset($page_name)) $page_name = '';


?>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent ">
            <ul class="navbar-nav mr-auto ">
                <li class="nav-item <?= $page_name == 'data-list' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= WEB_ROOT ?>/test/data-list.php">二手商品列表</a>
                </li>
                <li class="nav-item <?= $page_name == 'data-insert' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= WEB_ROOT ?>/test/data-insert.php">新增二手商品</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        二手管理
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= WEB_ROOT ?>/test/data-list.php">二手商品列表</a>
                        <a class="dropdown-item" href="<?= WEB_ROOT ?>/test/data-insert.php">新增二手商品</a>

                    </div>
                </li>

            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION['admin'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link"><?= $_SESSION['admin']['nickname'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= WEB_ROOT ?>/test/logout.php">登出</a>
                    </li>

                <?php else : ?>
                    <li class="nav-item <?= $page_name == 'login' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= WEB_ROOT ?>/test/login.php">登入</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar .nav-item.active {
        background-color: #C77334;
    }
</style>