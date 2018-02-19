<?php

namespace Inisiatif\Midtrans\Tests\Channel\Transfer;

use Inisiatif\Midtrans\Tests\TestCase;
use Inisiatif\Midtrans\Channel\Transfer\Bca;
use Inisiatif\Midtrans\Response\ChargeResponse;

class BcaTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testBcaChannelCharge()
    {
        $bca = new Bca($this->key, $this->production);
        $bca->setTransaction($this->transaction());
        $bca->setCustomer($this->customer());
        $bca->setItems($this->items());

        $response = $bca->charge();
        $this->assertInstanceOf(ChargeResponse::class, $response);

        $rawResponse = $response->getRawResponse();
        $this->assertEquals($response->getId(), $rawResponse->transaction_id);
        $this->assertEquals($response->getVirtualAccount(), end($rawResponse->va_numbers)->va_number);
    }
}