<div class="page_post clearfix">
    <?php Control::controllers(['edit','visibility','remove'],"videolist",$data['id'],$data['visibility']) ?>
    <div class="page_name">
        <h1>
            Відео >
            <span class="blog_author"><?=$chapter?></span>
        </h1>

        <div class="page_info">
            <span class="date"><?= \Balon\Date::reformatDate($data['create_date']) ?></span>
            <span class="num_view"><?= $data['views']; ?></span>
            <span class="right cur-p btn-print js_bnt_print"></span>
            <span class="right cur-p bnt-font_plus js_bnt_font_plus">A+</span>
        </div>
    </div>

    <div class="post_content">
        <h1><?= $data['title'] ?></h1>
    </div>
</div>
<div>
    <iframe width="100%" height="480" src="<?=$data['src'];?>" frameborder="0" allowfullscreen></iframe>
</div>
<div>
    <?=$data['description'];?>
</div>
<?php \Balon\System\Comments::loadDisqus(); ?>