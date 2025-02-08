<?php

    include "../model/pdo.php";
    include "../model/sanpham.php";
    include '../model/danhmuc.php';
    include "header.php";
    
   

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act){
            case 'adddm':
                if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                    $ten_danhmuc = $_POST['tendm'];
                    $ngaytao = $_POST['ngaytao'];
                    $ngaysua = $_POST['ngaysua'];
                    insert_danhmuc($ten_danhmuc, $ngaytao, $ngaysua);
                    $_SESSION['success'] = "";
                    header('location:index.php?act=listdm');
                    exit();
                }
                include "./danhmuc/add.php";
                break;
            case 'listdm':
                $listdanhmuc = list_danhmuc();
                include "./danhmuc/list.php";
                break;
            case 'suadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $dm = loadone_danhmuc($_GET['id']);
                }
                include "./danhmuc/update.php";
                break;
            case 'xoadm':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $xoadm = delete_danhmuc($id);
                }
                $listdanhmuc = list_danhmuc();
                include "./danhmuc/list.php";
                break;
            case 'updatedm':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
    
                    $id = $_POST['id'];
                    $ten_danhmuc = $_POST['tendm'];
                    $ngay_sua = $_POST['ngaysua'];
                    // update_danhmuc($id_dm,$ten_danhmuc, $ngay_sua);
                    $sql = "update danh_muc set ten_danhmuc='" . $ten_danhmuc . "', ngay_sua='" . $ngay_sua . "' where id_dm=" . $id;
                    pdo_execute($sql);
                    $thongbao = "Cập Nhật thành công";
                }
                // $listdanhmuc= list_danhmuc();
                $sql = "select * from danh_muc order by id_dm desc";
                $listdanhmuc = pdo_query($sql);
                include "./danhmuc/list.php";
                // include "./danhmuc/update.php";
                break;
                // 
                // Hết phần danh mục
            case 'addsp':
                $listsanpham=load_sanpham();
                include "sanpham/add.php";
                break;

            case 'xoasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_sanpham($_GET['id']);
                }
    
                    $listsanpham=load_sanpham("",0);
                    include "sanpham/add.php";
                    break;
    
            case 'suasp':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $sanpham=loadone_sanpham($_GET['id']);
                }
                    // $listdanhmuc=loadall_danhmuc();
                    include "sanpham/update.php";
                    break;

            case 'updatesp':
                if(isset($_POST['capnhap'])&&($_POST['capnhap'])){
                    $id=$_POST['id'];

                    $tensp=$_POST['tensp'];
                    $giatien=$_POST['giatien'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)){
        
                    } else{
        
                    }
                    // $listdanhmuc=loadall_danhmuc();
                    update_sanpham($id,$tensp,$giatien,$mota,$hinh);
                    $thongbao="Cập nhập Thành công";
                    }
                        $listsanpham=load_sanpham("",0   );
                        include "sanpham/add.php";
                        break;
        
            case 'lissp':
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tensp=$_POST['tensp'];
                    $giatien=$_POST['giatien'];
                    $mota=$_POST['mota'];
                    $hinh=$_FILES['hinh']['name'];
                    $target_dir = "../upload/";
                    $target_file = $target_dir . basename($_FILES['hinh']['name']);
                    if(move_uploaded_file($_FILES["hinh"]["tmp_name"],$target_file)){

                    } else{

                    }
                    insert_sanpham($tensp,$giatien,$mota,$hinh);
                    $thongbao="Thêm Thành công";
                }
                include "sanpham/list.php";
                break;

            
        }

    }else{

    }

    include "footer.php";