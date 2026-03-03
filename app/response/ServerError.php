<?php

namespace App\Response;

use App\Response\Response;

class ServerError {
    
    /**
     * Internal Server Error
     * 
     * The server has encountered a situation it does not know how to handle. This error is generic, indicating that the server cannot find a more appropriate 5XX status code to respond with.
     */
    public static function _500() { Response::respond(500); }
    
    /**
     * Not Implemented
     * 
     * The request method is not supported by the server and cannot be handled. The only methods that servers are required to support (and therefore must not return this code) are GET and HEAD.
     */
    public static function _501() { Response::respond(501); }
    
    /**
     * Bad Gateway
     * 
     * This error response means that the server, while working as a gateway to get a response needed to handle the request, got an invalid response.
     */
    public static function _502() { Response::respond(502); }
    
    /**
     * Service Unavailable
     * 
     * The server is not ready to handle the request. Common causes are a server that is down for maintenance or that is overloaded. Note that together with this response, a user-friendly page explaining the problem should be sent. This response should be used for temporary conditions and the Retry-After HTTP header should, if possible, contain the estimated time before the recovery of the service. The webmaster must also take care about the caching-related headers that are sent along with this response, as these temporary condition responses should usually not be cached.
     */
    public static function _503() { Response::respond(503); }
    
    /**
     * Gateway Timeout
     * 
     * This error response is given when the server is acting as a gateway and cannot get a response in time.
     */
    public static function _504() { Response::respond(504); }
    
    /**
     * HTTP Version Not Supported
     * 
     * The HTTP version used in the request is not supported by the server.
     */
    public static function _505() { Response::respond(505); }
    
    /**
     * Variant Also Negotiates
     * 
     * The server has an internal configuration error: during content negotiation, the chosen variant is configured to engage in content negotiation itself, which results in circular references when creating responses.
     */
    public static function _506() { Response::respond(506); }
    
    /**
     * Insufficient Storage (WebDAV)
     * 
     * The method could not be performed on the resource because the server is unable to store the representation needed to successfully complete the request.
     */
    public static function _507() { Response::respond(507); }
    
    /**
     * Loop Detected (WebDAV)
     * 
     * The server detected an infinite loop while processing the request.
     */
    public static function _508() { Response::respond(508); }
    
    /**
     * Not Extended
     * 
     * The client request declares an HTTP Extension (RFC 2774) that should be used to process the request, but the extension is not supported.
     */
    public static function _510() { Response::respond(510); }
    
    /**
     * Network Authentication Required
     * 
     * Indicates that the client needs to authenticate to gain network access.
     */
    public static function _511() { Response::respond(511); }
}