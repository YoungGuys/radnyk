<div class="page_name">
    <h1>Блоги</h1>
</div>

<div class="blogy_tag_container">
    <a href="" class="blogy_tag blogy_tag__active">всі теми</a>
    <a href="" class="blogy_tag js_mod js_mod_edit">політика</a>
    <a href="" class="blogy_tag">економіка</a>
    <a href="" class="blogy_tag">культура</a>
    <a href="" class="blogy_tag">спорт</a>
    <a href="" class="blogy_tag">світ</a>
    <br/>
    <a href="" class="blogy_tag blogy_tag__time blogy_tag__active">весь час</a>
    <a href="" class="blogy_tag blogy_tag__time">останні</a>
    <a href="" class="blogy_tag blogy_tag__time">популярні</a>
</div>

<div class="blog_container">
    <?php foreach ($data as $key => $val) { ?>
        <div class="blogy_item">
            <div class="blogy_img">
                <img src="/lib/pic/sidebar/splin.png" alt="">
            </div>
            <div class="blogy_content">
                <div class="header">
                    <a href=""
                       class="author_name left" href=""><?=$val['first_name'].$val['second_name'];?></a>

                    <div class="info">
                        <span class="time"><?=$val['create_date']?></span>
                        <span class="num_view"><?=$val['views'];?></span>
                    </div>
                    <h2>
                        <a href="<?=SITE?>Blog/show?title=<?=$val['title'];?>&id=<?=$val['id']?>">
                            <?=$val['title'];?>
                        </a>
                    </h2>
                </div>
                <div class="text">
                    <?=$val['text']?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

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

<div class="list_author_container">
    <div class="column_there">
        <h3>A</h3>
        <a href="">Арсен Аваков 213</a>
        <a href="">Сакен Аймурзаєв 1</a>
        <a href="">Анна Андрієвська 2</a>
        <a href="">Дмитро Андрієвський 20</a>
        <a href="">Іван Андрусяк 13</a>
        <a href="">Сергій Андрушко 62</a>
        <a href="">Олександр Аргат 14</a>
    </div>
    <div class="column_there">
        <h3>A</h3>
        <a href="">Арсен Аваков 213</a>
        <a href="">Сакен Аймурзаєв 1</a>
        <a href="">Анна Андрієвська 2</a>
        <a href="">Дмитро Андрієвський 20</a>
        <a href="">Іван Андрусяк 13</a>
        <a href="">Сергій Андрушко 62</a>
        <a href="">Олександр Аргат 14</a>
    </div>
    <div class="column_there">
        <h3>A</h3>
        <a href="">Арсен Аваков 213</a>
        <a href="">Сакен Аймурзаєв 1</a>
        <a href="">Анна Андрієвська 2</a>
        <a href="">Дмитро Андрієвський 20</a>
        <a href="">Іван Андрусяк 13</a>
        <a href="">Сергій Андрушко 62</a>
        <a href="">Олександр Аргат 14</a>
    </div>
    <div class="column_there">
        <h3>A</h3>
        <a href="">Арсен Аваков 213</a>
        <a href="">Сакен Аймурзаєв 1</a>
        <a href="">Анна Андрієвська 2</a>
        <a href="">Дмитро Андрієвський 20</a>
        <a href="">Іван Андрусяк 13</a>
        <a href="">Сергій Андрушко 62</a>
        <a href="">Олександр Аргат 14</a>
    </div>
    <div class="column_there">
        <h3>A</h3>
        <a href="">Арсен Аваков 213</a>
        <a href="">Сакен Аймурзаєв 1</a>
        <a href="">Анна Андрієвська 2</a>
        <a href="">Дмитро Андрієвський 20</a>
        <a href="">Іван Андрусяк 13</a>
        <a href="">Сергій Андрушко 62</a>
        <a href="">Олександр Аргат 14</a>
    </div>
    <div class="column_there">
        <h3>A</h3>
        <a href="">Арсен Аваков 213</a>
        <a href="">Сакен Аймурзаєв 1</a>
        <a href="">Анна Андрієвська 2</a>
        <a href="">Дмитро Андрієвський 20</a>
        <a href="">Іван Андрусяк 13</a>
        <a class="js_mod js_mod_edit2" href="">Сергій Андрушко 62</a>
        <a class="js_mod js_mod_edit234" href="">Олександр Аргат 14</a>
    </div>
</div>