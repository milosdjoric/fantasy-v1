<?php

namespace Fantasy\Model;

class Upload
{

    public function uploadFile()
    {
        $destPath = 'C:/wamp64/www/fantasy-v1/module/Fantasy/files/upload';
        $result = move_uploaded_file($_FILES['myfile']['tmp_name'], $destPath . $_FILES['myfile']['name']);
        return $result;
    }

}

;
