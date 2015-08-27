<?php


namespace AFF\Helpers;


class FileSystem {


    public static function fileNameToUrl($fileName) {
        $folderName = '';
        $key = substr($fileName, 0, 1);
        $extensionIndex = strpos('.', $fileName);
        $extension = substr('.', $fileName);
        $fileNumber = substr($fileName, $extensionIndex);
        $part = 1000;
        switch($key) {
            case 'd': $folderName = 'documents'; break;
            case 'i': $folderName = 'images'; break;
            case 'v': $folderName = 'videos'; break;
            case 'm': $folderName = 'musics'; break;
        }
        $number = floor($fileNumber/$part);
        $folderNumber = $part*($number + 1);

        return "data/$folderName/$folderNumber/$fileNumber.$extension";
    }








}