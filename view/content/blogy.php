<div class="page_name">
    <h1>Блоги
        <span class="blog_author"><?=$data['first_name']." ".$data['last_name'];?></span>
    </h1>
</div>

<div class="blogy_tag_container">
    <a href="<?=SITE?>Blog" class="blogy_tag <?php if (!$_GET['chapters']) echo "blogy_tag__active";?>">всі теми</a>
    <?php foreach (\Model\News::$nameChapter as $key => $val) { ?>
        <a href="<?=SITE?>Blog?filter=<?=$val;?>&code=<?=md5($val.$key."a");?>&chapters=<?=$key;?>"
           class="blogy_tag <?php if ($_GET['chapters'] == $key) echo "blogy_tag__active";?>">
            <?=$val;?>
        </a>
    <?php } ?>
    <br/>
    <!--<a href="" class="blogy_tag blogy_tag__time blogy_tag__active">весь час</a>-->
    <a href="<?=$hrefLast?>"
       class="blogy_tag blogy_tag__time <?php if ($_GET['time'] || !isset($_GET['popular'])) echo "blogy_tag__active";?>">
        останні
    </a>
    <a href="<?=$hrefPopular;?>"
       class="blogy_tag blogy_tag__time <?php if (isset($_GET['popular'])) echo "blogy_tag__active";?>">
        популярні
    </a>
</div>

<div class="blog_container">
    <?php foreach ($data as $key => $val) { ?>
        <div class="blogy_item">
            <div class="blogy_img">
                <img src="<?=$val['photo'];?>" alt="">
            </div>
            <div class="blogy_content">
                <div class="header">
                    <a href=""
                       class="author_name left" href=""><?=$val['first_name']." ".$val['last_name'];?></a>

                    <div class="info">
                        <span class="time"><?=$val['create_date']?></span>
                        <span class="num_view"><?=$val['views'];?></span>
                    </div>
                    <h2>
                        <a href="<?=SITE?>Blog/show?title=<?=$val['title'];?>&id=<?=$val['id']?>">
                            <?=$val['title'];?>
                        </a>
                    </h2>
                </div>
                <div class="text">
                    <?=$val['text']?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<div class="page_navigation">
    <ul>
        <?php  foreach ($pagination as $key => $val) { ?>
            <li>
                <a class="<?=$val['active'] ? "active" : "" ;?>" href="<?=$val['href']?>"><?=$val['num'];?></a>
            </li>
        <?php } ?>
    </ul>
</div>

<div class="list_author_container">
    <?php foreach ($authorsList as $key => $author) { ?>
        <div class="column_there">
            <h3><?=$key?></h3>
            <?php foreach ($author as $key => $val) { ?>
                <a href="<?=SITE?>Blog?author=<?=$val['first_name']."+".$val['last_name']?>&id=<?=$val['id']?>">
                    <?=$val['first_name']." ".$val['last_name'];?> <?=$val['countarticle']?>
                </a>
            <?php } ?>
        </div>
    <?php } ?>
</div>