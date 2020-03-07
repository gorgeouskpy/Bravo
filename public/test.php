<?php
$process = 36**6;
$startTime = microtime(true);
echo "开始时间：".$startTime."\n";
for($i=0;$i<$process;$i++){
    sha1($i);
}
$endTime = microtime(true);
$interval = $endTime - $startTime;
echo "结束时间：".$endTime."\n";
echo "过程：".$interval."\n";
?>