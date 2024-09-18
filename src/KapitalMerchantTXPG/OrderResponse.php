<?php

namespace FaganChalabizada\KapitalMerchantTXPG;

use FaganChalabizada\KapitalMerchantTXPG\Exception\OrderException;

class OrderResponse
{

    /**
     * @var int Order id
     */
    private int $id;

    /**
     * @var string Payment base URL. Just add ?id={{order.id}}&password={{order.password}} and redirect user.
     */
    private string $url;

    /**
     * @var string Order password. AUto generated for payment link.
     */
    private string $password;

    /**
     * @var string Payment status
     */
    private string $status;

    /**
     * @var ?string  A secret or additional security information associated with the order.
     */
    private string $secret;

    /**
     * @var string CVV2 authentication requirement for the order.
     */
    private string $cvv2AuthStatus;


    /**
     * @throws OrderException
     */
    public function __construct($orderResponseData) {


        if (!isset($orderResponseData['order']['id'])) {

            if (isset($orderResponseData['errorCode'])) {
                throw new OrderException($orderResponseData['errorCode'] . ": " . $orderResponseData['errorDescription']);
            }

            throw new OrderException("Order create error:" . print_r($orderResponseData, 1));
        }

        $this->setId($orderResponseData['order']['id']);
        $this->setPassword($orderResponseData['order']['password']);
        $this->setUrl($orderResponseData['order']['hppUrl']);
        $this->setStatus($orderResponseData['order']['status']);
        $this->setCvv2AuthStatus($orderResponseData['order']['cvv2AuthStatus']);
        $this->setSecret($orderResponseData['order']['secret']);

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getCvv2AuthStatus(): string
    {
        return $this->cvv2AuthStatus;
    }

    /**
     * @param string $cvv2AuthStatus
     */
    public function setCvv2AuthStatus(string $cvv2AuthStatus): void
    {
        $this->cvv2AuthStatus = $cvv2AuthStatus;
    }

    /**
     * @return string|null
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @param string|null $secret
     */
    public function setSecret(?string $secret): void
    {
        $this->secret = $secret;
    }

    /**
     * Full Payment Redirect url. Just redirect user to this URL for payment.
     * @return string URL
     */
    public function getFullRedirectUrl(): string
    {
        return $this->getUrl() ."?id=" . $this->getId() . "&password=" . $this->getPassword();
    }

}