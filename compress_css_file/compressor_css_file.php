<?php
$dirname = '../';
$dir = opendir($dirname); 
$stock_name;
$script = fopen("../compressor", "w+");
$total_size = 0;
while($file = readdir($dir)) 
{
  if($file != '.' && $file != '..' && !is_dir($dirname.$file))
	{
	  $size = filesize('../' . $file);
    $total_size += $size;
    $len = strlen($file);
    if ($file[$len - 1] == 's' && $file[$len - 2] == 's' && $file[$len - 3] == 'c' && $file[$len - 4] == '.')
	    fputs($script, "java -jar compress_css_file/yuicompressor.jar " . $file . " --charset utf-8 >> final_compress.css" . "\n");
	}
}
echo "SIZE TOTAL : " . $total_size;
echo "\nOK !!! All files js compressed \n";
closedir($dir);
?>