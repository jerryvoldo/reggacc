<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Detail</title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@100;300&display=swap" rel="stylesheet">

	<style type="text/css">
		

	    body {
	        font-family: 'Nunito', 'Noto Sans SC', 'DejaVu Sans', 'Verdana','Arial', sans-serif;
	    }
		.styled-table {
			    border-collapse: collapse;
			    margin: 25px 0;
			    font-size: small;
			    min-width: 400px;
			    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
			}

		.styled-table thead tr {
			    background-color:#778899;
			    color: #ffffff;
			    text-align: left;
			}

		.styled-table th,
		.styled-table td {
		    padding: 5px;
		}

		.styled-table tbody tr {
			    border-bottom: 1px solid #dddddd;
			}
		.capitalize {
			text-transform: capitalize;
		}

    
		</style>
</head>
<body>
	<center>
		<h3 class="capitalize">Indonesian  FDA_List of Recommended registration of overseas manufacturers of Imported Food_existing trade imported food listed in annex 1</h3>
	</center>
	<table class="styled-table" border="1">
		<thead>
			<tr>
				<th>序号</span><br> No.</th>
				<th>注册编号 <br>Registration No.</th>
				<th>企业名称<br>Name of Manufacturers</th>
				<th>注册地址<br>Address of Manufacturers</th>
				<th>州/省/区<br>State/Province/ District</th>
				<th>城市<br>City</th>
				<th>企业类型<br>Type</th>
				<th>企业名称<br>Products For Approval</th>
				<th>HS编码<br>HS Code</th>
				<th>最近输华贸易日期<br>Last Export Date</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1?>
			@foreach($details as $detail )
			@foreach(array_values($detail['produks']) as $a => $produk)
			<tr>
					@if($a === 0)
					<td rowspan="{{ count($detail['produks']) }}"><?=$i?></td>

					<td rowspan="{{ count($detail['produks']) }}">{{ $detail['nomor_registrasi'] }}</td>
					<td rowspan="{{ count($detail['produks']) }}">
						{{ strtoupper($detail['perusahaan_badan_hukum']) }} {{ $detail['perusahaan'] }}
					</td>
					<td rowspan="{{ count($detail['produks']) }}">
						Plant : {{ $detail['alamat_jalan'] }} <br>
						{{ $detail['alamat_jalan'] }} RT {{ $detail['alamat_rt'] }} RW {{ $detail['alamat_rw'] }} Kelurahan {{ $detail['kelurahan'] }} Kecamatan {{ $detail['kecamatan'] }} 
					</td>
					<td rowspan="{{ count($detail['produks']) }}">{{ $detail['propinsi'] }}</td>
					<td rowspan="{{ count($detail['produks']) }}">{{ $detail['kabupaten'] }}</td>
					<td rowspan="{{ count($detail['produks']) }}">{{ $detail['tipe'] }}</td>
					@endif
					<td>{{ $produk['produk_nama'] }}</td>
					<td>{{ $produk['hs_code'] }}</td>
					<td>{{ ($produk['epoch_product_last_export'] === 'no data' ? 'no data' : date('d F Y', $produk['epoch_product_last_export'])) }}</td>
			</tr>
			@endforeach
			<?php $i++?>
			@endforeach
		</tbody>
	</table>
</body>
</html>