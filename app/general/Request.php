<?php

namespace App\General;

class Request {

	protected $files;
    protected $base;
    protected $uri;
    protected $method;
    protected $protocol;
    protected $data = [];
 
    public function __construct($base = '', $data = [], $files = []) {
        if (empty($base)) {
            $this->base = $_SERVER['REQUEST_URI'];
            $this->method = strtolower($_SERVER['REQUEST_METHOD']);
            $this->protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';

            if (isset($_REQUEST['uri']))
                $this->uri = $_REQUEST['uri'];
            else if ($this->base == '/')
                $this->uri = '/';
            else
                $this->uri = substr($this->base, 1);

            $this->setData($data);

            if(count($_FILES) > 0) {
                $this->setFiles();
            }
        }
        else {
            $this->newByUri($base, $data, $files);
        }

    }

    public function newByUri($base, $data = [], $files = []) {
        $this->base = $base;
        $this->method = 'get';
        $this->protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $this->uri = $base != '/' ? substr($base, 1) : $base;
        $this->setData($data);

        if(count($files) > 0) {
            $this->setFiles($files);
        }
    }
 
    protected function setData($data = [])
    {
        # 'Break Request ln. 40<br>';
        switch($this->method) {
            case 'post':
                $this->data['method'] = $_POST;
                break;
            case 'get':
                $this->data['method'] = $_GET;
                break;
            case 'put':
                $this->data['method'] = $_POST;
                break;
            case 'delete':
                $this->data['method'] = $_GET;
                break;
            parse_str(file_get_contents('php://input'), $this->data);
        }
        $this->data['custom'] = $data;
        
    }
 
    protected function setFiles($files = []) {
        # 'Break Request ln. 57<br>';
        if (empty($files)) {
            $files = $_FILES;
        }
        foreach ($files as $key => $value) {
            $this->files[$key] = $value;
        }
    }
 
    public function base()
    {
        # 'Break Request ln. 65<br>';
        return $this->base;
    }
 
    public function uri(){
        # 'Break Request ln. 70<br>';
        return $this->uri;
    }
 
    public function method(){
        # 'Break Request ln. 75<br>';
        return $this->method;
    }

    public function all() {
        return $this->data;
    }
 
    public function __isset($key) {
        # 'Break Request ln. 87<br>';
        return isset($this->data[$key]);
    }
 
    public function __get($key) {
        # 'Break Request ln. 93<br>';
        if(isset($this->data[$key])) 
        {
            return $this->data[$key];
        }
    }
 
    public function hasFile($key) {
         
        # 'Break Request ln. 102<br>';
        return isset($this->files[$key]);
    }
 
    public function file($key) {
         
        # 'Break Request ln. 108<br>';
        if(isset($this->files[$key])) 
        {
            return $this->files[$key];
        }
    }
	
}