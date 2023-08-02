<!DOCTYPE html>
<?php //show($CVC); ?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="AIN">
        <meta name="author" content="">
        <title><?php echo $title; ?></title>
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url(); ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url(); ?>css/sb-admin.css" rel="stylesheet">
    </head>
    <div id="content-wrapper">
       
        <div class="container-fluid">
       
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>
           
            <div class="row">
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-80">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-archive"></i>
                            </div>
                            <div class="mr-0">Total No. of Sanctioned Post<br>(KVS Approval)</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size: 20px"><?php  echo ($VM->T_SAC)? ($VM->T_SAC + $VM->NT_SAC): '00' ; ?></span>
                        </a>
                    </div>
                </div>
               
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-80">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="mr-0">Total No. of Employee's <br>Registered<br></div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size: 20px"><?php  echo ($IP->T_INPOS)? ($IP->T_INPOS+$IP->NT_INPOS) : '00' ; ?></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-80">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                             <div class="mr-0">No. of Employee's Code Generated On Current Month</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size: 20px"><?php  echo ($IP->CM_INPOS)? ($IP->CM_INPOS) : '00' ; ?></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card text-white bg-secondary o-hidden h-80">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-box-open" aria-hidden="true"></i>
                            </div>
                            <div class="mr-0">Total No. of <br> Vacant Post Against Sanctioned Post</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size: 20px"><?php  echo ($VM->T_SAC && $IP->T_INPOS )? (($VM->T_SAC + $VM->NT_SAC)-($IP->T_INPOS+$IP->NT_INPOS)): '00' ; ?></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card text-white bg-info o-hidden h-80">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <div class="mr-0">No. of Contractual Employee's Against Vacancies</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size: 20px"><?php  echo ($VM->T_CON)? ($VM->T_CON + $VM->NT_CON): '00' ; ?></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-80">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            <div class="mr-0">Total No. of Employee's Relieved / Joined </div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size: 20px">
                                <?php  echo ($TR->T_ACT)? $TR->T_ACT : '00' ; ?> / <?php  echo ($TR->T_COM)? $TR->T_COM : '00' ; ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        <!-- ==================================== Chart Section Start From Here ================================-->
        <hr>
        <div class="row">
          <div class="col-xl-12 col-sm-12 mb-12">
              <div id="EmpChart" style="height:500px;"></div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-12 col-sm-12 mb-12">
              <div id="VacChart" style="min-height:1000px;"></div>
          </div>
        </div>
        </div>
    </div>
<script src="<?php echo base_url(); ?>js/graph/core.js"></script>
<script src="<?php echo base_url(); ?>js/graph/charts.js"></script>
<script src="<?php echo base_url(); ?>js/graph/material.js"></script>
<script src="<?php echo base_url(); ?>js/graph/animated.js"></script>
<!-- ==================================== CHART 1 START =================================== -->
 <?php //get_school_code_region_by_kv_code(); ?>  
<script>
am4core.ready(function() {
// Themes begin
am4core.useTheme(am4themes_animated);
// Create chart instance
var chart = am4core.create("EmpChart", am4charts.XYChart3D);
// Add data
chart.data = [
        <?php if(isset($CIP) && !empty($CIP)){
            foreach($CIP as $R){
                
                $R['LINK']= base_url().'dashboard'.$R['NAME'];
?>
            {
              "NAME": "<?php echo ($R['NAME'])? $R['NAME'] : '' ?>",
              "TOTAL": <?php echo ($R['INP'])? $R['INP'] : '' ?>,
              "color": "#0273A3",
              "LINK" : "<?php echo ($R['LINK'])? $R['LINK']: '' ?>"
            },
<?php } } ?>
        ];

var title = chart.titles.create();
title.text = "TOTAL NO. OF EMPLOYEE REGISTERED";
title.fontSize = 14;
title.marginBottom = 20;
title.fontWeight = "bold";
title.fill = am4core.color("#026877");
// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "NAME";
categoryAxis.renderer.labels.template.rotation = -20;
categoryAxis.renderer.labels.template.hideOversized = false;
//categoryAxis.renderer.labels.template.propertyFields.url = "LINK";
//categoryAxis.renderer.labels.template.urlTarget = "_blank";
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.tooltip.label.rotation = 270;
categoryAxis.tooltip.label.horizontalCenter = "right";
categoryAxis.tooltip.label.verticalCenter = "middle";

var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
//valueAxis.title.text = "No. of Employee Registered";
//valueAxis.title.fontWeight = "bold";

// Create series
var series = chart.series.push(new am4charts.ColumnSeries3D());
series.dataFields.valueY = "TOTAL";
series.dataFields.categoryX = "NAME";
series.name = "TOTAL";
series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
series.columns.template.fillOpacity = .8;
series.columns.template.propertyFields.fill = "color";

var columnTemplate = series.columns.template;
columnTemplate.strokeWidth = 2;
columnTemplate.strokeOpacity = 1;
columnTemplate.stroke = am4core.color("#FFFFFF");

chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.strokeOpacity = 0;
chart.cursor.lineY.strokeOpacity = 0;
// Enable export
//chart.exporting.menu = new am4core.ExportMenu();
}); // end am4core.ready()
</script>
<!-- ==================================== CHART 1 END =================================== -->
<!-- ==================================== CHART 2 START =================================== -->
<script>
am4core.ready(function() {
// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
function am4themes_animated(target) {
  if (target instanceof am4core.ColorSet) {
    target.list = [
      am4core.color("#28A745"),
      am4core.color("#6C757D"),
      am4core.color("#EE7027")
    ];
  }
}
// Create chart instance
var chart = am4core.create("VacChart", am4charts.XYChart);
chart.data = [
        <?php if(isset($CVC) && !empty($CVC)){
           
            foreach($CVC as $V){
                $V['LINK']= base_url().'dashboard'.'/'.$V['RID'].'/'.$V['UID'].'/'.$V['MAC'].'/'.$V['REG'].'/'.$V['KID'];
            ?>
            {
                "DESIG": "<?php echo ($V['NAME'])? $V['NAME'] : '' ?>",
              //"SAC"  : <?php //echo ($V['SAC']>0)? '' : '' ?>,
                "POS"  : <?php echo ($V['INP']>0)? $V['INP'] : 0 ?>,
                "VAC"  : <?php echo (($V['SAC']-$V['INP'])>0)? $V['SAC']-$V['INP'] : 0 ?>,
                "NONE" : 0,
                "VLINK" : "<?php echo ($V['LINK'])? $V['LINK']: '' ?>",
            },
             
<?php } } ?>
        ];
//Vertical Scroll Bar
chart.scrollbarY = new am4core.Scrollbar();
chart.scrollbarY.parent = chart.rightAxesContainer;
//Horizontal Scroll Bar
chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarX.parent = chart.bottomAxesContainer;
//Responsive
//chart.responsive.enabled = true;
chart.responsive.rules.push({
    relevant: function(target) {
        return false;
    },
    state: function(target, stateId) {
        return;
    }
});
//Legend
chart.legend = new am4charts.Legend();
chart.legend.position = "top";
chart.legend.dy = "50";
//Title
var title = chart.titles.create();
title.html = "<?php echo 'STATUS OF SANCTIONED / IN-POSITION / VACANT POST' ; ?>";
title.fontSize = 14;
title.marginBottom = 20;
title.fontWeight = "bold";
title.fill = am4core.color("#026877");
// Create axes
var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "DESIG";
categoryAxis.renderer.minGridDistance = 20;
categoryAxis.renderer.grid.template.location = 0;
categoryAxis.renderer.labels.template.rotation = 0;
categoryAxis.renderer.labels.template.verticalCenter = "middle";
categoryAxis.renderer.labels.template.horizontalCenter = "right";
categoryAxis.renderer.labels.template.propertyFields.url = "VLINK";
categoryAxis.renderer.labels.template.urlTarget = "_blank";
categoryAxis.renderer.labels.template.fill = am4core.color("#014A69");
var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = false;
valueAxis.renderer.hideOversized = false;
valueAxis.min = 0.1;
valueAxis.extraMax = 0.1;
valueAxis.calculateTotals = true;

// Create series
function createSeries(field, name) {
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.name = name;
  series.dataFields.valueX = field;
  series.dataFields.categoryY = "DESIG";
  series.stacked = true;
   // Configure columns
  series.columns.template.width = am4core.percent(60);
  series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryY}: {valueX}";
 
  var labelBullet = series.bullets.push(new am4charts.LabelBullet());
  labelBullet.locationX = 0.5;
 
  labelBullet.label.text = "{valueX}";
  labelBullet.label.fill = am4core.color("#fff");
}

createSeries("POS", "In-Position Post");
createSeries("VAC", "Vacant Post");
createSeries("SAC", "Sanctioned Post");
// Create series for total
var totalSeries = chart.series.push(new am4charts.ColumnSeries());
totalSeries.dataFields.valueX = "NONE";
totalSeries.dataFields.categoryY = "DESIG";
totalSeries.stacked = true;
totalSeries.hiddenInLegend = true;
totalSeries.columns.template.strokeOpacity = 0;

// Configure columns


var totalBullet = totalSeries.bullets.push(new am4charts.LabelBullet());
totalBullet.interactionsEnabled = true;
totalBullet.label.truncate = false;
totalBullet.label.dx = 40;
totalBullet.label.text = "{valueX.total}";
totalBullet.label.hideOversized = false;
totalBullet.label.fontSize = 12;
totalBullet.label.background.fill = "#F60";
totalBullet.label.fill = am4core.color("#FFF");
totalBullet.label.padding(3, 5, 3, 5);
totalBullet.label.tooltipText = "[bold]SANCTIONED POST[/]\n[font-size:14px;]{categoryY}: {valueX.total}";

}); // end am4core.ready()


</script>