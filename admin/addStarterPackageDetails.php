<?php 
    session_start();
    $thisPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<?php include("head.php"); ?>
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
            <div class="content">
                <div class="container">
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
                                <div class="row">

                                    <div class="col-xs-12 contentPageTitle">
                                        Package Details
                                    </div>

                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-12" style="margin-top: 20px">
                                                <label>Package Name</label>
                                                <input id="name" type="text" class="form-control">
                                                <span id="nameError" class="errorSpan text-danger"></span>
                                            </div>

                                            <div class="col-xs-12" style="margin-top: 20px">
                                                <label>Package Code</label>
                                                <input id="code" type="text" class="form-control">
                                                <span id="codeError" class="errorSpan text-danger"></span>
                                            </div>

                                            <!-- <div class="col-xs-12 input-daterange" style="margin-top: 20px">
                                                <label>Active Date</label>
                                                <input id="activeDate" type="text" class="form-control">
                                                <span id="activeDateError" class="errorSpan text-danger"></span>
                                            </div> -->

                                            <div class="col-xs-12" style="margin-top: 20px">
                                                <label>Category</label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select id="category" class="form-control category" dataName="category" dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="addCategoryList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span id="categoryError" class="errorSpan text-danger"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-12" style="margin-top: 20px">
                                                <label>PV Price (Optional)</label>
                                                <input id="pvPrice" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);">
                                                <span id="pvPriceError" class="errorSpan text-danger"></span>
                                            </div>

                                            <!-- <div class="col-xs-12" style="margin-top: 20px">
                                                <label>Package Price</label>
                                                <input id="packagePrice" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);">
                                                <span id="packagePriceError" class="errorSpan text-danger"></span>
                                            </div>
 
                                            <div class="col-xs-12" style="margin-top: 20px">
                                                <label>Promotion Price (Optional)</label>
                                                <input id="promoPrice" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1'); this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);">
                                                <span id="promoPriceError" class="errorSpan text-danger"></span>
                                            </div> -->

                                           <!--  <div class="col-xs-12" style="margin-top: 20px">
                                                <label>Product Quantity</label>
                                                <input id="productQuantity" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span id="productQuantityError" class="errorSpan text-danger"></span>
                                            </div> -->

                                            <!-- <div class="col-xs-12" style="margin-top: 20px">
                                                <label>Package Quantity (Optional)</label>
                                                <input id="packageQuantity" type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                <span id="packageQuantityError" class="errorSpan text-danger"></span>
                                            </div> -->

                                            <div class="col-xs-12" style="margin-top: 20px">
                                                <label>Product</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select id="productCat" class="form-control">
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <select id="product" class="form-control product" dataName="product" dataType="text">
                                                                    <option value="">
                                                                        <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="row" style="margin-top: 10px;">
                                                            <div class="col-md-12">
                                                                <input id="productQty" type="text" class="form-control" placeholder="Product Quantity" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button id="addProduct" class="btn btn-primary waves-effect waves-light" style="margin-top: 10px;">
                                                            Add Product
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="addProductList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 10px;">
                                                        <label>Total Weight (kg)</label>
                                                        <input id="totalWeight" type="text" class="form-control" value="0">
                                                    </div>
                                                </div>
                                                <span id="productError" class="errorSpan text-danger"></span>
                                            </div>

                                            <!-- <div class="col-xs-12" style="margin-top: 20px">
                                                <label>
                                                    <?php echo $translations['A00153'][$language]; /* Country */ ?>
                                                </label>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <select id="country" class="form-control country" dataName="country" dataType="text">
                                                            <option value="">
                                                                <?php echo $translations['A00055'][$language]; /* All */ ?>
                                                            </option>
                                                            <?php foreach($_SESSION["countryList"] as $key => $value) { ?>
                                                                <option value="<?php echo $value['id']; ?>">
                                                                    <?php echo $value['display']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div id="addCountryList" style="margin-top: 10px; border: 1px solid #ddd; height: 150px; overflow: scroll;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <span id="countryError" class="errorSpan text-danger"></span>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="margin-top: 20px">
                                        <label>
                                            Price Setting
                                        </label>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-xs-12 chargesTitle">
                                                        <div class="row">
                                                            <div class="col-xs-3">
                                                                Country
                                                            </div>
                                                            <div class="col-xs-9">
                                                                <div class="row">
                                                                    <div class="col-xs-6">
                                                                        Retail Price
                                                                    </div>
                                                                    <div class="col-xs-6">
                                                                        Promotion Price
                                                                    </div>
                                                                    <!-- <div class="col-xs-4">
                                                                        Member Price
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-xs-10">
                                                                <div class="row">
                                                                    <div class="col-xs-3">
                                                                        State
                                                                    </div>
                                                                    <div class="push-xs-1 col-xs-8">
                                                                        <div class="row">
                                                                            <div class="col-xs-6">
                                                                                Weight
                                                                            </div>
                                                                            <div class="col-xs-6">
                                                                                Delivery Charges (USD)
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12">
                                                        <div id="buildListing" class="row"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                        <label>Name Languages</label>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div id="buildNameLanguages"></div>
                                            <div class="col-md-4 addLanguageBtn" style="display: none;">
                                                <div class="addLanguageImage" onclick="addLanguage()">
                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                    <span>Add Name Languages</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <span id="nameLanguagesError" class="errorSpan text-danger"></span>
                                        <span id="descrLanguagesError" class="errorSpan text-danger"></span>
                                    </div>

                                    <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                        Package Images (Recommended Size: 600 x 310 px)
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div id="buildImg">
                                            </div>

                                            <div class="col-md-4 addImgBtn" style="display: none;">
                                                <div class="addLanguageImage" onclick="addImage()">
                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                    <span>Add Images</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <span id="imgError" class="errorSpan text-danger"></span>
                                    </div>
                                    <div class="col-xs-12">
                                        <span id="imgTypeError" class="errorSpan text-danger"></span>
                                    </div>


                                    <div class="col-xs-12 contentPageTitle" style="margin-top: 20px;">
                                        Upload Video
                                    </div>
                                    
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <div id="buildVideo"></div>
                                            <!-- <div class="col-md-4">
                                                <form style="display:block" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                                                    <div class="popupEmallVideoWrapper">
                                                        <input type="hidden" id="storeVideoData1">
                                                        <input type="hidden" id="storeVideoName1">
                                                        <input type="hidden" id="storeVideoSize1">
                                                         <input type="hidden" id="storeVideoType1">
                                                        <input type="hidden" id="storeVideoFlag1">
                                                        <input type="file" id="uploadVideo" class="hided" accept="video/*" style="display:none" onchange="displayVideoName('1', this)">
                                                        <div>
                                                            <a href="javascript:;" onclick="$('#uploadVideo').click();" class="btn btn-primary btnUpload">Upload</a>
                                                            <span id="videoName1" class="fileName">No Video Uploaded</span>
                                                            <a id="viewVideo1" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showVideo('1')">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                            <a id="deleteVideo1" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteVideo('1')">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div> -->
                                            <div class="col-md-4 addVideoBtn" style="display: none;">
                                                <div class="addLanguageImage" onclick="addVideo()">
                                                    <b><i class="fa fa-plus-circle"></i></b>
                                                    <span>Add Videos</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <span id="videoError" class="errorSpan text-danger"></span>
                                    </div>

                                    <!-- <div class="col-xs-12" style="margin-top: 20px;">
                                        <input type="checkbox" id="catalogue" name="catalogue">
                                        <label for="catalogue">E-Catalogue</label>
                                    </div> -->

                                    <div class="col-xs-12" style="margin-top: 20px;">
                                        <input type="checkbox" id="bBasic" name="bBasic">
                                        <label for="bBasic">Business Basic</label>
                                    </div>

                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-12" style="margin-top: 20px;">
                                                <label>Status</label>
                                                <div id="status" class="m-b-20">
                                                    <!-- <div class="radio radio-info radio-inline"> -->
                                                    <div class="radio radio-inline">
                                                        <input id="active" type="radio" value="Active" name="statusRadio" checked="checked"/>
                                                        <label for="active">
                                                            <?php echo $translations['A00372'][$language]; /* Active */?>
                                                        </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input id="inActive" type="radio" value="Inactive" name="statusRadio"/>
                                                        <label for="inActive">
                                                            <?php echo $translations['A00373'][$language]; /* Inactive */?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-12" style="margin-top: 20px;margin-bottom: 20px;">
                                        <div id="submitBtn" class="btn btn-primary waves-effect waves-light">
                                            <?php echo $translations['A00323'][$language]; /* Submit */?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
    </div>

    <div class="modal fade" id="showImage" role="dialog">
        <div class="modal-dialog modal-xs" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                    </h4>
                </div>
                <div class="modal-body">
                    <img id="modalImg" width="100%" src="">
                    <video id="modalVideo" width="400" controls>
                      <source src="" type="">
                    </video>
                </div>
                <div class="modal-footer">
                    <button id="canvasCloseBtn" type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal"><?php echo $translations['A00742'][$language]; /* Close */ ?></button>
                </div>
            </div>
        </div>
    </div>

   
    <div class="modal fade" id="modalProcessing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-left: 17px; padding-right: 25px;" aria-modal="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <span id="canvasTitle" class="modal-title"><?php echo "Processing"; //Processing ?></span>
                </div>
                <div class="modalLine"></div>
                <div class="modal-body modalBodyFont">
                    <div id="canvasAlertMessage"><?php echo "Uploading file..."; //Uploading file... ?></div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <script>var resizefunc = [];</script>
    <?php include("shareJs.php"); ?>

    <script>

        var url             = 'scripts/reqAdmin.php';
        var method          = 'POST';
        var debug           = 0;
        var bypassBlocking  = 0;
        var bypassLoading   = 0;
        var language        = "<?php echo $language; ?>";
        var selectedLang = [];
        var reqData =  new FormData();
        var reqVideoData =  new FormData();
        var nameLanguages = [];
        var descrLanguages = [];
        // var countryTagArr = [];
        var uploadImage;
        var uploadImageData;
        var uploadVideo;
        var uploadVideoData;
        var buildOption;
        var buildOptionLength = 0;
        var packageCategoryOption;
        var productCategoryOption;
        var productOption;
        // var buildCountry;
        var addLangCount = 1;
        var addImgCount = 0;
        var addImgIDNum = 0;
        var addVideoCount = 0;
        var addVideoIDNum = 0;
        var uploadFileType = 'image';
        var discountPercentage = 0;

        $(document).ready(function() {

            var formData  = {
                command: 'getStarterPackageDetail'
            };
            fCallback = loadDefaultListing;
            ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);

            $('.input-daterange input').each(function() {
                $(this).daterangepicker({
                    singleDatePicker: true,
                    timePicker: false,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                });
                $(this).val('');
            });

            $('#category').change(function(){
                var categoryID = $(this).find("option:selected").val();
                var category = $(this).find("option:selected").text();

                if(categoryID != "") {
                    var categoryDiv = `
                    <div id="${categoryID}" data-select="category" class="categoryTag includecategoryTag" style="">${category} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `;

                    $("#addCategoryList").append(categoryDiv);

                    $(this).find("option:selected").remove();
                    $(this).val('');
                }
            });

            $(document).on("click",".categoryTag",function() {
                $(this).remove();

                var selectId = $(this).attr('data-select');
                var categoryId = $(this).attr('id');
                var category = $(this).text();
                var optionHtml = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

                var csel = $("#"+selectId);
                var appendHtml  = `<option value="${categoryId}">${category}</option>`;
                csel.append(appendHtml);
                csel.html(csel.find('option').sort(function(x, y) {
                    return $(x).text() > $(y).text() ? 1 : -1;
                }));

                csel.prepend(optionHtml);
                csel.find("option[value='']").not(':first').remove();

                csel.val("");
            });

            $('#productCat').change(function() {
                var categoryID = $('#productCat option:selected').val();
                $("#product option").each(function() {
                    if($(this).val() != "") {
                        if($(this).attr("data-name") == categoryID) {
                            $(this).css("display", "block");
                        } else {
                            $(this).css("display", "none");
                        }
                    }
                });
            });

            $('#addProduct').click(function(){
                var categoryID = $('#productCat option:selected').val();
                var productID = $('#product').find("option:selected").val();
                var product = $('#product').find("option:selected").text();
                var weight = $('#product').find("option:selected").attr("data-value");
                var productQty = $('#productQty').val();

                if(productID != "" && productQty != "" && Number(productQty) > 0) {
                    var productDiv = `
                    <div id="${productID}" data-select="product" name="${product}" quantity="${productQty}" categoryID="${categoryID}" weight="${weight}" class="productTag includeproductTag" style="">${product} &times; ${productQty} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `;

                    $("#addProductList").append(productDiv);

                    $('#product').find("option:selected").remove();
                    $('#product').val('');
                    $('#productQty').val('');
                    updateTotalWeight();
                }
            });

            $(document).on("click",".productTag", function() {
                $(this).remove();

                var categoryID = $('#productCat option:selected').val();
                var selectId = $(this).attr('data-select');
                var productId = $(this).attr('id');
                var product = $(this).attr('name');
                var catID = $(this).attr('categoryID');
                var weight = $(this).attr('weight');
                var optionHtml = `<option value="">Select Products</option>`;
                var display = "";
                if(categoryID == catID) {
                    display = "block";
                } else {
                    display = "none";
                }

                var csel = $("#"+selectId);
                var appendHtml  = `<option value="${productId}" data-name="${catID}" data-value="${weight}" style="display:${display};">${product}</option>`;
                csel.append(appendHtml);
                csel.html(csel.find('option').sort(function(x, y) {
                    return $(x).text() > $(y).text() ? 1 : -1;
                }));

                csel.prepend(optionHtml);
                csel.find("option[value='']").not(':first').remove();

                csel.val("");
                updateTotalWeight();
            });

            /*$('#country').change(function(){
                var countryID = $(this).find("option:selected").val();
                var country = $(this).find("option:selected").text();

                if(countryID != "") {
                    var countryDiv = `
                    <div id="${countryID}" data-select="country" class="countryTag includecountryTag" style="">${country} <i class="fa fa-times cancelUser" aria-hidden="true" style="margin-left: 10px;"></i></div>
                    `;

                    $("#addCountryList").append(countryDiv);

                    $(this).find("option:selected").remove();
                    $(this).val('');
                }
            });

            $(document).on("click",".countryTag",function() {
                $(this).remove();

                var selectId = $(this).attr('data-select');
                var countryId = $(this).attr('id');
                var country = $(this).text();
                var optionHtml = `<option value=""><?php echo $translations['A00055'][$language]; /* All */ ?></option>`;

                var csel = $("#"+selectId);
                var appendHtml  = `<option value="${countryId}">${country}</option>`;
                csel.append(appendHtml);
                csel.html(csel.find('option').sort(function(x, y) {
                    return $(x).text() > $(y).text() ? 1 : -1;
                }));

                csel.prepend(optionHtml);
                csel.find("option[value='']").not(':first').remove();

                csel.val("");
            });*/

            $('#submitBtn').click(function() {

                $('[id$="Error"]').text("");

                // var imgSizeFlag = true;
                // var videoSizeFlag = true;

                var name = $("#name").val();
                var code = $("#code").val();
                var weight = $("#totalWeight").val();
                // var activeDate = dateToTimestamp($('#activeDate').val());
                var pvPrice = $("#pvPrice").val();
                // var packagePrice = $("#packagePrice").val();
                // var promoPrice = $('#promoPrice').val();
                // var productQuantity = $('#productQuantity').val();
                var packageQuantity = $('#packageQuantity').val();
                // var catalogue = $('#catalogue').is(':checked') ? "1" : "0";
                var bBasic = $('#bBasic').is(':checked') ? "1" : "0";
                var status = $("input[name=statusRadio]:checked").val();
                var category = [];
                $('.includecategoryTag').each(function (index, value) {  
                    category.push(value.id);
                });

                var product = [];
                $('.includeproductTag').each(function (index, value) {
                    product.push({
                        productID   : value.id,
                        quantity    : $(this).attr('quantity')
                    });
                });

                /*countryTagArr = [];
                $('.includecountryTag').each(function (index, value) {  
                    countryTagArr.push(value.id);
                });*/

                var priceSetting = [];
                $('.chargesQuantityBox').each(function() {
                    var country = $(this).attr('getCountryID');
                    var retailPrice = $(this).find(".price").val();
                    var promoPrice = $(this).find(".promoPrice").val();
                    var buildPriceSetting = {
                        country     : country,
                        retailPrice : retailPrice,
                        promoPrice  : promoPrice
                    };

                    priceSetting.push(buildPriceSetting);
                });

                nameLanguages = [];
                $(".productNameInput").each(function(){
                    var getlanguageType = $(this).attr("languageType");
                    var getValue = $(this).val();
                    buildNameLanguages = {
                        languageType : getlanguageType,
                        content : getValue
                    };
                    nameLanguages.push(buildNameLanguages);
                });

                descrLanguages = [];
                $(".descInput").each(function(){
                    var getlanguageType = $(this).attr("languageType");
                    var getValue = $(this).val();
                    buildDescrLanguages = {
                        languageType : getlanguageType,
                        content : getValue
                    };
                    descrLanguages.push(buildDescrLanguages);
                });

                uploadImage = [];
                uploadImageData = [];
                $(".popupMemoImageWrapper").each(function() {
                    var imgData = $(this).find('[id^="storeFileData"]').val();
                    var imgName = $(this).find('[id^="storeFileName"]').val();
                    var imgType = $(this).find('[id^="storeFileType"]').val();
                    var imgFlag = $(this).find('[id^="storeFileFlag"]').val();
                    var imgSize = $(this).find('[id^="storeFileSize"]').val();
                    var imgUploadType = $(this).find('[id^="storeFileUploadType"]').val();
                    
                    if(imgData != "") {
                        buildUploadImage = {
                            imgName : imgName,
                            imgType : imgType,
                            imgFlag : imgFlag,
                            imgSize : imgSize,
                            uploadType : imgUploadType
                        };

                        // if(parseFloat(imgSize) / 1048576 > 3) {
                        //     imgSizeFlag = false;
                        // }

                        reqData = {
                            imgName: imgName,
                            imgData: imgData,
                            imgType : imgType,
                            imgSize : imgSize,
                            uploadType : imgUploadType
                        };
                        
                        uploadImageData.push(reqData);
                        uploadImage.push(buildUploadImage);
                    }
                });

                uploadVideo = [];
                uploadVideoData = [];
                $(".popupEmallVideoWrapper").each(function(i, obj) {
                    var videoData = $(obj).find('[id^="storeVideoData"]').val();
                    var videoName = $(obj).find('[id^="storeVideoName"]').val();
                    var videoType = $(obj).find('[id^="storeVideoType"]').val();
                    var videoFlag = $(obj).find('[id^="storeVideoFlag"]').val();
                    var videoSize = $(obj).find('[id^="storeVideoSize"]').val();
                    var videoFileID = $(obj).find('[id^="uploadVideo"]').attr('id');
                    var videoFileName = $(obj).find('[id^="storeVideoName"]').attr('id');

                    if(videoData != "") {
                        uploadVideo.push({
                            videoName: videoName,
                            videoType: videoType,
                            videoFlag: videoFlag,
                            videoSize: videoSize,
                            uploadType:"video"
                        });

                        reqVideoData = {
                            videoData: videoData,
                            videoName: videoName,
                            videoType: videoType,
                            videoSize: videoSize,
                            uploadType: "video"
                        };
                        uploadVideoData.push(reqVideoData);

                        // if(parseFloat(videoSize) / 1048576 > 15) {
                        //     videoSizeFlag = false;
                        // }
                    }
                });

                /*if(!videoSizeFlag || !imgSizeFlag) {
                    if(!imgSizeFlag)
                        $("#imgError").text("Image size exceed 3MB.");

                    if(!videoSizeFlag)
                        $("#videoError").text("Video size exceed 15MB.");
                    

                    return false;
                }*/

                var formData  = {
                    command         : 'addStarterPackageDetail', 
                    name            : name,
                    code            : code,
                    // catalogue       : catalogue,
                    bBasic          : bBasic,
                    status          : status,
                    // activeDate      : activeDate,
                    pvPrice         : pvPrice,
                    // packagePrice    : packagePrice,
                    // promoPrice      : promoPrice,
                    // productQuantity : productQuantity,
                    // packageQuantity : packageQuantity,
                    category        : category,
                    product         : product,
                    // country         : countryTagArr,
                    priceSetting    : priceSetting,
                    nameLanguages   : nameLanguages,
                    descrLanguages  : descrLanguages,
                    uploadImage     : uploadImage,
                    uploadVideo     : uploadVideo,
                    weight          : weight
                };

                console.log(formData);

                fCallback = submitCallback;
                ajaxSend(url, formData, method, fCallback, debug, bypassBlocking, bypassLoading, 0);
            });

            $('#backBtn').click(function() {
                $.redirect('getStarterPackageList.php');
            });
        });

        /*function getVideoObj() {
            var uploadData = [];

            $(".popupEmallVideoWrapper").each(function(i, obj) {
                var videoData = $(obj).find('[id^="storeVideoData"]').val();
                var videoName = $(obj).find('[id^="storeVideoName"]').val();
                var videoType = $(obj).find('[id^="storeVideoType"]').val();
                var videoFlag = $(obj).find('[id^="storeVideoFlag"]').val();
                var videoFileID = $(obj).find('[id^="uploadVideo"]').attr('id');
                var videoFileName = $(obj).find('[id^="storeVideoName"]').attr('id');

                // videoName = videoName;
                // $('[name=videoName]').val()
                uploadData.push({
                    // videoData: videoData,
                    videoName: videoName,
                    videoType: videoType,
                    videoFlag: videoFlag,
                    uploadType:"video"
                });

                reqData = {
                    imgName: imgName,
                    imgData: imgData,
                    uploadType : imgUploadType
                };
            });

            return uploadData;
        }*/

        function displayVideoName(id, n) {
            var dFileName = $("#videoName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#blah').attr('src', e.target.result);
                    // $("#imgData"+input.id).empty().val(reader["result"]);
                    dFileName.text(n.files[0]["name"]);
                    // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                    // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                    // $("#imgFlag"+input.id).empty().val("1");

                    $("#storeVideoData"+id).val(reader["result"]);
                    $("#storeVideoName"+id).val(n.files[0]["name"]);
                    // $('[name=videoSize]').val(n.files[0]["size"]);
                    $("#storeVideoSize"+id).val(n.files[0]["size"]);
                    $("#storeVideoType"+id).val(n.files[0]["type"]);
                    $("#storeVideoFlag"+id).val('1');

                    $("#showVideo"+id).css('display', 'inline-block');
                    $("#deleteVideo"+id).css('display', 'inline-block');
                };

                reader.readAsDataURL(n.files[0]);
            }

        }

        function showVideo(n) {
            $("#modalImg").attr('style','display: none');
            $("#modalVideo").attr('style','display: block');
            $("#modalVideo").attr('src', $("#storeVideoData"+n).val());
            $("#showImage").modal();
        }

        function deleteVideo(id) {
            $("#uploadVideo"+id).val("");
            $("#videoName"+id).text('No Video Selected');
            $("#storeVideoData"+id).val("");
            $("#storeVideoName"+id).val("");
            $("#storeVideoSize"+id).val("");
            $("#storeVideoType"+id).val("");
            $("#storeVideoFlag"+id).val("");

            $("#showVideo"+id).hide();
            $("#deleteVideo"+id).hide();
        }

        function loadDefaultListing(data, message) {
            buildOptionLength = 0;

            buildOption = `
                <option value="">Select Languages</option>
            `;
            $.each(data.languageList, function(k,v){
                buildOption += `
                    <option value="${v['languageType']}">${v['languageDisplay']}</option>
                `;
                buildOptionLength = buildOptionLength + 1;
            });

            packageCategoryOption = `
                <option value="">Select Package Categories</option>
            `;
            if(data.packageCategoryList) {
                $.each(data.packageCategoryList, function(k,v){
                    packageCategoryOption += `
                        <option value="${v['id']}">${v['categoryDisplay']}</option>
                    `;
                });
            }

            var firstCat = "";
            productCategoryOption = "";
            if(data.productCategoryList) {
                $.each(data.productCategoryList, function(k,v){
                    productCategoryOption += `
                        <option value="${v['id']}">${v['categoryDisplay']}</option>
                    `;
                    if(k==0) {
                        firstCat = v['id'];
                    }
                });
            }

            productOption = `
                <option value="">Select Products</option>
            `;
            if(data.productList) {
                $.each(data.productList, function(k,v){
                    $.each(v, function(k1,v1){
                        var display = "";
                        if(v1['categoryID'] == firstCat) {
                            display = "block";
                        } else {
                            display = "none";
                        }
                        productOption += `
                            <option value="${v1['id']}" data-name="${v1['categoryID']}" data-value="${v1['weight']}" style="display:${display};">${v1['productDisplay']}</option>
                        `;
                    });
                });
            }

            var buildListing = "";
            if(data.availableCountry) {
                $.each(data.availableCountry, function(k,v) {
                    buildListing += `
                        <div class="col-xs-12 chargesContent" style="margin-top: 20px; font-size: 14px; border-bottom: none;">
                            <div class="row" style="border-bottom: 1px solid #1ca011; margin-bottom: 10px;">
                                <div class="col-sm-3 col-xs-12" style="margin-top: 5px;">
                                    ${v['display']}
                                </div>
                                <div class="col-sm-9 col-xs-12">
                                    <div class="buildChargesQuantityBox">
                                        <div class="chargesQuantityBox" getCountryID="${v['id']}">
                                            <div class="row">
                                                <div class="col-sm-6 col-xs-12">
                                                    Retail Price (${v['currencyCode']}) <input type="text" class="form-control limitNum price retailPriceInput" onkeyup="calcMemberPrice(this, 'retailPrice')">
                                                </div>
                                                <div class="col-sm-6 col-xs-12">
                                                    Promotion Price (${v['currencyCode']}) <input type="text" class="form-control limitNum promoPrice promoPriceInput" onkeyup="calcMemberPrice(this, 'promoPrice')">
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $("#buildListing").html(buildListing);
            }

            // buildCountry = ""; 

            // buildCountry += `
            //     <option value="">Select Country</option>
            // `;
            /*$.each(data.countryList, function(k,v){
                buildCountry += `
                    <option value="${v['id']}">${v['display']}</option>
                `;
            });*/

            var buildLanguage = `
                <div class="col-sm-4 col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-12 productBoxes default">
                        <div class="row">
                            <span class="dtxt">Default</span>
                            <div class="col-xs-12">
                                <label>Language</label>
                                <select type="text" class="form-control productLanguagesInput" onchange="detectDuplicate(this)">
                                    ${buildOption}
                                <select>
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Name</label>
                                <input type="text" class="form-control productNameInput">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Description</label>
                                <textarea class="form-control descInput"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $("#buildNameLanguages").append(buildLanguage);

            // $("#firstLanguage").html(buildOption);
            $("#category").html(packageCategoryOption);
            $("#productCat").html(productCategoryOption);
            $("#product").html(productOption);
            // $("#country").html(buildCountry);
            $(".addLanguageBtn").show();
            $(".addImgBtn").show();
            $(".addVideoBtn").show();
            discountPercentage = data.discountPercentage || 0;
        }

        function updateTotalWeight() {
            if($('#addProductList').children().length > 0) {
                var totalWeight = 0;
                $.each($('#addProductList').children(), function() {
                    var weight = $(this).attr("quantity") * $(this).attr("weight");
                    totalWeight += weight;
                });
                $('#totalWeight').val(totalWeight);
            } else {
                $('#totalWeight').val("0");
            }
        }

        // function calcMemberPrice(n, type) {
        //     var ind = $('.'+type+'Input').index(n);
        //     var retailPrice = $('.retailPriceInput').eq(ind).val();
        //     var promoPrice = $('.promoPriceInput').eq(ind).val();

        //     retailPrice = retailPrice==""?0:parseFloat(retailPrice);
        //     promoPrice = promoPrice==""?0:parseFloat(promoPrice);

        //     if(retailPrice>promoPrice) {
        //         if(promoPrice == 0) {
        //             $('.memberPrice').eq(ind).val(numberThousand((Number(retailPrice)*(100-discountPercentage)/100), 2));
        //         } else {
        //             $('.memberPrice').eq(ind).val(numberThousand((Number(promoPrice)*(100-discountPercentage)/100), 2));
        //         }
        //     } else {
        //         if(retailPrice == 0) {
        //             $('.memberPrice').eq(ind).val(numberThousand((Number(promoPrice)*(100-discountPercentage)/100), 2));
        //         } else {
        //             $('.memberPrice').eq(ind).val(numberThousand((Number(retailPrice)*(100-discountPercentage)/100), 2));
        //         }
        //     }
        // }

        function addLanguage() {
            addLangCount = addLangCount + 1;
            var buildLanguage = "";

            buildLanguage += `
                <div class="col-sm-4 col-xs-12" style="margin-top: 20px;">
                    <div class="col-xs-12 productBoxes">
                        <div class="row">
                            <a href="javascript:;" class="closeBtn" onclick="closeDiv(this)">×</a>
                            <div class="col-xs-12">
                                <label>Language</label>
                                <select type="text" class="form-control productLanguagesInput" onchange="detectDuplicate(this)">
                                    ${buildOption}
                                <select>
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Name</label>
                                <input type="text" class="form-control productNameInput">
                            </div>
                            <div class="col-xs-12" style="margin-top: 10px">
                                <label>Description</label>
                                <textarea class="form-control descInput"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            $("#buildNameLanguages").append(buildLanguage);

            if (addLangCount == buildOptionLength) {
                $(".addLanguageBtn").hide();
            }
        }

        function addImage() {
            addImgCount = addImgCount + 1;
            addImgIDNum = addImgIDNum + 1;

            var buildImg = "";

            buildImg += `
                <div class="col-sm-4 col-xs-12">
                    <div class="popupMemoImageWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDivImg(this)">×</a>
                        <input type="hidden" id="storeFileData${addImgIDNum}">
                        <input type="hidden" id="storeFileName${addImgIDNum}">
                        <input type="hidden" id="storeFileType${addImgIDNum}">
                        <input type="hidden" id="storeFileFlag${addImgIDNum}">
                        <input type="hidden" id="storeFileSize${addImgIDNum}">
                        <input type="hidden" id="storeFileUploadType${addImgIDNum}">
                        <input type="file" id="fileUpload${addImgIDNum}" class="hide" accept="image/jpeg, image/png, image/gif, image/bmp, image/tiff, video/mp4,video/x-m4v,video/*" onchange="displayFileName('${addImgIDNum}', this)">

                        <div>
                            <a href="javascript:;" onclick="$('#fileUpload${addImgIDNum}').click()" class="btn btn-primary btnUpload">Upload</a>
                            <span id="fileName${addImgIDNum}" class="fileName">No Image Uploaded</span>
                            <a id="viewImg${addImgIDNum}" href="javascript:;" class="btn" style="display: none; padding: 6px;" onclick="showImg('${addImgIDNum}')">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a id="deleteImg${addImgIDNum}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteImg('${addImgIDNum}')">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                </div>
            `;

            $("#buildImg").append(buildImg);

            /*if (addImgCount == 1) {
                $(".addImgBtn").hide();
            }*/
            
        }

        function addVideo() {
            addVideoCount = addVideoCount + 1;
            addVideoIDNum = addVideoIDNum + 1;

            var buildVideo = "";

            buildVideo += `
                <div class="col-sm-4 col-xs-12">
                    <form style="display:block" name="form" method="post" target="" action="" enctype="multipart/form-data" >
                        <div class="popupEmallVideoWrapper">
                        <a href="javascript:;" class="closeBtn" onclick="closeDivVideo(this)">×</a>
                            <input type="hidden" id="storeVideoData${addVideoIDNum}">
                            <input type="hidden" id="storeVideoName${addVideoIDNum}">
                            <input type="hidden" id="storeVideoSize${addVideoIDNum}">
                             <input type="hidden" id="storeVideoType${addVideoIDNum}">
                            <input type="hidden" id="storeVideoFlag${addVideoIDNum}">
                            <input type="file" id="uploadVideo${addVideoIDNum}" class="hided" accept="video/*" style="display:none" onchange="displayVideoName('${addVideoIDNum}', this)">
                            <div>
                                <a href="javascript:;" onclick="$('#uploadVideo${addVideoIDNum}').click();" class="btn btn-primary btnUpload">Upload</a>
                                <span id="videoName${addVideoIDNum}" class="fileName">No Video Uploaded</span>
                                <a id="showVideo${addVideoIDNum}" href="javascript:;" class="btn" style="display: none;padding:6px;" onclick="showVideo('${addVideoIDNum}')">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a id="deleteVideo${addVideoIDNum}" href="javascript:;" class="btn" style="display:none;padding:6px;" onclick="deleteVideo('${addVideoIDNum}')">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            `;

            $("#buildVideo").append(buildVideo);   

            if (addVideoCount == 1) {
                $(".addVideoBtn").hide();
            }
        }

        function closeDiv(n) {
            var getThisInd = $('.closeBtn').index($(n));
            selectedLang.splice(getThisInd, 1);
            $(n).parent().parent().parent().remove();
            addLangCount = addLangCount - 1;
            $('.addLanguageBtn').show();
        }

        function closeDivImg(n) {
            addImgCount = addImgCount - 1;
            $(".addImgBtn").show();
            $(n).parent().parent().remove();

            $("#imgTypeError").html("");
            $("#imgError").html("");
        }

        function closeDivVideo(n) {
            addVideoCount = addVideoCount - 1;
            $(".addVideoBtn").show();
            $(n).parent().parent().parent().remove();

            $("#videoTypeError").html("");
            $("#videoError").html("");
        }

        function detectDuplicate(n) {

            var options = $('.productLanguagesInput');
            var values = $.map(options ,function(option) {
                return $(option).val();
            });

            var getThisInd = $('.productLanguagesInput').index($(n));
            var thisSelected = $(n).val();
            var inArr = $.inArray(thisSelected, selectedLang);

            if(inArr >= 0) {
                $(n).val("");
                alert("This language is selected.");
                selectedLang.splice(getThisInd, 1);
            }else {
                selectedLang[getThisInd] = thisSelected;
                $(n).parent().parent().find(".productNameInput").attr("languageType", $(n).val());
                $(n).parent().parent().find(".descInput").attr("languageType", $(n).val());
            }
        }

        function deleteImg(id) {
            $("#fileUpload"+id).val("");
            $("#fileName"+id).text("No File Uploaded");
            $("#storeFileData"+id).val("");
            $("#storeFileName"+id).val("");
            $("#storeFileType"+id).val("");
            $("#storeFileUploadType"+id).val("");

            $("#viewImg"+id).hide();
            $("#deleteImg"+id).hide();

        }

        function showImg(n) {
            $("#modalImg").attr('style','display: block');
            $("#modalImg").attr('src', $("#storeFileData"+n).val());
            $("#modalVideo").attr('style','display:none');
            $("#showImage").modal();
        }


        function displayFileName(id, n) {
            var dFileName = $("#fileName"+id);

            if (n.files && n.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    // $('#blah').attr('src', e.target.result);
                    // $("#imgData"+input.id).empty().val(reader["result"]);
                    dFileName.text(n.files[0]["name"]);
                    // $("#imgSize"+input.id).empty().val(input.files[0]["size"]);
                    // $("#imgType"+input.id).empty().val(input.files[0]["type"]);
                    // $("#imgFlag"+input.id).empty().val("1");

                    $("#storeFileData"+id).val(reader["result"]);
                    $("#storeFileName"+id).val(n.files[0]["name"]);
                    $("#storeFileSize"+id).val(n.files[0]["size"]);
                    $("#storeFileType"+id).val(n.files[0]["type"]);
                    $("#storeFileFlag"+id).val('1');

                    if((n.files[0]["type"]).split('/')[0] === 'image'){
                        $("#storeFileUploadType"+id).val('image');
                        uploadFileType = 'image';
                    }else{
                        $("#storeFileUploadType"+id).val('video');
                        uploadFileType = 'video';
                    }

                    // $("#viewImg"+id).attr('data-res', reader["result"]);
                    $("#viewImg"+id).css('display', 'inline-block');
                    $("#deleteImg"+id).css('display', 'inline-block');
                };

                reader.readAsDataURL(n.files[0]);
            }
        }

        function submitCallback(data, message) {
            var doFolderName = data.doFolderName;
            var splitted = doFolderName.split('/');
            var folderName = splitted[1]+'/';
            
            if(data.imgName){
                $('#modalProcessing').modal('show');
                 $.each(data.imgName, function (ind, val) {
                     var reqData2 = new FormData();

                     if(val){
                        if(uploadFileType == 'image') {
                            // $('[name=storeVideoName]').val(reqData[lang]['image']);
                            var imagefiles = uploadImageData[ind]['imgData'];//$('#uploadVideo')[0].files[0];
                            var block = imagefiles.split(";");
                            var contentType = block[0].split(":")[1];// In this case "image/gif"
                            // get the real base64 content of the file
                            var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                            // // Convert it to a blob to upload
                            var blob = b64toBlob(realData, contentType);
                            // $('[name=videoName]').val(data.company_video_name);
                             
                            reqData2.append('imageData', blob);
                            reqData2.append('image', val);
                            reqData2.append('folderName', splitted[1]);
                        }else{
                            // $('[name=storeVideoName]').val(reqData[lang]['image']);
                            var imagefiles = uploadImageData[ind]['imgData'];//$('#uploadVideo')[0].files[0];
                            var block = imagefiles.split(";");
                            var contentType = block[0].split(":")[1];// In this case "image/gif"
                            // get the real base64 content of the file
                            var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                            // // Convert it to a blob to upload
                            var blob = b64toBlob(realData, contentType);
                            // $('[name=videoName]').val(data.company_video_name);
                             
                            reqData2.append('imageData', blob);
                            reqData2.append('image', val);
                            reqData2.append('folderName', splitted[1]);
                        }
                    }

                    $.ajax({
                        url: 'scripts/reqUploadCDN.php',
                        type: 'post',
                        data: reqData2,
                        contentType: false,
                        processData: false,
                        async: false,
                        success: function(data){
                        // return;
                        // var json = JSON.parse(data);
                        // if (json.status == 'ok') {
                        //     uploadVideoSuccess();
                        // }
                        },
                    });
                });

                $('#modalProcessing').modal('hide');
            }


            if(data.videoName){
                $('#modalProcessing').modal('show');
                 $.each(data.videoName, function (ind, val) {
                     var reqData2 = new FormData();

                     if(val){
                            // // $('[name=storeVideoName]').val(reqData[lang]['image']);
                            // var imagefiles = reqData['imgData'];//$('#uploadVideo')[0].files[0];
                            // var block = imagefiles.split(";");
                            // var contentType = block[0].split(":")[1];// In this case "image/gif"
                            // // get the real base64 content of the file
                            // var realData = block[1].split(",")[1];// In this case "R0lGODlhPQBEAPeoAJosM...."
                            // // // Convert it to a blob to upload
                            // var blob = b64toBlob(realData, contentType);
                            // // $('[name=videoName]').val(data.company_video_name);
                             
                            // reqData2.append('imageData', blob);
                            // reqData2.append('image', val);
                            // reqData2.append('folderName', 'product');


                            var base64Data = uploadVideoData[ind]['videoData'];
                            var block = base64Data.split(";");
                            var contentType = block[0].split(":")[1];
                            var realData = block[1].split(",")[1];
                            var blob = b64toBlob(realData, contentType);

                            reqData2.append('videoData', blob);
                            reqData2.append('video', val);
                            reqData2.append('folderName', splitted[1]);

                        // console.log(blob);
                     }

                     // for (var pair of reqData2.entries()) {
                     //     console.log(pair[0]+ ', ' + pair[1]); 
                     // }

                         $.ajax({
                             url: 'scripts/reqUploadCDN.php',
                             type: 'post',
                             data: reqData2,
                             contentType: false,
                             processData: false,
                             async: false,
                             success: function(data){
                                 // return;
                                 // var json = JSON.parse(data);
                                 // if (json.status == 'ok') {
                                 //     uploadVideoSuccess();
                                 // }
                             },
                         });
                    });

             $('#modalProcessing').modal('hide');

             uploadVideoSuccess();
            } else {
             uploadVideoSuccess();
            }
        }

        function b64toBlob(b64Data, contentType, sliceSize) {
            contentType = contentType || '';
            sliceSize = sliceSize || 512;

            var byteCharacters = atob(b64Data);
            var byteArrays = [];

            for (var offset = 0; offset < byteCharacters.length; offset += sliceSize) {
                var slice = byteCharacters.slice(offset, offset + sliceSize);

                var byteNumbers = new Array(slice.length);
                for (var i = 0; i < slice.length; i++) {
                    byteNumbers[i] = slice.charCodeAt(i);
                }

                var byteArray = new Uint8Array(byteNumbers);

                byteArrays.push(byteArray);
            }

          var blob = new Blob(byteArrays, {type: contentType});
          return blob;
        }

        function uploadVideoSuccess() {
            showMessage("Add Package Success.", 'success', 'Congratulations!', 'upload', 'getStarterPackageList.php');
        }

        $(document).on("input",".limitNum",function() {
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
            this.value = this.value.match(/^[0-9]+\.?[0-9]{0,2}/);
        });

    </script>
</body>
</html>