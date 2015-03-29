<section class="s_blog s_item">
    <div class="title">Блоги</div>
    <div class="content">
        <div class="blog_bl">
            <?php foreach ($data as $key => $val) { ?>
                <div class="blog_item">
                    <a href="<?=SITE?>Blog/show?title=<?=$val['title']?>&id=<?=$val['id']?>">
                        <div class="photo">
                            <img src="<?=$val['photo']?>" alt=""/>
                        </div>
                        <p class="name text"><?=$val['first_name']." ".$val['last_name'];?>:</p>
                        <p class="text">
                            <?=$val['title']?>
                        </p>
                    </a>
                </div>
            <?php } ?>
            <a class="all_item" href="<?=SITE?>Blog">Всі блоги >></a>
        </div>
    </div>
</section>