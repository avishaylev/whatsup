<?php

/**
 * Provides base functions and attributes for most other classes
 * that we're going to implement
 *
 * @package WhatsUp
 * @author Ryan & Reese
 **/
interface FourSquareConnect
{

  var $Client_id;
  var $Client_secret;
  var $Push_secret;


  protected function setURL()
  {

  }

  protected function request()
  {
    
  }

  protected function getReponse()
  {
    
  }
} // END interface FourSquareConnect