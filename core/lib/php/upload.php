<?php
    include('/config.php');

    move_uploaded_file($_FILES['upload']['tmp_name'], "userfiles/".$name);

    $full_path = SITE . 'lib/image/ck/'.$name;

    $message = "Файл ".$_FILES['upload']['name']." загружен";
    $size = @getimagesize('userfiles/'.$name);

    if($size[0]<50 OR $size[1]<50){
        unlink('userfiles/'.$name);
    }
?>