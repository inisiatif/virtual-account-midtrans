<?php

namespace Inisiatif\Midtrans\Channel\Transfer;

use Webmozart\Assert\Assert;
use Inisiatif\Midtrans\Model\Customer;
use Inisiatif\Midtrans\Model\TransactionItem;
use Inisiatif\Midtrans\Model\TransactionDetail;
use Inisiatif\Midtrans\Response\ChargeResponse;
use Inisiatif\Midtrans\Contract\ChannelContract;

class Mandiri extends ChannelContract
{

    /**
     * @return mixed
     */
    protected function makePayloads()
    {
        Assert::isInstanceOf($this->getCustomer(), Customer::class);
        Assert::isInstanceOf($this->getTransaction(), TransactionDetail::class);
        Assert::isArray($this->getItems());

        $items = [];
        /** @var TransactionItem $item */
        foreach ($this->getItems() as $item) {
            array_push($items, $item->toArray());
        }

        $payloads = array_merge([
            'payment_type' => 'echannel',
            'item_details' => $items,
            'echannel' => [
                'bill_info1' => sprintf('Pembayaran zakatpedia atas nama %s', $this->getCustomer()->getFullName()),
                'bill_info2' => 'debt'
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
        $response->setVirtualAccount($rawResponse->bill_key);
        $response->setVirtualAccountCode($rawResponse->biller_code);
        $response->setRawResponse($rawResponse);

        return $response;
    }
}