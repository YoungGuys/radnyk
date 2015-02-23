<div class="page_name">
    <h1><?=$data['nameChapter']?></h1>

    <div class="page_info">
        <span class="date"><?=$most['create_date']?></span>
        <span class="num_view"><?=$most['views']?></span>
    </div>
</div>

<section class="preview_bl page clearfix p-rel">
    <div class="preview_img">
        <img src="<?=SITE?>lib/image/news/<?=$most['image']?>" alt=""/>

        <div class="ttl">
            <?=$most['title']?>
        </div>
    </div>
    <div class="preview_cont text">
        <p>
            <?=$most['text']?>
        </p>
        <a href="?news=<?=urlencode($most['title'])?>&id=<?=$most['id']?>">Читати далі >></a>
    </div>
</section>

<section class="page_advertising p-rel">
    <span class="caption p-abs">реклама</span>
    <a class="p-rel" href="">
        <div class="dvertising_content">
            Ні, я жива, я буду вічно жити, я в серці маю те що вічно не вмирає asdsada
        </div>
		<span class="dvertising_name">
			Леся Якраїнка - "Лісова пісня"
		</span>
        <img class="p-abs" src="lib/pic/sidebar/splin.png" alt=""/>
    </a>
</section>


<section class="news_bl">
    <div class="type_news">
        <a class="<?php if (!isset($_GET['popular']))
            echo "active"; else echo ""; ?>"
           href="<?php if (!isset($_GET['popular']))
               echo ""; else echo "?"; ?>">останні</a>
        <a href="<?php if (!isset($_GET['popular']))
            echo "?popular"; else echo "#"; ?>"
           class="<?php if (isset($_GET['popular']))
               echo "active"; ?>">
            популярні
        </a>
    </div>

    <?php foreach ($data as $day => $result) { ?>
        <div class="page news_container">
            <?php if (!isset($_GET['popular'])) { ?>
                <div class="news_title">
                    <h1 class="ttl_mini big_ttl"><?= $day ?></h1>
                </div>
            <?php } ?>
            <?php foreach ($result as $key => $val) { ?>
                <div class="news_item">
                    <?php Control::controllers(['edit', 'visibility', 'remove'], 'news', ['id' => $val['id']], $val['visibility']) ?>
                    <div class="archive_date_bl">
                        <div class="archive_time"><?= $val['time']; ?></div>
                        <div class="archive_day"><?= $day; ?></div>
                    </div>
                    <div class="archive_content">
                        <a href="?news=<?=urlencode($most['title'])?>&id=<?=$most['id']?>">
                            <span class="ttl"><?= $val['title']; ?></span>

                            <div class="num_view"><?=$val['views']?$val['views']:0?></div>
                        </a>

                        <div class="text">
                            <?= $val['text']; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

    <?php } ?>

    <div class="page_navigation">
        <ul>
            <li>
                <a class="active" href="">1</a>
            </li>
            <li>
                <a href="">2</a>
            </li>
            <li>
                <a href="">3</a>
            </li>
            <li>
                <a href="">4</a>
            </li>
            <li>
                <a href="">5</a>
            </li>
            <li>
                ...
            </li>
            <li>
                <a href="">25</a>
            </li>
        </ul>
    </div>
</section>