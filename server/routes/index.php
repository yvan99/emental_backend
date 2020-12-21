<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\UploadedFile;
require_once $_SERVER['DOCUMENT_ROOT'] . '/emental/server/core/init.php';
require '../../vendor/autoload.php';

$app = new \Slim\App([
  'settings' => [
      'addContentLengthHeader' => false
  ]
]);
$container = $app->getContainer();
$container['upload_directory'] = '../../UI/users/sellerchamber/prodimages';
//$container  holds directory location fr storing image
$app->post('/product', function ($request, $response, $next) 
{
    // Get all POST parameters
    $params = (array)$request->getParsedBody();
    //directory
    $directory = $this->get('upload_directory');
    $uploadedFiles = $request->getUploadedFiles();
    // handle single input with single file upload
    $uploadedFile = $uploadedFiles['pic'];

    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
      
      $coverPhoto = moveUploadedFile($directory, $uploadedFile);
      //$response->write('uploaded ' . $coverPhoto . '<br/>');

    //call for middleware
      $result=checkproduct($params,$coverPhoto);
      if($result) return $response->withStatus(200);
      else return $response->withStatus(400);
    }


});

// add logistic agents
$app->post('/logisticagent', function ($request, $response, $next) 
{
      // Get all POST parameters
      $params = (array)$request->getParsedBody();


      $result=checkLogisticAgent($params);
      if($result) return $response->withStatus(200);
      else return $response->withStatus(400);

});

$app->post('/cart', function ($request, $response, $next) 
{
    // Get all POST parameters
    $params = (array)$request->getParsedBody();
    //directory
     $response->withStatus(200);
     
  
    


});




/**
 * Moves the uploaded file to the upload directory and assigns it a unique name
 * to avoid overwriting an existing uploaded file.
 *
 * @param string $directory directory to which the file is moved
 * @param UploadedFile $uploadedFile file uploaded file to move
 * @return string filename of moved file
 */
function moveUploadedFile($directory, UploadedFile $uploadedFile)
{
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
    $filename = sprintf('%s.%0.8s', $basename, $extension);

    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);

    return $filename;
}

$app->run();
?>