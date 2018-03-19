<?php

use Alltube\Config;
use Alltube\VideoDownload;

require_once __DIR__.'/vendor/autoload.php';

$downloader = new VideoDownload(
    new Config(
        [
            'youtubedl' => '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
            'python'    => '/usr/bin/python',
        ]
    )
);

//Extract the URL of a video from a webpage
$downloader->getURL('https://www.youtube.com/watch?v=dQw4w9WgXcQ');

//Get a specific format
$downloader->getURL('https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'worst');

//Get the whole decoded JSON extracted by youtube-dl
$downloader->getJSON('https://www.youtube.com/watch?v=dQw4w9WgXcQ');

//See complete class documentation here: https://alltube.surge.sh/classes/Alltube.VideoDownload.html
