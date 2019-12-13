<?php
require_once('inc/common.php');
require_once('inc/Dao.php');
print_header();
require_once('header.php');
?>
<h1>Take the quiz!</h1>
<!--
    The student flashcard divs
-->

<?php

    $dao = new Dao();

    $result = $dao->fetch_students(1);

    for($i=0; $i<count($result); $i++){
        ?>
        <div class="flip-card" style="float: left;">
            <div class="flip-card-inner">
                <?php
                echo "<div id=\"flashcard-front$key\" class='flip-card-front'>";
                echo "<img width='300' height='300' src=\"data:image/jpeg;base64,".$result[$i]['img']."\"/>";
                echo "</div>";
                echo "<div id=\"flashcard-back$key\" class='flip-card-back'>";
                echo "<h1 id=\"name\">".$result[$i]['student_name']."</h1>";
                ?>
            </div>
        </div>
        </div>
        <?php
    }
?>

<script type="text/javascript">
    function flipCard(id) {
        var front = document.getElementById('flashcard-front'+id);
        var back = document.getElementById('flashcard-back'+id);
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
</body>
</html>

