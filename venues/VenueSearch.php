<?php
namespace venues\VenueSearch;

require_once '../FourSquareConnect.php';
use WhatsUp\FourSquareConnect as FSC;


/**
* Provides Venue Search functionality.
*/
class VenueSearch extends FSC\FourSquareConnect {

  private $search_result;
  protected $options_array = array();
  protected $query;

  function __construct($query = NULL, $options = NULL) {
    $this->URL = parent::setURL('venue/search');
    $this->options_array['intent'] = 'match';
    $this->options_array['query'] = $query;
    $this->options_array['ll'] = $this->setLL();

    if(isset($options)) {
      $this->setOptions($options);
    }
  }

  /**
   * Responsible for setting lat and longitude based on information from the user.
   * @return string Current latitude and longitude as a string, separated by a comma.
   */
  public function setLL() {
    $lat = number_format(33.47, 2);
    $lon = number_format(81.97, 2);
    $lat_lon_string = $lat . ',' . $lon;
    return $lat_lon_string;
  }

  public function setOptions($option) {
    foreach ($option as $key => $value) {
      $this->options_array[$key]=$value;
    }
  }

  public function setQuery($query) {
    $this->query = $query;
  }



}