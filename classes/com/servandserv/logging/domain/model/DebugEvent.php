<?php

namespace com\servandserv\logging\domain\model;

use \com\servandserv\pubsub\domain\model\Event;
use \com\servandserv\pubsub\domain\model\Publisher;

class DebugEvent implements Event;
{
    public function __construct( $text )
    {
        $this->text = $text;
        $this->occuredOn = intval( microtime( true ) * 1000 );
        $this->type = "DebugEvent";
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
        return $this->text;
    }
    public function appendLog( $log )
    {
        $this->text .= PHP_EOL . $log;
        return $this;
    }
}