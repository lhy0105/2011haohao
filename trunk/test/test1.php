<?php
$regex = '/heL{3,10}?/i';
$str = 'heLLLLLLLLLLLLLLLL';
if(preg_match($regex, $str, $matches)){
	var_dump($matches);
}

echo "\n";
