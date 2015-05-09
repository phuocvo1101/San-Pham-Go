<?php
class san_pham extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelSanPham/m_san_pham','msp');
        $this->load->model('ModelLoaiSanPham/m_loai_sp','mlsp');
    }
    public function index()
    {
        //$ds= $this->msp->sp_phantrang(2,1);
        //var_dump($ds);die();
        $loai_sp= $this->mlsp->ds_loai_cha();
        $this->data['loaisp']=$loai_sp;
        $this->data['path']=array('Viewsanpham/menusanpham');
       $this->load->view('layout',$this->data);
    }
    public function danh_sach()
    {
        
        
        $title_ds ='<li class="active">Danh sách sản phẩm</li>';
        $this->data['title_ds']= $title_ds;
         $this->data['title_bar']='Quan ly nguoi dung';
           $this->data['mlloasanpham']=$this->mlsp->ds_loai_cha();
         $danhsachsp= $this->msp->dssp();
        $this->data['danhsachsanpham']= $danhsachsp;
        
        $this->data['path']=array('Viewsanpham/docdanhsachsanpham');
        $this->load->view('Viewsanpham/layoutsanpham',$this->data);

    }
    public function loaisanphamcha()
    {
        $chuoi= $this->uri->segment(2);
        $arr=explode('-', $chuoi);    
        $id= $arr[count($arr)-1];
        
        $loaicha = $this->mlsp->lay_loai_sp($id);
        $title_ds ='<li><a href="'.site_url('san-pham').'">Sản Phẩm</a></li>';
         $title_ds .='<li class="active">'.$loaicha['tenloai'].'</li>';
        

        $this->data['title_ds']= $title_ds;
         $this->data['title_bar']='Quan ly nguoi dung';
           $this->data['mlloasanpham']=$this->mlsp->ds_loai_cha();
         $danhsachsp= $this->msp->sp_theo_loai_cha($id);
        $this->data['danhsachsanpham']= $danhsachsp;
        
        $this->data['path']=array('Viewsanpham/docdanhsachsanpham');
        $this->load->view('Viewsanpham/layoutsanpham',$this->data);

    }
    public function loaisanpham()
    {
        $chuoi= $this->uri->segment(3);
        $arr=explode('-', $chuoi);    
        $id= $arr[count($arr)-1];
        
        $loaicon= $this->mlsp->lay_loai_sp($id);
        $loaicha = $this->mlsp->lay_loai_sp($loaicon['maloaicha']);
        $title_ds ='<li><a href="'.site_url('san-pham').'">Sản Phẩm</a></li>';
         $title_ds .='<li><a href="'.site_url('san-pham/'.$loaicha['tenloaiurl'].'-'.$loaicha['maloai']).'">'.$loaicha['tenloai'].'</a></li>';
         $title_ds .='<li class="active">'.$loaicon['tenloai'].'</li>';
        

        $this->data['title_ds']= $title_ds;
         $this->data['title_bar']='Quan Ly Nguoi Dung';
           $this->data['mlloasanpham']=$this->mlsp->ds_loai_cha();
         $danhsachsp= $this->msp->sp_theo_loai($id);
        $this->data['danhsachsanpham']= $danhsachsp;
        
        $this->data['path']=array('Viewsanpham/docdanhsachsanpham');
        $this->load->view('Viewsanpham/layoutsanpham',$this->data);
    }
    
    public function chi_tiet_san_pham()
    {
      $id= $this->uri->segment(3);
      $data['masp']=$id;
      $this->load->view('Viewsanpham/chitiet',$data);
    }
}

?>