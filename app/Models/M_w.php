<?php

namespace App\Models;

use CodeIgniter\Model;

class M_w extends Model
{
    public function updates($id, $data)
    {
        return $this->db->table('menus')->update($data, ['id' => $id]);
    }
    
        public function tampil($s){
            return $this->db->table($s)
                            ->get()
                            ->getResult();
    
        }
        
        protected $table = 'menus';
        protected $primaryKey = 'id';
        protected $allowedFields = ['id', 'parent_id', 'name', 'url', 'icon', 'is_dropdown', 'sort_order'];
    
        public function getFilteredMenu()
        {
            // Fetch all menu items
            $menus = $this->tampil('menus');
            
            $userLevel = session()->get('level');
            
            if ($userLevel == 3) {
                // Filter only menus that should be shown for level 3
                $menus = array_filter($menus, function($menu) {
                    return $menu->show_for_level_3 == 1;
                });
            }
        
            // Build the menu tree from filtered menus
            return $this->buildMenuTree($menus);
        }
        
        
    
    
        public function buildMenuTree($menus, $parentId = 0)
        {
            $tree = [];
            foreach ($menus as $menu) {
                if ($menu->parent_id == $parentId) {
                    $children = $this->buildMenuTree($menus, $menu->id);
                    if ($children) {
                        $menu->subMenus = $children;
                    }
                    $tree[] = $menu;
                }
            }
            return $tree;
        }
    
        private function buildTree(array $menus, $parentId = 0)
        {
            $branch = [];
    
            foreach ($menus as $menu) {
                if ($menu['parent_id'] == $parentId) {
                    $children = $this->buildTree($menus, $menu['id']);
                    if ($children) {
                        $menu['subMenus'] = $children;
                    }
                    $branch[] = $menu;
                }
            }
    
            return $branch;
        }
        public function tampilgroupby($s,$groupby){
            return $this->db->table($s)
                            ->groupBy($groupby)
                            ->get()
                            ->getResult();
    
        }
    
        public function groupby($s){
            return $this->db->table($s)
                            ->select('kode_keranjang')  // hanya memilih kolom kode_keranjang
                            ->groupBy('kode_keranjang') // mengelompokkan berdasarkan kode_keranjang
                            ->get()
                            ->getResult();
        }
    
        public function groupbyjoin($s,$tabel1,$on){
            return $this->db->table($s)
                            ->distinct()
                            ->join($tabel1,$on,'left') // join dengan tabel produk
                            ->groupBy('keranjang.kode_keranjang') // mengelompokkan berdasarkan kode_keranjang
                            ->get()
                            ->getResult();
        }
    
        public function tampil2($s){
            return $this->db->table($s)
                            ->orderBy('jam_keluar', 'asc') // Mengurutkan berdasarkan kolom 'tanggal' secara ascending
                            ->get()
                            ->getResult();
        }
        
    
        public function tambah($table, $isi)
        {
                return $this->db->table($table)
                            ->insert($isi);
        }
        public function hapus($table,$where)
        {
            return $this->db->table($table)
                            ->delete($where);
    
        }
    
        public function finds($table, $conditions)
        {
            return $this->db->table($table)
                            ->where($conditions)
                            ->get()
                            ->getRow();
        }
    
        public function inserts($table, $data)
        {
            return $this->db->table($table)
                            ->insert($data);
        }
    
        public function edits($table, $data, $conditions) {
            return $this->db->table($table)
                            ->update($data, $conditions);
        }
    
        public function edit($tabel, $isi, $where){
            return $this->db->table($tabel)
                            ->update($isi,$where);
        }
        public function getWhere($tabel,$where){
            return $this->db->table($tabel)
                            ->getwhere($where)
                            ->getRow();
        }

        
        
    
        public function getWherearray($tabel, $where){
            return $this->db->table($tabel)
                            ->where($where)   // Menggunakan where() bukan getWhere()
                            ->get()
                            ->getRowArray();  // Mengembalikan hasil sebagai array untuk perbandingan
        }
    
        public function tampilwhere($tabel,$where){
            return $this->db->table($tabel)
                            ->getwhere($where)
                            ->getResult();
        }
    
        public function tampilWhere2($tabel, $where, $where1) {
            return $this->db->table($tabel)
                            ->where($where)
                            ->where($where1)
                            ->get()
                            ->getResult();
        }
        public function join($pil,$tabel1,$on,$where)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on,"right")
                            ->getWhere($where)->getResult();
                            // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                            // ->getResult();
        }

        public function join2($pil,$tabel1,$on,$where)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on)
                            ->getWhere($where)->getResult();
                            // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                            // ->getResult();
        }
    
        public function joinwhere2($pil,$tabel1,$on,$where, $where1)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on)
                            ->Where($where)
                            ->Where($where1)
                            ->get()
                            ->getResult();
                            
        }
    
        public function joinrow($pil,$tabel1,$on,$where)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on,"right")
                            ->getWhere($where)->getRow();
                            // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                            // ->getResult();
        }
    
        public function joinnowhere($pil,$tabel1,$on)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on,"right")
                            ->get()
                            ->getResult();
        }
    
    public function joinresult($pil,$tabel1,$on,$where)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on,"right")
                            ->getWhere($where)->getResult();
                            // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                            // ->getResult();
        }

    public function joinresultinner($pil,$tabel1,$on,$where)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on,"inner")
                            ->getWhere($where)->getResult();
                            // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                            // ->getResult();
        }
    
        public function joinresultinnerwhere2($pil,$tabel1,$on,$where,$where1)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on,"inner")
                            ->Where($where)
                            ->Where($where1)
                            ->get()
                            ->getResult();
                            // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                            // ->getResult();
        }

        public function joinrowinnerwhere2($pil,$tabel1,$on,$where,$where1)
        {
            return $this->db->table($pil)
                            ->join($tabel1,$on,"inner")
                            ->Where($where)
                            ->Where($where1)
                            ->get()
                            ->getRow();
                            // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                            // ->getResult();
        }
     public function joinresult2($tabel,$tabel1,$on,$tabel2,$on2,$where)
        {
            return $this->db->table($tabel)
                ->join($tabel1, $on)
                ->join($tabel2, $on2)
                ->where($where)
                ->get()
                ->getResult();

        }

    public function joinresult23($tabel,$tabel1,$on,$tabel2,$on2,$where,$where1)
        {
            return $this->db->table($tabel)
                ->join($tabel1, $on)
                ->join($tabel2, $on2)
                ->where($where)
                ->where($where1)
                ->get()
                ->getResult();

        }
        public function joinresult24($tabel,$tabel1,$on,$tabel2,$on2,$where,$where1,$where2)
        {
            return $this->db->table($tabel)
                ->join($tabel1, $on)
                ->join($tabel2, $on2)
                ->where($where)
                ->where($where1)
                ->where($where2)
                ->get()
                ->getResult();

        }

    public function joinrow2($tabel,$tabel1,$on,$tabel2,$on2,$where,$where1)
        {
            return $this->db->table($tabel)
                ->join($tabel1, $on)
                ->join($tabel2, $on2)
                ->where($where)
                ->where($where1)
                ->get()
                ->getRow();

        }
    
    public function joinresult3($tabel,$tabel1,$on,$tabel2,$on2,$tabel3,$on3,$where)
        {
            return $this->db->table($tabel)
                            ->join($tabel1,$on,"right")
                            ->join($tabel2,$on2,"right")
                            ->join($tabel3,$on3,"right")
                            ->getWhere($where)->getResult();
                            // return $this->db->query('select * from brg_msk join barang on brg_msk.id_brg=barang.id_brg')
                            // ->getResult();
        }

        public function joinresult2r($tabel,$tabel1,$on,$tabel2,$on2)
        {
            return $this->db->table($tabel)
                            ->join($tabel1,$on,"inner")
                            ->join($tabel2,$on2,"inner")
                            ->get()
                            ->getResult();
        }

        public function joinresult1r($tabel,$tabel1,$on)
        {
            return $this->db->table($tabel)
                            ->join($tabel1,$on,"inner")
                            ->get()
                            ->getResult();
        }

        public function joinresult2tanggal($tabel, $tabel1, $on, $tabel2, $on2,  $startDate = null, $endDate = null)
{
    $builder = $this->db->table($tabel);
    $builder->join($tabel1, $on, 'inner');
    $builder->join($tabel2, $on2, 'inner');
    
    // Apply additional where clause if provided


    // Apply date filters if provided
    if ($startDate) {
        $builder->where('create_at >=', $startDate);
    }
    if ($endDate) {
        $builder->where('create_at <=', $endDate);
    }
    
    return $builder->get()->getResult();
}

public function joinresult1tanggal($tabel, $tabel1, $on, $startDate = null, $endDate = null)
{
    $builder = $this->db->table($tabel);
    $builder->join($tabel1, $on, 'inner');
    
    // Apply additional where clause if provided


    // Apply date filters if provided
    if ($startDate) {
        $builder->where('create_at >=', $startDate);
    }
    if ($endDate) {
        $builder->where('create_at <=', $endDate);
    }
    
    return $builder->get()->getResult();
}
    
        public function simpantoken($email, $token) {
            $model = new M_w();
        
            $data = [
                'email' => $email,
                'token' => $token,
                'create_at' => date('Y-m-d H:i:s')
            ];
        
            $model->tambah('token',$data);
        }
    
        public function getEmailByToken($token)
        {
            $query = $this->db->table('token')->where('token', $token)->get();
            $result = $query->getRow();
            return $result ? $result->email : null;
        }
    
        public function updateUserStatus($email, $status)
        {
            $this->db->table('user')->where('email', $email)->update(['status' => $status]);
        }
    
        public function deleteToken($token)
        {
            $this->db->table('token')->where('token', $token)->delete();
        }
    
        public function softdelete1($table,$kolom, $noTrans)
    {
        
        $this->db->table($table)->update(['delete' => '1'], [$kolom => $noTrans]);
       
    }
    
    public function statuschange($table, $kolom, $noTrans, $where)
    {
        $this->db->table($table)->update([$kolom => $noTrans], $where);
    }
    
    public function restore1($table,$kolom,$noTrans)
    {
        
        $this->db->table($table)->update(['delete' => '0'], [$kolom => $noTrans]);
       
    }
    
    public function statuskeranjang($table,$kolom,$noTrans)
    {
        
        $this->db->table($table)->update(['status' => 'checkout'], [$kolom => $noTrans]);
       
    }
    
    public function resetpassword($table,$kolom,$id,$data)
    {
        
        $this->db->table($table)->where($kolom, $id)->update($data);
       
    }
    public function upload($file)
        {
                $imageName = $file->getName();
                $file->move(ROOTPATH . 'public/assets/images/website/', $imageName);
        }
    
        public function upload1($file)
        {
                $imageName = $file->getName();
                $file->move(ROOTPATH . 'public/images', $imageName);
        }
    
        public function getNextCartCode() {
            // Fetch the latest cart code from the database
            $builder = $this->db->table('keranjang');
            $builder->selectMax('kode_keranjang');
            $query = $builder->get()->getRow();
        
            if ($query && $query->kode_keranjang) {
                // Extract the numeric part of the cart code and increment it
                $lastCode = $query->kode_keranjang;
                $lastNumber = (int) substr($lastCode, 4); // Extract number after 'CPP-'
                return $lastNumber + 1;
            } else {
                return 1; // Start with 1 if no previous code exists
            }
        }
    
        public function add_to_cart($data) {
            // Add the data to the keranjang table
            $builder = $this->db->table('keranjang');
            return $builder->insert($data);
        }
    
        public function groupbyjoinn($table1, $table2, $onCondition)
        {
            $builder = $this->db->table($table1);
            $builder->select('keranjang.*,barang.*, SUM(keranjang.quantity * barang.harga_jual) as total_harga');
            $builder->join($table2, $onCondition, 'left');
            $builder->groupBy('keranjang.kode_keranjang');
            $builder->orderby('keranjang.create_at','DESC');
            return $builder->get()->getResult();
        }
    
        public function groupbyjoinn2($table1, $table2, $table3, $onCondition, $onCondition2, $where, $where1)
        {
            $builder = $this->db->table($table1);
            $builder->select('keranjang.*,barang.*, transaksi.*, SUM(keranjang.quantity * barang.harga_jual) as total_harga');
            $builder->join($table2, $onCondition, 'left');
            $builder->join($table3, $onCondition2, 'left');
            $builder->where($where);
            $builder->Where($where1);
            $builder->groupBy('keranjang.kode_keranjang');
            $builder->orderby('keranjang.create_at','DESC');
            return $builder->get()->getResult();
        }
    
        public function groupbyjoinwhere($table1, $table2, $onCondition, $where)
        {
            $builder = $this->db->table($table1);
            $builder->select('keranjang.kode_keranjang, keranjang.status,SUM(keranjang.quantity * barang.harga_jual) as total_harga');
            $builder->join($table2, $onCondition, 'left');
            $builder->where($where);
            $builder->groupBy('keranjang.kode_keranjang');
            $builder->orderby('keranjang.create_at','DESC');
            return $builder->get()->getResult();
        }
    
        public function groupbyjoinnwhere($table1, $table2, $onCondition, $where)
    {
        $builder = $this->db->table($table1);
        $builder->select('keranjang.kode_keranjang, barang.nama_barang, keranjang.quantity, barang.harga_jual, barang.id_barang');
        $builder->join($table2, $onCondition, 'left');
        $builder->where($where);
        $builder->orderBy('keranjang.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoinnwhere1select($table1, $table2, $onCondition, $where)
    {
        $builder = $this->db->table($table1);
        $builder->select('barang.id_barang');
        $builder->join($table2, $onCondition, 'left');
        $builder->where($where);
        $builder->orderBy('keranjang.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoinnwhere3($where, $where2, $where3)
    {
        $builder = $this->db->table('transaksi');
        $builder->select('keranjang.*,barang.*,transaksi.*'); // Select unique cart code and any aggregate data
        $builder->join('keranjang', 'transaksi.kode_keranjang = keranjang.kode_keranjang', 'left');
        $builder->join('barang', 'keranjang.id_barang = barang.id_barang', 'left');
        $builder->where($where);
        
        // Start a new group for OR conditions
        $builder->groupStart();
        $builder->where($where2);
        $builder->orWhere($where3);
        $builder->groupEnd();
        
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('keranjang.create_at', 'DESC'); // Use the alias 'create_at'
        
        return $builder->get()->getResult();
    }
    
    public function join2where3($where, $where2, $where3){
        $builder = $this->db->table('transaksi');
        $builder->select('keranjang.*, transaksi.*, barang.*'); // Pilih kolom yang diinginkan
        $builder->join('keranjang', 'transaksi.kode_keranjang = keranjang.kode_keranjang', 'left');
        $builder->join('barang', 'keranjang.id_barang = barang.id_barang', 'left');
        $builder->where($where);
        $builder->where($where2);
        $builder->orWhere($where3);
        $builder->groupBy('transaksi.kode_keranjang'); // Mengelompokkan berdasarkan kode_keranjang
        
        $query = $builder->get();
        $result = $query->getResult();
        
    
    }
    
    public function groupbyjoinnwhere2($where2, $where3)
    {
        $builder = $this->db->table('transaksi');
        $builder->join('keranjang', 'transaksi.kode_keranjang=keranjang.kode_keranjang', 'left');
        $builder->join('barang', 'keranjang.id_barang=barang.id_barang', 'left');
        
        // Start a new group for OR conditions
        $builder->groupStart();
        $builder->Where($where2);
        $builder->orWhere($where3);
        $builder->groupEnd();
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('transaksi.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoinnwhere22($where2, $where3)
    {
        $builder = $this->db->table('transaksi');
        $builder->join('keranjang', 'transaksi.kode_keranjang=keranjang.kode_keranjang', 'left');
        $builder->join('barang', 'keranjang.id_barang=barang.id_barang', 'left');
        
        // Start a new group for OR conditions
        $builder->groupStart();
        $builder->where($where2);
        $builder->Where($where3);
        $builder->groupEnd();
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('transaksi.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoinnwhere1($where, $where2)
    {
        $builder = $this->db->table('transaksi');
        $builder->join('keranjang', 'transaksi.kode_keranjang=keranjang.kode_keranjang', 'left');
        $builder->join('barang', 'keranjang.id_barang=barang.id_barang', 'left');
        $builder->where($where);
        
        // Start a new group for OR conditions
        $builder->groupStart();
        $builder->where($where2);
        $builder->groupEnd();
        
        $builder->orderBy('transaksi.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoin3where1($where, $where2)
    {
        $builder = $this->db->table('keranjang');
        $builder->select('keranjang.*, barang.*, 
                          SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join('barang', 'keranjang.id_barang = barang.id_barang', 'left');
        $builder->where($where);
        $builder->where($where2);
        $builder->groupBy('keranjang.kode_keranjang'); // Hanya kelompokkan berdasarkan kode_keranjang
        $builder->orderBy('keranjang.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoin3where($where)
    {
        $builder = $this->db->table('keranjang');
        $builder->select('keranjang.*, barang.*, 
                          SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join('barang', 'keranjang.id_barang = barang.id_barang', 'left');
        $builder->where($where);
        $builder->groupBy('keranjang.kode_keranjang'); // Hanya kelompokkan berdasarkan kode_keranjang
        $builder->orderBy('keranjang.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyabc($where)
    {
        $builder = $this->db->table('keranjang');
        $builder->select('keranjang.*, barang.*, user.*, 
                          SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join('barang', 'keranjang.id_barang = barang.id_barang', 'left');
        $builder->join('user', 'keranjang.id_user = user.id_user', 'left');
        $builder->where($where);
        $builder->groupBy('keranjang.kode_keranjang'); // Hanya kelompokkan berdasarkan kode_keranjang
        $builder->orderBy('keranjang.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyabc1($where)
    {
        $builder = $this->db->table('keranjang');
        $builder->select('keranjang.*, barang.harga_jual, 
                          SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join('barang', 'keranjang.id_barang = barang.id_barang', 'left');
        $builder->where($where);
        $builder->groupBy('keranjang.kode_keranjang'); // Hanya kelompokkan berdasarkan kode_keranjang
        $builder->orderBy('keranjang.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    public function groupbyabc2($where)
    {
        $builder = $this->db->table('keranjang');
        $builder->select('keranjang.*, barang.*, user.*, 
                          SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join('barang', 'keranjang.id_barang = barang.id_barang', 'left');
        $builder->join('user', 'keranjang.id_user = user.id_user', 'left');
        $builder->where($where);
        $builder->groupBy('keranjang.kode_keranjang'); // Hanya kelompokkan berdasarkan kode_keranjang
        $builder->orderBy('keranjang.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    
    
    public function getLastTransaction()
    {
        $builder = $this->db->table('transaksi');
        $builder->select('no_transaksi');
        $builder->orderBy('no_transaksi', 'ASC'); // Mengurutkan secara ascending
        $query = $builder->get();
        $transactions = $query->getResult();
        
        // Cari nomor transaksi terbaru secara manual
        $lastNumber = 0;
        foreach ($transactions as $transaction) {
            $currentNumber = (int)substr($transaction->no_transaksi, 4);
            if ($currentNumber > $lastNumber) {
                $lastNumber = $currentNumber;
            }
        }
        
        // Jika tidak ada transaksi, return null atau sesuai kebutuhan
        if ($lastNumber == 0) {
            return null;
        }
        
        return (object) ['no_transaksi' => 'CTP-' . str_pad($lastNumber, 3, '0', STR_PAD_LEFT)];
    }
    
    
    public function getPassword($userId) {
        return $this->db->table('user')
                        ->select('password')
                        ->where('id_user', $userId)
                        ->get()
                        ->getRow()
                        ->password;
    }
    
    public function groupbyjoinstruk($where2)
    {
        $builder = $this->db->table('transaksi');
        $builder->join('keranjang', 'transaksi.kode_keranjang=keranjang.kode_keranjang', 'left');
        $builder->join('barang', 'keranjang.id_barang=barang.id_barang', 'left');
        
        // Start a new group for OR conditions
        $builder->groupStart();
        $builder->where($where2);
        $builder->groupEnd();
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('transaksi.create_at', 'DESC');
        return $builder->get()->getResult();
    }
    
    
    
        public function groupbyjoin2where1($table1, $table2, $table3, $table4, $onCondition, $onCondition2, $onCondition3, $where, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table($table1);
        $builder->select('keranjang.*, barang.*, transaksi.*, user.username, user.id_user, SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join($table2, $onCondition, 'left');
        $builder->join($table3, $onCondition2, 'left');
        $builder->join($table4, $onCondition3, 'left');
    
        // Apply existing WHERE conditions
        if ($where) {
            $builder->where($where);
        }
    
        // Apply date filters if provided
        if ($startDate) {
            $builder->where('transaksi.tanggal >=', $startDate);
        }
        if ($endDate) {
            $builder->where('transaksi.tanggal <=', $endDate);
        }
    
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('keranjang.create_at', 'ASC');
        return $builder->get()->getResult();
    }
    
    public function filterbarang($table1, $table2, $table3,$onCondition, $onCondition2, $where, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table($table1);
        $builder->select('barang.*, barangmasuk.*, user.username, user.id_user');
        $builder->join($table2, $onCondition, 'left');
        $builder->join($table3, $onCondition2, 'left');
    
        // Apply existing WHERE conditions
        if ($where) {
            $builder->where($where);
        }
    
        // Apply date filters if provided
        if ($startDate) {
            $builder->where('barangmasuk.tanggal >=', $startDate);
        }
        if ($endDate) {
            $builder->where('barangmasuk.tanggal <=', $endDate);
        }
    
        $builder->orderBy('barangmasuk.tanggal', 'ASC');
        return $builder->get()->getResult();
    }
    
    public function filterbarangk($table1, $table2, $table3,$onCondition, $onCondition2, $where, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table($table1);
        $builder->select('barang.*, barangkeluar.*, user.username, user.id_user');
        $builder->join($table2, $onCondition, 'left');
        $builder->join($table3, $onCondition2, 'left');
    
        // Apply existing WHERE conditions
        if ($where) {
            $builder->where($where);
        }
    
        // Apply date filters if provided
        if ($startDate) {
            $builder->where('barangkeluar.tanggal >=', $startDate);
        }
        if ($endDate) {
            $builder->where('barangkeluar.tanggal <=', $endDate);
        }
    
        $builder->orderBy('barangkeluar.tanggal', 'ASC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoin2where0($table1, $table2, $table3, $table4, $onCondition, $onCondition2, $onCondition3, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table($table1);
        $builder->select('keranjang.*, barang.*, transaksi.*, user.username, user.id_user, SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join($table2, $onCondition, 'inner');
        $builder->join($table3, $onCondition2, 'inner');
        $builder->join($table4, $onCondition3, 'inner');
    
        // Apply existing WHERE conditions
    
    
        // Apply date filters if provided
        if ($startDate) {
            $builder->where('transaksi.tanggal >=', $startDate);
        }
        if ($endDate) {
            $builder->where('transaksi.tanggal <=', $endDate);
        }
    
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('keranjang.create_at', 'ASC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoin4where1($table1, $table2, $table3, $table4, $table5, $onCondition, $onCondition2, $onCondition3, $onCondition5, $where, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table($table1);
        $builder->select('keranjang.*, barang.*, transaksi.*, nota.*,user.username, user.id_user, SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join($table2, $onCondition, 'left');
        $builder->join($table3, $onCondition2, 'left');
        $builder->join($table4, $onCondition3, 'left');
        $builder->join($table5, $onCondition5, 'left');
    
        // Apply existing WHERE conditions
        if ($where) {
            $builder->where($where);
        }
    
        // Apply date filters if provided
        if ($startDate) {
            $builder->where('transaksi.tanggal >=', $startDate);
        }
        if ($endDate) {
            $builder->where('transaksi.tanggal <=', $endDate);
        }
    
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('keranjang.create_at', 'ASC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoin4where0($table1, $table2, $table3, $table4, $table5,$onCondition, $onCondition2, $onCondition3, $onCondition4, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table($table1);
        $builder->select('keranjang.*, barang.*, transaksi.*, nota.*, user.username, user.id_user, SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join($table2, $onCondition, 'inner');
        $builder->join($table3, $onCondition2, 'inner');
        $builder->join($table4, $onCondition3, 'inner');
        $builder->join($table5, $onCondition4, 'inner');
    
        // Apply existing WHERE conditions
    
    
        // Apply date filters if provided
        if ($startDate) {
            $builder->where('transaksi.tanggal >=', $startDate);
        }
        if ($endDate) {
            $builder->where('transaksi.tanggal <=', $endDate);
        }
    
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('keranjang.create_at', 'ASC');
        return $builder->get()->getResult();
    }
    
    public function groupbyjoin5where1($table1, $table2, $table3, $table4, $table5, $onCondition, $onCondition2, $onCondition3, $onCondition4, $startDate = null, $endDate = null)
    {
        $builder = $this->db->table($table1);
        $builder->select('keranjang.*, barang.*, transaksi.*, nota.*,user.username, user.id_user, SUM(keranjang.quantity * barang.harga_jual) as total_harga');
        $builder->join($table2, $onCondition, 'left');
        $builder->join($table3, $onCondition2, 'left');
        $builder->join($table4, $onCondition3, 'left');
        $builder->join($table5, $onCondition4, 'left');
    
    
    
        // Apply date filters if provided
        if ($startDate) {
            $builder->where('transaksi.tanggal >=', $startDate);
        }
        if ($endDate) {
            $builder->where('transaksi.tanggal <=', $endDate);
        }
    
        $builder->groupBy('keranjang.kode_keranjang');
        $builder->orderBy('keranjang.create_at', 'ASC');
        return $builder->get()->getResult();
    }
    
    public function delete_item($table,$id_keranjang)
    {
        return $this->table($table)->where('id_Keranjang', $id_keranjang)->delete();
    }
    
    public function restoreProduct($table,$column,$id)
    {
        // Ambil data dari tabel backup
        $backupData = $this->db->table($table)->where($column, $id)->get()->getRowArray();
    
        if ($backupData) {
            // Tentukan nama tabel utama tempat data akan di-restore
            $mainTable = str_replace('_backup', '', $table);
            
            // Update data di tabel utama
            $this->db->table($mainTable)->where($column, $id)->update($backupData);
        }
    }
    
    protected $tables = 'menu';
    protected $primaryKeys = 'id_menu';
    protected $allowedFieldss = [
        'dashboard', 'barang', 'barangmasuk', 'barangkeluar', 'user',
        'keranjang', 'transaksi', 'rbarang', 'rbarangmasuk', 'rbarangkeluar',
        'ruser', 'rkeranjang', 'rtransaksi', 'laporantransaksi', 'laporanbarangmasuk',
        'laporanbarangkeluar', 'barangmaterial', 'userlog', 'updatelog', 'setting', 'menusetting'
    ];
    
    public function updateMenuVisibility(array $data,$id_menu): bool
        {
            // Prepare the data for update
            $updateData = [];
            foreach ($this->allowedFieldss as $field) {
                $updateData[$field] = isset($data[$field]) ? 1 : 0;
            }
    
            // Perform the update
            return $this->db->table($this->tables)
                            ->where($this->primaryKeys, $id_menu)
                            ->update($updateData);
        }

        protected $tablee = 'wisata_batam';
    
        public function cariWisata($nama_objek)
        {
            $builder = $this->db->table($this->tablee);
            $builder->select('*');
            $builder->like('LOWER(nama_objek)', strtolower($nama_objek));
            $query = $builder->get();
    
            return $query->getResultArray();
        }
}