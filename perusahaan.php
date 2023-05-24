<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Perusahaan.controller.php");

$perusahaan = new PerusahaanController();

if (isset($_POST['add'])) {
    //memanggil add
    $perusahaan->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $perusahaan->delete($id);
} else if (isset($_POST['edit'])) {
    $perusahaan->edit($_POST);
} else {
    $perusahaan->index();
}
