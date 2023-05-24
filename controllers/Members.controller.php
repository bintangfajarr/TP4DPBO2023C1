<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Perusahaan.class.php");
include_once("views/Members.view.php");

class MembersController
{
    private $members;
    private $perusahaan;

    function __construct()
    {
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->perusahaan = new Perusahaan(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index()
    {
        $this->members->open();
        $this->perusahaan->open();
        $this->members->getMembers();
        $this->perusahaan->getPerusahaan();
        $data = array();
        while ($row = $this->members->getResult()) {
            array_push($data, $row);
        }

        $dataPerusahaan = array();
        while ($row = $this->perusahaan->getResult()) {
            array_push($dataPerusahaan, $row);
        }

        $this->members->close();
        $this->perusahaan->close();

        $view = new MembersView();
        $view->render($data, $dataPerusahaan);
    }

    public function addForm()
    {
        $this->perusahaan->open();
        $this->perusahaan->getPerusahaan();

        $dataPerusahaan = array();
        while ($row = $this->perusahaan->getResult()) {
            array_push($dataPerusahaan, $row);
        }

        $this->perusahaan->close();

        $view = new MembersView();
        $view->listPerusahaan($dataPerusahaan);
    }

    public function editForm($id)
    {
        $this->members->open();
        $this->perusahaan->open();
        $this->members->getMembers();
        $this->perusahaan->getPerusahaan();
        $data = array();
        while ($row = $this->members->getResult()) {
            array_push($data, $row);
        }

        $dataPerusahaan = array();
        while ($row = $this->perusahaan->getResult()) {
            array_push($dataPerusahaan, $row);
        }

        $this->members->close();
        $this->perusahaan->close();

        $view = new MembersView();
        $view->editMember($id, $data, $dataPerusahaan);
    }

    function add($data)
    {
        $this->members->open();
        $this->members->add($data);
        $this->members->close();

        header("location:index.php");
    }

    function edit($id)
    {
        $this->members->open();
        $this->members->edit($id);
        $this->members->close();

        header("location:index.php");
    }

    function delete($id)
    {
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();

        header("location:index.php");
    }
}
