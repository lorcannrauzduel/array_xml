<?php

$xml = simplexml_load_file('array.xml');
function xsort(&$nodes, $child_name, $order=SORT_ASC)
{
    $sort_proxy = array();

    foreach ($nodes as $k => $node) {
        $sort_proxy[$k] = (string) $node->$child_name;
    }

    array_multisort($sort_proxy, $order, $nodes);
}
$nodes = $xml->xpath('/Formations/Formation/Session');
xsort($nodes, 'StartDate', SORT_ASC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Test-Technique</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Test Technique</h1>

        <p>Liste des formations disponibles</p>
        
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Description</th>
      <th scope="col">Date d'entrée</th>
      <th scope="col">Date de fin</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1; foreach ($nodes as $key): ?>
    <tr>
      <th scope="row"><?= $i++ ?></th>
      <td width="20%"><?= $key->Nom ?></td>
      <td width="50%"><?= $key->Description ?></td>
      <td><?= date_format(date_create($key->StartDate),"d/m/Y") ?></td>
      <td><?= date_format(date_create($key->EndDate),"d/m/Y") ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

    </div>
</body>
</html>