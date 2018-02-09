<?php

namespace Inisiatif\Midtrans\Contract;

abstract class ModelContact
{
    /**
     * @return array
     */
    abstract public function toArray();

    /**
     * @return string
     */
    abstract public function toJson();

    /**
     * @return string
     */
    abstract public function __toString();
}