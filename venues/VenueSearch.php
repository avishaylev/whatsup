<?php

require_once '../BaseClass.php';
use \whatsup\BaseClass as BaseClass;

namespace \venues\VenueSearch;

/**
* Provides Venue Search functionality.
*/
class VenueSearch extends BaseClass {

  private var $search_result;

  /**
   * Responsible for setting lat and longitude based on information from the user.
   * @return string Current latitude and longitude as a string, separated by a comma.
   */
  protected function setLL() {
    
    $lat = number_format(33.47, 2);
    $lon = number_format(81.97, 2);
    $lat_lon_string = $lat . ',' . $lon;
    return $lat_lon_string;
  }

  protected function setURL()
  {
    $this->URL = parent::setURL('venue/search');
  }

  /**
   * Sends a query to the FourSquare API and gets a list of venues matching the query
   * @return boolean      Whether or not the request was successful.
   */
  public function search($options) {

  }

}