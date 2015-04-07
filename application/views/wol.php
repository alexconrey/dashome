
<div class="container">

  <div class="page-header">
    <h1>Wake up Computers</h1>
    <hr>
<!--<a href="#" id="addScnt">Add Device</a>-->
<a href="#" id="addHost">Add Device</a>

<div id="p_scents">
    <p>
        <!--<label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt" value="" placeholder="Input Value" /></label>-->
    </p>
</div>

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
$(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        $('#addHost').click(function() {
            $(scntDiv).show("slow", function() {
              //complete
            });
        });
        $('#addScnt').live('click', function() {
                $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt_' + i +'" value="" placeholder="Input Value" /></label> <a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

</html>