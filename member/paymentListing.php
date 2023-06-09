<?php
include 'include/config.php';
include 'head.php';
include 'homepageHeader.php';
?>

<body>
<link href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>" rel="stylesheet" type="text/css" />

<!-- My Account Title -->
<section class="section myAccountBg">
    <div class="titleText larger bold text-white text-center text-md-left" data-lang="M03798"><?php echo $translations['M03798'][$language] /* My Account */ ?></div>
</section>

<!-- My Account Content -->
<section class="section whiteBg">
    <div class="row mb-5 mb-md-0">
        <div class="col-lg-3 col-md-4 col-12">
            <!-- Menu -->
            <div class="borderAll grey normal greyBg">
                <div class="button borderBottom grey normal px-4 py-3" id="myProfileBtn">
                    <div><img src="images/project/profile-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M03314"><?php echo $translations['M03314'][$language] /* My Profile */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="myAddressBtn">
                    <div><img src="images/project/home-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M02809"><?php echo $translations['M02809'][$language] /* My Address */ ?></span></div>
                </div>
                <div class="button borderBottom grey normal px-4 py-3" id="paymentHistoryBtn">
                    <div><img src="images/project/payment-filled.png" width="12px" class="mr-3"><span class="bodyText smaller lightBold text-red" data-lang="M03799"><?php echo $translations['M03799'][$language] /* Order History */ ?></span></div>
                </div>
                <div class="button px-4 py-3" id="changePasswordBtn">
                    <div><img src="images/project/pw-gray.png" width="12px" class="mr-3"><span class="bodyText smaller" data-lang="M00580"><?php echo $translations['M00580'][$language] /* Change Password */ ?></span></div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12 pt-5 pt-md-0">
            <!-- Payment History -->
            <div class="whiteBg borderAll grey normal p-4 p-md-5">
                <div class="bodyText larger bold mb-2" data-lang="M03799"><?php echo $translations['M03799'][$language] /* Order History */ ?></div>
                <div class="borderBottom darkGrey normal myAccountBottomLine"></div>
                <form class="mt-4">
                    <div id="basicwizard" class="pull-in col-12 px-0">
                        <div class="tab-content b-0 m-b-0 p-t-0">
                            <div id="alertMsg" class="text-center" style="display: block;"></div>
                            <div id="portfolioDiv" class="table-responsive"></div>
                            <span id="paginateText"></span>
                            <div class="text-center">
                                <ul class="pagination pagination-md" id="pagerList"></ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include 'homepageFooter.php' ?>
</body>

<?php include 'backToTop.php' ?>

<?php
include 'sharejs.php';
$_SESSION["stopRecord"] = 1;
?>

</html>


<script>

var url             = 'scripts/reqDefault.php';
var method          = 'POST';
var debug           = 0;
var bypassBlocking  = 0;
var bypassLoading   = 0;
var pageNumber      = 1;
var fCallback       = '';
var viewQuotationBtn = "";
var viewDoBtn = "";

var divId    = 'portfolioDiv';
var tableId  = 'portfolioTable';
var pagerId  = 'pagerList';
var btnArray = {};

var thArray  = Array (
    '',
    '<span data-lang="M00903"><?php echo $translations['M00903'][$language] /* Order ID */ ?></span>',
    '<span data-lang="M04019"><?php echo $translations['M04019'][$language] /* Payment Date */ ?></span>',
    '<span data-lang="M01795"><?php echo $translations['M01795'][$language] /* Amount */ ?></span>',
    '<span data-lang="M02103"><?php echo $translations['M02103'][$language] /* Status */ ?></span>',
    '<span data-lang="M04020"><?php echo $translations['M04020'][$language] /* Invoice */ ?></span>',
    '<span data-lang="M04021"><?php echo $translations['M04021'][$language] /* Delivery Order */ ?></span>',
);

$(document).ready(function() {
    pagingCallBack(pageNumber);

    $('#myProfileBtn').click(function() {
        $.redirect('profile');
    });

    $('#myAddressBtn').click(function() {
        $.redirect('myAddress');
    });

    $('#paymentHistoryBtn').click(function() {
        $.redirect('paymentListing');
    });

    $('#changePasswordBtn').click(function() {
        $.redirect('changePassword');
    });
});

function pagingCallBack(pageNumber, fCallback){
    if(pageNumber > 1) bypassLoading = 1;

    var formData = {
        command             : "getPurchaseHistory",
        pageNumber          : pageNumber,
    };
    fCallback = loadDefaultListing;
    ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
}

function loadDefaultListing(data, message) {
	var list = data;
	var tableNo;
	var htmlContent = "";

	if(list){
		var newList = [];
		$.each(list, function(k, v) {
            var viewQuotationBtn = '';
            var viewDoBtn = '';
			var statusHtml = ``;
			var color = "";
			switch(v['status']){
            	case "Pending":
            		color = "#eec159";
            		break;
            	case "Payment Verified":
            		color = "#6ed15f";
            		break;
                case "Paid":
            		color = "#6ed15f";
            		break;
                case "Cancelled":
            		color = "#ff554c";
            		break;
            	default:
            }
			statusHtml = `<span style="color:${color}">${v['status']}</span>`

            if(v['status'] == 'Paid' || v['status'] == 'Packed' || v['status'] == 'Out of Delivery' || v['status'] == 'Delivered') {
                viewQuotationBtn = `
                    <a id="" type="" class="btn btn-icon waves-effect waves-light btn-primary green" onclick="viewQuotation(${v['id']}, )">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>`;
            }else{
                viewQuotationBtn='&ndash;';
            }

            if(v['status'] == 'Packed' || v['status'] == 'Out of Delivery' || v['status'] == 'Delivered') {
                viewDoBtn = `
                    <a id="" type="" class="btn btn-icon waves-effect waves-light btn-primary green" onclick="viewDo(${v['id']})">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>`;
            }else{
                viewDoBtn='&ndash;';
            }
            
			var rebuildData = {
                btn             : '',
				id 		        : '#' + v['id'],
				payment_date  	: v['payment_date'],
				purchase_amount : 'RM ' + numberThousand(v['purchase_amount'],2),
				status  		: statusHtml,
                viewQuotationBtn: viewQuotationBtn,
                viewDoBtn: viewDoBtn
			};
			newList.push(rebuildData);

		});
	}

    buildTable(newList, tableId, divId, thArray, btnArray, message, tableNo);
    pagination(pagerId, data.pageNumber, data.totalPage, data.totalRecord, data.numRecord);

    $('#' + tableId).find('tbody tr').each(function () {
        $(this).find('td:eq(5)').css('text-align', "center");
        $(this).find('td:eq(6)').css('text-align', "center");
    })

    $('#'+tableId+' th').css('text-transform', "uppercase");

    $('#'+tableId).DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "bFilter": false,
        "language": {
            "zeroRecords": "", 
            "emptyTable": ""
        },
        responsive: {
            details: {
                type: 'column',
                target: 'tr'
            }
        },
        buttons: [
        'colvis'
    ],
        columnDefs: [
            { className: 'control', orderable: false, targets: 0 },
            { responsivePriority: 1, targets: 1 },
            { responsivePriority: 2, targets: 2 },
            { responsivePriority: 3, targets: 3 },
            // { responsivePriority: 4, targets: 4 },
            // { responsivePriority: 5, targets: 5 },
        ]
    });
}

function viewQuotation(id) {
    $.redirect('viewInvoice', { id: id, viewType: "quotation" });
}

function viewDo(id) {
    $.redirect('viewInvoice', { id: id, viewType: "deliveryOrder" });
}

</script>