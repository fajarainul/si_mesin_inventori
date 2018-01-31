<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <p class="centered"><a href="#"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
            <h5 class="centered"><?php echo $_SESSION['username']?></h5>


            <li>
                <a href="tampil_data_jenis_mesin.php">
                    <i class="fa fa-tags"></i>
                    <span>Data Jenis Mesin</span>
                </a>
            </li>

            <li>
                <a href="tampil_data_mesin_inventori.php">
                    <i class="fa fa-table"></i>
                    <span>Data Mesin Inventori</span>
                </a>
            </li>

            <li>
                <a href="tampil_data_mesin_sewa.php">
                    <i class="fa fa-table"></i>
                    <span>Data Mesin Sewa</span>
                </a>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->