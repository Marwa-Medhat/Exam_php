<div class="container mt-sm-5 my-1">
    <form method="post" action="index.php">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <?php
           $question=$current_question->get_question();
          echo "<div class='py-2 h5'><b>$question </b></div>";
          echo "<input type='hidden' name='question' value='$question' />"
        ?>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                <?php
              $answer="";
                foreach($current_question->get_options() as $option) {
                    echo "<input type='radio' name='answer' value='$option'>$option</option><br>";
                }
                 
                 
                ?>
        </div>
       
    </div>
	
    <div class="d-flex align-items-center pt-3">
  
        <input type="submit" name="submit" value="Previous" class="ml-auto mr-sm-5 btn btn-primary" >
        <input type="submit" name="submit" value="Next" class="ml-auto mr-sm-5 btn btn-success" >
        
    </div>
</form>
</div>
<script>


</script>