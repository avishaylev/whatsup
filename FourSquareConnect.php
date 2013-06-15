<?php

namespace WhatsUp\FourSquareConnect;

/**
 * Provides base functions and attributes for most other classes
 * that we're going to implement
 *
 * @package WhatsUp
 * @author Ryan & Reese
 **/
interface FourSquareConnect
{

  public function setURL($task);

  public function request($options);

  public function setResponse($raw_result);

} // END interface FourSquareConnect