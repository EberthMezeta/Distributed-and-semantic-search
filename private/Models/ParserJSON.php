<?php 
class ParserJSON
{
    public function parser_JSON_To_HTML($Array)
    {
        $template = '<div class="table-responsive">';
        $template .= '<table class="table table-bordered">';
        $template .= '<thead>
        <tr>
          <th scope="col" >Titulo</th>
          <th scope="col" >Valor original</th>
          <th scope="col" >Valor normalizado</th>
          <th scope="col" >Buscador</th>
          <th scope="col" >Enlace de descarga</th>
        </tr>
      </thead>
      <tbody>';
        foreach ($Array as $item) {
            $template .= '<tr>';
            $template.= '<td>'.$item['title'] .'</td>';
            $template.= '<td>'.$item['score'] .'</td>';
            $template.= '<td>'.$item['scoreNormalized'] .'</td>';
            $template.= '<td>'.$item['search'] .'</td>';
            $template.= '<td> <a href="'.$item['link'].'"target="_blank">Descargar</a></td>';
            $template .= '</tr>';
         }
         $template .= '
         </tbody>
         </table>
         </div>
         ';
        return $template;
    }
}


?>