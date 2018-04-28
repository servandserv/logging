<?php

namespace com\servandserv\logging\infrastructure\domain\model;

use \com\servandserv\pubsub\domain\model\Subscriber;
use \com\servandserv\pubsub\domain\model\Event;
use \com\servandserv\pubsub\domain\model\EventStore;

class Debugger implements Subscriber
{
    private $rep;

    public function __construct( EventStore $rep )
    {
        $this->rep = $rep;
    }

    public function isSubscribedTo( Event $event )
    {
        return $event instanceof \com\servandserv\logging\domain\model\DebugEvent;
    }

    public function handle( Event $event )
    {
        $this->rep->append( $event );
    }
}