<?php
/**
 * Example showing how to get information about a video.
 */

use Alltube\Library\Downloader;
use Alltube\Library\Exception\AlltubeLibraryException;

require_once __DIR__ . '/vendor/autoload.php';

$downloader = new Downloader(
    '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
    [],
    '/usr/bin/python'
);

$video = $downloader->getVideo('https://www.youtube.com/watch?v=dQw4w9WgXcQ');

// Extract the URL of a video from a webpage
try {
    var_dump($video->getUrl());
} catch (AlltubeLibraryException $e) {
    die('Something went wrong.');
}

// Get a specific format
$video = $downloader->getVideo('https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'worst');
try {
    var_dump($video->getUrl());
} catch (AlltubeLibraryException $e) {
    die('Something went wrong.');
}

// Get the whole decoded JSON extracted by youtube-dl
try {
    var_dump($video->getJson());
} catch (AlltubeLibraryException $e) {
    die('Something went wrong.');
}
