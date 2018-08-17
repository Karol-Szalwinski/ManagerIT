<?php

namespace ManagerITBundle;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class TextFileUploader
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {
        $fileFirstName = $file->getClientOriginalName() . '_' . date("Y-m-d H:i:s");
        $fileExtension = '.' . $file->guessExtension();
        $fileName = $fileFirstName . $fileExtension;

        $file->move($this->targetDir, $fileName);

        if ($this->isImage($this->targetDir . "/" . $fileName)) {
//            $this->makeThumb($this->targetDir . "/" . $fileName, $this->targetDir . "/thumb40/" . $fileFirstName . "thumb40" . $fileExtension, 40);
//            $this->makeThumb($this->targetDir . "/" . $fileName, $this->targetDir . "/thumb200/" . $fileFirstName . "thumb200" . $fileExtension, 200);
        }
        return $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }

    private function isImage($path)
    {
        $a = getimagesize($path);
        $image_type = $a[2];

        if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
            return true;
        }
        return false;
    }

    private function makeThumb($src, $dest, $desired_width)
    {

        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));

        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }


}