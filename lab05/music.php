<!DOCTYPE html>
<html lang="en">
	<!-- 1. sprintf 함수를 이용하여 0을 나타대도 되는지??
	    2. get param 의 default값을 if 문을 이용하여 해도 되는지?
			3. download 하는법 모르겠다.
			4. ex6 주석처리하라고 한 이유
 -->
	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<!-- Ex 1: Number of Songs (Variables) -->
		<h1>My Music Page</h1>
		<?php
			$song_count = 5678;
			$song_time = (int)($song_count / 10);
		?>
		<p>
			I love music.
			I have <?= $song_count ?> total songs,
			which is over  <?= $song_time ?> hours of music!
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<div class="section">
			<h2>Billboard News</h2>

			<ol>
			<?php
				$news_pages = $_GET["newspages"];
				if($_GET["newspages"] == "") $news_pages = 5; // default value

				for ($i = 0; $i < $news_pages; $i++) {
			?>
			<li><a href="https://www.billboard.com/archive/article/2019<?= sprintf('%02d',11 - $i) ?>"> 2019-<?= sprintf('%02d',11 - $i) ?> </a></li>
			<?php	}	?>
			</ol>

		</div>
		<!-- Ex 3: Query Variable -->
		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->

		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
			<?php
				foreach (file("favorite.txt") as $name) {
					$tokens = explode("<br>", $name);
					$exp  = explode(" ", $tokens[0]);
					$imp = implode("_", $exp);
	  	?>
			<li><a href="http://en.wikipedia.org/wiki/<?= $imp ?>"><?= $tokens[0] ?></a></li>
	  	<?php }	?>
			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			<?php
				$listitems = array();
				$listcount = 0;
				foreach (glob("lab5\musicPHP\songs\*.mp3") as $filename) {
					$listitems[$listcount++] = $filename;
				}
				rsort($listitems);
			?>
			<ul id="musiclist">
					<?php
						foreach ($listitems as $sortfilename) {
						$size = filesize($sortfilename);
					?>
					<li class="mp3item">
							<a href="lab5/musicPHP/songs/<?= basename($sortfilename) ?>"><?= basename($sortfilename) ?></a>
							(<?=(int)($size / 1000)?>KB)
					</li>
					<?php }	?>


			<!--
			<ul id="musiclist">
				<li class="mp3item">
					<a href="lab5/musicPHP/songs/paradise-city.mp3">paradise-city.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/basket-case.mp3">basket-case.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li>
			</ul>
			-->

				<!-- Exercise 8: Playlists (Files) -->
			<?php
				$playlistitems = array();
				$playlistcount = 0;
				foreach (glob("lab5\musicPHP\songs\*.m3u") as $playlistfile) {
					$playlistitems[$playlistcount++] = $playlistfile;
				}
				rsort($playlistitems);
			?>

			<?php foreach ($playlistitems as $sortplaylistfile) { ?>

			<li class="playlistitem"><?= basename($sortplaylistfile) ?>:
				<ul>

			<?php
				$sortlistitems = array();
				$sortlistcount = 0;
				foreach (file("$sortplaylistfile") as $playlist) {
					if (!strpos("$playlist","EXT")){
						$sortlistitems[$sortlistcount++] = $playlist;
					}else {
						continue;
					}
				}
				shuffle($sortlistitems)
			?>

			<?php foreach ($sortlistitems as $poslist) { ?>

				<li><?= $poslist ?></li>

			<?php } ?>
				</ul>
			</li>
			<?php } ?>


		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
