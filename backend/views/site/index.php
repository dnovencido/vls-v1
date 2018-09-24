<?php
use kartik\nav\NavX;
/* @var $this yii\web\View */

$this->title = 'Dashboard';
$this->params['breadcrumbs'][]= $this->title;
?>

<div class="site-index">
	<div class="row">
		<div class="col-sm-12">
			<?=
			\dosamigos\highcharts\HighCharts::widget([
			    'clientOptions' => [
			        'chart' => [
			                'type' => 'line'
			        ],
			        'title' => [
			             'text' => 'Number of visitors per week'
			             ],
			        'yAxis' => [
			            'title' => [
			                'text' => 'Total'
			            ]
			        ],
				    "xAxis" => [
				        "categories" => [
				            'Monday',
				            'Tuesday',
				            'Wednesday',
				            'Thursday',
				            'Friday',
				            'Saturday',
				            'Sunday'
				        ],	
				    ],

				    'series' => [
				    [
				        'name' => 'Visitors',
				        'data' => [5, 7, 10, 15, 25, 30, 40,]
				    ],

					]
			    ]
			]);

			?>  
		</div>
	</div>  
</div>
