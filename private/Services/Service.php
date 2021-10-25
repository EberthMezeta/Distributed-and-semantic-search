<?php 
/*
$rawTerms = $_GET['q'];


$endPoint = "https://" . $Language . ".wikipedia.org/w/api.php";
$LocalCategory   =    $Category;

if ($LocalCategory == 'size') {
    $LocalCategory = "relevance";
}

$params = [
    "action" => "query",
    "list" => "search",
    "srsearch" => $Search,
    "srsort" => $LocalCategory,
    "format" => "json"
];
*/

//$url = $endPoint . "?" . http_build_query($params);
$ch = curl_init('http://api.plos.org/search?q=ADN&wt=json');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
?>