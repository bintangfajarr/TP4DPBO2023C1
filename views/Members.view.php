<?php
class MembersView
{
    public function render($data, $dataPerusahaan)
    {
        $no = 1;
        $dataMembers = null;
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $join_date, $id_perusahaan) = $val;
            $nama_perusahaan = '';
            $id_member = $id;
            foreach ($dataPerusahaan as $perusahaan) {
                list($id, $nama) = $perusahaan;
                if ($id == $id_perusahaan) {
                    $nama_perusahaan = $nama;
                    break;
                }
            }
            $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                <td>" . $join_date . "</td>
                <td>" . $nama_perusahaan . "</td>
                <td>
                <a href='index.php?id_hapus=" . $id_member . "' class='btn btn-danger''>Hapus</a>
                <a href='index.php?editForm=" . $id_member . "' class='btn btn-success''>Edit</a>
                </td>
                </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMembers);
        $tpl->write();
    }

    public function listPerusahaan($dataPerusahaan)
    {
        $listPerusahaan = null;
        foreach ($dataPerusahaan as $val) {
            list($id, $nama) = $val;
            $listPerusahaan .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("templates/addMembers.html");
        $tpl->replace("OPTION", $listPerusahaan);
        $tpl->write();
    }

    public function editMember($idMember, $data, $dataPerusahaan)
    {
        $dataMember = null;
        $perusahaanMember = 0;
        foreach ($data as $val) {
            list($id, $name, $email, $phone, $join_date, $id_perusahaan) = $val;
            if ($idMember == $id) {
                $dataMember .=
                    "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='name' value='$name' class='form-control'> <br>
                <label> EMAIL: </label>
                <input type='text' name='email' value='$email' class='form-control'> <br>
                <label> PHONE: </label>
                <input type='text' name='phone' value='$phone' class='form-control'> <br>
                 <label> JOIN DATE: </label>
                <input type='date' name='join_date' value='$join_date' class='form-control''> <br>
                <label> PERUSAHAAN:</label>
            ";
                $perusahaanMember = $id_perusahaan;
                break;
            }
        }

        $listPerusahaan = null;
        foreach ($dataPerusahaan as $val) {
            list($id, $nama) = $val;
            if ($id == $perusahaanMember) {
                $listPerusahaan .= "<option selected value='" . $id . "'>" . $nama . "</option>";
            } else {
                $listPerusahaan .= "<option value='" . $id . "'>" . $nama . "</option>";
            }
        }

        $tpl = new Template("templates/editMembers.php");
        $tpl->replace("FORM_MEMBER", $dataMember);
        $tpl->replace("PERUSAHAAN_MEMBER", $listPerusahaan);
        $tpl->write();
    }
}
