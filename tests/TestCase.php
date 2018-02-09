<?php

namespace Inisiatif\Midtrans\Tests;

use Inisiatif\Midtrans\Model\Customer;
use Inisiatif\Midtrans\Model\TransactionItem;
use Inisiatif\Midtrans\Model\TransactionDetail;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCase extends PHPUnitTestCase
{
    /**
     * @var string
     */
    protected $key = 'VT-server-VOb_hmr1EUmZbF6h59zs6Pmo';

    /**
     * @var bool
     */
    protected $production = false;

    /**
     * @return TransactionDetail
     */
    protected function transaction()
    {
        return new TransactionDetail(time(), '1500000');
    }

    /**
     * @return Customer
     */
    protected function customer()
    {
        return new Customer('Foo', 'Bar');
    }

    /**
     * @return array
     */
    protected function items()
    {
        return [
            new TransactionItem(time(), 1000000, 1, 'Zakat'),
            new TransactionItem(time(), 500000, 1, 'Infaq'),
        ];
    }
}