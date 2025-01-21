<?php
    if(is_array($sanpham)){
        extract($sanpham);
    }
    $hinhpath="../upload/".$anhsp;
    if(is_file($hinhpath)){
      $hinh="<img src='".$hinhpath."' height='80'";
    }else{
      $hinh="no photo";
    }
?>

<div class="col-9 main-content">
        
        <div class="product">
            <h1>Sửa sản phẩm</h1><br>
        </div>
        <div class="danhmuc">
            <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                
                <div class="mb10">
                    Tên sản phẩm: <br>
                    <input type="text" name="tensp" value="<?= $tensp ?>">
                </div><br>
                <div class="mb10">
                    Giá tiền: <br>
                    <input type="text" name="giatien" value="<?= $giatien ?>">
                </div><br>
                <!-- <div class="mb10">
                    Giá Sale: <br>
                    <input type="text" name="giamgia" > -->
                </div><br>
                <div class="mb10">
                    Hình ảnh: <br>
                    <input type="file" name="hinh" id="">
                    <?=$hinh?>
                </div><br>
                <div class="mb10">
                    Mô tả: <br>
                    <textarea name="mota" id="" cols="92" rows="10"><?= $mota ?></textarea>
                </div><br>
                <div class="mb20">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="submit" name="capnhap" value="Cập nhập" >
                </div>
 
                <?php
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao;
                ?>

            </form>
 
        </div>

      </div>
    </div>
</div>

