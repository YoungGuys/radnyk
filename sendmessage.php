<?php

        $name = $_POST['name'];
        $email = $_POST['email'];
        $text = $_POST['message'];
        $type = $_POST['type'];

        $message = "Имя: $name <br> E-mail: $email <br> Повідомлення: $text";

mail(
       'kolka.koval@yandex.ua',
       "Radnyk.in.ua $type",
       "$message",
       "Content-type:text/html;charset=utf-8"
     );
echo "true";
?>