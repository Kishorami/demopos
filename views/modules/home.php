<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Dashboard
      
      <small>Control panel</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="row">
      
      <?php

        if($_SESSION["role"] =="admin"){

          include "home/top-boxes.php";

        }

      ?>
    
    </div>
    
    <div class="row">

      <div class="col-lg-12">

      <?php

        if($_SESSION["role"] =="admin"){

          include "reports/sales-graph.php";

        }

      ?>
      
      </div>

      <div class="col-lg-6">
        
        <?php

          if($_SESSION["role"] =="admin"){

            include "reports/bestseller-products.php";

          }

        ?>

      </div>

       <div class="col-lg-6">
        
        <?php

          if($_SESSION["role"] =="admin"){

            include "home/recent-products.php";

          }

        ?>

      </div>

      <div class="col-lg-12">
           
        <?php

        if($_SESSION["role"] =="special" || $_SESSION["role"] =="saller"){

           echo '<div class="box box-success">

           <div class="box-header">

           <h1>Welcome ' .$_SESSION["name"].'</h1>

           </div>

           </div>';

        }

        ?>

      </div>

    </div>

  </section>

</div>
