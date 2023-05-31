<!DOCTYPE html>
<html dir="ltr" lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   
    <link rel="stylesheet" type="text/css" href="libs/select2/dist/css/select2.min.css">

  </head>

  <body>

<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');

if (isset($_POST['btn_submit'])) {
    if (isset($_GET['editid'])) {
        $sql = "UPDATE pasien_obat SET doctorid='$_POST[doctor]',catatan='$_POST[catatan]',medicineid='$_POST[medicineid]' WHERE nKode='$_GET[editid]'";
        if ($qsql = mysqli_query($conn, $sql)) {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Berhasil Disimpan</p>
                    <p>
                        <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                        <?php echo "<script>setTimeout(\"location.href = 'patientreport.php?patientid=$_GET[patientid]&appointmentid=$_GET[appointmentid]';\",4000);</script>"; ?>
                    </p>
                </div>
            </div>
        <?php
        } else {
            echo mysqli_error($conn);
        }
    } else {

        $sql = "INSERT INTO pasien_obat(appointmentid,patientid, doctorid, medicineid, catatan) values('$_GET[appointmentid]','$_GET[patientid]','$_POST[doctor]','$_POST[medicineid]','$_POST[catatan]')";
        if ($qsql = mysqli_query($conn, $sql)) {

            //include("insertbillingrecord.php"); 
        ?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Obat Berhasil Disimpan</p>
                    <p>
                        <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                        <?php echo "<script>setTimeout(\"location.href = 'pasien_obat.php?patientid=$_GET[patientid]&appointmentid=$_GET[appointmentid]';\",3000);</script>"; ?>
                    </p>
                </div>
            </div>
<?php
        } else {
            echo mysqli_error($conn);
        }
    }
}
if (isset($_GET['editid'])) {
    $sql = "SELECT * FROM pasien_obat a
    JOIN medicine b ON b.medicineid = a.medicineid
    WHERE a.nKode='$_GET[editid]'";
    $qsql = mysqli_query($conn, $sql);
    $rsedit = mysqli_fetch_array($qsql);
}

?>
<?php
    $sqlpx = "SELECT * FROM patient WHERE patientid='$_GET[patientid]'";
    $qsqlpx = mysqli_query($conn, $sqlpx);
    $rspx = mysqli_fetch_array($qsqlpx);
    ?>
<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Tambah Obat Pasien A/n : <?php echo $rspx['patientname'] . "&nbsp" . "[ " . $rspx['patientid'] . " ]" ?></h4>
                                    <!-- <span>Lorem ipsum dolor sit <code>amet</code>, consectetur adipisicing elit</span> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="dashboard.php"> <i class="feather icon-home"></i> </a>
                                    </li>
                                    <li class="breadcrumb-item"><a>Tambah Obat Pasien</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="card">
                                <div class="card-header">
                                    <!-- <h5>Basic Inputs Validation</h5>
<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span> -->
                                </div>
                                <div class="card-block">
                                    <form id="main" method="post" action="" enctype="multipart/form-data">

                                        <div class="form-group row">

                                            <label class="col-sm-2 col-form-label">Obat</label>
                                            <div class="col-sm-4">
                                                <select class="select2 form-control" name="medicineid" id="medicineid" required="">
                                                    <option value="">-- Pilih Obat --</option>
                                                    
                                                    <?php
                                                    $sqldepartment = "SELECT * FROM medicine";
                                                    $qsqldepartment = mysqli_query($conn, $sqldepartment);
                                                    while ($rsdepartment = mysqli_fetch_array($qsqldepartment)) {
                                                        echo "<option value='$rsdepartment[medicineid]'>$rs$rsdepartment[medicinename]</option>";
                                                    }
                                                
                                                    ?>
                                                </select>
                                                <span class="messages"></span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">DPJP</label>
                                            <div class="col-sm-4">
                                                <select required name="doctor" name="doctor" class="form-control">
                                                    <option value="">-- Pilih Dokter --</option>
                                                    <?php
                                                    $sqldoctor = "SELECT * FROM doctor WHERE STATUS='Active'";
                                                    $qsqldoctor = mysqli_query($conn, $sqldoctor);
                                                    while ($rsdoctor = mysqli_fetch_array($qsqldoctor)) {
                                                        echo "<option value='$rsdoctor[doctorid]'>$rsdoctor[doctorname]</option>";
                                                        if (isset($_GET['editid'])) {
                                                            if ($rsdoctor['doctorid'] == $rsedit['doctorid']) {
                                                                echo "<option value='$rsdoctor[doctorid]' selected>$rsdoctor[doctorname] </option>";
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Signa</label>
                                            <div class="col-sm-4">
                                            <input type="text" placeholder="Ketik disini.." class="form-control" name="catatan" id="catatan" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['catatan'];
                                                                                                                                                                            } ?>">
                                                    
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
<script src="libs/select2/dist/js/select2.full.min.js"></script>
<script src="libs/select2/dist/js/select2.min.js"></script>
<script>
$(".select2").select2();
</script>

  </body>
</html>