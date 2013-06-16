<?php
namespace WhatsUp\FourSquareConnect;

require_once 'FourSquareInterface.php';
require_once 'config.php';
use WhatsUp\FourSquareInterface as FSI;
use WhatsUp\config\appCredentials as appCredentials;



/**
* Base Class
*/
class FourSquareConnect implements FSI\FourSquareInterface {
  
  var $url;
  var $request_result;
  var $response_result;
  /**
   * Builds the base URL for specific tasks like searching, saving, etc;
   * @param string $task The current task as a string (no preceeding or trailing /'s). Ex: venue/search.
   * @return boolean.
   */
  public function setURL($task) {
    $url = 'https://api.foursquare.com/v2/';
    $url .= $task . '/';
    $url .= '?client_id=' . CLIENT_ID;
    $url .= '&client_secret=' . CLIENT_SECRET;
    $url .= '&push_secret=' . PUSH_SECRET;
    $url .= '&v=' . date('Ymd');
    $this->url = $url;
    return true;

  }

    /**
     * Build and execute cURL request.
     * @param array options Options to be passed to foursquare.
     * @internal param string $ll Latitude and Longitude separated by comma.
     * @return boolean Pass/Fail if request was successful.
     */
  public function request($options = NULL) {
    //If there isn't a URL set yet, stop here.
    if (!isset($this->url)) {
      return false;
    }

    //Append all options to the request URL.
    $request_url = $this->url;
    if (isset($options) && is_array($options)) {
      foreach ($options as $key => $value) {
        $request_url .= '&' . $key . '=' . $value;
      }
    }
    
    //Generate cURL request based on the request URL;
    $ch = curl_init($request_url);
    $option_array = array(
      CURLOPT_HEADER => false, 
      CURLOPT_RETURNTRANSFER => true,
    );
    curl_setopt_array($ch, $option_array);
    $this->request_result = curl_exec($ch);
    curl_close($ch);
    if ($this->request_result) {
      return true;
    } else {
      return false;
    }
  }
  /**
   * Turns a JSON response into arrays of objects
   * @param string $raw_result JSON object.
   * @return array Array of decoded values.
   */
  public function setResponse($raw_result) {
    $this->response_result = json_decode($raw_result);
  }

}