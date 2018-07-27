<?php


/**
 * 交易查询 @docs: 3.3
 */

namespace Omnipay\MyCard\Message;


class FetchRequest extends AbstractRequest
{

    public function getData()
    {
        $endpoint = $this->getEndpoint('b2b') . '/MyBillingPay/api/TradeQuery';
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
        return new FetchResponse($this, $data);
    }

}