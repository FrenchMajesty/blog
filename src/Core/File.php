<?php
namespace Core;

use Core\Config;

class File {
    private $file;

    public function __construct(array $file) {
        $this->file = $file;
    }

    public function getUrl() {
        return is_string($this->file) ? $this->file : null;
    }

    public function isValidImage(): bool {
        return @getimagesize($this->file["tmp_name"]) ? true : false;
    }

    public function uploadImage(): bool {

        if($this->isValidImage()) {
            // Upload thumbnail to server

            $random = rand(100000,999999);
            $path = pathinfo($this->file["name"]);
            $folder = $_SERVER["DOCUMENT_ROOT"] . "/blog/images/thumbnails/";

            $upload_image = $folder . date("Ymd") . '-' . $random . '.' . $path["extension"];

            if (move_uploaded_file($this->file["tmp_name"], $upload_image)) {

                $this->file = substr($upload_image, 44);
                return true;

            } else {
                $this->file = null;
                return false;
            }
        }
    }

    private function delete() {

    }
}
 ?>
