?php

namespace com\servandserv\logging\infrastructure\domain\model;

use \com\servandserv\pubsub\domain\model\EventStore;
use \com\servandserv\pubsub\domain\model\Event;

class LogStore implements EventStore
{
    protected $logfile;

    public function __construct( $logfile )
    {
        $this->logfile = $logfile;
    }
    public function append( Event $event )
    {
        $str = $event->toReadableStr();
        $lasted = ( microtime( true ) * 1000 - $event->occuredOn() ) / 1000;
        $log = "[".date( DATE_ISO8601, intval( $event->occuredOn() / 1000 ) )."] Lasted: " . $lasted . PHP_EOL . $str . PHP_EOL.PHP_EOL;
        error_log( $log, 3, $this->logfile );
    }
    public function allEventsSince( $watermark )
    {
        return NULL;
    }
    public function allEventsAfter( $id )
    {
        return NULL;
    }
}