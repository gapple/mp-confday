<?php

namespace MpConfDay;

class TwitterUser
{
    // User info object returned from the Twitter API.
    private $userInfo;

    public function __construct($userInfo)
    {
        $this->userInfo = $userInfo;
    }

    public function __get($name)
    {
        if (isset($this->userInfo[$name])) {
            return $this->userInfo[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE
        );
        return null;
    }

    public function __toString()
    {
        return $this->userInfo['name'];
    }
}
