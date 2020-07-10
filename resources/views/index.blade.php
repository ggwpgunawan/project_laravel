<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
</head>
<body>
 
	<h2>www.malasngoding.com</h2>
	<h3>Data Pegawai</h3>
 
	<a href="/unit/tambah"> + Tambah unit Baru</a>
	
	<br/>
	<br/>
 
	<table border="1">
		<tr>

            <th>id</th>
			<th>Code</th>
			<th>Name</th>
		
		</tr>
		@foreach($unit as $u)
		<tr>
            <td>{{ $u->id }}</td>    
			<td>{{ $u->Code }}</td>
			<td>{{ $u->Name }}</td>
	
			<td>
				<a href="/unit/edit/{{ $u->id }}">Edit</a>
				|
				<a href="/unit/hapus/{{ $u->id }}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</table>
 
 
</body>
</html>