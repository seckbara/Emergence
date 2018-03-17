<?php

header('Location: pages/profile/profile.php');



    $i = 0;
    foreach ($_SESSION['dossier']->_operations AS $operation)
    {
        // dump($_SESSION['dossier']->_operations);
        //dump($operation);
        $color = "";
        foreach ($operation->_raisonsIncompletude AS $raisonIncompletude)
        {
            if ($raisonIncompletude->invalide == "Oui")
                $color = "colorRed";
            else if ($color == "")
                $color = "colorOrange";
        }
        $html .= '
						<tr>
							<td>'.$operation->_operation->_versionOperation->reference.' (v'.$operation->_operation->_versionOperation->version.')</td>
							<td class="'.$color.'">'.$_SESSION['dossier']->reference_format("enrcert", $operation).'</td>
							<td>
								<label>Basique</label>
								&nbsp;&nbsp;'.(($operation->economie_basique != "")?number_format($operation->economie_basique, 0, ',', ' '):"").'<br>
		';
        if ($operation->economie_precaire != "")
        {
            $html .= 			'<label>Précaire</label>
								&nbsp;&nbsp;'.number_format($operation->economie_precaire, 0, ',', ' ').'<br>';
        }
        if ($operation->economie_tres_precaire != "")
        {
            $html .= 			'<label>Très précaire</label>
								&nbsp;&nbsp;'.number_format($operation->economie_tres_precaire, 0, ',', ' ').'<br>';
        }
        if ($operation->economie_precaire != "")
        {
            $html .= 			'<label>Total</label>
								&nbsp;&nbsp;'.number_format($operation->economie_basique + $operation->economie_precaire + $operation->economie_tres_precaire, 0, ',', ' ').'<br>';
        }
        $html .= '
							</td>
                            <td>
                                <label>Prime Basique</label>&nbsp;&nbsp;'.$operation->prime_basique.'<br>';
        if ($operation->economie_precaire != "")
        {
            $html .='<label>Prime Précaire</label>&nbsp;&nbsp;'.$operation->prime_precaire.'<br>';
        }
        if ($operation->economie_tres_precaire != "")
        {
            $html .= '<label>Prime Très Précaire</label>&nbsp;&nbsp;'.$operation->prime_tres_precaire.'<br>';
        }

        if ($operation->economie_tres_precaire != "")
        {
            $html .= '<label>Total</label>&nbsp;&nbsp;'.number_format($operation->prime_basique + $operation->prime_precaire + $operation->prime_tres_precaire, 0, ',', ' ').'<br>';
        }


        $html .= '               
                  
							</td>
							<td>'.$operation->prix.'</td>
							<td class="centerMiddle">
								<button type="button" class="btn btn-info btn-xs" title="Modifier" onclick="modifierOperation('.$i.')"><i class="fa fa-pencil-square-o "></i></button>
								<!--<button type="button" class="btn btn-default btn-xs" title="Dupliquer" onclick="dupliquerOperation('.$i.')"><i class="fa fa-files-o "></i></button>-->
								<button type="button" class="btn btn-danger btn-xs" title="Supprimer" onclick="supprimerOperation('.$i.','.$operation->id.')"><i class="fa fa-trash-o "></i></button>
							</td>
						</tr>';
        $i++;
    }
