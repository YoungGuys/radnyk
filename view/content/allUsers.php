<div class="page_post clearfix">
    <div class="page_name">
        <h1>
            Список юзерів:
        </h1>
    </div>
    <?php foreach ($data as $key => $val) { ?>
    <div>
        <div>
            <img style="height: 100px;width: 100px" src="<?=$val['photo'];?>">
        </div>
        <div>
            <?=$val['first_name']." ".$val['last_name'];?>
        </div>
        <div>
            <?php if ($val['fb_id']) { ?>
                Facebook: <a href="http://facebook.com/<?=$val['fb_id']?>"><?=$val['first_name']." ".$val['last_name'];?></a>
            <?php } ?>
            <?php if ($val['vk_id']) { ?>
                Vk: <a href="http://vk.com/<?=$val['vk_id']?>"><?=$val['first_name']." ".$val['last_name'];?></a>
            <?php } ?>
        </div>
        <div>
            <?php if ($val['role'] == 0) { ?>
                <a href="<?=SITE?>Admin/setstatus?role=1&id=<?=$val['id']?>">Зробити модератором</a><br>
                <a href="<?=SITE?>Admin/setstatus?role=2&id=<?=$val['id']?>">Зробити адміністратором</a>
            <?php }  elseif ($val['role'] == 1) { ?>
                <a href="<?=SITE?>Admin/setstatus?role=0&id=<?=$val['id']?>">Зробити звичайним користувачем</a><br>
                <a href="<?=SITE?>Admin/setstatus?role=2&id=<?=$val['id']?>">Зробити адміністратором</a>
            <?php }  elseif ($val['role'] == 2) { ?>
                <a href="<?=SITE?>Admin/setstatus?role=0&id=<?=$val['id']?>">Зробити звичайним користувачем</a><br>
                <a href="<?=SITE?>Admin/setstatus?role=1&id=<?=$val['id']?>">Зробити модератором</a>
            <?php } ?>
        </div>
        <br>
        <hr/>
        <br/>
    </div>
<?php } ?>
</div>