<?php
//template - 3 lines
function render($template){
    echo preg_replace("/\{([^\{]{1,100}?)\}/e","$$1",file_get_contents("$template.tpl"));
}

//database 5 lines
//$conn = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
function dbAr($query){
    $tmp = mysqli_query($GLOBALS['conn'],$query) or die(mysqli_error($GLOBALS['conn']) . $query);
	for(;$arr[] = mysqli_fetch_assoc($tmp););array_pop($arr);
    return $arr;
}

//router
/*
$routes['/^\/blog\/(\w+)\/(\d+)\/?$/'] = function($category, $id){
    print "category={$category}, id={$id}";
};
*/

//bottom of script - 6 lines
foreach ($routes as $pattern => $callback) {
    if (preg_match($pattern, $_SERVER['REQUEST_URI'], $params) === 1) {
        array_shift($params);
        return call_user_func_array($callback, array_values($params));
    }
}

