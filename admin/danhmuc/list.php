<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách</h6>
        </div>
        <div class="card-body">
            <div class="table">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if (isset($_SESSION['success'])): ?>
                                <style>
                                    .alert {
                                        padding: 15px;
                                        background-color: #d4edda;
                                        color: #155724;
                                        border: 1px solid #c3e6cb;
                                        border-radius: 5px;
                                        position: relative;
                                        margin-bottom: 20px;
                                    }
                                    .btn-close {
                                        position: absolute;
                                        top: 10px;
                                        right: 15px;
                                        background: none;
                                        border: none;
                                        font-size: 16px;
                                        cursor: pointer;
                                        color: #155724;
                                    }
                                    .btn-close:hover {
                                        color: #c82333;
                                    }
                                </style>
                                <div class="alert">
                                    <strong>Success!</strong> Thêm Danh Mục Thành Công!
                                    <button type="button" class="btn-close" onclick="this.parentElement.style.display='none'">×</button>
                                </div>
                                <?php unset($_SESSION['success']); endif; ?>

                            <table class="table table-bordered dataTable table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày sửa</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listdanhmuc as $key): ?>
                                        <tr>
                                            <td><?php echo $key['id_dm']; ?></td>
                                            <td><?php echo $key['ten_danhmuc']; ?></td>
                                            <td><?php echo $key['ngay_tao']; ?></td>
                                            <td><?php echo $key['ngay_sua']; ?></td>
                                            <td>
                                                <a href="index.php?act=suadm&id=<?php echo $key['id_dm']; ?>" class="btn btn-info btn-circle">
                                                    <i class="fas fa-info-circle"></i>
                                                </a