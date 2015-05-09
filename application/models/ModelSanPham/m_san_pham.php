<?php
class M_san_pham extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function dssp()
    {
        $query=$this->db->get('san_pham');
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }
    public function sp_phantrang($limit,$start)
    {
        
        $query=$this->db->get('san_pham',$limit,$start);
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }
    public function sp_id($id)
    {
        $this->db->where(array('masanpham'=>$id));
         $query=$this->db->get('san_pham');
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }
    public function sp_moi()
    {
         $this->db->where(array('sanphammoi'=>'1'));
         $query=$this->db->get('san_pham');
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }
    public function sp_theo_loai($maloai)
    {
         $this->db->where(array('maloai'=>$maloai));
         $query=$this->db->get('san_pham');
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }
    public function sp_theo_loai_cha($maloaicha)
    {
         $this->db->where(array('maloaicha'=>$maloaicha));
         $query=$this->db->get('san_pham');
        if($query->num_rows()>0){
            return $query->result_array();
        }
        return false;
    }
    public function sp_cung_loai($id,$ma_loai)
    {
        $this->db->where(array('maloai'=>$ma_loai,'masanpham !='=>$id));
        $query=$this->db->get('san_pham');
        if($query->num_rows()>0)
            return $query->result_array();
        return false;
    }
    public function sp_ban_chay()
    {
        
    }
    public function them_sp($data)
    {
        return $this->db->insert('san_pham',$data);
    }
    public function cap_nhat_sp($data)
    {
        $this->db->where(array('masanpham'=>$data['masanpham']));
          return $this->db->update('san_pham',$data);
    }
    public function xoa_sp($id)
    {
         $this->db->where(array('masanpham'=>$id));
          return $this->db->delete('san_pham');
    }
    public function tong_so_san_pham()
    {
        return $this->db->count_all('san_pham');
    }
    public function ds_nhom()
    {
        $query= $this->db->get('nhom_loai');
        if($query->num_rows()==0){
            return false;
        }
        return $query->result_array();
    }
}
?>