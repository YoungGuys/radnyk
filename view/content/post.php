<div class="page_post">

    <div class="page_name">
        <?php Control::controllers(['edit','visibility','remove'],"news",$data['id'],$data['visibility']); ?>
        <h1>Новини</h1>

        <div class="page_info">
            <a class="tag" href=""><?= $data['name'] ?></a>
            <span class="date"><?= $data['create_date'] ?></span>
            <span class="num_view"><?= $data['views'] ?></span>
            <span class="right cur-p btn-print 		js_bnt_print"></span>
            <span class="right cur-p bnt-font_plus	js_bnt_font_plus">A+</span>
            <span class="right cur-p bnt-font_minus js_bnt_font_minus">a-</span>
        </div>
    </div>

    <div class="post_content">
        <h1><?= $data['title'] ?></h1>
        <!--div class="post_photo_carusel p-rel">
            <div class="prev_post_photo p-abs cur-p">
                <img src="lib/pic/arrow-slide-prev.svg" alt="" />
            </div>
            <div class="next_post_photo p-abs cur-p">
                <img src="lib/pic/arrow-slide.svg" alt="" />
            </div>
            <div class="author_post_photo p-abs">Photo: author</div>
            <div class="num_post_photo p-abs">1/23</div>
            <div class="post_photo_carusel_container p-rel cur-p">
                <ul>
                    <li class="gallery_slide__visible">
                        <img src="/lib/pic/sidebar/splin.png" alt="" />
                    </li>
                    <li>
                        <img src="/lib/pic/sidebar/splin1.png" alt="" />
                    </li>
                    <li>
                        <img src="/lib/pic/sidebar/splin2.png" alt="" />
                    </li>
                </ul>
            </div>
        </div-->
        <div class="preview_bl clearfix p-rel">
            <div class="preview_img">
                <img src="/lib/image/news/<?= $data['image']; ?>" alt=""/>
            </div>
            <div class="preview_cont text">
                <?=$data['righttext']?>
            </div>
            <div class="photo_autor p-abs">Фото: <?=$data['photoauthor']?></div>
        </div>
        <div class="post_more">
            <p>
                <?= $data['text'] ?>
            </p>
            <!--p>
                В интернете опубликовали карту США, на которой показано,
                какие города и штаты чаще всего страдают от различных бедст-
                вий в художественных фильмах. Рекордсменом стал Нью-Йорк —
                на город было совершено 35 атак, причем чаще всего на него
                нападали гигантские монстры.
            </p>
            <p>
                На втором месте оказался Лос-Анджелес (34 атаки), на
                третьем —Сан-Франциско (21 атака).
            </p-->
        </div>
        <div class="post_text">
            <p>
                <?= $data['text'] ?>
            </p>
        </div>
    </div>

    <div class="post_info">
        <div>

        </div>
    </div>

    <!--div class="related_news">
        <h4 class="ttl">Схожі новини</h4>
        <ul>
            <li>
                <a href="">Абелевскую премию дали за работы по гипотезам Вейля</a>
                <span class="relat_date">23.04.2014</span>
            </li>
            <li>
                <a href="">Абелевскую премию дали за работы по гипотезам Вейля</a>
                <span class="relat_date">23.04.2014</span>
            </li>
            <li>
                <a href="">Абелевскую премию дали за работы по гипотезам Вейля</a>
                <span class="relat_date">23.04.2014</span>
            </li>
            <li>
                <a href="">Абелевскую премию дали за работы по гипотезам Вейля</a>
                <span class="relat_date">23.04.2014</span>
            </li>
            <li>
                <a href="">Абелевскую премию дали за работы по гипотезам Вейля</a>
                <span class="relat_date">23.04.2014</span>
            </li>
            <li>
                <a href="">Абелевскую премию дали за работы по гипотезам Вейля</a>
                <span class="relat_date">23.04.2014</span>
            </li>
            <li>
                <a href="">Абелевскую премию дали за работы по гипотезам Вейля</a>
                <span class="relat_date">23.04.2014</span>
            </li>
        </ul>
    </div-->
</div>