<div class="page_name">
    <h1>Фото</h1>

    <div class="page_info">
        <a class="tag" href=""><?=$most['chapter']?></a>
        <span class="date"><?=$most['create_date']?></span>
        <span class="num_view"><?=$most['views']?></span>
    </div>
</div>

<div class="post_news">
    <?php Control::controllers(["edit","visibility","remove"], "photolist", $most['id'], $most['visibility']); ?>
    <a href="<?=$most['href']?>">
        <div class="img_container p-rel">
            <img src="/lib/image/photolist/<?=$most['image']?>" alt=""/>

            <div class="post_news__title p-abs">
                <span><?=$most['title']?></span>
                <span class="post_news__topic">Фоторепортаж</span>
            </div>
        </div>
        <div class="post_news_descr">
            <?=$most['description']?>
        </div>
    </a>
</div>

<div class="all_post">
    <div class="header">
        <span class="title">Інші відео</span>

        <div class="all_part">
            <span>Всі розділи</span>

            <div class="all_part_list">
                <ul>
                    <?php foreach (\Balon\System\Model::$nameChapter as $key => $val) {?>
                        <li>
                            <a href="?chapter=<?=$val;?>&id=<?=$key;?>"><?=$val?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="page photo_container">
        <?php Control::add("photolist"); ?>
        <?php foreach ($data as $key => $val) {?>
            <div class="post photo_item">
                <?php Control::controllers(['edit',"visibility","remove"], "photolist", $val['id'],$val['visibility']); ?>
                <a href="<?=$val['href']?>" class="img_container p-rel">
                    <img src="/lib/image/photolist/<?=$val['image'];?>" alt=""/>
                </a>

                <div class="info">
                    <a class="tag" href=""><?=$val['chapter']?></a>
                    <span class="time"><?=$val['create_date'];?></span>
                    <span class="num_view"><?=$val['views']?></span>
                </div>
                <div class="text">
                    <?=$val['title'];?>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if ($limitHref) { ?>
    <a href="<?=$limitHref;?>">
        <div class="all_post_link"></div>
    </a>
    <?php } ?>
</div>