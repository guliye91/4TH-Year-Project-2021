<?php
      $slxas = "SELECT SUM(totalAmount) AS sa FROM stock";
      if($queryxas = mysqli_query($dbc,$slxas))
      {
        $rowxas = mysqli_fetch_assoc($queryxas);
        //echo 'Total Stock Value : ' .$rowxas['sa'] . '<b> KES</b>';
        ?>
        <form id="printStockform">
                    Total Stock Value :    <button class="btn waves-effect waves-light grey" type="submit" name="printStock" id="printStock"
                        ><?php echo $rowxas['sa']?> KES
                        <i class="material-icons right">print</i>
                        </button>
                    </form>
        <?php
        
      }
      $slxs = "SELECT * FROM stock ORDER BY stockName ASC";
      if($queryxs = mysqli_query($dbc,$slxs))
      {?>
         <table class="table">
                                                    <thead class="text-primary">
                                            <th>Stock Name</th>
                                            <th>Stock Quantity</th>
                                            <th>Item Amount</th>
                                            <th>Total Amount</th>
                                        </thead>

      <?php
        while($rowxs = mysqli_fetch_array($queryxs))
        {?>
         <tbody>
          <tr>
            <td><?php echo $rowxs['stockName'];?></td>
            <td><?php echo $rowxs['stockQuantity'];?></td>
            <td><?php echo $rowxs['stockAmount'];?></td>
            <td><?php echo $rowxs['totalAmount'];?></td>
            <td><?php echo $rowxs['date'];?></td>
          </tr>
        </tbody>
          
          <?php
        }?>
         </table>
    </div>
         <?php
      }
      
      ?>
