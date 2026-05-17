<?php
namespace App;

use App\Controller\AdminController;


class Router
{
    private function __construct()
    {
     
    }

    public  static  function run():void
    {
              $controller=new AdminController();
              $controller->showCategories();
    }
}
