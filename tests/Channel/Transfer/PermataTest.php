<?php

namespace Inisiatif\Midtrans\Tests\Channel\Transfer;

use Inisiatif\Midtrans\Tests\TestCase;
use Inisiatif\Midtrans\Response\ChargeResponse;
use Inisiatif\Midtrans\Channel\Transfer\Permata;

class PermataTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testChargePayment()
    {
        $permata = new Permata($this->key, $this->production);
        $permata->setTransaction($this->transaction());
        $permata->setCustomer($this->customer());
        $permata->setItems($this->items());

        $response = $permata->charge();
        $this->assertInstanceOf(ChargeResponse::class, $response);

        $rawResponse = $response->getRawResponse();
        $this->assertEquals($response->getId(), $rawResponse->transaction_id);
        $this->assertEquals($response->getVirtualAccount(), $rawResponse->permata_va_number);
    }
}