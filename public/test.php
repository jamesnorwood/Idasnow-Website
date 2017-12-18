<?php
  $json_string = file_get_contents("http://api.wunderground.com/api/272ecdaf2d18d27c/geolookup/conditions/q/IA/Cedar_Rapids.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  echo "Current temperature in ${location} is: ${temp_f}\n";
?>