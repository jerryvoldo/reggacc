<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cetak Detail</title>
</head>
<body>
	<table border="1">
		<thead>
			<tr>
				<th>No.</th>
				<th>Registration No.</th>
				<th>Name of Manufacturers</th>
				<th>Address of Manufacturers</th>
				<th>State/Province/District</th>
				<th>City</th>
				<th>Type</th>
				<th>Products for Approval</th>
				<th>HS Code</th>
				<th>Latest Date of Trade to China</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1?>
			@foreach($details as $detail )
			
			<tr>
				@if(array_key_exists('produks', $detail))
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
			@else
				<td><?=$i?></td>
				<td>{{ $detail['nomor_registrasi'] }}</td>
				<td>
					{{ strtoupper($detail['perusahaan_badan_hukum']) }} {{ $detail['perusahaan'] }}
				</td>
				<td">
					Plant : {{ $detail['alamat_jalan'] }} <br>
					{{ $detail['alamat_jalan'] }} RT {{ $detail['alamat_rt'] }} RW {{ $detail['alamat_rw'] }} Kelurahan {{ $detail['kelurahan'] }} Kecamatan {{ $detail['kecamatan'] }} 
				</td>
				<td>{{ $detail['propinsi'] }}</td>
				<td>{{ $detail['kabupaten'] }}</td>
				<td>{{ $detail['tipe'] }}</td>
				<td>2</td>
			@endif
				<td>1</td>
				<td>1</td>
				<td>1</td>
			</tr>
			<?php $i++?>
			@endforeach
		</tbody>
	</table>
	{{dd($details)}}
</body>
</html>