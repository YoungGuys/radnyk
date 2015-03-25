<div class="page_post clearfix">

    <div class="page_name">
        <h1>
            Фото >
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
    <?php Control::add("photo",['id_list' => $data['id']]); ?>
    <?php foreach ($photo as $key => $val) { ?>
        <div>
            <?php Control::controllers(['edit', 'position', 'remove'], "photo", $val['id'], false, false,
                false, [$photo[$key-1]['id'], $val['id'], $photo[$key+1]['id']]); ?>
            <img src="/lib/image/photo/<?=$val['image']?>" alt=""/>
        </div>
    <?php } ?>
</div>
<div>
    <?php Control::controllers(['edit','visibility','remove'],"photolist",$data['id'],$data['visibility']) ?>
    <?=$data['description'];?>
</div>