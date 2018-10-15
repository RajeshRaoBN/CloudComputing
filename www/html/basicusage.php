<?php
require '/home/ubuntu/vendor/autoload.php';

$s3 = new Aws\S3\S3Client([
    'profile' => 'default',
    'version' => 'latest',
    'region'  => 'us-east-1a'
]);