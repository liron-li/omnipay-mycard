<?php

namespace Omnipay\MyCard;


use Omnipay\Common\AbstractGateway;
use Omnipay\MyCard\Message\CompareTransaction;
use Omnipay\MyCard\Message\FetchRequest;
use Omnipay\MyCard\Message\NotificationRequest;
use Omnipay\MyCard\Message\PurchaseRequest;

class Gateway extends AbstractGateway
{


    public function getName()
    {
        return 'MyCard';
    }


    public function getDefaultParameters()
    {
        return [
            'TradeType' => '2',     //1:Android SDK (手遊適用) 2:WEB
        ];
    }


    public function getAppId()
    {
        return $this->getParameter('appId');
    }


    public function setAppId($value)
    {
        return $this->setParameter('appId', $value);
    }


    public function getAppKey()
    {
        return $this->getParameter('appKey');
    }


    public function setAppKey($value)
    {
        return $this->setParameter('appKey', $value);
    }


    public function getTradeType()
    {
        return $this->getParameter('tradeType');
    }


    public function setTradeType($value)
    {
        return $this->setParameter('tradeType', $value);
    }


    public function purchase(array $parameters = [])
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }


    public function acceptNotification(array $parameters = [])
    {
        return $this->createRequest(NotificationRequest::class, $parameters);
    }


    public function fetchTransaction(array $parameters = [])
    {
        return $this->createRequest(FetchRequest::class, $parameters);
    }


    public function compareTransaction()
    {
        return new CompareTransaction();
    }

}