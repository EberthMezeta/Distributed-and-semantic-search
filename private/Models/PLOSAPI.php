<?php 

require_once("C:/xampp/htdocs/projects/Distributed-and-semantic-search/private/Models/ResultsAPIService.php");

class PLOSAPI
{
    private $URL_PLOS_API =  "http://api.plos.org/search?q=";

    public function get_Results_API($terms,$rowsNumber)
    {
        $URL = $this->URL_PLOS_API;
        if ($rowsNumber>0) {
            $URL = $URL."".$terms."&rows=".$rowsNumber."&fl=id,title,score";
        }else{
            $URL = $URL."".$terms."&fl=id,title,score";
        }
       
        $objectResultsAPIService = new ResultsAPIService();
        $JSONRequest = $objectResultsAPIService ->get_Results_From_API($URL);

        $arrayResult = json_decode($JSONRequest,true);

        $lengthArray = sizeof($arrayResult["response"]["docs"]); 

        $resumenArray = [];

        for ($i=0; $i < $lengthArray; $i++) { 
            $resumenArray[$i]["title"] = $arrayResult["response"]["docs"][$i]["title"];
            $resumenArray[$i]["score"] = $arrayResult["response"]["docs"][$i]["score"];
            $resumenArray[$i]["scoreNormalized"] = $arrayResult["response"]["docs"][$i]["score"];
            $resumenArray[$i]["link"] = "https://journals.plos.org/plosntds/article?id=".$arrayResult["response"]["docs"][$i]["id"];
            $resumenArray[$i]["search"] = "PLOS";
        }

        return $resumenArray;

    }

    
}

?>