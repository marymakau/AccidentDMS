<?php

$dates='1981-01-24';
$date=date_diff(date_create($dates), date_create('today'))->y;
echo $date;
?>