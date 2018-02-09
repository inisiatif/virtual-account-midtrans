<?php

namespace Inisiatif\Midtrans\Model;

use Inisiatif\Midtrans\Contract\ModelContact;

class Customer extends ModelContact
{
    private $firstName;

    private $lastName;

    private $email;

    private $phone;

    private $billingAddress;

    private $shippingAddress;

    /**
     * Customer constructor.
     * @param $firstName
     * @param $lastName
     */
    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param mixed $billingAddress
     */
    public function setBillingAddress($billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return mixed
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param mixed $shippingAddress
     */
    public function setShippingAddress($shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'email' => $this->getEmail(),
            'phone' => $this->getPhone(),
            'billing_address' => $this->getBillingAddress(),
            'shipping_address' => $this->getShippingAddress()
        );
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toJson());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }
}