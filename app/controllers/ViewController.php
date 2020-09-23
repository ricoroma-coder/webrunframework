<?php 

namespace App\Controllers; 

use App\Controllers\Controller;

class ViewController extends Controller {
 
    public function index($data = []) {
       	return view('index', $data['custom']);
    }

}