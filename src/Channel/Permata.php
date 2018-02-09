<?php

namespace Inisiatif\Midtrans\Channel;

use Inisiatif\Midtrans\Factory\MidtransFactory;
use Inisiatif\Midtrans\Contract\ChannelContract;
use Inisiatif\Midtrans\Response\ChargeResponse;

class Permata extends ChannelContract
{

    /**
     * @return ChargeResponse
     * @throws \Exception
     */
    public function charge()
    {
        $payloads = $this->makePayloads()->getPayloads();

        $factory = MidtransFactory::factory($this->getKey(), $this->isProduction());

        $response = $factory::charge($payloads);

        return $this->makeResponse($response);
    }

    /**
     * @return $this
     * @throws \Exception
     */
    protected function makePayloads()
    {
        if (is_null($this->getCustomer())) {
            throw new \Exception('Set customer first');
        }

        if (is_null($this->getTransaction())) {
            throw new \Exception('Set transaction first');
        }

        if (is_null($this->getItems())) {
            throw new \Exception('Set items first');
        }

        $payloads = array_merge([
            'payment_type' => 'bank_transfer',
            'bank_transfer' => [
                'bank' => 'permata',
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
        $response->setStatus($rawResponse->transaction_status);
        $response->setFraud($rawResponse->fraud_status);
        $response->setOrderId($rawResponse->order_id);
        $response->setOrderAmount($rawResponse->gross_amount);
        $response->setVirtualAccount($rawResponse->permata_va_number);
        $response->setRawResponse($rawResponse);

        return $response;
    }
}