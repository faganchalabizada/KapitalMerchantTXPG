<?php

namespace FaganChalabizada\KapitalMerchantTXPG;

use FaganChalabizada\KapitalMerchantTXPG\Exception\OrderException;

class OrderStatusResponse
{

    /** 
     * @var int Order id
     */
    private int $id;

    /**
     * @var string Type of the order.
     */
    private string $type;

    /**
     * @var string Payment status
     */
    private string $status;

    /**
     * @var string Payment previous status
     */
    private string $prevStatus;

    /**
     * @var string Currency
     */
    private string $currency;

    /**
     * @var float Payment amount
     */
    private float $amount;


    private string $createTime;
    private string $finishTime;


    /**
     * @throws OrderException
     */
    public function __construct($orderResponseData) {

        if (!isset($orderResponseData['order']['id'])) {
            throw new OrderException($orderResponseData['errorCode'] . ": " . $orderResponseData['errorDescription']);
        }

        $this->setId($orderResponseData['order']['id']);
        $this->setType($orderResponseData['order']['typeRid']);
        $this->setStatus($orderResponseData['order']['status']);
        $this->setPrevStatus($orderResponseData['order']['prevStatus']);
        $this->setAmount($orderResponseData['order']['amount']);
        $this->setCurrency($orderResponseData['order']['currency']);
        $this->setCreateTime($orderResponseData['order']['createTime']);
        $this->setFinishTime($orderResponseData['order']['finishTime'] ?? "");

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
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
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
    public function getPrevStatus(): string
    {
        return $this->prevStatus;
    }

    /**
     * @param string $prevStatus
     */
    public function setPrevStatus(string $prevStatus): void
    {
        $this->prevStatus = $prevStatus;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCreateTime(): string
    {
        return $this->createTime;
    }

    /**
     * @param string $createTime
     */
    public function setCreateTime(string $createTime): void
    {
        $this->createTime = $createTime;
    }

    /**
     * @return string
     */
    public function getFinishTime(): string
    {
        return $this->finishTime;
    }

    /**
     * @param string $finishTime
     */
    public function setFinishTime(string $finishTime): void
    {
        $this->finishTime = $finishTime;
    }

}