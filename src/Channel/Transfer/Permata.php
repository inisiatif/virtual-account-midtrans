<?php

namespace Inisiatif\Midtrans\Channel\Transfer;

use Webmozart\Assert\Assert;
use Inisiatif\Midtrans\Model\Customer;
use Inisiatif\Midtrans\Model\TransactionDetail;
use Inisiatif\Midtrans\Response\ChargeResponse;
use Inisiatif\Midtrans\Contract\ChannelContract;

class Permata extends ChannelContract
{

    /**
     * @return $this
     * @throws \Exception
     */
    protected function makePayloads()
    {
        Assert::isInstanceOf($this->getCustomer(), Customer::class);
        Assert::isInstanceOf($this->getTransaction(), TransactionDetail::class);
        Assert::isArray($this->getItems());

        $payloads = array_merge([
            'payment_type' => 'bank_transfer',
            'bank_transfer' => [
                'bank' => 'permata',
                'va_number' => $this->getTransaction()->getId(),
                'permata' => [
                    'recipient_name' => $this->getCustomer()->getFullName()
                ]
            ]
        ], $this->getTransaction()->toArray());

        $this->setPayloads($payloads);

        return $this;
    }

    /**
     * @param $rawResponse
     * @return ChargeResponse
     */
    public function makeResponse($rawResponse)
    {
        $response = new ChargeResponse;
        $response->setId($rawResponse->transaction_id);
        $response->setStatusCode($rawResponse->status_code);
        $response->setMessage($rawResponse->status_message);
        $response->setType($rawResponse->payment_type);
        $response->setDateTime($rawResponse->transaction_time);
        $response->setStatus($rawResponse->transaction_status);
        $response->setFraud($rawResponse->fraud_status);
        $response->setOrderId($rawResponse->order_id);
        $response->setOrderAmount($rawResponse->gross_amount);
        $response->setVirtualAccount($rawResponse->permata_va_number);
        $response->setRawResponse($rawResponse);

        return $response;
    }
}