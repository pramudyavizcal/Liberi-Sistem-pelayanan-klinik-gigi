<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
<?php
    include('connect.php');
    include('head.php');
    $sql = "select * from admin where id = '" . $_SESSION["id"] . "'";
    $result = $conn->query($sql);
    $ro = mysqli_fetch_array($result);

    ?>

     <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
             <nav class="pcoded-navbar">
                 <div class="pcoded-inner-navbar main-menu" style="background-image: url(uploadImage/Logo/sideback.jpg);">
                     <div class="pcoded-navigatio-lavel" style="font-family: 'Unbounded', cursive;">Menu</div>
                     <ul class="pcoded-item pcoded-left-item">
                         <li class="">
                             <a href="index.php">
                                 <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                 <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Dashboard <?php echo $_SESSION['user'] ?></span>
                             </a>
                         </li>

                         <?php if (($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'doctor') || ($_SESSION['user'] == 'patient')) { ?>
                             <li class="pcoded-hasmenu">
                                 <a href="javascript:void(0)">
                                     <span class="pcoded-micon"><i class="feather icon-edit"></i></span>
                                     <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Check Up</span>
                                 </a>
                                 <ul class="pcoded-submenu">
                                     <?php if (($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'patient')) { ?>
                                         <li class="">
                                             <a href="appointment.php">
                                                 <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Check Up Pasien</span>
                                             </a>
                                         </li>
                                     <?php } ?>
                                     <?php if (($_SESSION['user'] == 'admin') || ($_SESSION['user'] == 'doctor')) { ?>

                                         <li class="">
                                             <a href="view-appointments-approved.php">
                                                 <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Antrian Pasien Check Up</span>
                                             </a>
                                         </li>
                                     <?php } ?>
                                     <?php if ($_SESSION['user'] == 'admin') { ?>
                                         <li class="">
                                             <a href="view-appointments.php">
                                                 <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Riwayat Kunjungan</span>
                                             </a>
                                         </li>
                                     <?php } ?>
                                 </ul>
                             </li>
                         <?php } ?>

                         <?php if ($_SESSION['user'] == 'admin') { ?>
                             <li class="pcoded-hasmenu">
                                 <a href="javascript:void(0)">
                                     <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                     <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Dokter</span>
                                 </a>
                                 <ul class="pcoded-submenu">

                                     <li class="">
                                         <a href="doctor.php">
                                             <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Tambah Dokter</span>
                                         </a>
                                     </li>

                                     <li class="">
                                         <a href="view-doctor.php">
                                             <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">List Dokter</span>
                                         </a>
                                     </li>
                                 </ul>
                             </li>
                         <?php } ?>

                         <?php if (($_SESSION['user'] == 'admin')) { ?>
                             <li class="pcoded-hasmenu">
                                 <a href="javascript:void(0)">
                                     <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                     <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Pasien</span>
                                 </a>
                                 <ul class="pcoded-submenu">
                                     <?php if ($_SESSION['user'] == 'admin') { ?>
                                         <li class="">
                                             <a href="patient.php">
                                                 <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Kunjungan Baru</span>
                                             </a>
                                         </li>
                                     <?php } ?>
                                     <li class="">
                                         <a href="view-patient.php">
                                             <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">List Pasien</span>
                                         </a>
                                     </li>
                                 </ul>
                             </li>
                         <?php } ?>


                         <?php if ($_SESSION['user'] == 'admin') { ?>
                             <li class="pcoded-hasmenu">
                                 <a href="javascript:void(0)">
                                     <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                     <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Layanan</span>
                                 </a>
                                 <ul class="pcoded-submenu">

                                     <li class="">
                                         <a href="treatment.php">
                                             <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Tambah Tindakan</span>
                                         </a>
                                     </li>

                                     <li class="">
                                         <a href="view-treatment.php">
                                             <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">List Tindakan</span>
                                         </a>
                                     </li>

                                     <li class="">
                                         <a href="medicine.php">
                                             <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">Tambah Obat</span>
                                         </a>
                                     </li>

                                     <li class="">
                                         <a href="view-medicine.php">
                                             <span class="pcoded-mtext" style="font-family: 'Unbounded', cursive;">List Obat</span>
                                         </a>
                                     </li>
                                 </ul>
                             </li>
                         <?php } ?>

                         <li>
                             <a href="logout.php" style="font-family: 'Unbounded', cursive;">
                                 <i class="feather icon-log-out" ></i> Logout
                             </a>
                         </li>
                     </ul>
                 </div>
             </nav>
     

</body>
</html> 
 