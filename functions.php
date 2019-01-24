<?php
$xml = simplexml_load_file('array.xml');
 // Fonction pour trier un tableau multidimensionnel
function xsort(&$nodes, $child_name, $order=SORT_ASC)
{
    $sort_proxy = array();

    foreach ($nodes as $k => $node) {
        $sort_proxy[$k] = (string) $node->$child_name;
    }

    array_multisort($sort_proxy, $order, $nodes);
}
 // Localiser les données
$sessions = $xml->xpath('/Formations/Formation/Session');
 // Trie par ordre croissant
xsort($sessions, 'StartDate', SORT_ASC);
?>