<?php

namespace App\General;

use App\General\RouteCollection;
use App\General\Dispacher;
use App\General\Request;

class Router {

	protected $route_collection;
 
    public function __construct() {
        # 'Break Router ln. 14<br>';
        $this->route_collection = new RouteCollection;
        $this->dispacher = new Dispacher;

    }
 
    public function get($pattern, $callback){    

        # 'Break Router ln. 22<br>';
        $this->route_collection->add('get', $pattern, $callback);
        return $this;

    }
 
    public function post($pattern, $callback) {
         
        # 'Break Router ln. 30<br>';
        $this->route_collection->add('post', $pattern, $callback);
        return $this;   

    }
 
    public function put($pattern, $callback) {
         
        # 'Break Router ln. 38<br>';
        $this->route_collection->add('put', $pattern, $callback);
        return $this;   

    }
 
    public function delete($pattern, $callback) {
         
        # 'Break Router ln. 46<br>';
        $this->route_collection->add('delete', $pattern, $callback);
        return $this;  

    }
 
    public function find($request_type, $pattern) {

        # 'Break Router ln. 54<br>';
        return $this->route_collection->where($request_type, $pattern);
        
    }

    protected function dispach($route, $data = []){
     
        # 'Break Router ln. 61<br>';
        return $this->dispacher->dispach($route->callback, $data, "App\\Controllers\\");

    }

    protected function notFound($data = []) {
        # 'Break Router ln. 67<br>';
        require __DIR__.'/../../resources/views/error/404.php';
    }
     
     
    public function resolve($request){
     
        # 'Break Router ln. 74<br>';
        $route = $this->find($request->method(), $request->uri());
     
        if($route) {
            // var_dump($request->all());
     
            return $this->dispach($route, $request->all());
        }
        return $this->notFound($request->uri());
     
    }

    protected function getValues($pattern, $positions)
    {
        # 'Break Router ln. 90<br>';
        $result = [];
     
        $pattern = array_filter(explode('/', $pattern));
     
        foreach($pattern as $key => $value)
        {
            if(in_array($key, $positions)) {
                $result[array_search($key, $positions)] = $value;
            }
        }
     
        return $result;
         
    }

    public function translate($name, $params)
    {
        # 'Break Router ln. 108<br>';
        $pattern = $this->route_collection->isThereAnyHow($name);
         
        if($pattern)
        {
            $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
            $server = $_SERVER['SERVER_NAME'] . '/';
            $uri = [];
             
            foreach(array_filter(explode('/', $_SERVER['REQUEST_URI'])) as $key => $value)
            {
                if($value == 'public') {
                    $uri[] = $value;
                    break;
                }
                $uri[] = $value;
            }
            $uri = implode('/', array_filter($uri)) . '/';
     
            return $protocol . $server . $uri . $this->route_collection->convert($pattern, $params);
        }
        return false;
    }
	
}