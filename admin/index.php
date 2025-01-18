<?php

    include "../model/pdo.php";
    include "../model/sanpham.php";

    include "header.php";
    
   

    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act){
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