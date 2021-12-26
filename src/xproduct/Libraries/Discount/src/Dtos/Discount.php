<?php

namespace Xproduct\Libraries\Discount\Dtos;

class Discount
{
    private $id;
    private $type;
    private $item;
    private $percentage;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function setPercentage($percentage)
    {
        $this->percentage = trim($percentage, "%");
        return $this;
    }

    public function getPercentage()
    {
        return $this->percentage;
    }
}
