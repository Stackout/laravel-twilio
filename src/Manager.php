<?php
namespace Stackout\Twilio;

use InvalidArgumentException;
use App\Models\Settings;

class Manager implements TwilioInterface
{
    /**
     * @param string $connection
     *
     * @return \Stackout\Twilio\TwilioInterface
     */
    public function from()
    {
        return new Twilio(Setting::get('twilio_sid'), Setting::get('twilio_auth_token'), Setting::get('twilio_phone_number'));
    }

    /**
     * @param string $to
     * @param string $message
     *
     * @return \Twilio\Rest\Api\V2010\Account\MessageInstance
     */
    public function message($to, $message)
    {
        return call_user_func_array([$this->defaultConnection(), 'message'], func_get_args());
    }

    /**
     * @param string $to
     * @param string|callable $message
     *
     * @return \Twilio\Rest\Api\V2010\Account\CallInstance
     */
    public function call($to, $message)
    {
        return call_user_func_array([$this->defaultConnection(), 'call'], func_get_args());
    }

    /**
     * @return \Stackout\Twilio\TwilioInterface
     */
    public function defaultConnection()
    {
        return $this->from($this->default);
    }

    /**
     * @param string $method
     * @param array $arguments
     *
     * @return mixed
     */
    public function __call($method, $arguments)
    {
        return call_user_func_array([$this->defaultConnection(), $method], $arguments);
    }
}
