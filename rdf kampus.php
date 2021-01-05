<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="image/Logo_Kampus.png">
	<title>Daftar Kampus RDF</title>
	<link rel="stylesheet" type="text/css" href="css/css.css">
	<script src="https://kit.fontawesome.com/826401da29.js" crossorigin="anonymous"></script>
</head>
<body>
	
	<!-- bagian header -->
	<header>
		<h1 class="judul">TUGAS BESAR SEMANTIK WEB</h1>
		<p class="deskripsi">Implementasi Semantik Web</p>
	</header>
	<!-- akhir bagian header -->
	
	<div class="wrap">
		<!-- bagian menu		 -->
		<nav class="menu">
			<ul>
				<li>
					<a href="index.php">Beranda</a>
				</li>
				<li>
					<a href="tentang.php">Tentang Kami</a>
				</li>
			</ul>
		</nav>
		<!-- akhir bagian menu -->

		<!-- bagian konten Blog -->
		<div class="blog">
			<div class="conteudo1">
				<h2 style="font-weight : 50"><center>Daftar Kampus<br/> <?php require_once("Endpoint/endpoint2.php"); ?></center></h2>	 
			</div>
		</div>
	</div>
	<a class="gotopbtn" href="#"><i class="fas fa-arrow-up"></i></a>
</body>
</html>