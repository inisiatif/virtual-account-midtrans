<?php

namespace Inisiatif\Midtrans\Response;

class ChargeResponse
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $fraud;

    /**
     * @var string
     */
    protected $dateTime;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string;
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $orderId;

    /**
     * @var string
     */
    protected $virtualAccount;

    /**
     * @var string
     */
    protected $virtualAccountCode;

    /**
     * @var string
     */
    protected $orderAmount;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var mixed
     */
    protected $rawResponse;

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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getFraud(): string
    {
        return $this->fraud;
    }

    /**
     * @param string $fraud
     */
    public function setFraud(string $fraud): void
    {
        $this->fraud = $fraud;
    }

    /**
     * @return string
     */
    public function getDateTime(): string
    {
        return $this->dateTime;
    }

    /**
     * @param string $dateTime
     */
    public function setDateTime(string $dateTime): void
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     */
    public function setStatusCode(string $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return string
     */
    public function getVirtualAccount(): string
    {
        return $this->virtualAccount;
    }

    /**
     * @param string $virtualAccount
     */
    public function setVirtualAccount(string $virtualAccount): void
    {
        $this->virtualAccount = $virtualAccount;
    }

    /**
     * @return string
     */
    public function getOrderAmount(): string
    {
        return $this->orderAmount;
    }

    /**
     * @param string $orderAmount
     */
    public function setOrderAmount(string $orderAmount): void
    {
        $this->orderAmount = $orderAmount;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getRawResponse()
    {
        return $this->rawResponse;
    }

    /**
     * @param mixed $rawResponse
     */
    public function setRawResponse($rawResponse): void
    {
        $this->rawResponse = $rawResponse;
    }

    /**
     * @return string
     */
    public function getVirtualAccountCode(): ?string
    {
        return $this->virtualAccountCode;
    }

    /**
     * @param string $virtualAccountCode
     */
    public function setVirtualAccountCode(string $virtualAccountCode): void
    {
        $this->virtualAccountCode = $virtualAccountCode;
    }
}