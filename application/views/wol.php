<?php 
include('header.php');



?>
<div class="container">

  <div class="page-header">
    <h1>Wake up Computers</h1>
    <hr>
    <a href="#">Add Computer</a>
  </div>
  <div class="row">
  </div>
  <div class="row">
    <div class="col-md-8">
      <table class="table">
          <thead>
            <tr>
              <th>Device</th>
              <th>IP</th>
              <th>MAC</th>
              <th>Wake up?</th>
            </tr>
          </thead>
        <tbody>
        <?php 
		$arr_length = count($hostname);

        for($i=0; $i <$arr_length; $i++) {?>
                <tr><td><?php echo $hostname[$i]; ?></td><td><?php echo $ip[$i]; ?></td><td><?php echo $mac[$i]; ?></td><td>Yes</td></tr>
        <?php }?>
        </tbody>
      </table>
    </div>  
  </div>
</div>
</body>

<script>

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

</html>