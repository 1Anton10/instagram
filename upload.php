<?php

    $tmp_name = $_FILES['img']['tmp_name'];
    $name = $_FILES['img']['name'];
    move_uploaded_file($tmp_name, 'img/' . $name);
    echo 'File uploaded successfully';

?>