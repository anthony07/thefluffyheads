<?php
  function fluffy_format($content = array()) {
    $output = fluffy_collect_videos($content['field_video']);
    return $output[0];
  }

  function fluffy_collect_videos($videos = array()) {
    $array = array();
    $count = 0;
    foreach ($videos as $value) {
      if(isset($videos[$count][0])) {
        $video = $videos[$count++][0];
        $output = render($video);
        $array[] = $output;
      }
    }
    $filtered_array =  array_filter($array, 'strlen');
    $video_array = array_values($filtered_array);
    return $video_array;
  }