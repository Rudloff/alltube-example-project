<?php
/**
 * Example showing how to download a video to the server.
 */

use Alltube\Library\Downloader;
use Alltube\Library\Exception\AlltubeLibraryException;
use function GuzzleHttp\Psr7\stream_for;

require_once __DIR__ . '/vendor/autoload.php';


$downloader = new Downloader(
    '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
    [],
    '/usr/bin/python'
);

$video = $downloader->getVideo('https://www.youtube.com/watch?v=dQw4w9WgXcQ');

// Create a temporary file.
$tmp = tempnam(null, 'alltube');

// Get a stream containing the video.
try {
    $body = $downloader->getHttpResponse($video)->getBody();
} catch (AlltubeLibraryException $e) {
    die('Something went wrong.');
}

// Output the name of the temporary file.
echo 'Downloading video to ' . $tmp . PHP_EOL;

// Download the video to the temporary file.
$stream = stream_for(fopen($tmp, 'w'));
while (!$body->eof()) {
    $stream->write($body->read(4096));
}
