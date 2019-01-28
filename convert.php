<?php
/**
 * Example showing how to download a converted MP3 file to the server.
 */

use Alltube\Config;
use Alltube\VideoDownload;

require_once __DIR__.'/vendor/autoload.php';

$downloader = new VideoDownload(
    new Config(
        [
            'youtubedl' => '/usr/lib/python3/dist-packages/youtube_dl/__main__.py',
            'python'    => '/usr/bin/python',
            'avconv'    => '/usr/bin/ffmpeg',
        ]
    )
);

// Create a temporary file.
$tmp = tempnam(null, 'alltube');

// Get a stream containing the converted MP3.
$stream = $downloader->getAudioStream('https://www.youtube.com/watch?v=dQw4w9WgXcQ', 'best');

// Output the name of the temporary file.
print('Converting MP3 to '.$tmp.PHP_EOL);

// Write the stream to the temporary file.
file_put_contents($tmp, $stream);
