<section class="s_video s_item">
    <div class="title">Відео</div>
    <div class="content">
        <div class="control clearfix">
            <button class="btn-last js_last_video">Останні</button>
            <button class="btn-popular js_popular_video">Популярні</button>
        </div>
        <div class="video_bl">
            <div class="last_video">
                <?php foreach ($last as $key => $val) {?>
                    <div class="video_item">
                        <a href="/Video/show/<?=$val['title'];?>?id=<?=$val['id'];?>">
                            <div class="photo">
                                <img src="/lib/image/videolist/<?=$val['image']?>"
                                     alt=""/>
                            </div>
                            <p class="text">
                                <?=$val['title'];?>
                            </p>
                        </a>

                        <div class="v_info">
                            <div class="info">
                                <span class="time"><?=$val['create_date'];?></span>
                                <span class="num_view"><?=$val['views']?$val['views']:0?></span>
                            </div>
                            <div class="tag">
                                <a href="/Video?chapter=<?=$val['chapter']?>&id=<?=$val['id_chapter'];?>">
                                    <?=$val['chapter'];?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="popular_video hide">
                <?php foreach ($popular as $key => $val) {?>
                    <div class="video_item">
                        <a href="/Video/show/<?=$val['title'];?>?id=<?=$val['id'];?>">
                            <div class="photo">
                                <img src="/lib/image/videolist/<?=$val['image']?>"
                                     alt=""/>
                            </div>
                            <p class="text">
                                <?=$val['title'];?>
                            </p>
                        </a>

                        <div class="v_info">
                            <div class="info">
                                <span class="time"><?=$val['create_date'];?></span>
                                <span class="num_view"><?=$val['views']?$val['views']:0?></span>
                            </div>
                            <div class="tag">
                                <a href=""><?=$val['chapter'];?></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</section>