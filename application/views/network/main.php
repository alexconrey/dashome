<?php 
$list = $this->db->query("SELECT * FROM hosts");


?>
<div class="container">
  <div class="page-header">
    <h1 class="text-center">Network Information</h1>
  </div>
<form action="http://10.0.1.3/dashome/index.php/wol/wakeup" method="post">
  <div class="row">
     <div class="col-md-8">
        <table class="table">
          <thead>
            <tr>
              <th>Host</th>
              <th>MAC</th>
              <th>IP</th>
              <th>WOL</th>
          </thead>
          <tbody id="host-table">
            <?php foreach($list->result() as $host) { ?>
              <tr>
                <td><?php echo $host->hostname; ?></td>
                <td><pre><a href="http://10.0.1.3/dashome/index.php/wol/wakeup/<?php echo $host->mac; ?>"><?php echo $host->mac; ?></pre></td>
                <td><pre><a href="ping/<?php echo $host->ip;?>"><?php echo $host->ip; ?></a></pre></td>
                <td><input type="checkbox" name="wol_list[]" value="<?php echo $host->mac; ?>"></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <input type="submit">
      </div>
  <div class="col-md-4">
  <ul>
  <li><a href="ping">Ping address</a></li>
  <li><a href="arping">Arping address</a></li>
  <li><a href="routing">Routing Table</a></li>
  <li><a href="arp">ARP</a></li>
  </ul>
  </div>
  </div> 
  
</div>
</body>