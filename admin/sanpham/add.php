
<div class="col-9 main-content">
        
        <div class="product">
            <h1>Quản lý danh sách sản phẩm</h1><br>
            <a href="index.php?act=lissp"><button>Thêm sản phẩm</button></a>
        </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên sản phẩm</th>
              <th>Hình ảnh</th>
              <th>Giá Tiền</th>
              <th>Mô tả</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach ($listsanpham as $sanpham) {
                extract($sanpham);
                $suasp="index.php?act=suasp&id=".$id;
                $xoasp="index.php?act=xoasp&id=".$id;
                $hinhpath="../upload/".$anhsp;
                if(is_file($hinhpath)){
                  $hinh="<img src='".$hinhpath."' height='80'";
                }else{
                  $hinh="no photo";
                }
                echo'
                            <tr>
                              <td>'.$id.'</td>
                              <td>'.$tensp.'</td>
                              <td>'.$hinh.'</td>
                              <td>'.$giatien.'</td>
                              <td>'.$mota.'</td>
                      
                              <td>
                                <a href="'.$suasp.'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <a href="'.$xoasp.'" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                              </td>
                            </tr>
                    ';
              }
            ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
