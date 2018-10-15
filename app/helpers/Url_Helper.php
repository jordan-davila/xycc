<?php

// Simple Page Redirect

function redirect($url){
    header('location: ' . ROOT . $url);
}

?>