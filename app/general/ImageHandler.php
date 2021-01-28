<?php

namespace App\General;

use Intervention\Image\ImageManagerStatic;

class ImageHandler extends ImageManagerStatic
{
    protected $image;
    protected $uploadPath;

    public function __construct($image)
    {
        $this->image = $image;
        $this->uploadPath = __DIR__ . '/../../resources/storage/upload/';
    }

    public function upload($path)
    {
        $img = ImageHandler::make($this->image);
        $img->fit(300, 200);
        $img->save($this->uploadPath . $path);
    }

    public static function staticUpload($image, $path)
    {
        $img = ImageHandler::make($image);
        $img->fit(300, 200);
        $img->save(__DIR__ . '/../../resources/storage/upload/' . $path);
    }
}
