<?php

namespace App\Models;

use CodeIgniter\Model;

class M_m extends Model
{
    protected $table = 'menu'; // Ganti dengan nama tabel kamu
    protected $primaryKey = 'id_menu';
    protected $allowedFields = ['kasus', 'dashboard', 'data', 'website'];

    public function updateMenuVisibility(array $data, $level): bool
{
    // Siapkan data untuk update
    $updateData = [];
    foreach ($this->allowedFields as $field) {
        if (isset($data[$field])) {
            $updateData[$field] = 1; // Set kolom menjadi 1 jika di-check
        } else {
            $updateData[$field] = 0; // Set kolom menjadi 0 jika tidak di-check
        }
    }

    // Lakukan update berdasarkan level
    return $this->db->table($this->table)
                    ->where('level', $level)
                    ->update($updateData);
}

}

