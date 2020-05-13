<?php
/**
 * Example showing how to download a converted MP3 file to the server.
 */

use Alltube\Config;
use Alltube\Video;

require_once __DIR__ . '/vendor/autoload.php';

Config::setOptions(
    [
        'youtubedl' => '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
        'python' => '/usr/bin/python',
        'avconv' => '/usr/bin/ffmpeg',
    ]
);

$video = new Video('https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'best');

// Create a temporary file.
$tmp = tempnam(null, 'alltube');

// Get a stream containing the converted MP3.
$stream = $video->getAudioStream();

// Output the name of the temporary file.
echo 'Converting MP3 to ' . $tmp . PHP_EOL;

// Write the stream to the temporary file.
file_put_contents($tmp, $stream);
