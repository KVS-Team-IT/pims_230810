<!DOCTYPE html>
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
                <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">HEAD QUARTER DASHBOARD</a></li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>
           
        <!-- ==================================== Chart Section Start From Here ================================-->
        <div class="row ml-1 mr-1">
            <div class="col-md-12 text-center btn btn-block bg-primary text-white" style=" line-height: 50px; font-size: 18px;">
                <?php //show($RO); 
                    echo strtoupper(str_replace("KVS HQ","KVS HQ - ",$HQ->HQ_NAME));
                ?>
            </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-xl-12 col-sm-12 mb-12">
              <div id="EmpChart" style="height:500px;"></div>
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
            if(!empty($R['NAME']) || !empty($R['INP'])){
	?>
            {
              "NAME": "<?php echo ($R['NAME'])? $R['NAME'] : '' ?>",
              "TOTAL": <?php echo ($R['INP'])? $R['INP'] : '' ?>,
              "color": "#0273A3"
            },
            <?php } } } ?>
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

