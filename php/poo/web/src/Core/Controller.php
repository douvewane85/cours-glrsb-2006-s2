<?php
namespace App\Core;
abstract class Controller{

    protected function __construct()
    {
        
    }
    protected function render(string $view,array $data=[]){
            $viewData=$data;
            require_once dirname(dirname(__DIR__))."/Pages/$view";
     }

     protected function redirectUrl(string $uri){
            header("location:http://localhost:8000/$uri");
              exit;
     }
}