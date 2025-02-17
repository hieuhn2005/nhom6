<?php include './views/layout/header.php'; ?>
<?php include './views/layout/sidebar.php'; ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<div class="container mt-5 product-detail">
    <style>
        .product-detail {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.product-detail h2 {
    font-size: 2rem;
    font-weight: bold;
    color: #333;
}

.product-detail .h4 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #e63946; /* Màu sắc nổi bật cho giá */
}

.product-detail p {
    font-size: 1rem;
    color: #666;
}

.product-detail .price {
    display: flex;
    align-items: center;
}

.product-detail .price span {
    margin-right: 10px;
    font-weight: 700;
}

.product-detail .description {
    margin-top: 10px;
    line-height: 1.5;
    color: #444;
}
.product-comments {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.product-comments h2 {
    font-size: 1.8rem;
    color: #333;
    margin-bottom: 15px;
}

.product-comments ul {
    list-style-type: none; /* Không có dấu chấm đầu dòng */
    padding: 0;
}

.product-comments li {
    border-bottom: 1px solid #e0e0e0;
    padding: 10px 0;
}

.product-comments li:last-child {
    border-bottom: none; /* Không có đường viền cho phần tử cuối cùng */
}

.product-comments strong {
    color: #007bff; /* Màu sắc nổi bật cho tên người bình luận */
}

.product-comments p {
    margin: 5px 0 0 0;
    color: #555; /* Màu sắc cho nội dung bình luận */
}
.btn-custom {
    background-color: #007bff; /* Màu nền xanh */
    color: #ffffff; /* Màu chữ trắng */
    border: none; /* Bỏ viền */
    padding: 10px 20px; /* Padding cho nút */
    font-size: 1.2rem; /* Cỡ chữ lớn */
    border-radius: 5px; /* Bo tròn góc */
    transition: background-color 0.3s, transform 0.2s; /* Hiệu ứng chuyển đổi */
}

.btn-custom:hover {
    background-color: #0056b3; /* Màu nền khi hover */
    transform: scale(1.05); /* Phóng to một chút khi hover */
}

.btn-custom i {
    margin-right: 5px; /* Khoảng cách giữa biểu tượng và chữ */
}
    </style>
    <?php if ($SanPham): ?>
        

        <!-- Hình ảnh sản phẩm -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <?php if (!empty($listAnhSanPham)): ?>
                    <img src="./<?php echo htmlspecialchars($listAnhSanPham[0]['link_hinh_anh']); ?>" alt="Product" class="img-fluid rounded mb-3 product-image" id="mainImage">
                    <div class="d-flex justify-content-between">
                        <?php foreach ($listAnhSanPham as $images): ?>
                            <img src="./<?php echo htmlspecialchars($images['link_hinh_anh']); ?>" alt="" class="thumbnail rounded" onclick="changeImage(event, this.src)">
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Không có hình ảnh nào cho sản phẩm này.</p>
                <?php endif; ?>
            </div>

            <!-- Thông tin chi tiết sản phẩm -->
            <div class="col-md-6">
                <h2 class="mb-3"><?php echo $SanPham['ten_san_pham']; ?></h2>
                <div class="mb-3">
                    <span class="h4 me-2"><?php echo $SanPham['gia_san_pham']; ?> VNĐ</span>
                </div>
                <p class="mb-4"><?php echo $SanPham['mo_ta']; ?></p>
                <!-- Số lượng và nút thêm vào giỏ hàng -->
                <div class="mb-4">
                    <label for="quantity" class="form-label">Số lượng:</label>
                    <input type="number" class="form-control" id="quantity" value="1" min="1" style="width: 80px;">
                </div>
                <a href="link-to-cart.php" class="btn btn-custom btn-lg mb-3 me-2">
    <i class="bi bi-cart-plus"></i> Thêm vào giỏ hàng
</a>
                <button class="btn btn-outline-secondary btn-lg mb-3">
                    <i class="bi bi-heart"></i> Thêm vào danh sách yêu thích
                </button>

                <!-- Bình luận sản phẩm -->
                <div class="product-comments mt-4">
                    <h2>Bình luận</h2>
                    <?php if ($listBinhluan): ?>
                        <ul>
                            <?php foreach ($listBinhluan as $binhluan): ?>
                                <li>
                                    <strong><?php echo htmlspecialchars($binhluan['ho_ten']); ?>:</strong>
                                    <p><?php echo htmlspecialchars($binhluan['noi_dung']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Chưa có bình luận cho sản phẩm này.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p>Sản phẩm không tồn tại.</p>
    <?php endif; ?>
</div>

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<style>
    .product-image {
        max-height: 400px;
        object-fit: cover;
    }
    .thumbnail {
        width: 80px;
        height: 80px;
        object-fit: cover;
        cursor: pointer;
        opacity: 0.6;
        transition: opacity 0.3s ease;
    }
    .thumbnail:hover, .thumbnail.active {
        opacity: 1;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function changeImage(event, src) {
        document.getElementById('mainImage').src = src;
        document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
        event.target.classList.add('active');
    }
</script>