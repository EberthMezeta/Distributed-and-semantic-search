<?php 
   require_once("C:/xampp/htdocs/projects/Distributed-and-semantic-search/private/Models/ResultsAPIService.php");

class QueryExpanser
{
    private $DATAMUSE_API = 'https://api.datamuse.com/words?ml=';
     
    public function get_Results_API($termsString)
    {
        $url = $this->DATAMUSE_API;

        $arrayTerms = explode(" ",$termsString);
        $termsFixed = implode("+",$arrayTerms);

        $url = $url."".$termsFixed."&max=2";
        
        $objectResultsAPIService = new ResultsAPIService();
        $JSONRequest = $objectResultsAPIService ->get_Results_From_API($url);
        
        $arrayResult = json_decode($JSONRequest,true);

        foreach ($arrayResult as $JSON) {
            $arrayTerms[] = $JSON['word'];
        }
        
        $stringTerms = implode("+",$arrayTerms);

        return $stringTerms;
    }
}

?>