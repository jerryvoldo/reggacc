<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Detail</title>



</head>
<body>
	<center>
		<h4>Indonesian  FDA_List of Recommended registration of overseas manufacturers of Imported Food_existing trade imported food listed in annex 1</h4>
	</center>
	<div>
	<table border="1" >
		<thead>
			<tr>
				<th>序号<br> No.</th>
				<th>注册编号 <br>Registration No.</th>
				<th>企业名称<br>Name of Manufacturers</th>
				<th>注册地址<br>Address of Manufacturers</th>
				<th>州/省/区<br>State/ Province/ District</th>
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
			@foreach($detail as $det)
				@foreach(array_values($det['produks']) as $a => $produk)
				<tr>
						@if($a === 0)
						<td rowspan="{{ count($det['produks']) }}"><?=$i?></td>

						<td rowspan="{{ count($det['produks']) }}">{{ $det['nomor_registrasi'] }}</td>
						<td rowspan="{{ count($det['produks']) }}">
							{{ strtoupper($det['perusahaan_badan_hukum']) }} {{ $det['perusahaan'] }}
						</td>
						<td rowspan="{{ count($det['produks']) }}">
							Plant : {{ $det['alamat_jalan'] }} <br>
							{{ $det['alamat_jalan'] }} RT {{ $det['alamat_rt'] }} RW {{ $det['alamat_rw'] }} Kelurahan {{ $det['kelurahan'] }} Kecamatan {{ $det['kecamatan'] }} 
						</td>
						<td rowspan="{{ count($det['produks']) }}">{{ $det['propinsi'] }}</td>
						<td rowspan="{{ count($det['produks']) }}">{{ $det['kabupaten'] }}</td>
						<td rowspan="{{ count($det['produks']) }}">{{ $det['tipe'] }}</td>
						@endif
						<td>{{ $produk['produk_nama'] }}</td>
						<td>{{ $produk['hs_code'] }}</td>
						<td>{{ ($produk['epoch_product_last_export'] === 'no data' ? 'no data' : date('d F Y', $produk['epoch_product_last_export'])) }}</td>
				</tr>
				@endforeach
			@endforeach
			<?php $i++?>
			@endforeach
		</tbody>
	</table>
	</div>
</body>
</html>