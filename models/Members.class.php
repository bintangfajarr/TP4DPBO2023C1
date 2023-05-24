<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_perusahaan = $data['id_perusahaan'];

        $query = " INSERT INTO `members`(`name`, `email`, `phone`,`join_date`,`id_perusahaan`) VALUES ('$name', '$email', '$phone','$join_date','$id_perusahaan')";

        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";
        return $this->execute($query);
    }

    function edit($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $id_perusahaan = $data['id_perusahaan'];
        $join_date = $data['join_date'];
        $id = $data['id_edit'];
        $query = "update members set name='$name', email='$email', phone='$phone', join_date='$join_date' ,id_perusahaan='$id_perusahaan' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
