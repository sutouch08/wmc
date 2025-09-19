<?php
function select_vehicle_type($se = NULL)
{
  $ds = '';

  $types = array(
    '4 ล้อ',
    '6 ล้อ',
    '10 ล้อ',
    'รถพ่วง',
    'รถเทเล่อร์'
  );

  foreach($types as $rs)
  {
    $ds .= '<option value="'.$rs.'" '.is_selected($rs, $se).'>'.$rs.'</option>';
  }

  return $ds;
}

 ?>
