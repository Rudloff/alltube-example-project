<?php
/**
 * Example showing how to download a video to the server.
 */

use Alltube\Config;
use Alltube\Exception\EmptyUrlException;
use Alltube\Video;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

require_once __DIR__ . '/vendor/autoload.php';

Config::setOptions(
    [
        'youtubedl' => '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
        'python' => '/usr/bin/python',
    ]
);

$video = new Video('https://www.youtube.com/watch?v=dQw4w9WgXcQ');

// Create a new Guzzle client.
$client = new Client();

// Create a temporary file.
$tmp = tempnam(null, 'alltube');

// Get the URL of the video.
try {
    $urls = $video->getUrl();
} catch (EmptyUrlException $e) {
    die('youtube-dl returned an empty URL.');
}

// Output the name of the temporary file.
echo 'Downloading video to ' . $tmp . PHP_EOL;

// Download the video to the temporary file.
try {
    $client->request('GET', $urls[0], ['sink' => $tmp]);
} catch (GuzzleException $e) {
    die('Error when downloading the file.');
}
