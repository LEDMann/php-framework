<?php

namespace App\Response;

use App\Response\Response;

class Success {
    
    /**
     * OK
     * 
     * The request succeeded. The result and meaning of "success" depends on the HTTP method: 
     * 
     * * GET: The resource has been fetched and transmitted in the message body. 
     * * HEAD: Representation headers are included in the response without any message body. PUT or 
     * * POST: The resource describing the result of the action is transmitted in the message body. 
     * * TRACE: The message body contains the request as received by the server.
     */
    public static function _200() { Response::respond(200); }
    
    /**
     * Created
     * 
     * The request succeeded, and a new resource was created as a result. This is typically the response sent after POST requests, or some PUT requests.
     */
    public static function _201() { Response::respond(201); }
    
    /**
     * Accepted
     * 
     * The request has been received but not yet acted upon. It is noncommittal, since there is no way in HTTP to later send an asynchronous response indicating the outcome of the request. It is intended for cases where another process or server handles the request, or for batch processing.
     */
    public static function _202() { Response::respond(202); }
    
    /**
     * Non-Authoritative Information
     * 
     * This response code means the returned metadata is not exactly the same as is available from the origin server, but is collected from a local or a third-party copy. This is mostly used for mirrors or backups of another resource. Except for that specific case, the 200 OK response is preferred to this status.
     */
    public static function _203() { Response::respond(203); }
    
    /**
     * No Content
     * 
     * There is no content to send for this request, but the headers are useful. The user agent may update its cached headers for this resource with the new ones.
     */
    public static function _204() { Response::respond(204); }
    
    /**
     * Reset Content
     * 
     * Tells the user agent to reset the document which sent this request.
     */
    public static function _205() { Response::respond(205); }
    
    /**
     * Partial Content
     * 
     * This response code is used in response to a range request when the client has requested a part or parts of a resource.
     */
    public static function _206() { Response::respond(206); }
    
    /**
     * Multi-Status
     * 
     * Conveys information about multiple resources, for situations where multiple status codes might be appropriate.
     */
    public static function _207() { Response::respond(207); }
    
    /**
     * Already Reported
     * 
     * Used inside a <dav:propstat> response element to avoid repeatedly enumerating the internal members of multiple bindings to the same collection.
     */
    public static function _208() { Response::respond(208); }
    
    /**
     * IM Used
     * 
     * The server has fulfilled a GET request for the resource, and the response is a representation of the result of one or more instance-manipulations applied to the current instance.
     */
    public static function _226() { Response::respond(226); }
}