<div class="page_name">
    <h1>Нова стаття</h1>

</div>

<div class="add-blog">
    <div class="add-blog__fields">
        <label for="article-name">Назва сатті</label>
        <input type="text" name="name" id="article-name" />
    </div>

    <div class="add-blog__fields">
        <label for="article-photo">Фото на головну</label>
        <p class="file_upld">
            Завантажити файл
            <input type="file" name="photo" class="fileUpload" id="article-photo"/>
            <span class="file_upld__src"></span>
        </p>
    </div>

    <div class="add-blog__fields">
        <label for="article-type">Тип блога</label>
        <select name="type" id="article-type">
            <option value="">всі теми</option>
            <option value="">політика</option>
            <option value="">економіка</option>
        </select>
    </div>

    <textarea name="text" id="editor" cols="30" rows="10"></textarea>
    <script>CKEDITOR.replace('editor');</script>

    <button class="btn active">Зберегти статтю</button>

</div>

</div>