<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/19/2018
 * Time: 6:44 PM
 */

class Sprocket
{
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct($id, $name, $desc, $price)
    {
        $this->id =$id;
        $this->name = $name;
        $this->description = $desc;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

}