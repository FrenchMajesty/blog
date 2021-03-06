<?php
namespace Core;


class File {
    private $file;

    public function __construct(array $file) {
        $this->file = $file;
    }

    public function getUrl(): ?string {
        return is_string($this->file) ? $this->file : null;
    }

    public function getAbsolute(): string {

        if(is_array($this->file))
            return $this->file["tmp_name"];
        else
            return $_SERVER["DOCUMENT_ROOT"] . '/blog' . $this->file;
    }

    public function isValidImage(): bool {
        return @getimagesize($this->file["tmp_name"]) ? true : false;
    }

    public function uploadImage(): bool {

        if($this->isValidImage()) {
            // Upload image to server

            $random = rand(100000,999999);
            $path = pathinfo($this->file["name"]);
            $folder = $_SERVER["DOCUMENT_ROOT"] . "/blog/static/images/uploads/";

            $upload_image = $folder . date("Ymd") . '-' . $random . '.' . $path["extension"];

            if (move_uploaded_file($this->file["tmp_name"], $upload_image)) {

                $this->file = substr($upload_image, 42);
                return true;

            } else {
                $this->file = null;
            }
        }


        return false;
    }

    private function delete() {

    }
}
 ?>
