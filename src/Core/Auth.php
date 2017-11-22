<?php
/**
 * Created by PhpStorm.
 * User: Jorge
 * Date: 17/04/2017
 * Time: 20:30
 */

namespace jjsquady\MikrotikApi\Core;


use jjsquady\MikrotikApi\Contracts\AuthContract;

class Auth implements AuthContract
{
    protected $host;
    protected $username;
    protected $password;
    protected $port;

    function __construct($host, $username, $password, $port = 8727)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->port = $port;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword($plainText = false)
    {
        if ($plainText){
            return $this->password;
        }

        return bcrypt($this->password);
    }

    public function getPort()
    {
        return $this->port;
    }
}