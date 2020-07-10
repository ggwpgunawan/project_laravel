<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Laravel Sistem Template Blade Laravel</title>
</head>
<body>
 
	<header>
 
		<h2>Halaman Latihan Project Laravel</h2>
		<nav>
			<a href="/web">HOME</a>
			|
			<a href="/web/tentang">TENTANG</a>
			|
			<a href="/web/kontak">KONTAK</a>
		</nav>
	</header>
	<hr/>
	<br/>
	<br/>
 
	<!-- bagian judul halaman blog -->
	<h3> @yield('judul_halaman') </h3>
 
 
	<!-- bagian konten blog -->
	@yield('konten')
 
 
	<br/>
	<br/>
	<hr/>
	<footer>
		<p>&copy; <a href="">Justshoes.com</a>. 2020</p>
	</footer>
 
</body>
</html>