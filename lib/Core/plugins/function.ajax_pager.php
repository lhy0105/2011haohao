<?php
function smarty_function_ajax_pager($params, &$smarty){
	$params['pageCount'] = intval(ceil($params['total']/$params['size']));
	if($params['pageCount'] <= 1) return '';

	$params['pageMin'] = 1;
	$params['pageMax'] = $params['pageCount'];
	return $smarty->fetch($params['tpl'], $params);
}
