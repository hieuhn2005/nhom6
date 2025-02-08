

<div class="container-fluid">
    <!-- ghi trong đây -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sửa Danh Mục</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <!-- code ở đây -->
                    <div class="container mt-5">
                        <h2 class="mb-4">Cập Nhật Danh Mục</h2>
                        <form action="index.php?act=updatedm" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="product-name" class="form-label">ID Danh Mục</label>
                                <input type="text" name="id" id="id" class="form-control" value="<?php if(isset($dm["id_dm"])&&($dm["id_dm"]!="")) echo $dm["id_dm"]; ?>"
                                readonly>
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="form-label">Tên Danh Mục</label>
                                <input type="text" name="tendm" id="tendm" class="form-control" placeholder="Nhập tên danh mục"
                                    value="<?= $dm["ten_danhmuc"]?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="form-label">Ngày Tạo</label>
                                <input type="date" name="ngaytao" id="ngaytao" class="form-control" value="<?=$dm["ngay_tao"]?>"
                                 disabled>
                            </div>
                            <div class="mb-3">
                                <label for="product-price" class="form-label">Ngày Sửa</label>
                                <input type="date" name="ngaysua" id="ngaysua" class="form-control" value="<?=$dm["ngay_sua"]?>"
                                 required>
                            </div>
                            <input type="submit" name="capnhat" id="" class="btn btn-primary" value="Sửa danh mục">
                            <?php
                            if (isset($thongbao) && ($thongbao != "")) echo $thongbao       ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- kếp thúc nội dung -->

        <!-- ghi trong đây -->

    </div>