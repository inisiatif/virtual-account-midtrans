<?php

namespace Inisiatif\Midtrans\Tests\Channel\Transfer;

use Inisiatif\Midtrans\Tests\TestCase;
use Inisiatif\Midtrans\Channel\Transfer\Bni;
use Inisiatif\Midtrans\Response\ChargeResponse;

class BniTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testBcaChannelCharge()
    {
        $bni = new Bni($this->key, $this->production);
        $bni->setTransaction($this->transaction());
        $bni->setCustomer($this->customer());
        $bni->setItems($this->items());

        $response = $bni->charge();
        $this->assertInstanceOf(ChargeResponse::class, $response);

        $rawResponse = $response->getRawResponse();
        $this->assertEquals($response->getId(), $rawResponse->transaction_id);
        $this->assertEquals($response->getVirtualAccount(), end($rawResponse->va_numbers)->va_number);
    }
}