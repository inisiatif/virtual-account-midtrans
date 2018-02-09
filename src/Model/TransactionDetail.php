<?php

namespace Inisiatif\Midtrans\Model;

use Inisiatif\Midtrans\Contract\ModelContact;

class TransactionDetail extends ModelContact
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $grossAmount;

    /**
     * TransactionDetail constructor.
     * @param string $id
     * @param string $grossAmount
     */
    public function __construct(string $id, string $grossAmount)
    {
        $this->id = $id;
        $this->grossAmount = $grossAmount;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getGrossAmount(): string
    {
        return $this->grossAmount;
    }

    /**
     * @param string $grossAmount
     */
    public function setGrossAmount(string $grossAmount): void
    {
        $this->grossAmount = $grossAmount;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return ['transaction_details' => [
            'order_id' => $this->getId(),
            'gross_amount' => $this->getGrossAmount()
        ]];
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