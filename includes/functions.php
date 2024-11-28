<?php
class CustomFunctions {
    public static function getRootUrl() {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] . '/ags_afsprakenplanner/';
        return $protocol . $domainName;
    }
}