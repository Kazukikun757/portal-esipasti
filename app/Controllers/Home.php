<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Home extends BaseController
{
    protected $menuModel;
    
    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }
    
    public function index(): string
    {
        $data = [
            'menus' => $this->menuModel->getActiveMenus()
        ];
        
        return view('home', $data);
    }
}
