<?php

namespace Inisiatif\Midtrans\Contract;

use Webmozart\Assert\Assert;
use Inisiatif\Midtrans\Model\Customer;
use Inisiatif\Midtrans\Model\TransactionItem;
use Inisiatif\Midtrans\Factory\MidtransFactory;
use Inisiatif\Midtrans\Model\TransactionDetail;
use Inisiatif\Midtrans\Response\ChargeResponse;

abstract class ChannelContract
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var bool
     */
    private $production;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var TransactionDetail
     */
    private $transaction;

    /**
     * @var array
     */
    private $items;

    /**
     * @var array
     */
    private $payloads;

    /**
     * @param string $key
     * @param bool $production
     */
    public function __construct(string $key, $production = true)
    {
        $this->key = $key;

        $this->production = $production;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    /**
     * @return bool
     */
    public function isProduction(): bool
    {
        return $this->production;
    }

    /**
     * @param bool $production
     */
    public function setProduction(bool $production): void
    {
        $this->production = $production;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return ChannelContract
     */
    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return TransactionDetail
     */
    public function getTransaction(): TransactionDetail
    {
        return $this->transaction;
    }

    /**
     * @param TransactionDetail $transaction
     * @return ChannelContract
     */
    public function setTransaction(TransactionDetail $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return ChannelContract
     */
    public function setItems(array $items): self
    {
        foreach ($items as $item) {
            Assert::isInstanceOf($item, TransactionItem::class);
        }

        $this->items = $items;

        return $this;
    }

    /**
     * @return array
     */
    public function getPayloads(): array
    {
        return $this->payloads;
    }

    /**
     * @return mixed
     */
    public function charge()
    {
        $payloads = $this->makePayloads()->getPayloads();

        $factory = MidtransFactory::factory($this->getKey(), $this->isProduction());

        $response = $factory::charge($payloads);

        return $this->makeResponse($response);
    }

    /**
     * @param array $payloads
     */
    public function setPayloads(array $payloads): void
    {
        $this->payloads = $payloads;
    }

    /**
     * @return mixed
     */
    abstract protected function makePayloads();

    /**
     * @param $rawResponse
     * @return ChargeResponse
     */
    abstract public function makeResponse($rawResponse);
}