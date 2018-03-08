<?php

namespace Inisiatif\Midtrans\Notification;

use Inisiatif\Midtrans\Factory\MidtransFactory;

class Transfer
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
     * @var \Veritrans_Notification
     */
    private $notification;

    /**
     * @var mixed
     */
    private $statusCode;

    /**
     * @var mixed
     */
    private $statusMessage;

    /**
     * @var mixed
     */
    private $transactionId;

    /**
     * @var mixed
     */
    private $orderId;

    /**
     * @var mixed
     */
    private $amount;

    /**
     * @var mixed
     */
    private $transactionType;

    /**
     * @var mixed
     */
    private $transactionDate;

    /**
     * @var mixed
     */
    private $transactionStatus;

    /**
     * @var mixed
     */
    private $fraudStatus;

    /**
     * @param string $key
     * @param bool $production
     * @param string $resource
     */
    public function __construct(string $key, $production = true, $resource = 'php://input')
    {
        $this->key = $key;

        $this->production = $production;

        $this->notification = MidtransFactory::notification($key, $production, $resource);

        $this->setAttribute();
    }

    /**
     * Set attribute value
     *
     * @return void
     */
    protected function setAttribute()
    {
        $this->statusCode = $this->notification->status_code;
        $this->statusMessage = $this->notification->status_message;
        $this->transactionId = $this->notification->transaction_id;
        $this->orderId = $this->notification->order_id;
        $this->amount = $this->notification->gross_amount;
        $this->transactionType = $this->notification->payment_type;
        $this->transactionDate = $this->notification->transaction_time;
        $this->transactionStatus = $this->notification->transaction_status;
        $this->fraudStatus = $this->notification->fraud_status;
    }

    /**
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return mixed
     */
    public function getStatusMessage()
    {
        return $this->statusMessage;
    }

    /**
     * @return mixed
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @return mixed
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @return mixed
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * @return mixed
     */
    public function getTransactionStatus()
    {
        return $this->transactionStatus;
    }

    /**
     * @return mixed
     */
    public function getFraudStatus()
    {
        return $this->fraudStatus;
    }
}