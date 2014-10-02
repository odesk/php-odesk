<?php
/**
 * Authentication library for oDesk API using OAuth
 *
 * @final
 * @package     oDeskAPI
 * @since       04/21/2014
 * @copyright   Copyright 2014(c) oDesk.com
 * @author      Maksym Novozhylov <mnovozhilov@odesk.com>
 * @license     oDesk's API Terms of Use {@link https://developers.odesk.com/api-tos.html}
 */

require __DIR__ . '/vendor/autoload.php';

// if you already have the tokens, they can be read from session
// or other secure storage
//$_SESSION['access_token'] = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';
//$_SESSION['access_secret']= 'xxxxxxxxxxxx';

$config = new \oDesk\API\Config(
    array(
        'consumerKey'       => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx',  // SETUP YOUR CONSUMER KEY
        'consumerSecret'    => 'xxxxxxxxxxxxxx',                // SETUP KEY SECRET
        'accessToken'       => $_SESSION['access_token'],       // got access token
        'accessSecret'      => $_SESSION['access_secret'],      // got access secret
        'debug'             => true,                            // enables debug mode
//	'authType' => 'MyOAuth' // your own authentication type, see AuthTypes directory
    )
);

$client = new \oDesk\API\Client($config);

$accessTokenInfo = $client->auth();
// $accessTokenInfo has the following structure
// array('access_token' => ..., 'access_secret' => ...);
// keeps the access token in a secure place

// gets a list of trays for the authenticated user
$mc = new \oDesk\API\Routers\Mc($client);
$trays = $mc->getTrays();

print_r($trays);

// gets info of the authenticated user
$auth = new \oDesk\API\Routers\Auth($client);
$info = $auth->getUserInfo();

print_r($info);

// attempts to start a new message thread with wrong parameters
// to test an error response from the server (the subject is missing)
$params = array(
    'recipients' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'body' => 'this is a test message from oDesk Library'
);
$newThread = $mc->startNewThread('myuseruid', $params);

print_r($newThread);
