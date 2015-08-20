<?php

namespace MD\Helpers;


class FileUpload {

    protected $uploadedFile;
    protected $filePathToSave;

    public function upload($fileToUpload, $targetDir) {
        $filePath = rtrim($targetDir, '/') . DIRECTORY_SEPARATOR . basename($fileToUpload['name']);


        $this->uploadedFile = $fileToUpload;
        $this->filePathToSave = $filePath;
    }

    public function saveUploaded() {
        if (!move_uploaded_file($this->uploadedFile["tmp_name"], $this->filePathToSave)) {
            Notification::error(1, 'There was an error uploading your file.');
            return false;
        } else {
            return true;
        }
    }

    public function cancelUpload() {
        if (unlink($this->uploadedFile["tmp_name"])) {
            Notification::success(1, 'File upload was canceled.');
            return true;
        } else {
            return false;
        }
    }

    public function isImage($setNotification = true, $overwrite = false, $maxSize = 5000000) {
        $imageFileType = $this->getExtension();
        $check = getimagesize($this->uploadedFile["tmp_name"]);
        if ($check == false) {
            if($setNotification) Notification::error(1, 'File must be an image.');
            return false;
        }
        if (!$overwrite && file_exists($this->filePathToSave)) {
            if($setNotification) Notification::error(1, 'File already exists.');
            return false;
        }
        if ($this->uploadedFile["size"] > $maxSize) { //5000000 = 5 MB
            if($setNotification) {
                Notification::error(1, 'File is too large.');
            }
            return false;
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            if($setNotification) Notification::error(1, 'Only JPG, JPEG, PNG & GIF files are allowed.');
            return false;
        }
        return true;
    }

    public function isSWF($setNotification = true) {
        $imageFileType = $this->getExtension();
        if($imageFileType != "swf") {
            if($setNotification) Notification::error(1, 'Only Flash files are allowed.');
            return false;
        }
        return true;
    }

    protected function getExtension() {
        return strtolower(pathinfo($this->filePathToSave, PATHINFO_EXTENSION));
    }



}