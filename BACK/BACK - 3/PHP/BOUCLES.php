EXO - 1

<?php
      $a = 1;
      $b = 2;
      while ($a < 150) {
        if (($a%$b) == 0) {
          $a++;
        }
        else {
          echo $a , "\n";
          $a++;
        }
      }
    ?>


EXO - 2

<?php
      for ($a = 1; $a < 501; $a++){
        echo "Je dois faire des sauvegardes régulières de mes fichiers", "<br>";
      }
    ?>


EXO - 3

<table>
        <tr>
          <th></th>
            <?php
            $x = 0;
            while ($x <= 12) {
            ?>
                <th><?php echo $x; ?></th>
            <?php
                $x++;
            }
            ?>
        </tr>
        <?php
          $y = 0;
          while ($y <= 12) {
        ?>
            <tr>
                <td>
                    <?php echo $y; ?>
                </td>
                  <?php
                    $x = 0;
                    while ($x <= 12) {
                  ?>
                  <td>
                    <?php 
                      echo $x*$y;
                      $x++; 
                    ?>
                  </td>
                <?php
                } 
                ?>
            </tr>
        <?php
          $y++;
          }
          ?>
</table>