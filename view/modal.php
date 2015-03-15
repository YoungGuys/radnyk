<div class="modal">

    <div class="modal_bg">
        <div class="modal_window" id="mod_xxx">
            <form class="js-modal_form" method="POST" action="">
                <div class="modal__header">
                    <h3 class="modal__title">Заголовок</h3>
                </div>
                <div class="modal__content">
                    <p>
                        Якийсь тексті
                    </p>
                </div>
                <div class="modal__footer">
                    <input class="btn btn--full btn--green" type="submit" value="Відправити"/>
                </div>
            </form>
            <button class="icon-close js-mod_close"></button>
        </div>

        <div class="modal_window" id="mod_edit">
            <form class="edit_form" method="POST" action="<?= SITE ?>core/index.php" enctype="multipart/form-data">
                <div class="modal__header">
                    <h3 class="modal__title">Заголовок</h3>
                </div>
                <div class="modal__content">
                    <p>
                        Якийсь тексті
                    </p>
                </div>
                <div class="modal__footer">
                    <input class="btn btn--full btn--green" type="submit" value="Відправити"/>
                </div>
            </form>
            <button class="icon-close js-mod_close"></button>
        </div>

        <div class="modal_window blocked" id="mod_edit2">
            <div class="mod_header">
                Додати новий запис
            </div>
            <div class="mod_content">
                <form enctype="multipart/form-data" action="">
                    <div class="file_upld">
                        Завантажити файл
                        <input type="file"/>
                    </div>
                </form>
            </div>
            <div class="mod_footer">
                <button class="ok">OK</button>
            </div>
            <i class="i-close">[x]</i>
        </div>

        <div class="modal_window" id="mod_signIn">
            <div class="mod_header">
                Реєстрація
            </div>
            <div class="mod_content clearfix">
                <div class="column1 left">
                    <form enctype="multipart/form-data" action="">
                        <p>
                            <span>E-mail</span>
                            <input type="text"/>
                        </p>

                        <p>
                            <span>Пароль</span>
                            <input type="text"/>
                        </p>

                        <p>
                            <input type="checkbox" id="ch" name="ch"/>
                            <label class="inp_label_checkbox" for="ch">Запамятати мене</label>
                        </p>
                    </form>
                </div>
                <div class="column2 left t-center">
                    <span>або увійдіть через соцмережі</span>
                    <a href="<?=$oauth->href['vk'];?>">
                        <img src="lib/pic/vk_m.png" alt=""/>
                    </a>
                    <a href="<?=$oauth->href['fb'];?>">
                        <img src="lib/pic/FB_m.png" alt=""/>
                    </a>
                </div>
            </div>
            <div class="mod_footer">
                <input type="submit" value="Увійти" class="ok cur-p"/>
            </div>
            <i class="i-close">[x]</i>
        </div>

        <div class="modal_window" id="mod_signUp">
            <div class="mod_header">
                Підписка
            </div>
            <div class="mod_content clearfix p-rel">
                <form enctype="multipart/form-data" action="">
                    <div class="clearfix">
                        <div class="column1 left">
                            <p>
                                <span>E-mail</span>
                                <input type="text"/>
                            </p>

                            <p>
                                <span>Пароль</span>
                                <input type="text"/>
                            </p>
                        </div>
                        <input type="submit" value="Підписатись" class="ok cur-p p-abs bottom right"/>
                    </div>
                </form>
            </div>
            <i class="i-close">[x]</i>
        </div>

        <div class="modal_window" id="mod_photo">
            <div class="mod_content p-rel">
                <div class="mod_num_photo p-abs"></div>
                <div class="mod_next_photo p-abs cur-p">
                    <img src="lib/pic/arrow-slide.svg" alt=""/>
                </div>
                <div class="mod_prev_photo p-abs cur-p">
                    <img src="lib/pic/arrow-slide.svg" alt=""/>
                </div>
                <div class="mod_photo_container p-rel">
                    <ul>
                        <li class="mod_slide__visible">
                            <img src="/lib/pic/sidebar/splin.png" alt=""/>
                        </li>
                        <li>
                            <img src="/lib/pic/sidebar/splin1.png" alt=""/>
                        </li>
                        <li>
                            <img src="/lib/pic/sidebar/splin2.png" alt=""/>
                        </li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="modal_window" id="mod_ok">
            <div class="mod_content">
                <div class="mod_header">Повідомлення відправлено</div>
            </div>
        </div>



        <div class="modal_window is-full mod_advice" id="mod_getAdvice">
            <div class="container p-rel">
                <div class="mod_content mod_content--mini">
                    <h4 class="mod_advice__title">Отримати пораду</h4>

                    <div class="mod_advice__hint">
                        Будь-яке Ваше питання має можливість отримати відповідь від нашої редакції.
                        Відповідь можна отримати протягом 3 днів. Найцікавіші питання ми анонімно публікуємо.
                    </div>

                    <form class="js-sendAdvice" action="">
                        <label class="mod_advice__label" for="get-advice-name">1. Ваше ім’я та тема запитання</label>
                        <input type="text"
                               name="name"
                               id="get-advice-name"
                               class="mod_advice__field"
                               placeholder="Ірина Іванівна: Як правильно робити обмін валюти?"/>

                        <label class="mod_advice__label" for="get-advice-email">2. Ваш E-mail</label>
                        <input type="email"
                               name="email"
                               id="get-advice-email"
                               class="mod_advice__field"
                               placeholder="name@example.com"/>

                        <label class="mod_advice__label" for="get-advice-text">3. Повідомлення</label>
                        <textarea
                                name="message"
                                cols="30"
                                rows="10"
                                id="get-advice-text"
                                class="mod_advice__field mod_advice__field--textarea">Якщо я маю гривні, де я зможу обміняти їх на долари найвигідніше?
                        </textarea>
                        <input type="submit" class="btn active" value="Отимати пораду"/>
                    </form>
                </div>
                <i class="i-close-big"></i>
            </div>
        </div>

        <div class="modal_window is-full mod_advice" id="mod_addAdvice">
            <div class="container p-rel">
                <div class="mod_content mod_content--mini">
                    <h4 class="mod_advice__title">Дати пораду</h4>

                    <div class="mod_advice__hint">
                        Маєте що сказати, що може бути вирішенням проблем інших?
                        Ваші поради отримує редакція, а найцікавіші публікує на широкий загал
                    </div>

                    <form class="js-sendAdvice" action="">
                        <label class="mod_advice__label" for="add-advice-name">1. Хто Ви та яку проблему ви намагатесь вирішити?</label>
                        <input type="text"
                               name="name"
                               id="add-advice-name"
                               class="mod_advice__field"
                               placeholder="Ірина Іванівна: Як правильно робити обмін валюти?"/>

                        <label class="mod_advice__label" for="add-advice-email">2. Ваш E-mail</label>
                        <input type="email"
                               name="email"
                               id="add-advice-email"
                               class="mod_advice__field"
                               placeholder="name@example.com"/>

                        <label class="mod_advice__label" for="add-advice-text">3. Повідомлення</label>
                        <textarea
                                name="message"
                                cols="30"
                                rows="10"
                                id="add-advice-text"
                                class="mod_advice__field mod_advice__field--textarea">Якщо я маю гривні, де я зможу обміняти їх на долари найвигідніше?
                                </textarea>
                        <input type="submit" class="btn active" value="Отимати пораду"/>
                    </form>
                </div>
                <i class="i-close-big"></i>
            </div>
        </div>

    </div>

</div>

</body>
</html>