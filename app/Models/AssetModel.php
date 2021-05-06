<?php

namespace App\Models;

use CodeIgniter\Model;

class AssetModel extends Model
{
    protected $table = 'tb_aset';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_kontrak', 'jenis_aset', 'lokasi', 'tanggal_mulai', 'tanggal_berakhir', 'saldo'];


    public function getData($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
