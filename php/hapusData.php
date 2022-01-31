<?php
$cnt = 0;
if (($fh = fopen("../databuku/data.csv", "r")) !== FALSE) {
   while (($csvadata = fgetcsv($fh, 1024, ",")) !== FALSE) {
      $data[$cnt++] = $csvadata;
   }
   fclose($fh);

$i = 0;
   while ($i <= $cnt) {
      unset($data[$i]);
      $i++;
   }
}

$fp = fopen('../databuku/data.csv', 'w');

foreach($data as $fields) {
   fputcsv($fp, $fields);
}
fclose($fp); 

echo "<meta http-equiv=refresh content=0.1;URL='../index.php'>";
?>