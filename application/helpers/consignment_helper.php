<?php
function status_text($status)
{
  $ds = [
    '0' => 'Draft',
    '1' => 'Closed',
    '2' => 'Canceled'
  ];

  return $ds[$status];
}


function status_color($status)
{
  $ds = [
    '0' => '#a069c3',
    '1' => '#69aa46',
    '2' => '#656565'
  ];

  return $ds[$status];
}

 ?>
