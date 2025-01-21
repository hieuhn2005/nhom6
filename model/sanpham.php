<?php
function insert_sanpham($tensp,$giatien,$mota,$hinh){
    $sql="insert into san_pham(tensp,giatien,mota,anhsp) values('$tensp','$giatien','$mota','$hinh')";
    pdo_execute($sql);
}

function load_sanpham(){
    $sql="select * from san_pham order by id  desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function delete_sanpham($id){
    $sql="delete from san_pham where id=".$id;
    pdo_execute($sql);
}
function loadone_sanpham($id){
    $sql="select * from san_pham where id=".$id;
    $sp=pdo_query_one($sql);
    return $sp;
}

function update_sanpham($id,$tensp,$giatien,$mota,$hinh){
    if($hinh!="")
    $sql="update san_pham set tensp='".$tensp."', giatien='".$giatien."', mota='".$mota."', anhsp='".$hinh."' where id=".$id;
    else
    $sql="update san_pham set tensp='".$tensp."', giatien='".$giatien."', mota='".$mota."' where id=".$id;
    pdo_execute($sql);
}