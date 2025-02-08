<?php

function insert_danhmuc($tenloai,$ngaytao,$ngaysua)
{
    $sql = "insert into Danh_muc(ten_danhmuc,ngay_tao,ngay_sua) values('$tenloai','$ngaytao','$ngaysua')";
    pdo_execute($sql);
}
function list_danhmuc() {
    $sql= "select * from Danh_muc";
    $listdanhmuc= pdo_query( $sql);
    return $listdanhmuc;
}

function loadone_danhmuc($id){
    $sql="select * from Danh_muc where id_dm=$id";
    // echo $sql;
    $dm=pdo_query_one($sql);
    return $dm;
}

// function 
function update_danhmuc($id,$tenloai){
    $sql="update Danh_muc set ten_danhmuc='".$tenloai."' where id=".$id;
    pdo_execute($sql);
}
function delete_danhmuc($id){
    $sql=" DELETE FROM `Danh_muc` WHERE id_dm=".$id;
    pdo_execute($sql);

}
// ?>