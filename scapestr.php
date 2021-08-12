<?php 
$replace = array( 
'"' => '-', 
"'" => '-' ,
'/' => '-' ,
    "\\" => '-',
    "\x00" => '-',
    "\x1" => '-',
    "#"=> '-'
); 

//$string = '\""""""""""""""dsfsfsdf324234'; 

//echo strReplaceAssoc($replace,$string); 

// Echo: I like to eat an orange with my cat in my ford 

function strReplaceAssoc(array $replace, $subject) { 
   return str_replace(array_keys($replace), array_values($replace), $subject);    
} 
?> 