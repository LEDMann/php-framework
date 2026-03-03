<?php

namespace App\Response;

use App\Response\Response;

class ClientError {
    
    /**
     * Bad Request
     * 
     * The server cannot or will not process the request due to something that is perceived to be a client error (e.g., malformed request syntax, invalid request message framing, or deceptive request routing).
     */
    public static function _400() { Response::respond(400); }

    
    /**
     * Unauthorized
     * 
     * Although the HTTP standard specifies "unauthorized", semantically this response means "unauthenticated". That is, the client must authenticate itself to get the requested response.
     */
    public static function _401() { Response::respond(401); }

    
    /**
     * Payment Required
     * 
     * The initial purpose of this code was for digital payment systems, however this status code is rarely used and no standard convention exists.
     */
    public static function _402() { Response::respond(402); }

    
    /**
     * Forbidden
     * 
     * The client does not have access rights to the content; that is, it is unauthorized, so the server is refusing to give the requested resource. Unlike 401 Unauthorized, the client's identity is known to the server.
     */
    public static function _403() { Response::respond(403); }

    
    /**
     * Not Found
     * 
     * The server cannot find the requested resource. In the browser, this means the URL is not recognized. In an API, this can also mean that the endpoint is valid but the resource itself does not exist. Servers may also send this response instead of 403 Forbidden to hide the existence of a resource from an unauthorized client. This response code is probably the most well known due to its frequent occurrence on the web.
     */
    public static function _404() { Response::respond(404); }

    
    /**
     * Method Not Allowed
     * 
     * The request method is known by the server but is not supported by the target resource. For example, an API may not allow DELETE on a resource, or the TRACE method entirely.
     */
    public static function _405() { Response::respond(405); }

    
    /**
     * Not Acceptable
     * 
     * This response is sent when the web server, after performing server-driven content negotiation, doesn't find any content that conforms to the criteria given by the user agent.
     */
    public static function _406() { Response::respond(406); }

    
    /**
     * Proxy Authentication Required
     * 
     * This is similar to 401 Unauthorized but authentication is needed to be done by a proxy.
     */
    public static function _407() { Response::respond(407); }

    
    /**
     * Request Timeout
     * 
     * This response is sent on an idle connection by some servers, even without any previous request by the client. It means that the server would like to shut down this unused connection. This response is used much more since some browsers use HTTP pre-connection mechanisms to speed up browsing. Some servers may shut down a connection without sending this message.
     */
    public static function _408() { Response::respond(408); }

    
    /**
     * Conflict
     * 
     * This response is sent when a request conflicts with the current state of the server. In WebDAV remote web authoring, 409 responses are errors sent to the client so that a user might be able to resolve a conflict and resubmit the request.
     */
    public static function _409() { Response::respond(409); }

    
    /**
     * Gone
     * 
     * This response is sent when the requested content has been permanently deleted from server, with no forwarding address. Clients are expected to remove their caches and links to the resource. The HTTP specification intends this status code to be used for "limited-time, promotional services". APIs should not feel compelled to indicate resources that have been deleted with this status code.
     */
    public static function _410() { Response::respond(410); }

    
    /**
     * Length Required
     * 
     * Server rejected the request because the Content-Length header field is not defined and the server requires it.
     */
    public static function _411() { Response::respond(411); }

    
    /**
     * Precondition Failed
     * 
     * In conditional requests, the client has indicated preconditions in its headers which the server does not meet.
     */
    public static function _412() { Response::respond(412); }

    
    /**
     * Content Too Large
     * 
     * The request body is larger than limits defined by server. The server might close the connection or return a Retry-After header field.
     */
    public static function _413() { Response::respond(413); }

    
    /**
     * URI Too Long
     * 
     * The URI requested by the client is longer than the server is willing to interpret.
     */
    public static function _414() { Response::respond(414); }

    
    /**
     * Unsupported Media Type
     * 
     * The media format of the requested data is not supported by the server, so the server is rejecting the request.
     */
    public static function _415() { Response::respond(415); }

    
    /**
     * Range Not Satisfiable
     * 
     * The ranges specified by the Range header field in the request cannot be fulfilled. It's possible that the range is outside the size of the target resource's data.
     */
    public static function _416() { Response::respond(416); }

    
    /**
     * Expectation Failed
     * 
     * This response code means the expectation indicated by the Expect request header field cannot be met by the server.
     */
    public static function _417() { Response::respond(417); }

    
    /**
     * I'm a teapot
     * 
     * The server refuses the attempt to brew coffee with a teapot.
     */
    public static function _418() { Response::respond(418); }

    
    /**
     * Misdirected Request
     * 
     * The request was directed at a server that is not able to produce a response. This can be sent by a server that is not configured to produce responses for the combination of scheme and authority that are included in the request URI.
     */
    public static function _421() { Response::respond(421); }

    
    /**
     * Unprocessable Content (WebDAV)
     * 
     * The request was well-formed but was unable to be followed due to semantic errors.
     */
    public static function _422() { Response::respond(422); }

    
    /**
     * Locked (WebDAV)
     * 
     * The resource that is being accessed is locked.
     */
    public static function _423() { Response::respond(423); }

    
    /**
     * Failed Dependency (WebDAV)
     * 
     * The request failed due to failure of a previous request.
     */
    public static function _424() { Response::respond(424); }

    
    /**
     * Too Early Experimental
     * 
     * Indicates that the server is unwilling to risk processing a request that might be replayed.
     */
    public static function _425() { Response::respond(425); }

    
    /**
     * Upgrade Required
     * 
     * The server refuses to perform the request using the current protocol but might be willing to do so after the client upgrades to a different protocol. The server sends an Upgrade header in a 426 response to indicate the required protocol(s).
     */
    public static function _426() { Response::respond(426); }

    
    /**
     * Precondition Required
     * 
     * The origin server requires the request to be conditional. This response is intended to prevent the 'lost update' problem, where a client GETs a resource's state, modifies it and PUTs it back to the server, when meanwhile a third party has modified the state on the server, leading to a conflict.
     */
    public static function _428() { Response::respond(428); }

    
    /**
     * Too Many Requests
     * 
     * The user has sent too many requests in a given amount of time (rate limiting).
     */
    public static function _429() { Response::respond(429); }

    
    /**
     * Request Header Fields Too Large
     * 
     * The server is unwilling to process the request because its header fields are too large. The request may be resubmitted after reducing the size of the request header fields.
     */
    public static function _431() { Response::respond(431); }

    
    /**
     * Unavailable For Legal Reasons
     * 
     * The user agent requested a resource that cannot legally be provided, such as a web page censored by a government.
     */
    public static function _451() { Response::respond(451); }

}