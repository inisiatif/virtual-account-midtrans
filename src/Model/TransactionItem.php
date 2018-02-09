<?php

namespace Inisiatif\Midtrans\Model;

use Inisiatif\Midtrans\Contract\ModelContact;

class TransactionItem extends ModelContact
{
    private $id;

    private $price;

    private $quantity;

    private $name;

    /**
     * TransactionItem constructor.
     * @param string $id
     * @param int $price
     * @param int $quantity
     * @param string $name
     */
    public function __construct(string $id, int $price, int $quantity, string $name)
    {
        $this->id = $id;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->name = $name;
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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'price' => $this->getPrice(),
            'quantity' => $this->getQuantity(),
            'name' => $this->getName()
        );
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}