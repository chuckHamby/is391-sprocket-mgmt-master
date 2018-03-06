<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/19/2018
 * Time: 6:46 PM
 */

class SprocketDao
{
    public function __construct()
    {
    }

    public function getAll()
    {
        $sql = "select * from sprocket";
        $rows = DB::queryAll($sql, array());
        if (empty($rows)) {
            return array();
        }
        $result = array();
        foreach ($rows as $row) {
            $sprocket = $this->create($row);
            array_push($result, $sprocket);
        }
        return $result;
    }

    public function getOne($id)
    {
        $sql = "select * from sprocket where id=('$id')";
        $rows = DB::queryAll($sql, array());
        if (empty($rows)) {
            return array();
        }
        $result = array();
        foreach ($rows as $row) {
            $sprocket = $this->create($row);
            array_push($result, $sprocket);
        }
        return $result;
    }


    private function create($row) {
        $id = $row["id"];
        $name = $row["name"];
        $desc = $row["description"];
        $price = $row["price"];
        return new Sprocket($id, $name, $desc, $price);
    }
}