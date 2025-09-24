<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use CodeIgniter\HTTP\ResponseInterface;

class MenuController extends BaseController
{
    protected $menuModel;
    
    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }
    
    /**
     * Display a listing of the menus.
     *
     * @return string
     */
    public function index()
    {
        $data = [
            'title' => 'Kelola Menu',
            'menus' => $this->menuModel->orderBy('order', 'ASC')->findAll()
        ];
        
        return view('admin/menu/index', $data);
    }
    
    /**
     * Show the form for creating a new menu.
     *
     * @return string
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Menu Baru',
        ];
        
        return view('admin/menu/create', $data);
    }
    
    /**
     * Store a newly created menu in database.
     *
     * @return ResponseInterface
     */
    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'link' => 'required|max_length[255]',
            'icon' => 'uploaded[icon]|max_size[icon,1024]|mime_in[icon,image/svg+xml,image/png]',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Handle file upload
        $icon = $this->request->getFile('icon');
        $newName = $icon->getRandomName();
        $icon->move(ROOTPATH . 'public/assets/img/icons', $newName);
        
        $data = [
            'name' => $this->request->getPost('name'),
            'link' => $this->request->getPost('link'),
            'icon' => '../assets/img/icons/' . $newName,
            'order' => $this->menuModel->countAllResults() + 1,
            'active' => $this->request->getPost('active') ? 1 : 0,
        ];
        
        $this->menuModel->insert($data);
        
        return redirect()->to('/admin/menu')->with('message', 'Menu berhasil ditambahkan.');
    }
    
    /**
     * Show the form for editing the specified menu.
     *
     * @param int $id
     * @return string
     */
    public function edit($id = null)
    {
        $menu = $this->menuModel->find($id);
        
        if (!$menu) {
            return redirect()->to('/admin/menu')->with('error', 'Menu tidak ditemukan.');
        }
        
        $data = [
            'title' => 'Edit Menu',
            'menu' => $menu,
        ];
        
        return view('admin/menu/edit', $data);
    }
    
    /**
     * Update the specified menu in database.
     *
     * @param int $id
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $menu = $this->menuModel->find($id);
        
        if (!$menu) {
            return redirect()->to('/admin/menu')->with('error', 'Menu tidak ditemukan.');
        }
        
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'link' => 'required|max_length[255]',
        ];
        
        // Only validate icon if a new one is uploaded
        $icon = $this->request->getFile('icon');
        if ($icon->isValid() && !$icon->hasMoved()) {
            $rules['icon'] = 'uploaded[icon]|max_size[icon,1024]|mime_in[icon,image/svg+xml,image/png]';
        }
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'name' => $this->request->getPost('name'),
            'link' => $this->request->getPost('link'),
            'active' => $this->request->getPost('active') ? 1 : 0,
        ];
        
        // Handle file upload if a new icon is provided
        if ($icon->isValid() && !$icon->hasMoved()) {
            // Delete old icon if it exists and is not a default icon
            $oldIcon = $menu['icon'];
            $oldIconPath = str_replace('../', ROOTPATH . 'public/', $oldIcon);
            if (file_exists($oldIconPath) && strpos($oldIcon, 'default') === false) {
                unlink($oldIconPath);
            }
            
            $newName = $icon->getRandomName();
            $icon->move(ROOTPATH . 'public/assets/img/icons', $newName);
            $data['icon'] = '../assets/img/icons/' . $newName;
        }
        
        $this->menuModel->update($id, $data);
        
        return redirect()->to('/admin/menu')->with('message', 'Menu berhasil diperbarui.');
    }
    
    /**
     * Delete the specified menu from database.
     *
     * @param int $id
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $menu = $this->menuModel->find($id);
        
        if (!$menu) {
            return redirect()->to('/admin/menu')->with('error', 'Menu tidak ditemukan.');
        }
        
        // Delete icon file if it's not a default icon
        $icon = $menu['icon'];
        $iconPath = str_replace('../', ROOTPATH . 'public/', $icon);
        if (file_exists($iconPath) && strpos($icon, 'default') === false) {
            unlink($iconPath);
        }
        
        $this->menuModel->delete($id);
        
        // Reorder remaining menus
        $remainingMenus = $this->menuModel->orderBy('order', 'ASC')->findAll();
        $order = 1;
        foreach ($remainingMenus as $menu) {
            $this->menuModel->update($menu['id'], ['order' => $order]);
            $order++;
        }
        
        return redirect()->to('/admin/menu')->with('message', 'Menu berhasil dihapus.');
    }
    
    /**
     * Update the order of menus via AJAX.
     *
     * @return ResponseInterface
     */
    public function updateOrder()
    {
        if ($this->request->isAJAX()) {
            $positions = $this->request->getPost('positions');
            
            if (!empty($positions)) {
                $orderData = [];
                foreach ($positions as $position) {
                    $orderData[$position['id']] = $position['order'];
                }
                
                if ($this->menuModel->updateOrder($orderData)) {
                    return $this->response->setJSON(['success' => true]);
                }
            }
            
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal memperbarui urutan menu.']);
        }
        
        return $this->response->setStatusCode(403)->setJSON(['success' => false, 'message' => 'Akses ditolak.']);
    }
}