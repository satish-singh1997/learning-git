<?php

  $api_key = '**********************';
  $video_url = 'https://www.youtube.com/watch?v=';
  
  function getYouTubeVideoID($url) {
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    if (isset($params['v']) && strlen($params['v']) > 0) {
        return $params['v'];
    } else {
        return "";
    }
}

  
  $api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=' . getYouTubeVideoID($video_url) . '&key=' . $api_key;
        
  $data = json_decode(file_get_contents($api_url),true);
	echo "<pre>";
	print_r($data);
	echo "</pre>";
  // Accessing Video Info
  echo '<strong>Kind: </strong>' . $data['kind'] . '<br>';
  echo '<strong>Etag: </strong>' . $data['etag'] . '<br>';
  echo '<strong>Page Info: </strong>' . $data['pageInfo']['totalResults'] ,$data['pageInfo']['resultsPerPage'] . '<br>';
  echo '<strong>Items: </strong>' . $data['items'][0]['kind'] . '<br>';
  echo '<strong>Items: </strong>' . $data['items'][0]['snippet']['title']    . '<br>';
  
?>