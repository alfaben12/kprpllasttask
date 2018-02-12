<head>
	<style type="text/css">
		* {
			box-sizing:border-box;
		}
		.clearfix:after {
		    content: "";
		    display: table;
		    clear: both;
		}
		.divide1{
			float: left;
			width:50%;
			padding-right: 10px;
		}
		.divide2{
			float: left;
			width:50%;
			padding-left: 10px;
		}

		@media screen and (max-width: 900px){
			.divide1{
				float: none;
				width:100%;
				padding:0 0 10px 0;
			}
			.divide2{
				float: none;
				width:100%;
				padding: 0 0 10px 0;
			}	
		}	
	</style>
</head>
<body>
		<div class="row" style="margin-top: 20px;">
		<div class="col-md-12">
			<!-- TABLE STRIPED -->
			<div class="panel">
				<div class="panel-heading">
					<h1><i class="lnr lnr-linearicons"></i> Report</h1>
				</div>
				<div class="panel-body">
					<div class="divide1">
						<a class="btn btn-primary btn-lg col-md-12" style="width: 100%;" href="<?= base_url('reports/report_penjualan'); ?>">Penjualan</a>
					</div>
					<div class="divide2">
						<a class="btn btn-primary btn-lg col-md-12" style="width: 100%;" href="<?= base_url('reports/report_pembelian'); ?>">Pembelian</a>
					</div>
				</div>
			</div>
			<!-- END TABLE STRIPED -->
		</div>
	</div>

	
</body>
