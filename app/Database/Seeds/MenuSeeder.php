<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Temuan & Tindaklanjut',
                'icon' => '../assets/img/icons/apip.svg',
                'link' => '#',
                'order' => 1,
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'e-Pengawasan',
                'icon' => '../assets/img/icons/pengawasan.svg',
                'link' => '#',
                'order' => 2,
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'e-Penugasan',
                'icon' => '../assets/img/icons/penugasan.svg',
                'link' => '#',
                'order' => 3,
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Jaminan Mutu & Konsultasi',
                'icon' => '../assets/img/icons/jaminan.svg',
                'link' => '#',
                'order' => 4,
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert data to table
        $this->db->table('menus')->insertBatch($data);
    }
}