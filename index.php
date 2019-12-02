<?php
require_once('inc/common.php');
include header.php;
?>
        <h1>Welcome To Our Flash Card App!</h1>
    <!--
        The student flashcard divs
    -->
        <div id="flashcard-front">
			<img src="" width="50" height="50" alt="FRONT: Student Picture" />
		</div>
		<div id="flashcard-back">
			<h2 id="name">BACK: Student name fetched from db goes here.</h2>
		</div>
		<button id="flip" onclick="flipCard()">Flip</button>
		<script type="text/javascript">
			var front = document.getElementById('flashcard-front');
			var back = document.getElementById('flashcard-back');
			front.style.display = 'block';
			back.style.display = 'none';
			function flipCard() {
				if(front.style.display == 'block'){
					front.style.display = 'none';
					back.style.display = 'block';
				}
				else{
					front.style.display = 'block';
					back.style.display = 'none';
				}
			}
		</script>
		
		<div class="row">
  <div class="column">
    <img src="welcome.jpg" alt="welcome" style="width:20%"><br>
  </div>
</div>
