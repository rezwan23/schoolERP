<?php
namespace App\Services\SMS;

use GuzzleHttp\Client;

class SMS
{

    protected $params = [];

    protected $response;


    public function __construct()
    {
//        $this->username(config('services.sms.username'))
//            ->password(config('services.sms.password'))
//            ->from(config('services.sms.from'));
    }

    /** Setting api username
     * @param $username
     * @return $this
     */
    public function username($username)
    {
        $this->params['username'] = $username;

        return $this;
    }

    /** Setting api password
     * @param $password
     * @return $this
     */
    public function password($password)
    {
        $this->params['password'] = $password;

        return $this;
    }

    /** Setting api from
     * @param $from
     * @return $this
     */
    public function from($from)
    {
        $this->params['From'] = $from;

        return $this;
    }

    /** Setting to number|numbers
     * @param $to
     * @return $this
     */
    public function to($to)
    {
        if (is_array($to)){
            $to = 88 . implode(',88', $to);
        }

        $this->params['number'] = 88 . $to;

        return $this;
    }

    /** Setting send able message
     * @param $message
     * @return $this
     */
    public function message($message)
    {
        $this->params['message'] = urlencode($message);

        return $this;
    }

    /** Send request to send text message
     */
    public function send()
    {

        $this->response = file_get_contents("http://66.45.237.70/api.php?username=".$this->params['username']."&password=".$this->params['password']."&number=".$this->params['number']."&message=".$this->params['message']);

        return $this;
    }

    public function toObject()
    {
        return $this->response;
    }

    public function toArray()
    {
        return json_decode($this->parseResponse(), true);
    }

    protected function parseResponse()
    {
        $xml = simplexml_load_string($this->response);

        return json_encode($xml);
    }

    public function configFromDatabase($config = null)
    {
        $config = $config ?: get_sms_config();

        $this->username($config->get('username'))
            ->password($config->get('password'))
            ->from($config->get('masking_name'));

        return $this;
    }

    /** Create Http Client
     * @return Client
     */
    protected function client()
    {
        return new Client([
            'base_uri' => config('services.sms.api')
        ]);
    }

}