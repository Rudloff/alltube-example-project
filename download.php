<?php
/**
 * Example showing how to download a video to the server.
 */
use Alltube\Config;
use Alltube\VideoDownload;
use GuzzleHttp\Client;

require_once __DIR__.'/vendor/autoload.php';

$downloader = new VideoDownload(
    new Config(
        [
            'youtubedl' => '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
            'python'    => '/usr/bin/python',
        ]
    )
);

// Create a new Guzzle client.
$client = new Client();

// Create a temporary file.
$tmp = tempnam(null, 'alltube');

// Get the URL of the video.
$urls = $downloader->getURL('https://www.youtube.com/watch?v=dQw4w9WgXcQ');

// Output the name of the temporary file.
echo 'Downloading video to '.$tmp.PHP_EOL;

// Download the video to the temporary file.
$client->request('GET', $urls[0], ['sink' => $tmp]);
