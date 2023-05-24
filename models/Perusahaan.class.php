<?php

class Perusahaan extends DB
{
    function getPerusahaan()
    {
        $query = "SELECT * FROM perusahaan";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama_perusahaan'];
        $jenis = $data['jenis_perusahaan'];

        $query = " INSERT INTO `perusahaan`(`nama_perusahaan`, `jenis_perusahaan`) VALUES ('$nama', '$jenis')";
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM perusahaan WHERE id_perusahaan = '$id'";
        return $this->execute($query);
    }

    function edit($data)
    {
        $nama = $data["nama_perusahaan"];
        $jenis = $data["jenis_perusahaan"];
        $id = $data["id_edit"];

        $query = "update perusahaan set nama_perusahaan='$nama', jenis_perusahaan='$jenis' where id_perusahaan='$id'";
        return $this->execute($query);
    }
}
