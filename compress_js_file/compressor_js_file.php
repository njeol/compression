<?php
$dirname = '../';
$dir = opendir($dirname); 

$stock_name;
$i = 0;
$script = fopen("../compressor", "w+");
fputs($script, 'java -jar compress_js_file/compiler.jar --compilation_level ADVANCED_OPTIMIZATIONS');
$total_size = 0;
while($file = readdir($dir)) 
{
  if($file != '.' && $file != '..' && !is_dir($dirname.$file))
	{
	  $size = filesize('../' . $file);
    $total_size += $size;
    $len = strlen($file);
    if ($file[$len - 1] == 's' && $file[$len - 2] == 'j' && $file[$len - 3] == '.')
	      fputs($script, ' --js ' . $file);
	}
}
fputs($script, " --js_output_file final_compress.js\n");
echo "SIZE TOTAL : " . $total_size;
echo "OK !!! All files js compressed \n";
closedir($dir);
?>