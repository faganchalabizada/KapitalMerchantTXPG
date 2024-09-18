<?php

namespace FaganChalabizada\KapitalMerchantTXPG;

class OrderType
{


    /**
     * For purchase operations
     */
    const PURCHASE = "Order_SMS";

    /**
     * For Preauthorization operations
     */
    const PRE_AUTHORIZATION = "Order_DMS";

    /**
     * For recurring Purchase operations (transactions with saved card)
     */
    const RECURRING_PURCHASE = "Order_REC";

    /**
     * For recurring Preauthorization operations (transactions with saved card)
     */
    const RECURRING_PRE_AUTHORIZATION_PURCHASE = "DMSN3D";

    /**
     * For Account-to-Card operations (Order Credit Transaction)
     */
    const ACCOUNT_TO_CARD = "OCT";

}