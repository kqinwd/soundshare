<?php

use ludk\Http\Kernel;
use ludk\Http\Request;

require '../vendor/autoload.php';
$kernel = new Kernel();
$request = new Request($_GET, $_POST, $_SERVER, $_COOKIE);
$response = $kernel->handle($request);
$response->send();

/////////////// FONCTION EMBED VIDEO //////////////////
// VIDEO YT : clean URL
function video_cleanURL_YT($video_url)
{
    if (!empty($video_url)) {
        $video_url             = str_replace('youtu.be/', 'www.youtube.com/embed/', $video_url);
        $video_url             = str_replace('www.youtube.com/watch?v=', 'www.youtube.com/embed/', $video_url);
    }
    // -----------------
    return $video_url;
};
// ---------------------
// VIDEO YT : iframe
function video_iframe_YT($video_url)
{
    $video_iframe            = '';
    // -----------------
    if (!empty($video_url)) {
        $video_url             = video_cleanURL_YT($video_url);
        $video_iframe        = '<iframe  height="280" src="' . $video_url . '"  frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
    }
    // -----------------
    return $video_iframe;
};
////////////////////////////////////////
