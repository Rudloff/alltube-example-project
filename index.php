<?php
/**
 * Example showing how to get information about a video.
 */
use Alltube\Config;
use Alltube\Video;

require_once __DIR__.'/vendor/autoload.php';

Config::setOptions(
    [
        'youtubedl' => '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
        'python'    => '/usr/bin/python',
    ]
);

$video = new Video('https://www.youtube.com/watch?v=dQw4w9WgXcQ');

// Extract the URL of a video from a webpage
var_dump($video->getUrl());

// Get a specific format
$video = new Video('https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'worst');
var_dump($video->getUrl());

// Get the whole decoded JSON extracted by youtube-dl
var_dump($video->getJson());

// See complete class documentation here: https://dev.rudloff.pro/alltube/docs/classes/Alltube.Video.html
