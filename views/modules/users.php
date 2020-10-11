<?php

if($_SESSION["role"] == "seller" || $_SESSION["role"] == "special"){

  echo '<script>

    window.location = "home";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      User Management
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>
      
      <li class="active">User Management</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddUser">
          
          Add New User

        </button>

      </div>

      <div class="box-body">

        <!--==========================
          =  Table for  Users    =
          ===========================-->

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
          
          <thead>
            
            <tr>
              
              <th class="text-center" style="width:10px">#</th>
              <th class="text-center">Name</th>
              <th class="text-center">User Name</th>
              <th class="text-center">Email</th>
              <th class="text-center">Picture</th>
              <th class="text-center">Role</th>
              <th class="text-center">State</th>
              <th class="text-center">Login Time</th>
              <th class="text-center">Action</th>

            </tr>

          </thead>

          <tbody>
            <?php

              $item = null; 
              $value = null;

              $users = ControllerUsers::ctrShowUsers($item, $value);

              // var_dump($users);

              foreach ($users as $key => $value) {

                echo '

                  <tr>
                    <td>'.$value["id"].'</td>
                    <td>'.$value["name"].'</td>
                    <td>'.$value["userName"].'</td>
                    <td>'.$value["email"].'</td>';


                    if ($value["photo"] != ""){

                      echo '<td><img src="'.$value["photo"].'" class="img-thumbnail" width="40px"></td>';

                    }else{

                      echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                    
                    }

                    echo '<td>'.$value["role"].'</td>';

                    if($value["status"] != 0){

                      echo '<td><button class="btn btn-success btnActivate btn-xs" userId="'.$value["id"].'" userStatus="0">Activated</button></td>';

                    }else{

                      echo '<td><button class="btn btn-danger btnActivate btn-xs" userId="'.$value["id"].'" userStatus="1">Deactivated</button></td>';
                    }
                    
                    echo '<td>'.$value["lastLogin"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditUser" idUser="'.$value["id"].'" data-toggle="modal" data-target="#editUser"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnDeleteUser" userId="'.$value["id"].'" username="'.$value["userName"].'" userPhoto="'.$value["photo"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
              }

            ?>
            

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

  <!--==========================
  =  Modal window for Add Users    =
  ===========================-->

<!-- Modal -->
<div id="modalAddUser" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
            MODAL HEADER
        ======================================-->  

          <div class="modal-header" style="background: #3c8dbc; color: white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Registration Form</h4>

          </div>

          

          <!--=====================================
            MODAL BODY
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- TAKING NAME FOR NEW USER -->
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="newName" placeholder="Name" required>

                </div>

              </div>

              <!-- TAKING USER NAME FOR NEW USER -->
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="text" class="form-control input-lg" name="newUserName" placeholder="User Name" id="newUserName" required>

                </div>

              </div>

              <!-- TAKING USER EMAIL FOR NEW USER -->
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                  <input type="email" class="form-control input-lg" name="newemail" placeholder="Email" id="newemail" required>

                </div>

              </div>

              <!-- TAKING PASSWORD FOR NEW USER -->
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                  <input type="passsword" class="form-control input-lg" name="newPassword" placeholder="Password" required>

                </div>

              </div>

              <!-- SELECTING ROLE FOR NEW USER -->
              
              <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control input-lg" name="newRole">

                      <option value="" disabled selected>Select profile</option>
                      <option value="admin">Admin</option>
                      <option value="special">Special</option>
                      <option value="saller">Saller</option>

                    </select>

                  </div>

                </div>

                <!-- UPLOADING IMAGE -->
                <div class="form-group">

                  <div class="panel">Select image</div>

                  <input class="newPhoto" type="file" name="newPhoto">

                  <p class="help-block">Maximum size 2Mb</p>

                  <img class="thumbnail preview" src="views/img/users/default/anonymous.png" width="100px">

                </div>

            </div>

          </div>

          <!--=====================================
            MODAL FOOTER
          ======================================-->

          <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Create</button>

            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

          </div>

          <?php

            $createUser = new ControllerUsers();
            $createUser -> ctrCreateUser();
            
          ?>

    </form>

    </div>

  </div>

</div>

<!--====  End of module add user  ====-->

<!--=====================================
=            module edit user            =
======================================-->

<!-- Modal -->
<div id="editUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit user</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input name -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" id="EditName" name="EditName" placeholder="Edit name" required>

              </div>

            </div>

            <!-- input username -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" id="EditUserName" name="EditUserName" placeholder="Edit username" readonly>

              </div>

            </div>

            <!-- input email -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                <input class="form-control input-lg" type="email" id="Editemail" name="Editemail" placeholder="Edit email" required>

              </div>

            </div>

            <!-- input password -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="password" name="EditPasswd" placeholder="Add new password">

                <input type="hidden" name="currentPasswd" id="currentPasswd">

              </div>

            </div>

            <!-- input role -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="EditRole">

                  <option value="" id="EditRole"></option>
                  <option value="admin">Admin</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>

                </select>

              </div>

            </div>

            <!-- Uploading image -->
            <div class="form-group">

              <div class="panel">Upload image</div>

              <input class="newPics" type="file" name="editPhoto">

              <p class="help-block">Maximum size 2Mb</p>

              <img class="thumbnail preview" src="views/img/users/default/anonymous.png" alt="" width="100px">

              <input type="hidden" name="currentPicture" id="currentPicture">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="submit" class="btn btn-primary">Edit User</button>

          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          
        </div>

          <?php
            $editUser = new ControllerUsers();
            $editUser -> ctrEditUser();
          ?>

      </form>

    </div>

  </div>

</div>

<?php

  $deleteUser = new ControllerUsers();
  $deleteUser -> ctrDeleteUser();

?>