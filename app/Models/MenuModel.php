<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table            = 'menus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'icon', 'link', 'order', 'active'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get all active menus ordered by the order field
     *
     * @return array
     */
    public function getActiveMenus()
    {
        return $this->where('active', 1)
                    ->orderBy('order', 'ASC')
                    ->findAll();
    }

    /**
     * Update menu order
     *
     * @param array $data Array of menu IDs and their new order
     * @return bool
     */
    public function updateOrder(array $data)
    {
        $db = \Config\Database::connect();
        $db->transStart();
        
        foreach ($data as $id => $order) {
            $this->update($id, ['order' => $order]);
        }
        
        $db->transComplete();
        
        return $db->transStatus();
    }
}