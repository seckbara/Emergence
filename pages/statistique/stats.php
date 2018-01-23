<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<?php
include_once "../../assets/class/includes/header.php";
require_once '../../vendor/autoload.php';
use Emergence\Activite;
use Emergence\FusionCharts;
$activite = (new Activite())->countActvite();
//dump($activite);
/**
 *  Step 3: Create a `columnChart` chart object using the FusionCharts PHP class constructor.
 *  Syntax for the constructor: `FusionCharts("type of * chart", "unique chart id", "width of chart",
 *  "height of chart", "div id to render the chart", "data format", "data source")`
 */
$columnChart = new FusionCharts("column2d", "ex1", "100%", 400, "chart-1", "json", '{  
                "chart":{  
                  "caption":"Statistique des activités en fonction du nombre d\'adherent",
                  "theme":"ocean",
                  "xAxisName": "Activités",
                  "yAxisName": "Nombre d\'adherent"
                },
                "data":[  
                  {  
                     "label":"'.$activite[0]->nom_activite.'",
                     "value":"'.$activite[0]->nombre_activite.'"
                  },
                  {  
                     "label":"'.$activite[1]->nom_activite.'",
                     "value":"7300"
                  },
                  {  
                     "label":"'.$activite[2]->nom_activite.'",
                     "value":"5900"
                  },
                  {  
                     "label":"'.$activite[3]->nom_activite.'",
                     "value":"5200"
                  },
                  {  
                     "label":"'.$activite[4]->nom_activite.'",
                     "value":"3300"
                  }
                ]
            }');
// Render the chart
$columnChart->render();

$pie3dChart = new FusionCharts("pie3d", "ex2", "100%", 400, "chart-2", "json", '{   "chart": {
        "caption": "Statistique des adherents par age",
        "startingangle": "120",
        "showlabels": "0",
        "showlegend": "1",
        "enablemultislicing": "0",
        "slicingdistance": "15",
        "showpercentvalues": "1",
        "showpercentintooltip": "0",
        "plottooltext": "Nombre $label sur $datavalue",
        "theme": "ocean"
    },
    "data": [
        {
            "label": "Jeune",
            "value": "1250400"
        },
        {
            "label": "Adulte",
            "value": "1463300"
        },
        {
            "label": "Moyen-age",
            "value": "1050700"
        },
        {
            "label": "Vieux",
            "value": "491000"
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

