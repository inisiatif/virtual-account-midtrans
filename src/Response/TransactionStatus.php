<?php

namespace Inisiatif\Midtrans\Response;

class TransactionStatus
{
    const CAPTURE = 'capture';

    const DENY = 'deny';

    const CHALLENGE = 'challenge';

    const PENDING = 'pending';

    const CANCEL = 'cancel';

    const EXPIRE = 'expire';
}