<!--<section class="advice">
    <button class="btn right js_mod js_mod_addAdvice">Дати пораду</button>
    <button class="btn active right js_mod js_mod_getAdvice">Отримати пораду</button>
</section>-->

<section>
    <?php Control::controllers(['edit','remove'],"text",$data['id']); ?>
    <h1><?=$data['title'];?></h1>
    <?=$data['text']?>
</section>