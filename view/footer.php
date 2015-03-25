</aside>
</section>
<footer>
    <section class="footer__in">
        <div class="footer__line">
            <div class="f_main">
                <ul>
                    <li>
                        <a href="<?=SITE?>Info/About">Про проект</a>
                    </li>
                    <li>
                        <a href="<?=SITE?>Info/Contacts">Контакти</a>
                    </li>
                    <li>
                        <a href="<?=SITE?>Info/Advertising">Реклама</a>
                    </li>
                </ul>
                <a class="mob_ver" href="#">мобільна версія</a>
            </div>
            <!--div class="f_archive_bl">
                <a class="" href="">Архів</a>
            </div-->
            <div class="f_logo">
                <img src="/lib/pic/logo2.png" alt=""/>
            </div>
        </div>
        <div class="f_soc">
            <div class="f_soc__box">
                <a href="">VK</a>
                <a href="">FB</a>
            </div>
            <div class="copyright">
                © 1999 ООО «Радник.com.ua». Дизайн сайту - <span class="f-semib">Yongermonger</span>
            </div>
        </div>
    </section>
    <section class="f-bot">
            <div class="container">
                <div class="footer-news">
                    <?php foreach ($important as $key => &$val) { ?>
                        <div class="footer-news__item js-footerSlide">
                            <span class="theme-news">Важливо</span>
                            <span class="time-news"><?=$val['create_date'];?></span>
                            <a href="" class="text-news"><?=$val['title'];?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </section>
</footer>

<!--end .wrap -->
</div>

</body>
</html>