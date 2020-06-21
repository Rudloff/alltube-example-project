<?php
/**
 * Example showing how to download a converted MP3 file to the server.
 */

use Alltube\Library\Downloader;
use Alltube\Library\Exception\AlltubeLibraryException;

require_once __DIR__ . '/vendor/autoload.php';

$downloader = new Downloader(
    '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
    [],
    '/usr/bin/python',
    '/usr/bin/ffmpeg'
);


$video = $downloader->getVideo('https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'best');

// Create a temporary file.
$tmp = tempnam(null, 'alltube');

// Get a stream containing the converted MP3.
try {
    $stream = $downloader->getAudioStream($video);
} catch (AlltubeLibraryException $e) {
    die('Something went wrong.');
}

// Output the name of the temporary file.
echo 'Converting MP3 to ' . $tmp . PHP_EOL;

// Write the stream to the temporary file.
file_put_contents($tmp, $stream);
