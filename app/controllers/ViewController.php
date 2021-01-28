<?php 

namespace App\Controllers; 

use App\Controllers\Controller;
use App\General\ImageHandler as Image;

class ViewController extends Controller 
{
 
    public function index($data = []) 
    {
       	return view('index', $data);
    }

    public function uploadImage()
    {
        Image::staticUpload($_FILES['image']['tmp_name'], 'teste.jpg');
    }

}