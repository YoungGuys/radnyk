<div class="title_line p-rel">
    Головне
</div>


<?php
include('view/content/slider.php');
?>




<?php /*
блок з рекламою
*/ ?>
<section class="page_advertising p-rel">
    <span class="caption p-abs">реклама</span>
    <a class="p-rel" href="">
        <div class="dvertising_content">
            Ні, я жива, я буду вічно жити, я в серці маю те що вічно не вмирає asdsada
        </div>
		<span class="dvertising_name">
			Леся Якраїнка - "Лісова пісня"
		</span>
        <img class="p-abs" src="/lib/pic/sidebar/splin.png" alt=""/>
    </a>
</section>


<?php  /*
блок з великим розділом на всю ширину сторінки
*/ ?>
<?php foreach ($data as $key => $val)  { ?>
    <section class="home_item full left clearfix">
        <h3><?=\Model\News::$chapter[$key]?></h3>
        <?php /*	перша колонка */ ?>
        <div class="home_big_post_item col2 m_right left">
            <img src="/lib/image/news/<?= $data[$key]['most']['image']; ?>" alt=""/>
    
            <div class="home_post_content">
                <div class="text">
                    <a href="<?= SITE . "News/Politics{$data[$key]['most']['href']}"?>" class="ttl">
                        <?= $data[$key]['most']['title'] ?>
                    </a>
                    <span><?= $data[$key]['most']['description'] ?></span>
                </div>
            </div>
            <div class="page_info">
                <span class="date"><?= $data[$key]['most']['create_date'] ?></span>
                <span class="num_view"><?=$data[$key]['most']['views']?$data[$key]['most']['views']:0?></span>
            </div>
        </div>
        <?php /*	друга колонка */ ?>
        <div class="col2 left">
    
            <?php Control::add("news", ['id_chapter' => \Model\News::$array[$key]]); ?>
            <?php foreach ($data[$key]['data'] as $key => $val) { ?>
                <div class="home_post_item">
                    <?php Control::controllers(['edit', 'visibility', 'remove'], 'news', ['id' => $val['id']], $val['visibility']) ?>
                    <?php if ($val['image']) { ?>
                        <div class="home_post_img">
                            <img src="/lib/image/news/<?= $val['image']; ?>" alt=""/>
                        </div>
                    <?php } ?>
                    <div class="home_post_content">
                        <div class="text">
                            <a href="<?= SITE . "News/Politics{$val['href']}"?>"><?= $val['title'] ?></a>
                        </div>
                    </div>
                    <div class="page_info">
                        <span class="date"><?= $val['create_date'] ?></span>
                        <span class="num_view"><?=$val['views']?$val['views']:0?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>
<?php /*
блок з розділами
потрібно виводити два послідовно, потім можна тулити рекламу
клас m_right ставиться тільки в одного блоку (першого)
*/ /*?>
<section class="home_item left m_right">
    <?php Control::add("news", ['id_chapter' => 1]); ?>
    <h3>Політика</h3>
    <?php foreach ($data[$key]['data'] as $key => $val) { ?>
        <div class="home_post_item p_abs">
            <?php Control::controllers(['edit', 'visibility', 'remove'], 'news', ['id' => $val['id']], $val['visibility']) ?>
            <?php if ($val['image']) { ?>
                <div class="home_post_img">
                    <img src="/lib/image/news/<?= $val['image']; ?>" alt=""/>
                </div>
            <?php } ?>
            <div class="home_post_content">
                <div class="text">
                    <a href="<?= SITE . "News/Politics{$val['href']}"?>"><?= $val['title'] ?></a>
                </div>
            </div>
            <div class="page_info">
                <span class="date"><?= $val['create_date'] ?></span>
                <span class="num_view"><?=$val['views']?$val['views']:0?></span>
            </div>
        </div>
    <?php } ?>
</section>

<section class="home_item left">
    <h3>Економіка</h3>

    <div class="home_post_item">
        <div class="home_post_img">
            <img src="/lib/pic/sidebar/splin.png" alt=""/>
        </div>
        <div class="home_post_content">
            <div class="text">
                <a href="">Рок-група «Сплін» в 2014 році випускає свій дванадцатий студійний альбом.</a>
            </div>
        </div>
        <div class="page_info">
            <span class="date">8 березня, 10:33</span>
            <span class="num_view">1</span>
        </div>
    </div>

    <div class="home_post_item">
        <div class="home_post_img">
            <img src="/lib/pic/sidebar/splin.png" alt=""/>
        </div>
        <div class="home_post_content">
            <div class="text">
                <a href="">Рок-група «Сплін» в 2014 році випускає свій дванадцатий студійний альбом.</a>
            </div>
        </div>
        <div class="page_info">
            <span class="date">8 березня, 10:33</span>
            <span class="num_view">1</span>
        </div>
    </div>

    <div class="home_post_item">
        <div class="home_post_content">
            <div class="text">
                <a href="">Рок-група «Сплін» в 2014 році випускає свій дванадцатий студійний альбом.</a>
            </div>
        </div>
        <div class="page_info">
            <span class="date">8 березня, 10:33</span>
            <span class="num_view">1</span>
        </div>
    </div>

    <div class="home_post_item">
        <div class="home_post_content">
            <div class="text">
                <a href="">Рок-група «Сплін» в 2014 році випускає свій дванадцатий студійний альбом.</a>
            </div>
        </div>
        <div class="page_info">
            <span class="date">8 березня, 10:33</span>
            <span class="num_view">1</span>
        </div>
    </div>
</section>
<?php */ ?>
