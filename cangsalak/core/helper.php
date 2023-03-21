<?php

function safe($str)
{
    return strip_tags(trim($str));
}

function readJSON($path)
{
    $string = file_get_contents($path);
    $obj = json_decode($string);
    return $obj;
}

function createFile($string, $path)
{
    $create = fopen($path, "w") or die("เปลี่ยนโฟลเดอร์อนุญาตสำหรับแอปพลิเคชันและโฟลเดอร์ cangsalak เป็น 777");
    fwrite($create, $string);
    fclose($create);
    
    return $path;
}
function custom_copy($src, $dst) { 
   
    // open the source directory
    $dir = opendir($src); 
   
    // Make the destination directory if not exist
    @mkdir($dst); 
   
    // Loop through the files in source directory
    foreach (scandir($src) as $file) { 
   
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) 
            { 
   
                // Recursively calling custom copy function
                // for sub directory 
                custom_copy($src . '/' . $file, $dst . '/' . $file); 
   
            } 
            else { 
                copy($src . '/' . $file, $dst . '/' . $file); 
            } 
        } 
    } 
   
    closedir($dir);
}

function label($str)
{
    $label = str_replace('_', ' ', $str);
    $label = ucwords($label);
    return $label;
}

function delAllFileInfolder($folder=''){
	if (is_dir($folder)&&$folder!='') {
		//Get a list of all of the file names in the folder.
		$files = glob($folder . '/*');
		 
		//Loop through the file list.
		foreach($files as $file){
			//Make sure that this is a file and not a directory.
			if(is_file($file)){
				//Use the unlink function to delete the file.
				unlink($file);
			}
		}
	}
}


function lang_s($file){
    $line_text = file($file);
    foreach( $line_text as $line_num=>$text){
        if( strpos($text, 'lang(') !== false ){
            $text = $line_num + 1;
        }
    }
    return $text;
}

?>