<?php
$isInCategory = in_array($category, $categorys);
$isAllowfilter = 1 == $allowfilter;
$isEpisode = in_array('正片', $type);
$isCompleted = 0 == $completed;

if($isInCategory && $isAllowfilter && $isEpisode && ($isCompleted 
	|| isValidDate($episode_lastappend, $releasedate))){
		// do something
}

function isValidDate($episode_lastappend, $releasedate){
	return strtotime($episode_lastappend) > strtotime('20120331')
			|| strtotime($releasedate) > strtotime('now');
}
