<?php

namespace FaganChalabizada\KapitalMerchantTXPG;

class PaymentStatuses
{
    // Define the order statuses and descriptions as a static array
    private static array $statuses = [
        'BeingPrepared' => 'Order is being prepared, no transactions have been executed on it yet.',
        'Cancelled' => 'Order has been cancelled by the consumer (before payment). (Order is cancelled by the merchant.)',
        'Rejected' => 'Order has been rejected by the PSP (before payment). (Order is rejected by the PSP.)',
        'Refused' => 'Consumer has refused to pay for the order (before payment or after unsuccessful payment attempt). (Order is refused by the consumer.)',
        'Expired' => 'Order has expired (before payment). (Timeout occurs when executing the order scenario.)',
        'Authorized' => 'Order has been authorized. (Authorization transaction is executed.)',
        'PartiallyPaid' => 'Order has been partially paid. (Clearing transaction is executed for the part of the order amount.)',
        'FullyPaid' => 'Order has been fully paid. (Clearing transaction is executed for the full order amount (or several clearing transactions).)',
        'Funded' => 'Order has been funded (debit transaction has been executed). The status can be assigned only to the order of the DualStep Transfer Order class.',
        'Declined' => '* AReq and RReq (3DS 2) could not be executed due to rejection by the issuer / error during authentication.' .
            '* Operation was declined by PMO',
        'Voided' => 'Authorized payment amount under the order is zero.',
        'Refunded' => 'Accounted payment amount and the accounted refund amount under the order are equal.',
        'Closed' => 'Order has been closed (after payment)',
    ];

    /**
     * Get payment status details
     *
     * @param string $status
     * @return string Description
     */
    public static function getDescription(string $status): string
    {

        $desc = self::$statuses[$status];

        if ($desc != null) {
            return $desc;
        }

        return "Undefined";
    }


}
