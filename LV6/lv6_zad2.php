<?php 

$file = fopen("tekst.txt", "r");
$sadrzaj = fread($file,filesize("tekst.txt"));

fclose($file);
echo $sadrzaj;

$m_index = strpos($sadrzaj, "m");
$p_br = substr_count($sadrzaj, "p");

echo "<div style= 'border:1px solid black; padding 10px; width:500px'>
      <h1>File sadržaj</h1>
      <p>$sadrzaj<p>
      </div>";

$poruka = "M se prvi put pojavljuje na $m_index .mjestu, a P se pojavljuje $p_br puta.";

echo $poruka;

$file = fopen("tekst.txt", "a");

fwrite($file, $poruka);
fclose($file);

?>