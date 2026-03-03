<?php

namespace App\Response;

use App\Response\Response;

class Information {

    /**
     * Continue
     * 
     * This interim response indicates that the client should continue the request or ignore the response if the request is already finished.
     */
    public static function _100() { Response::respond(100); }

    /**
     * Switching Protocols
     * 
     * This code is sent in response to an Upgrade request header from the client and indicates the protocol the server is switching to.
     */
    public static function _101() { Response::respond(101); }

    /**
     * Processing
     * 
     * This code was used in WebDAV contexts to indicate that a request has been received by the server, but no status was available at the time of the response.
     */
    public static function _102() { Response::respond(102); }

    /**
     * Early Hints
     * 
     * This status code is primarily intended to be used with the Link header, letting the user agent start preloading resources while the server prepares a response or preconnect to an origin from which the page will need resources.
     */
    public static function _103() { Response::respond(103); }
}