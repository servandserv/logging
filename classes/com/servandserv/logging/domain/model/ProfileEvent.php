<?php

namespace com\servandserv\logging\domain\model;

use \com\servandserv\pubsub\domain\model\Event;
use \com\servandserv\pubsub\domain\model\Publisher;

class ProfileEvent implements Event;
{
    protected $action;

    public function __construct( $action )
    {
        $this->action = $action;
        $this->occuredOn = intval( microtime( true ) * 1000 );
        $this->type = "ProfileEvent";
    }

    public function setPubSub( Publisher $pubsub )
    {
        $this->pubsub = $pubsub;
        return $this;
    }
    public function getPubSub()
    {
        return $this->pubsub;
    }
    public function occuredOn()
    {
        return $this->occuredOn;
    }
    public function toReadableStr()
    {
        return $this->action;
    }
}