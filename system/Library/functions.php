<?php
function matchObjects($parentObjects, $childObjects, $field, $parentKey, $childKey) {  
	$result = null;
	foreach ($parentObjects as $parentObject){
		array_search_in_level($parentObject[$parentKey], $childObjects, $childKey, $parentObject[$field], 1);
		$newObjects[] =  $parentObject;
	}
	return $newObjects;
}
 


function array_search_in_level($needle, $haystack, $key, &$result, $searchlevel = 0) {  
  while(is_array($haystack) && isset($haystack[key($haystack)])) { 
    if($searchlevel == 0 && key($haystack) == $key && $haystack[$key] == $needle) { 
      $result = $haystack; 
    } elseif($searchlevel > 0) { 
      array_search_in_level($needle, $haystack[key($haystack)], $key, $result, $searchlevel - 1); 
    } 
    next($haystack); 
  } 
} 