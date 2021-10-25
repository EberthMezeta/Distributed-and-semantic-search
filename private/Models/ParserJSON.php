<?php 
class ParserJSON
{
    public function parser_JSON_To_HTML($Array)
    {
        $template = '<table border="1">';
        $template .= '<thead>
        <tr>
          <th>Titulo</th>
          <th>Valor original</th>
          <th>Valor normalizado</th>
          <th>Buscador</th>
          <th>Enlace de descarga</th>
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
         </table>';
        return $template;
    }
}


?>