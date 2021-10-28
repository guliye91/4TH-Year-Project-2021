<?php
// comparing the different hashes
$API1 =password_hash('123456', PASSWORD_DEFAULT, ['cost' => 12]);
$API2 =password_hash('123456', PASSWORD_DEFAULT, ['cost' => 12]);
$API3 =password_hash('123456', PASSWORD_DEFAULT, ['cost' => 12]);


$MD51 = md5('123456');
$MD52 = md5('123456');
$MD53 = md5('123456');

$SHA11 = sha1('123456');
$SHA12 = sha1('123456');
$SHA13 = sha1('123456');

?>

<table class="bordered">
        <thead>
          <tr>
              <th data-field="id">NATIVE</th>
              <th data-field="name">MD5</th>
              <th data-field="price">SHA1</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
                <?php
                echo
                '<p><b>1.)</b>'.$API1.'</p>'.
                '<p><b>2.)</b>'.$API2.'</p>'.
                '<p><b>3.)</b>'.$API3.'</p>'
                ; ?> 
            </td>
            <td>
                 <?php
        echo
        '<p><b>1.)</b>'.$MD51.'</p>'.
        '<p><b>2.)</b>'.$MD52.'</p>'.
        '<p><b>3.)</b>'.$MD53.'</p>'
        ; ?>
                
            </td>
            <td>
                 <?php 
        echo
        '<p><b>1.)</b>'.$SHA11.'</p>'.
        '<p><b>2.)</b>'.$SHA12.'</p>'.
        '<p><b>3.)</b>'.$SHA13.'</p>'
        ?>
            </td>
          </tr>
        </tbody>
      </table>