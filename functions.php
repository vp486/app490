#!/usr/bin/php
<?php
 function search_doctor($query){
	require_once('path.inc');
	require_once('get_host_info.inc');
	require_once('rabbitMQLib.inc');
        try{
        	$client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
        	$msg = array("query"=>$query, "type"=> "search_doctor");
            $response = $client->send_request($msg);
			// $output = array("data"=>json_decode($response, true));
            // error_log(var_export($response,true), 0);
		    return $response;
	    }
        catch(Exception $e){
        	return $e->getMessage();
	     }
 }

function search_speciality($speciality){
    require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');
    try{
        $client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
        $msg = array("speciality"=>$speciality, "type"=> "search_speciality");
        $response = $client->send_request($msg);
        // $output = array("data"=>json_decode($response, true));
        // error_log(var_export($response,true), 0);
        return $response;
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}

function search_insurance($insurance){
    require_once('path.inc');
    require_once('get_host_info.inc');
    require_once('rabbitMQLib.inc');
    try{
        $client = new RabbitMQClient('testRabbitMQ.ini', 'testServer');
        $msg = array("insurance"=>$insurance, "type"=> "search_speciality");
        $response = $client->send_request($msg);
        // $output = array("data"=>json_decode($response, true));
        // error_log(var_export($response,true), 0);
        return $response;
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
?>
