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

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
          
          <thead>
            
            <tr>
              
              <th class="text-center">#</th>
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
            
            

          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>

  <!--==========================
  =  Modal window for Users    =
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

                  <input type="text" class="form-control input-lg" name="newUserName" placeholder="User Name" required>

                </div>

              </div>

              <!-- TAKING USER EMAIL FOR NEW USER -->
              
              <div class="form-group">
                
                <div class="input-group">
                  
                  <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                  <input type="email" class="form-control input-lg" name="newemail" placeholder="Email" required>

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

                    <select class="form-control input-lg" name="newProfile">

                      <option value="" disabled selected>Select profile</option>
                      <option value="admin">Admin</option>
                      <option value="special">Special</option>
                      <option value="seller">Seller</option>

                    </select>

                  </div>

                </div>

                <!-- UPLOADING IMAGE -->
                <div class="form-group">

                  <div class="panel">Select image</div>

                  <input class="newPicture" type="file" name="newPicture">

                  <p class="help-block">Maximum size 2Mb</p>

                  <img class="thumbnail preview" src="views/img/users/default/anonymous.png" width="100px">

                </div>


            </div>

          </div>

          <!--=====================================
            MODAL FOOTER
          ======================================-->

          <div class="modal-footer">

            <button type="submit" class="btn btn-primary" data-dismiss="modal">Create</button>

            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

          </div>

    </form>

    </div>

  </div>

</div>