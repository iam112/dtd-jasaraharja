<p class="pull-right">
    <button id="printChart" title="Cetak Grafik" class="btn btn-success btn-md">
        <i class="fa fa-print"></i> Cetak Grafik
    </button>
</p>

<div id="chartContainer" style="height: 275px; width: 100%;"></div>
  <button id="printChart">Print Chart</button>

<script type="text/javascript">
window.onload = function () {
	var chart = new CanvasJS.Chart("chartContainer", {
		theme: "light2",
		title:{
			text: "Print Chart using print() method"              
		},
		data: [              
		{
			type: "column",
			dataPoints: [
				{ label: "apple",  y: 10  },
				{ label: "orange", y: 15  },
				{ label: "banana", y: 25  },
				{ label: "mango",  y: 30  },
				{ label: "grape",  y: 28  }
			]
		}
		]
	});
  
	chart.render();
  	document.getElementById("printChart").addEventListener("click",function(){
    	chart.print();
    });  	
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>