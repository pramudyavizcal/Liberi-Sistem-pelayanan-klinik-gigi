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
        $sql = "UPDATE appointment SET patientid='$_POST[patient]',app_reason='$_POST[department]',appointmentdate='$_POST[appointmentdate]',appointmenttime='$_POST[appointmenttime]',doctorid='$_POST[doctor]',status='Pulang' WHERE appointmentid='$_GET[editid]'";
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
                        <?php echo "<script>setTimeout(\"location.href = 'view-appointments-approved.php';\",3000);</script>"; ?>
                    </p>
                </div>
            </div>
        <?php
        } else {
            echo mysqli_error($conn);
        }
    } else {
        $sql = "UPDATE patient SET status='Active',tDiagnosa=1 WHERE patientid='$_POST[patient]'";
        $qsql = mysqli_query($conn, $sql);

        $sql = "INSERT INTO appointment(patientid,app_reason, appointmentdate, appointmenttime, doctorid, status) values('$_POST[patient]','$_POST[department]','$_POST[appointmentdate]','$_POST[appointmenttime]','$_POST[doctor]','$_POST[status]')";
        if ($qsql = mysqli_query($conn, $sql)) {

            //include("insertbillingrecord.php"); 
        ?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Check Up Record Berhasil Disimpan</p>
                    <p>
                        <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                        <?php echo "<script>setTimeout(\"location.href = 'appointment.php?patientid=$_POST[patient]';\",3000);</script>"; ?>
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
    $sql = "SELECT b.patientid,b.patientname,a.app_reason,a.doctorid FROM appointment a 
    JOIN patient b ON b.patientid = a.patientid
    WHERE a.appointmentid='$_GET[editid]' ";
    $qsql = mysqli_query($conn, $sql);
    $rsedit = mysqli_fetch_array($qsql);
}

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
                                    <h4 style="font-family: 'Unbounded', cursive;">Check Up Pasien</h4>
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
                                    <li class="breadcrumb-item"><a style="font-family: 'Unbounded', cursive;">Check Up Pasien</a>
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
                                        <?php
                                        if (isset($_GET['patid'])) {
                                            $sqlpatient = "SELECT * FROM patient WHERE patientid='" . $_GET['patid'] . "'";
                                            $qsqlpatient = mysqli_query($con, $sqlpatient);
                                            $rspatient = mysqli_fetch_array($qsqlpatient);
                                            echo $rspatient['patientname'] . " (Patient ID - $rspatient[patientid])";
                                            echo "<input type='hidden' name='select4' value='$rspatient[patientid]'>";
                                        }
                                        ?>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pasien</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="patient" id="patient" required="">
                                                    <option>-- Pilih Pasien --</option>
                                                    <?php
                                                    if (isset($_GET['editid'])) {
                                                        echo "<option value='$rsedit[patientid]' selected> - $rsedit[patientname]</option>";
                                                    } else{
                                                    $sqlpatient = "SELECT * FROM patient WHERE status='Active' and tPanggil = 1 and tDiagnosa=0;";
                                                    $qsqlpatient = mysqli_query($conn, $sqlpatient);
                                                    $a = 0;
                                                    while ($rspatient = mysqli_fetch_array($qsqlpatient)) {
                                                        $a = $a+1;
                                                        if ($rspatient['patientid'] == $rsedit['patientid']) {
                                                            echo "<option value='$rspatient[patientid]' selected>$a - $rspatient[patientname]</option>";
                                                        } else {
                                                            echo "<option value='$rspatient[patientid]'>$a - $rspatient[patientname]</option>";
                                                        }
                                                    }
                                                }
                                                    ?>
                                                </select>
                                                <span class="messages"></span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Diagnosa</label>
                                            <div class="col-sm-4">
                                                <select class="select2 form-control" name="department" id="department">
                                                    <option value="">-- Pilih Diagnosa --</option>
                                                    
                                                    <?php
                                                    $sqldepartment = "SELECT * FROM icds WHERE code BETWEEN 'K00.0' AND 'K14.9'";
                                                    $qsqldepartment = mysqli_query($conn, $sqldepartment);
                                                    while ($rsdepartment = mysqli_fetch_array($qsqldepartment)) {
                                                        echo "<option value='$rsdepartment[code]($rsdepartment[name_id])'>$rsdepartment[code] ($rsdepartment[name_id])</option>";
                                                    }
                                                
                                                    ?>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Check Up</label>
                                            <div class="col-sm-4">
                                                <input required type="date" class="form-control" name="appointmentdate" id="appointmentdate" value="<?php echo date('Y-m-d'); ?>" required="">
                                                <span class="messages"></span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Waktu Check Up</label>
                                            <div class="col-sm-4">
                                                <input required type="time" class="form-control" name="appointmenttime" id="appointmenttime" required="">
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
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

                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-4">
                                                <select name="status" id="status" class="form-control" required="">
                                                    <option value="Active" selected>Active</option>
                                                </select>
                                                <span class="messages"></span>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-sm-2"></label>
                                            <div class="col-sm-10">
                                                <button type="submit" name="btn_submit" class="btn btn-primary m-b-0" >Submit</button>
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