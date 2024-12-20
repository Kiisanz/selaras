// Pusher.php (Konfigurasi Pusher)
<?php
require 'vendor/autoload.php';

use Pusher\Pusher;

$options = array(
    'cluster' => 'YOUR_CLUSTER',
    'useTLS' => true
);
$pusher = new Pusher(
    'YOUR_APP_KEY',
    'YOUR_APP_SECRET',
    'YOUR_APP_ID',
    $options
);
