<?php
class PerusahaanView
{
    public function render($data)
    {
        $no = 1;
        $dataPerusahaan = null;
        foreach ($data as $val) {
            list($id_perusahaan, $nama_perusahaan, $jenis_perusahaan) = $val;
            $dataPerusahaan .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama_perusahaan . "</td>
                <td>" . $jenis_perusahaan . "</td>
                <td>
                <a href='perusahaan.php?id_hapus=" . $id_perusahaan . "' class='btn btn-danger''>Hapus</a>
                <a href='./templates/editPerusahaan.php?id_perusahaan=" . $id_perusahaan . "&nama_perusahaan=" . $nama_perusahaan . "&jenis_perusahaan=" . $jenis_perusahaan . "' class='btn btn-success''>Edit</a>
                </td>
                </tr>";
        }
        $tpl = new Template("templates/perusahaan.html");
        $tpl->replace("DATA_TABEL", $dataPerusahaan);
        $tpl->write();
    }
}
