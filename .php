<?php
//template - 3 lines
//sample: <a>{test}</a>
function render($template,$vars){
    echo preg_replace("/\{([^\{]{1,100}?)\}/e","$vars[$1]",file_get_contents("$template.tpl"));
}

//database 5 lines
//connection sample:
//$conn = @mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD);
function dbAr($query){
    $tmp = mysqli_query($GLOBALS['conn'],$query) or die(mysqli_error($GLOBALS['conn']) . $query);
    for(;$arr[] = mysqli_fetch_assoc($tmp););
    return array_pop($arr)==null?[]:$arr; //the last element from mysqli_fetch_assoc is supposed to be null
}

//router
/*sample:
$routes['ALL']['/^\/blog\/(\w+)\/(\d+)\/?$/'] = function($category, $id){
    print "category={$category}, id={$id}";
};
$routes['GET']['/^\/blog\/(\w+)\/(\d+)\/?$/'] = function($category, $id){
    print "category={$category}, id={$id}";
};
*/

//migration
/*
function migrate($csv){
    foreach(explode(PHP_EOL, file_get_contents($csv)) as $line){
        if($x++ == 0){dbAr("CREATE TABLE $csv"
        foreach(explode(",", file_get_contents($csv)) as $line){
            
        }
    }
}
*/
//auto router - 6 lines
register_shutdown_function(function(){
    foreach ($GLOBALS['routes'] as $method => $v) {
        if ($_SERVER['REQUEST_METHOD'] == $method || $method == 'ALL' && $preg_match($v[0], $_SERVER['REQUEST_URI'], $params) === 1) {
            call_user_func_array($v[1], array_shift($params)==null?[]:array_values($params));
        }
    }
});