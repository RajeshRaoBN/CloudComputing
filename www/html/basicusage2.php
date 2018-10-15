<?php
require '/home/ubuntu/vendor/autoload.php';

$s3 = new Aws\S3\S3Client([
    'profile' => 'default',
    'version' => 'latest',
    'region'  => 'us-east-1'
]);

use Aws\S3\S3Client;
use Aws\Common\Credentials\Credentials;

 //if (ENVIRONMENT == 'production') {
    define('AWS_S3_KEY', 'AKIAJNU73XE4GYEI7M4A');
    define('AWS_S3_SECRET', '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');
    define('AWS_S3_REGION', 'us-east-1');
    define('AWS_S3_BUCKET', 'careernet');
    define('AWS_S3_URL', 'http://s3.'.AWS_S3_REGION.'.amazonaws.com/'.AWS_S3_BUCKET.'/');
  // }

   $tmpfile = 'something.txt';
// $file = $_FILES['file']['name'];
   $file = 'myfile';

if (defined('AWS_S3_URL')) {
  // Persist to AWS S3 and delete uploaded file
  require_once('S3.php');
  S3::setAuth(AWS_S3_KEY, AWS_S3_SECRET);
  S3::setRegion(AWS_S3_REGION);
  S3::setSignatureVersion('v4');
  echo AWS_S3_KEY. '<br>';
  echo AWS_S3_SECRET. '<br>';
  echo AWS_S3_BUCKET. '<br>';
  echo AWS_S3_REGION. '<br>';
  echo AWS_S3_URL. '<br>';
  $result = S3::putObject(S3::inputFile($tmpfile), AWS_S3_BUCKET, 'path/in/bucket/'.$file, S3::ACL_PUBLIC_READ);
  unlink($tmpfile);
} else {
 // Persist to disk
 $path = 'path/to/user/files/'.$file;
 move_uploaded_file($tmpfile, $path);
}
echo "It is working till here";
// Use an Aws\Sdk class to create the S3Client object.
// $s3Client = $sdk->createS3();
// $credentials = new Credentials('AKIAJ/NU73XE4GYEI7M4A', 'Y7VYItmSZstfpKZDq1lTPMTF8xg11kKs2SeRcI3Q');

// Use the us-east-2 region and latest version of each client.
// $sharedConfig = [
//     'profile' => 'default',
//     'region'  => 'us-east-1a',
//     'version' => 'latest', 
//     'credentials' => $credentials,
// ];

// // // Create an SDK class used to share configuration across clients.
// $sdk = new Aws\Sdk($sharedConfig);

// // Use an Aws\Sdk class to create the S3Client object.
// $s3Client = $sdk->createS3();

// // $c = new S3Client([
// //     'region'          => 'us-standard',
// //     'version'         => 'latest',
// //     'endpoint'        => 'http://test.domain.com',
// //     'bucket_endpoint' => true
// // ]);

// echo 'so for so good';

// $result = $sharedConfig->getObject([
//     'profile' => 'default',
//     'version' => 'latest'
// ]);
// echo $result['region'];
// echo $result;

// // Send a PutObject request and get the result object.
// $result1 = $s3Client->putObject([
//     'Bucket' => 'my-bucket',
//     'Key'    => 'my-key',
//     'Body'   => 'this is the body!'
// ]);

// echo $result1['Bucket'];

// // Download the contents of the object.
// $result1 = $s3Client->getObject([
//     'Bucket' => 'my-bucket',
//     'Key'    => 'my-key'
// ]);

// // Print the body of the result by indexing into the result object.
// echo $result1['Body'];
