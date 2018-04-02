<?php
    session_start();
    error_reporting(0);
    require_once '../../../vendor/autoload.php';

    use Emergence\Versement;

    if (isset($_POST) && $_POST['action'] == "supprimer") {
        unset($_SESSION['versement'][$_POST['id']]);
    }

    $i = max(array_keys($_SESSION['versement']));;
    if ($_POST['data']['action'] == "ajouter") {
        $i++;
        $_SESSION['versement'][$i]["montant"] = $_POST['data']['montant'];
        $_SESSION['versement'][$i]["date"] = $_POST['data']['date'];
        $_SESSION['versement'][$i]["commentaire"] = $_POST['data']['commentaire'];
        $_SESSION['versement'][$i]["index"] = $i;
    }

    $html = "";

    foreach ($_SESSION['versement'] as $t) {
        $d = $_SESSION['versement'][$i]["index"];
        $p = $t[$i]["montant"];
        $html .= '
                            <tr>
                              <th>'.$t["montant"].' &euro;</th>
                              <th>'.$t["date"].'</th>
                              <th>'.$t["commentaire"].'</th>
                              <th>
                                  <button type="button" name="modifier" value='.$i.' id="modifier" class="btn btn-info btn-xs" onclick=""><i class="fa fa-edit"></i>
                                  <button type="button" name="supprimer" id="supprimer" class="btn btn-danger btn-xs" onclick="supprimerVer('.$t["index"].')"><i class="fa fa-trash-o"></i>
                              </th>
                            </tr>';
        $i++;
    }


    echo $html;
