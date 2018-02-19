<?php

namespace Inisiatif\Midtrans\Tests\Channel\Transfer;

use Inisiatif\Midtrans\Tests\TestCase;
use Inisiatif\Midtrans\Response\ChargeResponse;
use Inisiatif\Midtrans\Channel\Transfer\Mandiri;

class MandiriTest extends TestCase
{
    public function testMandiriChannelCharge()
    {
        $mandiri = new Mandiri($this->key, $this->production);
        $mandiri->setTransaction($this->transaction());
        $mandiri->setCustomer($this->customer());
        $mandiri->setItems($this->items());

        $response = $mandiri->charge();
        $this->assertInstanceOf(ChargeResponse::class, $response);

        $rawResponse = $response->getRawResponse();
        $this->assertEquals($response->getId(), $rawResponse->transaction_id);
        $this->assertEquals($response->getVirtualAccount(), end($rawResponse->va_numbers)->va_number);
    }
}