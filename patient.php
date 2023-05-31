<?php require_once('check_login.php'); ?>
<?php include('head.php'); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('connect.php');
if (isset($_POST['btn_submit'])) {
    if (isset($_GET['editid'])) {
        $sql = "UPDATE patient SET patientname='$_POST[patientname]',admissiondate='$_POST[admissiondate]',admissiontime='$_POST[admissiontime]',address='$_POST[address]',mobileno='$_POST[mobilenumber]',city='$_POST[city]',gender='$_POST[gender]',dob='$_POST[dateofbirth]',status='Active',tPanggil=0 WHERE patientid='$_GET[editid]'";
        if ($qsql = mysqli_query($conn, $sql)) {
?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Berhasil Simpan</p>
                    <p>
                        <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                        <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
                    </p>
                </div>
            </div>
        <?php
        } else {
            echo mysqli_error($conn);
        }
    } else {
        $sql = "INSERT INTO patient(patientname,admissiondate,admissiontime,address,mobileno,city,gender,dob,status) values('$_POST[patientname]','$_POST[admissiondate]','$_POST[admissiontime]','$_POST[address]','$_POST[mobilenumber]','$_POST[city]','$_POST[gender]','$_POST[dateofbirth]','Active')";
        if ($qsql = mysqli_query($conn, $sql)) {
        ?>
            <div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                        Success
                    </h3>
                    <p>Berhasil Simpan</p>
                    <p>
                        <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
                        <?php echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>"; ?>
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
    $sql = "SELECT * FROM patient WHERE patientid='$_GET[editid]' ";
    $qsql = mysqli_query($conn, $sql);
    $rsedit = mysqli_fetch_array($qsql);
}

?>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

<link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

<link rel="stylesheet" type="text/css" href="files/assets/css/style.css">

<div class="pcoded-content">
    <div class="pcoded-inner-content">

        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4 style="font-family: 'Unbounded', cursive;">Pasien Kunjungan Baru</h4>
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
                                    <li class="breadcrumb-item"><a style="font-family: 'Unbounded', cursive;">Pasien Kunjungan Baru</a>
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
                                            <label class="col-sm-2 col-form-label">Nama Pasien</label>
                                            <div class="col-sm-4">
                                                <input required type="text" maxlength="30" class="form-control" name="patientname" id="patientname" placeholder="Masukkan Nama Pasien...." required="" value="<?php if (isset($_GET['editid'])) {
                                                                                                                                                                                echo $rsedit['patientname'];
                                                                                                                                                                            } ?>">
                                                <span class="messages"></span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">No. Telepon</label>
                                            <div class="col-sm-4">
                                                <input required type="number" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Masukkan No Telepon...." required="" value="<?php echo $rsedit['mobileno']; ?>">
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tanggal Kunjungan</label>
                                            <div class="col-sm-4">
                                                <input required type="date" class="form-control" name="admissiondate" id="admissiondate" placeholder="Tanggal Berkunjung...." required="" value="<?php if (isset($_GET['editid'])) {echo $rsedit['admissiondate'];} ?>">
                                                <span class="messages"></span>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Jam Kunjungan</label>
                                            <div class="col-sm-4">
                                                <input required type="time" class="form-control" name="admissiontime" id="admissiontime" placeholder="Jam Kunjungan...." required="" value="<?php echo $rsedit['admissiontime']; ?>">
                                                <span class="messages"></span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-4">
                                                <select required name="gender" id="gender" class="form-control" required="">
                                                    <option value="">-- Pilih Jenis Kelamin -- </option>
                                                    <option value="Laki-Laki" <?php if (isset($_GET['editid'])) {
                                                                                if ($rsedit['gender'] == 'Laki-Laki') {
                                                                                    echo 'selected';
                                                                                }
                                                                            } ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?php if (isset($_GET['editid'])) {
                                                                                if ($rsedit['gender'] == 'Perempuan') {
                                                                                    echo 'selected';
                                                                                }
                                                                            } ?>>Perempuan</option>
                                                </select>
                                            </div>

                                            <label class="col-sm-2 col-form-label">Tempat/Tanggal Lahir</label>
                                            
                                            <div class="col-sm-4">
                                            <input type="text" required name="city" maxlength="20" placeholder="Kabupaten/Kota" id="city" class="form-control" required="" value="<?php if (isset($_GET['editid'])) { echo $rsedit['city']; } ?>"></input>&nbsp;
                                                <input required class="form-control" type="date" name="dateofbirth" max="<?php echo date("Y-m-d"); ?>" id="dateofbirth" value="<?php echo $rsedit['dob']; ?>" />

                                            </div>
                                            
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea required name="address" maxlength="60" id="address" class="form-control"><?php if (isset($_GET['editid'])) {
                                                                                                                echo $rsedit['address'];
                                                                                                            } ?></textarea>
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

<script type="text/javascript">
    $('#main').keyup(function() {
        $('#confirm-pw').html('');
    });

    $('#cnfirmpassword').change(function() {
        if ($('#cnfirmpassword').val() != $('#password').val()) {
            $('#confirm-pw').html('Password Not Match');
        }
    });

    $('#password').change(function() {
        if ($('#cnfirmpassword').val() != $('#password').val()) {
            $('#confirm-pw').html('Password Not Match');
        }
    });

    
</script>
