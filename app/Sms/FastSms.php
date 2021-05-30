<?php

namespace App\Sms;

class FastSms
{

    //3482  templateid for send doctors user and password [Doctor], [Username], [Password], [Site]
    //3378  templateid for register  [VerificationCode]
    //3379  templateid for reset password  [resetCode]
    //5880  templateid for app links  [androidLink], [iosLink]
    //3550  templateid for send centers user and password  [Center], [Username], [Password], [Site]
    //3552  new templateid for send centers user and password  [Center], [Username], [Password], [Site]
    //3653  templateid for login  [VerificationCode]
    //3937  templateid for just android link
    //7852  templateid for subscription
    //8450  templateid for subscription expire

    private $APIKey = 'd90d20bb8d4b91d4c8090b76';
    private $SecretKey = 'accgo';


    /**
     * gets API Ultra Fast Send Url.
     *
     * @return string Indicates the Url
     */
    protected function getAPIUltraFastSendUrl()
    {
        return 'http://RestfulSms.com/api/UltraFastSend';
    }

    /**
     * gets Api Token Url.
     *
     * @return string Indicates the Url
     */
    protected function getApiTokenUrl()
    {
        return 'http://RestfulSms.com/api/Token';
    }

    /**
     * Ultra Fast Send Message.
     *
     * @param data[] $data array structure of message data
     * @return string Indicates the sent sms result
     */
    public function UltraFastSend($data)
    {

        $token = $this->GetToken($this->APIKey, $this->SecretKey);
        if ($token != false) {
            $postData = $data;

            $url = $this->getAPIUltraFastSendUrl();
            $UltraFastSend = $this->execute($postData, $url, $token);
            $object = json_decode($UltraFastSend);

            if (is_object($object)) {
                $array = get_object_vars($object);
                if (is_array($array)) {
                    $result = $array['Message'];
                } else {
                    $result = false;
                }
            } else {
                $result = false;
            }

        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * gets token key for all web service requests.
     *
     * @return string Indicates the token key
     */
    private function GetToken()
    {
        $postData = array(

            'UserApiKey' => $this->APIKey,
            'SecretKey' => $this->SecretKey,
            'System' => 'php_rest_v_1_2'
        );
        $postString = json_encode($postData);

        $ch = curl_init($this->getApiTokenUrl());
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'

        ));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($result);

        if (is_object($response)) {
            $resultVars = get_object_vars($response);

            if (is_array($resultVars)) {
                @$IsSuccessful = $resultVars['IsSuccessful'];
                if ($IsSuccessful == true) {
                    @$TokenKey = $resultVars['TokenKey'];
                    $resp = $TokenKey;
                } else {
                    $resp = false;
                }
            }
        }
        return $resp;
    }

    /**
     * executes the main method.
     *
     * @param postData[] $postData array of json data
     * @param string $url url
     * @param string $token token string
     * @return string Indicates the curl execute result
     */
    private function execute($postData, $url, $token)
    {

        $postString = json_encode($postData);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'x-sms-ir-secure-token: ' . $token
        ));
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function sendMessage($data)
    {
        try {
            date_default_timezone_set('Asia/Tehran');

            // message data

            $SmsIR_UltraFastSend = new FastSms($this->APIKey, $this->SecretKey);
            $UltraFastSend = $SmsIR_UltraFastSend->UltraFastSend($data);
            // return($UltraFastSend);

        } catch (\Throwable $e) {
            echo 'Error UltraFastSend : ' . $e->getMessage();
        }
    }
}
