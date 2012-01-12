<?php

namespace AlterPHP\Component\HttpFoundation;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * CookieRedirectResponse represents an HTTP response doing a redirect and sending cookies
 * @author     pcb <pc.bertineau@alterphp.com>
 */
class CookieRedirectResponse extends RedirectResponse
{

   /**
    * Creates a redirect response so that it conforms to the rules defined for a redirect status code.
    *
    * @param string  $url    The URL to redirect to
    * @param integer $status The status code (302 by default)
    * @param array   $cookies An array of Cookie objects
    */
   public function __construct($url, $status = 302, $cookies = array ())
   {
      parent::__construct($url, $status);

      foreach ($cookies as $cookie)
      {
         if (!$cookie instanceof Cookie)
         {
            throw new \InvalidArgumentException(sprintf('Third parameter is not a valid Cookie object.'));
         }
         $this->headers->setCookie($cookie);
      }
   }

}
