<?php
include("p.php");
$routes['ALL']['/watch\?v=(\w+)/'] = function($id){
        include('view.php');
};
