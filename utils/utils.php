<?php

function current_time(){
    return new DateTime('NOW');
}

function timeSpace($earlier, $later) {
    $difference = $earlier->diff($later);
    return format_interval($difference);
}

function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y yıl "); }
    if ($interval->m) { $result .= $interval->format("%m ay "); }
    if ($interval->d) { $result .= $interval->format("%d gün "); }
    if ($interval->h) { $result .= $interval->format("%h saat "); }
    if ($interval->i) { $result .= $interval->format("%i dakika "); }
    if ($interval->s) { $result .= $interval->format("%s saniye "); }
    return $result;
}

?>