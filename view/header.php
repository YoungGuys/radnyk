<body>
<div class="wrap">

    <header>
        <div class="h-top">
            <a class="mob" href="">мобільна версія</a>
            <a class="soc" href="">VK</a>
            <a class="soc" href="">FB</a>
            <!--
                після реєстрації додати клас "user" а класи "undrln js_mod js_mod_signIn" видалити
            -->
            <?php if (!$_COOKIE['user_id']) { ?>
                <span class="btn-sign-in undrln right js_mod js_mod_signIn">Вхід</span>
                <span class="btn-sign-up undrln right js_mod js_mod_signUp">Підписка</span>
            <?php } else { ?>
                <span class="btn-sign-in right user">
                    <a href="<?=SITE?>User/logout">Вихід</a>
                </span>
            <?php } ?>
            <?php if (\Balon\System\User::trueAdmin()) { ?>
                <span class="btn-sign-in right"><a href="<?=SITE?>Admin/users">Список юзерів</a></span>
            <?php } ?>
        </div>
        <div class="header">
            <div class="container">
                <div class="logo">
                    <a href="<?= SITE ?>">
                        <i class="icon-logo"></i>
                    </a>
                </div>
                <div class="quote">
                    <?php Control::controllers(["edit"], "else", ["id" => $quote['id']]); ?>
                    <div class="q-ttl p-rel">Цитата дня</div>
                    <div class="q-cont">
                        <?=$quote['col1'];?>
                    </div>
                    <div class="q-author t-right">
                        <?=$quote['col2'];?>
                    </div>
                </div>
                <div class="search">
                    <input type="search" name="search" placeholder="П о ш у к . . ."/>
                    <input class="p-abs" type="submit" value=""/>
                </div>
            </div>
        </div>
        <nav class="menu">
            <div class="container">
                <ul class="base-menu">
                    <li>
                        <a href="<?= SITE ?>News/Politics">Політика</a>
                    </li>
                    <li>
                        <a href="<?= SITE ?>News/Economic">Економіка</a>
                    </li>
                    <li>
                        <a href="<?= SITE ?>News/Culture">Культура</a>
                    </li>
                    <li>
                        <a href="<?= SITE ?>News/Sport">Спорт</a>
                    </li>
                    <li>
                        <a href="<?= SITE ?>News/World">Світ</a>
                    </li>
                </ul>
                <ul class="addit-menu">
                    <li>
                        <a href="<?= SITE ?>Photo">Фото</a>
                    </li>
                    <li>
                        <a href="<?= SITE ?>Video">Відео</a>
                    </li>
                    <li>
                        <a href="<?= SITE ?>Blog">Блоги</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>