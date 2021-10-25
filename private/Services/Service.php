<?php 
    require_once("../Models/ParserJSON.php");
    require_once("../Models/QueryExpanser.php");
    require_once("../Models/EuropenaAPI.php");
    require_once("../Models/PLOSAPI.php");

    $rawTerms = $_GET['q'];

    $rawTerms = strtolower($rawTerms);

    $objectEuropenaAPI = new EuropenaAPI();
    $objectPLOSAPI = new PLOSAPI();
    $objectQueryExpanser = new QueryExpanser();
    $objectParserJSON = new ParserJSON();

    $expansedTerms = $objectQueryExpanser->get_Results_API($rawTerms);

    $resultsArrayEuropenaAPI = $objectEuropenaAPI ->get_Results_API($expansedTerms) ;
    $rowsNumber = sizeof($resultsArrayEuropenaAPI);

    $resultsArrayPLOSAPI = $objectPLOSAPI ->get_Results_API($expansedTerms ,$rowsNumber);

    $maximunScoreEuropena = $resultsArrayEuropenaAPI[0]['score'];
    $maximunScorePLOS = $resultsArrayPLOSAPI[0]['score'] ;
    $normalizer = $maximunScoreEuropena/$maximunScorePLOS;

    for ($i=0; $i < $rowsNumber ; $i++) { 
        $resultsArrayPLOSAPI[$i]['scoreNormalized'] =  $resultsArrayPLOSAPI[$i]['scoreNormalized'] * $normalizer;
    }

    $finalResults = array_merge($resultsArrayPLOSAPI, $resultsArrayEuropenaAPI);
 
    $scores = array_column($finalResults, 'scoreNormalized');
    array_multisort($scores, SORT_DESC, $finalResults);

    $ResultHTML = $objectParserJSON -> parser_JSON_To_HTML($finalResults);

    echo $ResultHTML;

?>