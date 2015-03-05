<div class="page_name">
    <h1>Відео</h1>

    <div class="page_info">
        <a class="tag" href=""><?=$most['chapter'];?></a>
        <span class="date"><?=$most['create_date']?></span>
        <span class="num_view"><?=$most['views']?></span>
    </div>
</div>

<div class="post_news">
    <?php Control::controllers(["edit","visibility","remove"], "videolist", $most['id'], $most['visibility']); ?>
    <a href="Video/show/<?=$most['title'];?>?id=<?=$most['id'];?>">
        <div class="img_container p-rel">
            <img src="/lib/image/videolist/<?=$most['image']?>" alt=""/>

            <div class="post_news__title p-abs">
                <span><?=$most['title']?></span>
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
    <div class="page video_container">
        <?php Control::add("videolist"); ?>
        <?php foreach ($data as $key => $val) {?>
            <div class="post video_item">
                <?php Control::controllers(
                    ['edit',"visibility","remove"],
                    "videolist", $val['id'],$val['visibility']); ?>
                <a href="Video/show/<?=$val['title'];?>?id=<?=$val['id'];?>"
                   class="img_container p-rel">
                    <img src="/lib/image/videolist/<?=$val['image'];?>" alt=""/>
                </a>

                <div class="info">
                    <a class="tag" href=""><?=$val['chapter']?></a>
                    <span class="time"><?=$val['create_date'];?></span>
                    <span class="num_view"><?=$val['views']?$val['views']:0?></span>
                </div>
                <div class="text">
                    <?=$val['title'];?>
                </div>
            </div>
        <?php } ?>
    </div>
    <?php if ($limitHref) { ?>
    <a href="<?=$limitHref;?>">
        <div class="all_post_link">
            <!-- >> показати всі відео-->
        </div>
    </a>
    <?php } ?>
</div>