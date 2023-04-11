<?php
    session_start();

    // Get current page name
    $thisPage = basename($_SERVER['PHP_SELF']);

    // Check the session for this page

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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default bx-shadow-none">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                                           href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"
                                           class="collapse">
                                            <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div id="searchMsg" class="text-center alert" style="display: none;"></div>
                                        <form id="searchForm" role="form">
                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-4 form-group" id="datepicker" >
                                                    <label class="control-label" data-th="">Bonus Date</label>
                                                    <div class="input-daterange input-group" id="datepicker-range">
                                                    <input id="dateRangeStart" type="text" class="form-control" name="start" dataName="bonusDate" dataType="dateRange" autocomplete="off">
                                                    <div class="input-group-addon">
                                                        <?php echo $translations['A00139'][$language]; /* to */?>
                                                    </div>
                                                    <input id="dateRangeEnd" type="text" class="form-control" name="end" dataName="bonusDate" dataType="dateRange">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Full Name
                                                    </label>
                                                    <input type="text" class="form-control" dataName="name" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        From Full Name
                                                    </label>
                                                    <input type="text" class="form-control" dataName="fromName" dataType="text">
                                                </div> -->
                                            <!-- </div> -->

                                            <!-- <div class="col-sm-12 px-0"> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00102'][$language]; /* Username */ ?>
                                                    </label>
                                                    <span class="pull-right">
                                                        <input id="match" type="radio" name="usernameType" class="usernameType" value="match" checked> 
                                                        <label for="match" style="margin-right: 15px;">Match</label>

                                                        <input id="like" type="radio" name="usernameType" class="usernameType" value="like" style="margin-left: 15px;" > 
                                                        <label for="like">Like</label>
                                                    </span>
                                                    <input type="text" class="form-control" dataName="username" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01416'][$language]; /* From Username */ ?>
                                                    </label>
                                                    <span class="pull-right">
                                                        <input id="match2" type="radio" name="fromUsernameType" class="usernameType" value="match" checked> 
                                                        <label for="match2" style="margin-right: 15px;">Match</label>

                                                        <input id="like2" type="radio" name="fromUsernameType" class="usernameType" value="like" style="margin-left: 15px;" > 
                                                        <label for="like2">Like</label>
                                                    </span>
                                                    <input type="text" class="form-control" dataName="fromUsername" dataType="text">
                                                </div> -->
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Member ID
                                                    </label>
                                                    <input type="text" class="form-control" dataName="memberID" dataType="text">
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A00117'][$language]; /* Full Name */ ?>
                                                    </label>
                                                    <span class="pull-right">
                                                        <input id="match" type="radio" name="nameType" class="nameType" value="match" > 
                                                        <label for="match" style="margin-right: 15px;"><?php echo $translations['A01347'][$language]; /* Match */ ?></label>

                                                        <input id="like" type="radio" name="nameType" class="nameType" value="like" style="margin-left: 15px;" checked> 
                                                        <label for="like"><?php echo $translations['A01348'][$language]; /* Like */ ?></label>
                                                    </span>
                                                    <input type="text" class="form-control name" dataName="fullname" dataType="text">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        From Member ID
                                                    </label>
                                                    <input type="text" class="form-control" dataName="fromMemberID" dataType="text">
                                                </div>
                                            <!-- </div> -->

                                            <!-- <div class="col-sm-12 px-0"> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01242'][$language]; /* Leader Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="leaderUsername" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        <?php echo $translations['A01349'][$language]; /* Main Leader Username */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="mainLeaderUsername" dataType="text">
                                                </div> -->
                                            <!-- </div> -->

                                            <!-- <div class="col-sm-12 px-0"> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Email
                                                    </label>
                                                    <input type="text" class="form-control" dataName="email" dataType="text">
                                                </div> -->
                                                <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        From Email
                                                    </label>
                                                    <input type="text" class="form-control" dataName="fromEmail" dataType="text">
                                                </div> -->
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Rank
                                                    </label>
                                                    <select class="form-control" dataName="rank" dataType="select">
                                                        <option value="">All</option>
                                                        <?php foreach($_SESSION["rankList"] as $value){ ?>
                                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['display']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        From Member Rank
                                                    </label>
                                                    <select class="form-control" dataName="fromRank" dataType="select">
                                                        <option value="">All</option>
                                                        <?php foreach($_SESSION["rankList"] as $value){ ?>
                                                            <option value="<?php echo $value['id']; ?>"><?php echo $value['display']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 px-0">
                                                <div class="col-sm-4 form-group">
                                                    <label class="control-label">
                                                        Member Email
                                                    </label>
                                                    <input type="text" class="form-control" dataName="email" dataType="text">
                                                </div>
                                            </div>

                                            <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" for="" data-th="email">
                                                        <?php echo $translations['A00103'][$language]; /* Email */ ?>
                                                    </label>
                                                    <input type="text" class="form-control" dataName="email" dataType="text">
                                                </div> -->
                                            <!-- <div class="col-sm-4 form-group">
                                                <label class="control-label" data-th="role_id">Role Name</label>
                                                <select id="roleName" class="form-control">
                                                </select>
                                            </div> -->
                                            <!-- <div class="col-sm-4 form-group">
                                                    <label class="control-label" data-th="disabled">
                                                        <?php echo $translations['A00104'][$language]; /* Disabled */ ?>
                                                    </label>
                                                    <select class="form-control" dataName="disabled" dataType="select">
                                                        <option value="">
                                                            <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                        </option>
                                                        <option value="1">
                                                            <?php echo $translations['A00056'][$language]; /* Yes */ ?>
                                                        </option>
                                                        <option value="0">
                                                            <?php echo $translations['A00057'][$language]; /* No */ ?>
                                                        </option>
                                                    </select>
                                                </div> -->
                                        </form>
                                        <!-- hidden -->
                                        <!-- <form id="adminType" role="form" style="display:none;">
                                            <div class="col-sm-4 form-group">
                                                <label class="control-label" for="" data-th="name">Admin Type</label>
                                                <input type="text" class="form-control" value="Admin">
                                            </div>
                                        </form> -->

                                        <div class="col-xs-12 m-t-rem1">
                                            <button id="searchBtn" type="submit"
                                                    class="btn btn-primary waves-effect waves-light">
                                                <?php echo $translations['A00051'][$language]; /* Search */ ?>
                                            </button>
                                            <button id="resetBtn" type="submit"
                                                    class="btn btn-default waves-effect waves-light">
                                                <?php echo $translations['A00053'][$language]; /* Reset */ ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <!-- <div class="card-box p-b-0"> -->
                        <button id="exportBtn" type="" class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display: none">
                            Export to xlsx
                        </button>
                        <button id="seeAllBtn" type="" class="btn btn-primary waves-effect waves-light"
                                style="margin-bottom: 10px;display: none">
                            See All
                        </button>
                        <form>
                            <div id="basicwizard" class="pull-in" style="display: none">
                                <div class="tab-content b-0 m-b-0 p-t-0">
                                    <div id="alertMsg" class="text-center alert" style="display: none;"></div>
                                    <div id="bonusListDiv" class="table-responsive"></div>
                                    <span id="grandTotal"></span>
                                    <span id="paginateText"></span>
                                    <div class="text-center">
                                        <ul class="pagination pagination-md" id="pagerBonusList"></ul>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- </div> -->
                    </div>
                </div><!-- End row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <?php include("footer.php"); ?>

    </div>
    <!-- End content-page -->


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<?php include("shareJs.php"); ?>

<script>
    // Initialize all the id in this page
    var divId = 'bonusListDiv';
    var tableId = 'bonusListTable';
    var pagerId = 'pagerBonusList';
    var btnArray = {};
    var thArray = Array(
        '<?php echo $translations['A00969'][$language]; /* Bonus Date */ ?>',
        'Member ID',
        // '<?php echo $translations['A00102'][$language]; /* Username */ ?>',
        '<?php echo $translations['A00117'][$language]; /* Full Name */ ?>',
        'City',
        'Member Email',
        // '<?php echo $translations['A00101'][$language]; /* name */ ?>',
        // '<?php echo $translations['A01416'][$language]; /* from usernmae */ ?>',
        // '<?php echo $translations['A01417'][$language]; /* from name */ ?>',
        // '<?php echo $translations['A01451'][$language]; /* from amount */?>',
        'Rank',
        'From Member ID',
        'From Member Name',
        'From Member City',
        'From Member Rank',
        // 'From Email',
        // '<?php echo $translations['A01418'][$language]; /* from level */ ?>',
        // '<?php echo $translations['A01452'][$language]; /* Compress Level */?>',
        // '<?php echo $translations['A01453'][$language]; /* From Percentage */?>',
        // '<?php echo $translations['A01454'][$language]; /* Calculated Amount */?>',
        // '<?php echo $translations['A01455'][$language]; /* Override From Username */?>',
        // '<?php echo $translations['A01456'][$language]; /* Override Level */?>',
        // '<?php echo $translations['A01457'][$language]; /* Override Compress Level */?>',
        // 'Bonus Value',
        'From Amount (PV)',
        '<?php echo $translations['A00973'][$language]; /* percentage */ ?>',
        'Commision Value (CV)',
        'CV Rate',
        'Bonus Payout'
        // 'Payable Amount'
        // '<?php echo $translations['A00974'][$language]; /* bonus */ ?>',
    );
    var searchId = 'searchForm';

    // Initialize the arguments for ajaxSend function
    var url = 'scripts/reqBonus.php';
    var method = 'POST';
    var debug = 0;
    var bypassBlocking = 0;
    var bypassLoading = 0;
    var pageNumber = 1;
    var formData = "";
    var fCallback = "";

    $(document).ready(function () {

        /*fCallback = loadDefaultListing;
        formData  = {command: 'getGoldmineBonusReport'};
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);*/

        //reset to default search
        $('#resetBtn').click(function () {
            $('#alertMsg').removeClass('alert-success').html('').hide();
            $('#searchForm').find('input:not([type=radio])').each(function () {
                $(this).val('');
            });
            $('#searchForm').find('select').each(function () {
                $(this).val('');
                $("#searchForm")[0].reset();
            });

        });

        $('#searchBtn').click(function () {
            var getNameType = $("input[name=nameType]:checked").val();
            $('.name').attr('dataType', getNameType);
            pagingCallBack(pageNumber, loadSearch);
        });

        $('#datepicker input').each(function () {
            $(this).datepicker('clearDates');
        });
    });

    $('#dateRangeStart').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#dateRangeEnd').datepicker({
        // language: language,
        format: 'dd/mm/yyyy',
        orientation: 'auto',
        autoclose: true
    });

    $('#exportBtn').click(function () {
        var searchId = 'searchForm';
        var searchData = buildSearchDataByType(searchId);
        var key = Array(
            'bonus_date',
            'memberID',
            // 'username',
            'fullname',
            'cityName',
            'email',
            // 'name',
            // 'fromUsername',
            // 'fromName',
            // 'fromAmount',
            'rankDisplay',
            'fromMemberID',
            'fromFullname',
            'fromCityName',
            'fromRankDisplay',
            // 'fromEmail',
            // 'fromLvl',
            // 'compressLvl',
            // 'fromPercentage',
            // 'calculatedAmount',
            // 'overFromUsername',
            // 'overLevel',
            // 'overCompressLevel',
            'bonusValue',
            'percentage',
            'payableAmount',
            'cvRate',
            'bonusPayout'
        );

        var formData = {
            command: "getGoldmineBonusReport",
            filename: "PersonalGroupBonusReport",
            searchData: searchData,
            header: thArray,
            key: key,
            DataKey: "bonusList",
            // usernameSearchType: $("input[name=usernameType]:checked").val(),
            type: 'export'
        };

        fCallback = exportExcel;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    $('#seeAllBtn').click(function () {
        var searchID = 'searchForm';
        var searchData = buildSearchDataByType(searchID);
        formData = {
            command: 'getGoldmineBonusReport',
            searchData: searchData,
            pageNumber: 1,
            seeAll: 1,
            // usernameSearchType: $("input[name=usernameType]:checked").val(),
        };
        // console.log(formData);
        fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    });

    function pagingCallBack(pageNumber, fCallback) {
        if (pageNumber > 1) bypassLoading = 1;

        var searchData = buildSearchDataByType(searchId);
        var formData = {
            command: "getGoldmineBonusReport",
            pageNumber: pageNumber,
            searchData: searchData,
            // usernameSearchType: $("input[name=usernameType]:checked").val(),
        };

        if (!fCallback)
            fCallback = loadDefaultListing;
        ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
    }

    function loadDefaultListing(data, message) {
        $('#basicwizard, #exportBtn, #seeAllBtn').show();

        var tableNo;

        if (data.bonusList) {
            var newList = [];
            $.each(data.bonusList, function (k, v) {
                var rebuildData = {
                    bonusDate: v['bonus_date'],
                    memberID: v['memberID'],
                    // username: v['username'],
                    fullname: v['fullname'],
                    cityName: v['cityName'],
                    email: v['email'],
                    // name: v['name'],
                    // fromUsername: v['fromUsername'],
                    rankDisplay: v['rankDisplay'],
                    fromMemberID: v['fromMemberID'],
                    fromFullname: v['fromFullname'],
                    fromCityName: v['fromCityName'],
                    fromRankDisplay: v['fromRankDisplay'],
                    // fromEmail: v['fromEmail'],
                    // fromName: v['fromName'],
                    // fromAmount: addCormer(v['fromAmount']),
                    // type: v['fromLvl'],
                    // compressLevel: v['compressLvl'],
                    // fromPercentage: v['fromPercentage'],
                    // calculatedAmount: addCormer(v['calculatedAmount']),
                    // overFromUsername: v['overFromUsername'],
                    // overLevel: v['overLevel'],
                    // overCompressLevel: v['overCompressLevel'],
                    bonusValue: addCormer(v['bonusValue']),
                    percentage: v['percentage'],
                    payableAmount: addCormer(v['payableAmount']),
                    cvRate: v['cvRate'],
                    bonusPayout: addCormer(v['bonusPayout'])
                };
                newList.push(rebuildData);
            });
        }
        // console.log(data);
        buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
        pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

        $('#' + tableId).find('tbody tr').each(function () {
            $(this).find('td:eq(8)').css('text-align', "right");
            $(this).find('td:eq(9)').css('text-align', "right");
            $(this).find('td:eq(10)').css('text-align', "right");
            $(this).find('td:eq(11)').css('text-align', "right");
            $(this).find('td:eq(12)').css('text-align', "right");
        });

        if(data.grandTotal) {
            $('#' + tableId).find('tbody').append(`
                <tr style="">
                    <td colspan='10' class="text-right"><?php echo $translations['A00651'][$language]; /* Grand Total */?>:</td>
                    <td style="text-align: right;"> ${addCormer(data.grandTotal.bonusValue)} </td>
                    <td style="text-align: right;"></td>
                    <td style="text-align: right;"> ${addCormer(data.grandTotal.payableAmount)} </td>
                    <td colspan='2'></td>
                </tr>
            `);
        }
    }

    // function tableBtnClick(btnId) {
    //     var btnName  = $('#'+btnId).attr('id').replace(/\d+/g, '');
    //     var tableRow = $('#'+btnId).parent('td').parent('tr');
    //     var tableId  = $('#'+btnId).closest('table');

    //     if (btnName == 'edit') {
    //         var editId = tableRow.attr('data-th');
    //         $.redirect("editAdmin.php",{id: editId});
    //     }
    // }

    function loadSearch(data, message) {
        loadDefaultListing(data, message);
        $('#searchMsg').addClass('alert-success').html('<span><?php echo $translations['A00114'][$language]; /* Search successful. */ ?></span>').show();
        setTimeout(function () {
            $('#searchMsg').removeClass('alert-success').html('').hide();
        }, 3000);
    }


</script>
</body>
</html>
