<?php

$hasSelectedRestaurant = false;
$selectedRestaurant;
$saveSuccess = false;

$xmlFile = 'restaurant_reviews.xml';

if (isset($_POST['saveXML'])) {
    //o    pen xml then make modifications then save
    //testing
    $restaurant = json_decode($_POST['saveXML']);
    if (file_exists($xmlFile)) {

        $xml = simplexml_load_file($xmlFile);

        //m        ake modifications
        foreach ($xml as $resto) {
            if ($restaurant->Name == $resto->Name) {
                $resto->Summary = (String)$restaurant->Summary;
                $resto->Rating = $restaurant->Rating;
            }

        }

        $xml->asXML($xmlFile);
        echo("Successfully saved to restaurant_reviews.xml");
        exit;

    } else {
        exit('Error saving xml.');
    }
} else if (isset($_GET['getrestaurants'])){
    $xml = LoadXML();
    $json = json_encode($xml);
    echo $json;
    exit;
}
else if(isset($_GET['getrestaurantbyname'])){
    $xml = LoadXML();
    $name = $_GET['getrestaurantbyname'];
    foreach ($xml as $resto)
    {
        if($resto->Name == $name){
            $address = $resto->RestaurantAddress->Address." ".$resto->RestaurantAddress->City." ".$resto->RestaurantAddress->PostalCode;
            $restaurant = [$address,(String) $resto->Summary,(String) $resto->Rating];
        }
    }
    $json = json_encode($restaurant);
    echo $json;
    exit;
}

function LoadXML(){
    $xmlFile = 'restaurant_reviews.xml';
if (file_exists($xmlFile)) {
            $xml = simplexml_load_file($xmlFile);
            return $xml;
        } else {
            exit('Failed to open test.xml.');
        }
}