<?php
/*
Plugin Name: Https Switcher Plugin
Description: Force http/https for resources, depending on the scheme you use.
Version: 0.1
Author: Janiko
Author URI: http://geba.fr
License: GPL2
*/


class Https_Switch_Plugin
{
    public function __construct()
    {
        add_filter('the_content', array($this, 'https_switch')) ;
    }

    public function https_switch($content)
    {
        $base_http = home_url($path = '/', $scheme = http);
        $base_https =  home_url($path = '/', $scheme = https);
        if ($_SERVER["HTTPS"] == 'on')
                $content = str_ireplace($base_http, $base_https, $content);
        else
                $content = str_ireplace($base_https, $base_http ,$content);
        return $content;
    }
}

new Https_Switch_Plugin();

?>
