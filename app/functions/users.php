   <?php
                                    $selectu = "SELECT * FROM users ORDER BY username ASC";
                                    if($queryu = mysqli_query($dbc,$selectu))
                                    {
                                      ?>
                                      <table class="highlight">
                                        <thead>
                                            <tr>
                                                <th data-field="id">Username</th>
                                                <th data-field="id">User Level</th>
                                                <th data-field="name">DELETE</th>
                                            </tr>
                                        </thead>

                                        <?php
                                          while($rowsu = mysqli_fetch_assoc($queryu)){
                                            ?>
                                              <tbody>
                                                <tr id="<?php echo $rowsu['userId'];?>">
                                                
                                                  <td>
                                                  <?php echo $rowsu['username'].'<br/>'?>                                                 
                                                  </td>
                                                  <td>
                                                  <?php
                                                  if($_SESSION['username'] == $rowsu['username'] && $rowsu['userlevel'] == 'admin')
                                                  {
                                                   echo '<a class="waves-effect btn teal disabled">
                                                  '.$rowsu['userlevel'].'
                                                  </a>';
                                                  }
                                                  if($rowsu['userlevel'] == 'user')
                                                  {
                                                  echo '<a title="MAKE ADMIN" class="waves-effect btn teal" onclick="updateUser('.$rowsu['userId'].')">
                                                  '.$rowsu['userlevel'].'
                                                  </a>';
                                                 
                                                  }
                                                  else if($rowsu['userlevel'] == 'admin' && $_SESSION['username'] != $rowsu['username'])
                                                  {
                                                    echo '<a title="MAKE USER" class="waves-effect btn teal" onclick="updateUser1('.$rowsu['userId'].')">
                                                  '.$rowsu['userlevel'].'
                                                  </a>';
                                                  }
                                                  ?> 
                                                  
                                                  </td>
                                                  
                                                  <?php
                                                  if($_SESSION['username'] == $rowsu['username'] && $rowsu['userlevel'] == 'admin')
                                                  {
                                                    //cannot delete a signed in user who is an admin
                                                    echo '<td><a class="waves-effect red btn disabled" ">
                                                    DELETE</a></td>';
                                                  }
                                                  else
                                                  {
                                                    echo '<td><a class="waves-effect red btn" onclick="deleteUser('.$rowsu['userId'].')" id="' . $rowsu['userId'] . '">
                                                    DELETE</a></td>';
                                                  }
                                                  
                                                  ?>
                                                  
    
                                                </tr>
                                              </tbody>
                                              <?php
                                              }
                                              ?>
                                         </table>
                                    <?php
                                    }
                                    ?>