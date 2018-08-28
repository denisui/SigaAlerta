<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Massdot {

    /**
     * Massdot API
     * @return type boolean
     */
    //function getData($param1, $param2) {
    public function getData() {
        $feedurl = 'http://api.trafficland.com/v2.0/json/video_feeds?system=simons&key=86a37585686675a33a0ad3ae72395339';
        $ch = curl_init();
        $timeout = 15;
        curl_setopt($ch, CURLOPT_URL, $feedurl);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        $content = json_decode($data);
        //echo "<pre>";
        //print_r($content);
        //echo "<pre>";
        return $content;
    }
}
