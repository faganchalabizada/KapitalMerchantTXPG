<?php

namespace FaganChalabizada\KapitalMerchantTXPG;

class Merchant
{

    /**
     * @var string Base url for testing purposes
     *
     * Test card data
     * PAN: 4169741330151778
     * ExpDate: 11/26
     * CVV: 119
     */
    protected const TEST_BASIC_URL = 'https://txpgtst.kapitalbank.az/api/';

    /**
     * @var string Base url for production
     */
    protected const PROD_BASIC_URL = 'https://e-commerce.kapitalbank.az/api/';


    /*
     * Test - https://txpgtst.kapitalbank.az/flex?id=Sizin_id&password=Sizin_password
     */
    protected const TEST_PAYMENT_BASE_URL = 'https://txpgtst.kapitalbank.az/flex?';


    /*
     * Prod - https://e-commerce.kapitalbank.az/flex?id=Sizin_id&password=Sizin_password
     */
    protected const PROD_PAYMENT_BASE_URL = 'https://e-commerce.kapitalbank.az/flex?';


    private string $paymentUrl;
    private string $basicUrl;

    /**
     * @var string Merchant username. The default value is for testing purposes.
     */
    private string $username = 'TerminalSys/kapital';

    /**
     * @var string Merchant Password. The default value is for testing purposes.
     */
    private string $password = 'kapital123';


    public function __construct()
    {
        $this->basicUrl = self::TEST_BASIC_URL;
        $this->paymentUrl = self::TEST_PAYMENT_BASE_URL;
    }

    /**
     * Set merchant username and password for production.
     * @param string $username
     * @param string $password
     * @param bool $test Test or Production version
     * @return void
     */
    public function setAuth(string $username, string $password, bool $test = false): void
    {
        if ($test) {
            $this->basicUrl = self::TEST_BASIC_URL;
            $this->paymentUrl = self::TEST_PAYMENT_BASE_URL;
        } else {
            $this->basicUrl = self::PROD_BASIC_URL;
            $this->paymentUrl = self::PROD_PAYMENT_BASE_URL;
        }

        $this->username = $username;
        $this->password = $password;
    }

    /**
     *
     * @param string $typeRid Type of the order.
     * @param double $amount The amount associated with the order.
     * @param string $currency The currency used for the order. (ex: AZN, USD)
     * @param string $language The language preference for the order. (ex: az, ru, en)
     * @param string $description A brief description or comment about the order. For Installment operations you must to send taksit month in description filed in this format:TAKSIT=6
     * @param string $redirectUrl The URL to redirect to after finishing operation.
     * @param array $hppCofCapturePurposes An array containing the purpose of capturing the Card-on-File (COF) for the order in Payment page (Card Save). Use all 3 data when saving.
     * @param string $aut Used with hppCofCapturePurpose. When specifying this parameter, the checkbox to save the card on the payment page will always be true
     * @param string $srcTokenStoredId this parameter used to establish a payment token (Saved Card)
     * @return OrderResponse
     * @throws Exception\OrderException
     */
    public function createOrder(string $typeRid,
                                float  $amount,
                                string $currency,
                                string $language,
                                string $redirectUrl,
                                string $description = "",
                                array  $hppCofCapturePurposes = [],
                                string $aut = "",
                                string $srcTokenStoredId = ""): OrderResponse
    {


        $data = [
            "typeRid" => $typeRid,
            "amount" => $amount,
            "currency" => $currency,
            "language" => $language,
            "description" => $description,
            "hppRedirectUrl" => $redirectUrl,
        ];

        if (!empty($hppCofCapturePurposes)) {
            $data['hppCofCapturePurposes'] = $hppCofCapturePurposes;
        }
        if ($aut != "") {
            $data['aut'] = $aut;
        }
        if ($srcTokenStoredId != "") {
            $data['srcTokenStoredId'] = $srcTokenStoredId;
        }


        return new OrderResponse($this->_getRequest("order", ["order" => $data]));
    }

    /**
     * Get order status
     * @param int $order_id Order ID
     * @return OrderStatusResponse
     * @throws Exception\OrderException
     */
    public function getOrderStatus(int $order_id): OrderStatusResponse
    {
        return new OrderStatusResponse($this->_getRequest("order/" . $order_id));
    }


    private function _getRequest($method, $data = [])
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->basicUrl . $method);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, $this->username . ":" . $this->password);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $output = curl_exec($ch);

        //convert the XML result into array
        return json_decode($output, true);
    }

    public function getPaymentUrl($id, $password): string
    {
        return $this->paymentUrl . 'id=' . $id . '&password=' . $password;
    }

}