<?php


/**
 * 交易确认
 */
namespace Omnipay\MyCard\Message;


class ConfirmRequest extends AbstractRequest
{

    public function getData()
    {
        $endpoint = $this->getEndpoint('b2b') . '/MyBillingPay/api/PaymentConfirm';
        $requestData = [
            'AuthCode' => $this->getToken()
        ];

        $response = $this->httpClient->request('POST', $endpoint, [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ], json_encode($requestData));

        $data = json_decode($response->getBody(), true);
        return $data;
    }


    public function sendData($data)
    {
        return new ConfirmResponse($this, $data);
    }

}