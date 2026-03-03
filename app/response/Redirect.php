<?php

namespace App\Response;

use App\Response\Response;

class Redirect {
    
    /**
     * Multiple Choices
     * 
     * In agent-driven content negotiation, the request has more than one possible response and the user agent or user should choose one of them. There is no standardized way for clients to automatically choose one of the responses, so this is rarely used.
     */
    public static function _300() { Response::respond(300); }
    
    /**
     * Moved Permanently
     * 
     * The URL of the requested resource has been changed permanently. The new URL is given in the response.
     */
    public static function _301() { Response::respond(301); }
    
    /**
     * Found
     * 
     * This response code means that the URI of requested resource has been changed temporarily. Further changes in the URI might be made in the future, so the same URI should be used by the client in future requests.
     */
    public static function _302() { Response::respond(302); }
    
    /**
     * See Other
     * 
     * The server sent this response to direct the client to get the requested resource at another URI with a GET request.
     */
    public static function _303() { Response::respond(303); }
    
    /**
     * Not Modified
     * 
     * This is used for caching purposes. It tells the client that the response has not been modified, so the client can continue to use the same cached version of the response.
     */
    public static function _304() { Response::respond(304); }
    
    /**
     * Use Proxy Deprecated
     * 
     * Defined in a previous version of the HTTP specification to indicate that a requested response must be accessed by a proxy. It has been deprecated due to security concerns regarding in-band configuration of a proxy.
     */
    public static function _305() { Response::respond(305); }
    
    /**
     * unused
     * 
     * This response code is no longer used; but is reserved. It was used in a previous version of the HTTP/1.1 specification.
     */
    public static function _306() { Response::respond(306); }
    
    /**
     * Temporary Redirect
     * 
     * The server sends this response to direct the client to get the requested resource at another URI with the same method that was used in the prior request. This has the same semantics as the 302 Found response code, with the exception that the user agent must not change the HTTP method used: if a POST was used in the first request, a POST must be used in the redirected request.
     */
    public static function _307() { Response::respond(307); }
    
    /**
     * Permanent Redirect
     * 
     * This means that the resource is now permanently located at another URI, specified by the Location response header. This has the same semantics as the 301 Moved Permanently HTTP response code, with the exception that the user agent must not change the HTTP method used: if a POST was used in the first request, a POST must be used in the second request.
     */
    public static function _308() { Response::respond(308); }
}