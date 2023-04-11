<?php 
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page
    if(!isset ($_SESSION['access'][$thisPage]))
        echo '<script>window.location.href="accessDenied.php";</script>';
    else
        $_SESSION['lastVisited'] = $thisPage;
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        <?php include("topbar.php"); ?>
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php include("sidebar.php"); ?>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Back button -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div id="backBtn" class="btn btn-primary waves-effect waves-light m-b-20">
                                <?php echo $translations['A00115'][$language]; /* Back */?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box p-b-0">
                                <!-- <h4 class="header-title m-t-0 m-b-30">Add Pop Up Memo</h4> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="" data-th="">
                                                <?php echo $translations['A00897'][$language]; /* Adjustment Type */?>                                            
                                            </label>
                                            <div>
                                                <div class="radio radio-inline ">
                                                    <input id="inRadio" type="radio" value="In" name="adjustmentType" class="adjustmentType" checked/>
                                                    <label for="inRadio">
                                                        <?php echo $translations['A00898'][$language]; /* In */?>
                                                    </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input id="outRadio" type="radio" value="Out" name="adjustmentType" class="adjustmentType"/>
                                                    <label for="outRadio">
                                                        <?php echo $translations['A00899'][$language]; /* Out */?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="" data-th="">
                                                <?php echo $translations['A00267'][$language]; /* Credit Type */ ?>
                                            </label>
                                            <select id="selectType" class="form-control" width="50%">
                                                <!-- <option value="bitcoin" selected>Bitcoin</option>
                                                <option value="ethereum">Ethereum</option>
                                                <option value="ripple">XRP(ripple)</option>
                                                <option value="cardano">ADA(Cardano)</option>
                                                <option value="tether">ERC20 USDT</option>
                                                <option value="eos">EOS</option>
                                                <option value="ibgCredit">IBG Token</option>
                                                <option value="gtCredit">IBGT</option> -->
                                            </select>
                                        </div>
                                        <form role="form" enctype="multipart/form-data">
                                            <div id="basicwizard" class=" pull-in">
                                                <div class="tab-content b-0 m-b-0 p-t-0">
                                                    <div class="form-group">
                                                        <label>
                                                            <?php echo $translations['A00321'][$language]; /* Excel file */?>
                                                        </label>
                                                        <input id="excel" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required/>
                                                        <span id="nameError" class="text-danger errorSpan"></span>
                                                     <div class="form-group" style="margin-top: 10px;">
                                                    <?php $sampleFormatURL = $config['sampleFormatURL']; ?>
                                                    <b class="text-danger">*</b><a href="<?php echo $sampleFormatURL ?>batchadjustment.xlsx" style="margin-left: 10px">click here to download sample excel format</a>
                                                    </div>
                                                    </div>
                                                    <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                                        <?php echo $translations['A00323'][$language]; /* Submit */?>
                                                    </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-12 m-b-20">
                            <div id="submitBtn" class="btn btn-primary waves-effect waves-light">Search</div>
                        </div> -->
                    </div><!-- End row -->
                </div><!-- container -->
            </div><!-- content -->
            <?php include("footer.php"); ?>
        </div><!-- End content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>
        // Initialize the arguments for ajaxSend function
        var url             = 'scripts/reqUpload.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;

        $(document).ready(function() {
            $('#backBtn').click(function() {
                $.redirect('batchCreditAdjustment.php');
            });

            var formData = {
                command: 'getCreditType',
                // isShowMainWallet: 1
            };
            var fCallback = loadCreditType;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            
            $('#submitBtn').click(function() {
                var adjustmentType = $(".adjustmentType:checked").val();
                var selectType = $("#selectType").val();
                $('.errorSpan').empty();
                var form = new FormData();
                form.append('command', 'adminBatchCreditAdjustment');
                form.append ('adjustType', adjustmentType);
                form.append ('creditType', selectType);
                form.append('excel', $('#excel')[0].files[0]);

                var fCallback = submitCallback;
                ajaxSend(url, form, method, fCallback, debug, bypassBlocking, bypassLoading, 1);
            });
        });

        function loadCreditType(data, message) {

            var html = '';
            $.each(data.creditArray, function(i, obj){
                if (i != 'rebateCap') html += `<option value="${i}" selected>${obj}</option>`;
            });

            $("#selectType").html(html);
        }
        
        function submitCallback(data, message) {
            showMessage('<?php echo $translations['A00324'][$language]; /* Upload successful. */?>', 'success', '<?php echo $translations['A00325'][$language]; /* Upload File */?>', 'upload', 'batchCreditAdjustment.php');
        }
    </script>
</body>
</html>