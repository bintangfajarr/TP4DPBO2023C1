<?php
include_once("conf.php");
include_once("models/Perusahaan.class.php");
include_once("views/Perusahaan.view.php");

class PerusahaanController
{
    private $perusahaan;

    function __construct()
    {
        $this->perusahaan = new Perusahaan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->perusahaan->open();
        $this->perusahaan->getPerusahaan();
        $data = array();
        while ($row = $this->perusahaan->getResult()) {
            array_push($data, $row);
        }

        $this->perusahaan->close();

        $view = new PerusahaanView();
        $view->render($data);
    }


    function add($data)
    {
        $this->perusahaan->open();
        $this->perusahaan->add($data);
        $this->perusahaan->close();

        header("location:perusahaan.php");
    }

    function edit($id)
    {
        $this->perusahaan->open();
        $this->perusahaan->edit($id);
        $this->perusahaan->close();

        header("location:perusahaan.php");
    }

    function delete($id)
    {
        $this->perusahaan->open();
        $this->perusahaan->delete($id);
        $this->perusahaan->close();

        header("location:perusahaan.php");
    }
}
