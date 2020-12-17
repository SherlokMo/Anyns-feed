<?php 

namespace core;

/**
 * Class Response
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Response
{

    /**
     * Sets status code for the page
     * 
     * @param int| $code
     * @return void
     */
    function setStatusCode(int $code) :void
    {
        http_response_code($code);
    }

}

?>