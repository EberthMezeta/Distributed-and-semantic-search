<?php 
class ResultsAPIService
{
    public function get_Results_From_API($URL)
    {
        $ch = curl_init($URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
?>