<?php
$lines = file('storage/logs/laravel.log');
$count = count($lines);
for ($i = max(0, $count - 50); $i < $count; $i++) {
    echo $lines[$i];
}
