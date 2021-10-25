<?php 
    require_once("C:/xampp/htdocs/projects/Distributed-and-semantic-search/private/Models/ResultsAPIService.php");

    class EuropenaAPI
    {
        private $URL_EUROPEANA_API =  "https://www.europeana.eu/api/v2/search.json?wskey=pHnRxochU&sort=score&query=";
    
        public function get_Results_API($terms)

        {   
            $url = $this->URL_EUROPEANA_API;
            $url = $url."".$terms;

            $objectResultsAPIService = new ResultsAPIService();
            $JSONRequest = $objectResultsAPIService ->get_Results_From_API($url);

            $arrayResult = json_decode($JSONRequest,true);

            $lengthArray = sizeof($arrayResult['items']);
 
            $resumenArray = [];

            for ($i=0; $i < $lengthArray; $i++) { 
                $resumenArray[$i]["title"] = $arrayResult["items"][$i]["title"][0];
                $resumenArray[$i]["score"] = $arrayResult["items"][$i]["score"];
                $resumenArray[$i]["scoreNormalized"] = $arrayResult["items"][$i]["score"];
                $resumenArray[$i]["link"] = $arrayResult["items"][$i]["guid"];
                $resumenArray[$i]["search"] = "Europena";
            }
                   
            return $resumenArray;
        }
    
    
    }
?>