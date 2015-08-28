<?php


namespace MD\Helpers;


class FileSystem {

    private static $fileSystemPart = 1000;

    public static function fileNameToPath($fileName) {
        $folderName = 'documents';
        $key = substr($fileName, 0, 1);
        $extensionIndex = strpos('.', $fileName);
        $extension = substr('.', $fileName);
        $fileNumber = substr($fileName, $extensionIndex);
        $part = self::$fileSystemPart;
        switch($key) {
            case Defines::FILE_TYPE_DOCUMENT: $folderName = 'documents'; break;
            case Defines::FILE_TYPE_IMAGE:    $folderName = 'images'; break;
            case Defines::FILE_TYPE_VIDEO:    $folderName = 'videos'; break;
            case Defines::FILE_TYPE_MUSICS:   $folderName = 'musics'; break;
        }
        $number = floor($fileNumber/$part);
        $folderNumber = $part*($number + 1);

        return "data/$folderName/$folderNumber/$fileNumber.$extension";
    }

    public static function generateFileName($originalFilename, $fileType = Defines::FILE_TYPE_DOCUMENT) {
        $extension = explode('.', $originalFilename);
        $extension = $extension[count($extension)-1];

        $part = self::$fileSystemPart;
        $number = App::getCounterNextIndex('fileSystem');
        $folderNumber = floor($number/$part);
        $folderNumber = $part*($folderNumber + 1);

        $folderName = 'documents';
        switch($fileType) {
            case Defines::FILE_TYPE_DOCUMENT: $folderName = 'documents'; break;
            case Defines::FILE_TYPE_IMAGE:    $folderName = 'images'; break;
            case Defines::FILE_TYPE_VIDEO:    $folderName = 'videos'; break;
            case Defines::FILE_TYPE_MUSICS:   $folderName = 'musics'; break;        }

        $path = Config::getSkinRootDir();
        $path .= "/data/$folderName/$folderNumber";
        mkdir($path, 0777, true);
        $path .= "/$number.$extension";
        $fileName = Defines::FILE_TYPE_VIDEO.$number.'.'.$extension;
        return [$fileName, $path];
    }

    public static function crateFileFromBase64($string, $originalFilename, $fileType = Defines::FILE_TYPE_IMAGE) {
        list($fileName, $path) = self::generateFileName($originalFilename, $fileType);
        $data = base64_decode($string);
        file_put_contents($path, $data);
        return $fileName;
    }









}