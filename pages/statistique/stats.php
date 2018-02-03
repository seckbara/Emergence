<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<?php
include_once "../../assets/class/includes/header.php";
require_once '../../vendor/autoload.php';
use Emergence\Activite;
use Emergence\FusionCharts;
use \Emergence\Functions;
use \Emergence\Abonnement;

$activite = (new Activite())->countActvite();
$activite_name = (new Activite())->AllActivite();
$activite_array = (new Abonnement())->getCount();
$nomber_adherent = Functions::getNomberActivite($activite_array);

$columnChart = new FusionCharts("column3d", "ex1", "100%", 400, "chart-1", "json", '{  
                "chart":{  
                  "caption":"Statistique des activités en fonction du nombre d\'adherent",
                  "theme":"ocean",
                  "xAxisName": "Nombre activités",
                  "yAxisName": "Nombre d\'adherent",
                  "yAxisMinValue":"0",
                  "yAxisMaxValue":"'.$nomber_adherent.'",
                  "formatnumberscale": "1",
                  "numberscalevalue": "128",
                  "showvalues": "1"
                },
                "data":[  
                  {  
                     "label":"'.$activite_name[0]->nom_activite.'",
                     "value":"'.$activite[0]->nombre_activite.'"
                  },
                  {  
                     "label":"'.$activite[1]->nom_activite.'",
                      "value":"'.$activite[1]->nombre_activite.'"
                  },
                  {  
                     "label":"'.$activite[2]->nom_activite.'",
                      "value":"'.$activite[2]->nombre_activite.'"
                  },
                  {  
                     "label":"'.$activite[3]->nom_activite.'",
                     "value":"'.$activite[3]->nombre_activite.'"
                  },
                  {  
                     "label":"'.$activite[4]->nom_activite.'",
                      "value":"'.$activite[4]->nombre_activite.'"
                  },
                  {  
                     "label":"'.$activite[5]->nom_activite.'",
                      "value":"'.$activite[5]->nombre_activite.'"
                  }
                ]
            }');
// Render the chart
$columnChart->render();

$pie3dChart = new FusionCharts("pie3d", "ex2", "100%", 400, "chart-2", "json", '{   "chart": {
        "caption": "Statistique des adherents selon leurs age",
        "startingangle": "120",
        "showlabels": "0",
        "showlegend": "1",
        "enablemultislicing": "0",
        "slicingdistance": "15",
        "showpercentvalues": "1",
        "showpercentintooltip": "0",
        "plottooltext": "Nombre $label: $datavalue",
        "theme": "ocean"
    },
    "data": [
        {  
           "label":"'.$activite_name[0]->nom_activite.'",
           "value":"'.$activite[0]->nombre_activite.'"
        },
        {  
           "label":"'.$activite[1]->nom_activite.'",
           "value":"'.$activite[1]->nombre_activite.'"
        },
        {  
           "label":"'.$activite[2]->nom_activite.'",
           "value":"'.$activite[2]->nombre_activite.'"
        },
        {  
           "label":"'.$activite[3]->nom_activite.'",
           "value":"'.$activite[3]->nombre_activite.'"
        },
        {  
           "label":"'.$activite[4]->nom_activite.'",
           "value":"'.$activite[4]->nombre_activite.'"
        },
        {  
           "label":"'.$activite[5]->nom_activite.'",
           "value":"'.$activite[5]->nombre_activite.'"
        }
    ]
}');
// Render the chart
$pie3dChart->render();
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Statistique des adherents et abonnements</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
                <li><a href="#">Adherent</a></li>
                <li class="active">Historique des adherents</li>

            </ol>
            <br>
            <div id="chart-1"><!-- Fusion Charts will render here--></div><br><br>
            <div id="chart-2"><!-- Fusion Charts will render here--></div>
        </section>
    </div>
<!-- /.content-wrapper -->

<?php include_once "../../assets/class/includes/footer.php" ?>

