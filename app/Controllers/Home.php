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
        // Tambahkan header untuk mencegah caching
        $this->response->setHeader('Cache-Control', 'no-store, max-age=0, no-cache, must-revalidate');
        $this->response->setHeader('Pragma', 'no-cache');
        $this->response->setHeader('Expires', '0');
        
        $data = [
            'menus' => $this->menuModel->getActiveMenus(),
            'cache_buster' => time() // Tambahkan timestamp untuk mencegah caching
        ];
        
        return view('home', $data);
    }
}
