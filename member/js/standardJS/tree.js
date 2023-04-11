function buildPlacementTree(sponsor, downlines, treeDiv, placementChildNumber, treeLogo) {
    $("#"+treeDiv).addClass("table-responsive");
    //Append hierarchy diagram div
    $("#"+treeDiv).append('<div class="hv-hierarchy" style="margin:0; min-height:300px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
    //Append items to diagram
    var ownPlacement = "";
        ownPlacement += `
            <div class="hv-item-parent">
                <div class="disgramBox">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <img src="${treeLogo}" class="diagramIcon">
                            </div>
                            <div class="col-12">
                                <b>${sponsor[0]['name']}</b>
                            </div>
                            <div class="col-12">
                                ${sponsor[0]['member_id']}
                            </div>
                            <hr>
                            <div class="col-12">
                                <b>${translations['M03702'][language]} :</b>
                            </div>
                            <div class="col-12">
                                ${addCommas(Number(sponsor[0]['DVP_1']).toFixed(2))}
                            </div>
                            <div class="col-12">
                                <b>${translations['M03703'][language]} :</b>
                            </div>
                            <div class="col-12">
                                ${addCommas(Number(sponsor[0]['DVP_2']).toFixed(2))}
                            </div>
                            <div class="col-12">
                                <b>${translations['M03704'][language]} :</b>
                            </div>
                            <div class="col-12">
                                ${addCommas(Number(sponsor[0]['remainingDVP_1']).toFixed(2))}
                            </div>
                            <div class="col-12">
                                <b>${translations['M03705'][language]} :</b>
                            </div>
                            <div class="col-12">
                                ${addCommas(Number(sponsor[0]['remainingDVP_2']).toFixed(2))}
                            </div>
                            <div class="col-12">
                                <b>${translations['M01026'][language]} :</b>
                            </div>
                            <div class="col-12">
                                ${sponsor[0]['created_at']}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    $(".hv-item").append(ownPlacement);
    $(".hv-item").append('<div id="children'+sponsor[0]['client_id']+'" class="hv-item-children"></div>');
    if(placementChildNumber == 2) {
        var downlineLeftChild, downlineRightChild, leftChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(sponsor[0]['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(sponsor[0]['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });

        recursiveBuildPlacementTwoChild(downlines, sponsor[0]['client_id'], downlineLeftChild, downlineRightChild, leftChildFlag, rightChildFlag, treeLogo, sponsor[0]['username']);
    }
    else if(placementChildNumber == 3) {
        var downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag = 0, middleChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(sponsor[0]['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(sponsor[0]['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineMiddleChild = val;
                middleChildFlag = 1;
            }
            else if(sponsor[0]['client_id'] == val['upline_id'] && val['client_position'] == 3) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });

        recursiveBuildPlacementThreeChild(downlines, sponsor[0]['client_id'], downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag, middleChildFlag, rightChildFlag, treeLogo, sponsor[0]['username']);
    }
    $(".hv-item").append('<br/>');
}

function recursiveBuildPlacementTwoChild(downlines, uplineID, leftDownline, rightDownline, leftFlag, rightFlag, treeLogo, sponsorUsername) {
    
    if(leftFlag) {
        var downlineLeftChild, downlineRightChild, leftChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+leftDownline['client_id']+'" class="hv-item-child"></div>');
            var downlinePlacement = "";
                downlinePlacement += `
                    <div class="hv-item-parent">
                        <div class="disgramBox" id="${leftDownline['client_id']}" onclick="treeBranchClick(this)">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="${treeLogo}" class="diagramIcon">
                                    </div>
                                    <div class="col-12">
                                        <b>${leftDownline['name']}</b>
                                    </div>
                                    <div class="col-12">
                                        ${leftDownline['member_id']}
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <b>${translations['M03702'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(leftDownline['DVP_1']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03703'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(leftDownline['DVP_2']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03704'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(leftDownline['remainingDVP_1']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03705'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(leftDownline['remainingDVP_2']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M01026'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${leftDownline['created_at']}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            $("#child"+leftDownline['client_id']).append(downlinePlacement);
            $("#child"+leftDownline['client_id']).append('<div id="children'+leftDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementTwoChild(downlines, leftDownline['client_id'], downlineLeftChild, downlineRightChild, leftChildFlag, rightChildFlag, treeLogo, leftDownline['username']);
        }
        else {
            var downlinePlacement = "";
                downlinePlacement += `
                    <div class="hv-item-child">
                        <div class="disgramBox" id="${leftDownline['client_id']}" onclick="treeBranchClick(this)">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="${treeLogo}" class="diagramIcon">
                                    </div>
                                    <div class="col-12">
                                        <b>${leftDownline['name']}</b>
                                    </div>
                                    <div class="col-12">
                                        ${leftDownline['member_id']}
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <b>${translations['M03702'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(leftDownline['DVP_1']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03703'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(leftDownline['DVP_2']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03704'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(leftDownline['remainingDVP_1']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03705'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(leftDownline['remainingDVP_2']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M01026'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${leftDownline['created_at']}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                `;

            $("#children"+uplineID).append(downlinePlacement);
        }
    }
    else {
        $("#children"+uplineID).append(`<div class="hv-item-child"><p>${translations['M03311'][language]}</p></div>`);
        
        $('.goToReg1').click(function() {
            $.redirect('registration.php',{
                fromDiagram : "1",
                getPlacementName : sponsorUsername,
                placementPosition : "1"
            });
        });


    }

    if(rightFlag) {
        var downlineLeftChild, downlineRightChild, leftChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+rightDownline['client_id']+'" class="hv-item-child"></div>');
            var downlinePlacement = "";
                downlinePlacement += `
                    <div class="hv-item-parent">
                        <div class="disgramBox" id="${rightDownline['client_id']}" onclick="treeBranchClick(this)">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="${treeLogo}" class="diagramIcon">
                                    </div>
                                    <div class="col-12">
                                        <b>${rightDownline['name']}</b>
                                    </div>
                                    <div class="col-12">
                                        ${rightDownline['member_id']}
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <b>${translations['M03702'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(rightDownline['DVP_1']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03703'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(rightDownline['DVP_2']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03704'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(rightDownline['remainingDVP_1']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03705'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(rightDownline['remainingDVP_2']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M01026'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${rightDownline['created_at']}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

            $("#child"+rightDownline['client_id']).append(downlinePlacement);
            $("#child"+rightDownline['client_id']).append('<div id="children'+rightDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementTwoChild(downlines, rightDownline['client_id'], downlineLeftChild, downlineRightChild, leftChildFlag, rightChildFlag, treeLogo, rightDownline['username']);
        }
        else {

            var downlinePlacement = "";
                downlinePlacement += `
                    <div class="hv-item-child">
                        <div class="disgramBox" id="${rightDownline['client_id']}" onclick="treeBranchClick(this)">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="${treeLogo}" class="diagramIcon">
                                    </div>
                                    <div class="col-12">
                                        <b>${rightDownline['name']}</b>
                                    </div>
                                    <div class="col-12">
                                        ${rightDownline['member_id']}
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <b>${translations['M03702'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(rightDownline['DVP_1']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03703'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(rightDownline['DVP_2']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03704'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(rightDownline['remainingDVP_1']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M03705'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${addCommas(Number(rightDownline['remainingDVP_2']).toFixed(2))}
                                    </div>
                                    <div class="col-12">
                                        <b>${translations['M01026'][language]} :</b>
                                    </div>
                                    <div class="col-12">
                                        ${rightDownline['created_at']}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;


            $("#children"+uplineID).append(downlinePlacement);
        }
    }
    else {
        $("#children"+uplineID).append(`<div class="hv-item-child"><p>${translations['M03311'][language]}</p></div>`);

        $('.goToReg2').click(function() {
            $.redirect('registration.php',{
                fromDiagram : "1",
                getPlacementName : sponsorUsername,
                placementPosition : "2"
            });
        });
    }
}

function recursiveBuildPlacementThreeChild(downlines, uplineID, leftDownline, middleDownline, rightDownline, leftFlag, middleFlag, rightFlag, treeLogo, sponsorUsername) {
    if(leftFlag) {
        var downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag = 0, middleChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineMiddleChild = val;
                middleChildFlag = 1;
            }
            else if(leftDownline['client_id'] == val['upline_id'] && val['client_position'] == 3) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || middleChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+leftDownline['client_id']+'" class="hv-item-child"></div>');
            $("#child"+leftDownline['client_id']).append('<div class="hv-item-parent"><p id="'+leftDownline['client_id']+'" onclick="treeBranchClick(this)">'+leftDownline['username']+'</p></div>');
            $("#child"+leftDownline['client_id']).append('<div id="children'+leftDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementThreeChild(downlines, leftDownline['client_id'], downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag, middleChildFlag, rightChildFlag);
        }
        else {
            $("#children"+uplineID).append('<div class="hv-item-child"><p id="'+leftDownline['client_id']+'" onclick="treeBranchClick(this)">'+leftDownline['username']+'</p></div>');
        }
    }
    else {
        $("#children"+uplineID).append(`<div class="hv-item-child"><p>${translations['M03311'][language]}</p></div>`);

        $('.goToReg1').click(function() {
            $.redirect('registration.php',{
                fromDiagram : "1",
                getPlacementName : sponsorUsername,
                placementPosition : "1"
            });
        });
    }

    if(middleFlag) {
        var downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag = 0, middleChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(middleDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(middleDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineMiddleChild = val;
                middleChildFlag = 1;
            }
            else if(middleDownline['client_id'] == val['upline_id'] && val['client_position'] == 3) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || middleChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+middleDownline['client_id']+'" class="hv-item-child"></div>');
            $("#child"+middleDownline['client_id']).append('<div class="hv-item-parent"><p id="'+middleDownline['client_id']+'" onclick="treeBranchClick(this)">'+middleDownline['username']+'</p></div>');
            $("#child"+middleDownline['client_id']).append('<div id="children'+middleDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementThreeChild(downlines, middleDownline['client_id'], downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag, middleChildFlag, rightChildFlag);
        }
        else {
            $("#children"+uplineID).append('<div class="hv-item-child"><p id="'+middleDownline['client_id']+'" onclick="treeBranchClick(this)">'+middleDownline['username']+'</p></div>');
        }
    }
    else {
        $("#children"+uplineID).append(`<div class="hv-item-child"><p>${translations['M03311'][language]}</p></div>`);

        $('.goToReg').click(function() {
            $.redirect('registration.php',{
                fromDiagram : "1"
            });
        });
    }

    if(rightFlag) {
        var downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag = 0, middleChildFlag = 0, rightChildFlag = 0;
        $.each(downlines, function(key, val) {
            if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 1) {
                downlineLeftChild = val;
                leftChildFlag = 1;
            }
            else if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 2) {
                downlineMiddleChild = val;
                middleChildFlag = 1;
            }
            else if(rightDownline['client_id'] == val['upline_id'] && val['client_position'] == 3) {
                downlineRightChild = val;
                rightChildFlag = 1;
            }
        });
        if(leftChildFlag || middleChildFlag || rightChildFlag) {
            $("#children"+uplineID).append('<div id="child'+rightDownline['client_id']+'" class="hv-item-child"></div>');
            $("#child"+rightDownline['client_id']).append('<div class="hv-item-parent"><p id="'+rightDownline['client_id']+'" onclick="treeBranchClick(this)">'+rightDownline['username']+'</p></div>');
            $("#child"+rightDownline['client_id']).append('<div id="children'+rightDownline['client_id']+'" class="hv-item-children"></div>');

            recursiveBuildPlacementThreeChild(downlines, rightDownline['client_id'], downlineLeftChild, downlineMiddleChild, downlineRightChild, leftChildFlag, middleChildFlag, rightChildFlag);
        }
        else {
            $("#children"+uplineID).append('<div class="hv-item-child"><p id="'+rightDownline['client_id']+'" onclick="treeBranchClick(this)">'+rightDownline['username']+'</p></div>');
        }
    }
    else {
        $("#children"+uplineID).append(`<div class="hv-item-child aaa"><p>${translations['M03311'][language]}</p></div>`);

        $('.goToReg2').click(function() {
            $.redirect('registration.php',{
                fromDiagram : "1",
                getPlacementName : sponsorUsername,
                placementPosition : "2"
            });
        });
    }
}

function buildSponsorTree(sponsor, downlines, treeDiv, scrollFlag, treeLogo) {

    // console.log(sponsor);
    if(scrollFlag == 1) {
        $("#"+treeDiv).addClass("table-responsive");
        //Append hierarchy diagram div
        $("#"+treeDiv).append('<div class="hv-hierarchy" style="margin:0; min-height:300px; padding: 0 15px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
        //Append items to diagram
        // var activated = sponsor['activated']==1 ? "Active" : "Inactive";
        var statusDisplay = `${translations["M03654"][language]}`;
        if(sponsor['activated'] == 1){
            if(sponsor['terminated'] == 1){
                statusDisplay = `${translations["M01655"][language]}`;
            }
        }
        var rankDisplay = sponsor['rankDisplay'];
        var rankImg = ""
        switch(rankDisplay) {
            case "Fiz Member":
                rankImg = "images/project/8.png";
                break;
            case "Fiz Preneur":
                rankImg = "images/project/1.png";
                break;
            case "Fiz Executive":
                rankImg = "images/project/2.png";
                break;
            case "Fiz Director":
                rankImg = "images/project/4.png";
                break;
            case "Fiz Manager":
                rankImg = "images/project/3.png";
                break;
            case "-":
            case "Empty":
                rankImg = "images/project/5.png";
                break;
            case "Inactive":
                rankImg = "images/project/6.png";
                break;
            case "Terminated":
                rankImg = "images/project/7.png";
                break;
        }

        var buildOwn = "";
            buildOwn +=`
                <div class="hv-item-parent">
                    <div class="disgramBox">
                        <div class="col-12">
                            <div class="row">
                                <!-- <div class="col-12">
                                    <img src="${treeLogo}" class="diagramIcon">
                                </div> -->
                                <div class="col-12 disgramBoxTitle">
                                    <b>${sponsor['username']}</b>
                                </div>
                                <div class="col-12 disgramBoxSubtitle">
                                    <b>(${sponsor['fullName']})</b>
                                </div>

                                <hr>

                                <div class="col-12 mb-3">
                                    <b><!-- ${translations['M00025'][language]} -->Total PVP:</b><br>${numberThousand(sponsor['ownSales'], 2)}
                                </div>

                                <div class="col-12 mb-3">
                                    <b><!-- ${translations['M03677'][language]} -->DVP:</b><br>${numberThousand(sponsor['pgpSales'], 2)}
                                </div>

                                <div class="col-12 mb-2">
                                    <b>${sponsor['created_at']}</b>
                                </div>

                                <div class="col-12 mb-4">
                                    <span class="btn disgramBoxBtn">${statusDisplay}</span>
                                </div>

                                <div class="col-12">
                                    <img src="${rankImg}" style="height: 50px; width: 50px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;

        $(".hv-item").append(buildOwn);
        $(".hv-item").append('<div class="hv-item-children"></div>');

        if(downlines.length > 0) {
            $.each(downlines, function(key, val) {

                var totalDisplayDownline = 5;
                var downLen = downlines.length;
                var emptyBox = totalDisplayDownline - downLen;
                // var activated = sponsor['activated']==1 ? "Active" : "Inactive";
                var rankDisplay = downlines[key]['rankDisplay'];
                var rankImg = ""
                switch(rankDisplay) {
                    case "Fiz Member":
                        rankImg = "images/project/8.png";
                        break;
                    case "Fiz Preneur":
                        rankImg = "images/project/1.png";
                        break;
                    case "Fiz Executive":
                        rankImg = "images/project/2.png";
                        break;
                    case "Fiz Director":
                        rankImg = "images/project/4.png";
                        break;
                    case "Fiz Manager":
                        rankImg = "images/project/3.png";
                        break;
                    case "-":
                    case "Empty":
                        rankImg = "images/project/5.png";
                        break;
                    case "Inactive":
                        rankImg = "images/project/6.png";
                        break;
                    case "Terminated":
                        rankImg = "images/project/7.png";
                        break;
                }

                var statusDisplay = `${translations["M03654"][language]}`;
                if(downlines[key]['activated'] == 1){
                    if(downlines[key]['terminated'] == 1){
                        statusDisplay = `${translations["M01655"][language]}`;
                    }
                    
                }

                var buildDownline = "";
                    buildDownline += `
                        <div class="hv-item-child">
                            <div class="disgramBox" id="${downlines[key]['client_id']}" onclick="treeBranchClick(this)">
                                <div class="col-12">
                                    <div class="row">
                                        <!-- <div class="col-12">
                                            <img src="${treeLogo}" class="diagramIcon">
                                        </div> -->
                                        <div class="col-12 disgramBoxTitle">
                                            <b>${downlines[key]['username']}</b>
                                        </div>
                                        <div class="col-12 disgramBoxSubtitle">
                                            <b>(${downlines[key]['fullName']})</b>
                                        </div>

                                        <hr>

                                        <div class="col-12 mb-3">
                                            <b><!-- ${translations['M00025'][language]} -->Total PVP:</b><br>${numberThousand(downlines[key]['ownSales'], 2)}
                                        </div>

                                        <div class="col-12 mb-3">
                                            <b><!-- ${translations['M00026'][language]} -->DVP:</b><br>${numberThousand(downlines[key]['pgpSales'], 2)}
                                        </div>

                                        <div class="col-12 mb-2">
                                            <b>${downlines[key]['created_at']}</b>
                                        </div>

                                        <div class="col-12 mb-4">
                                            <span class="btn disgramBoxBtn">${statusDisplay}</span>
                                        </div>

                                        <div class="col-12">
                                            <img src="${rankImg}" style="height: 50px; width: 50px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                $(".hv-item-children").append(buildDownline);

                // if(emptyBox > 0) {
                //     for(ind = 0; ind<emptyBox; ind++) {

                //         var rankImg = "images/project/5.png";
                //         var buildDownline = "";
                //             buildDownline += `
                //                 <div class="hv-item-child">
                //                     <div class="disgramBox h-100" id="">
                //                         <div class="h-100 d-flex flex-column">
                //                             <div class="emptyDisgramBox">
                //                                 <b style="text-transform: uppercase;">
                //                                     ${translations['M03311'][language]}
                //                                 </b>
                //                             </div>
                //                             <div class="">
                //                                 <img src="${rankImg}" style="height: 50px; width: 50px;">
                //                             </div>
                //                         </div>
                //                     </div>
                //                 </div>
                //             `;

                //         $(".hv-item-children").append(buildDownline);
                //     }
                // }
            });
        }
        else {
            $(".hv-item-children").append(`<div class="hv-item-child"><p>${translations['M03311'][language]}</p></div>`);

            $('.goToReg').click(function() {
                $.redirect('registration.php',{
                    fromSponsorDiagram : "1"
                });
            });
        }
    }

    if(scrollFlag == 0) {
        //Append carousel
        $("#"+treeDiv).append('<div id="treeCarousel" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators"></ol><div class="carousel-inner"></div><a class="left carousel-control" href="#treeCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#treeCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only">Next</span></a></div>');

        if(downlines.length > 0) {
            var j = 0; var d = 0;
            for(var i = 0; i < Math.ceil(downlines.length / 5); i++) {
                if(j == 0) {
                    //Append 1st carousel
                    $(".carousel-indicators").append('<li data-target="#treeCarousel" data-slide-to="'+j+'" class="active"></li>');
                    $(".carousel-inner").append('<div id="diagram'+j+'" class="item active"></div>');
                    //Append hierarchy diagram div
                    $("#diagram"+j).append('<div class="hv-hierarchy" style="margin:0; height:300px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
                    //Append items to diagram
                    $("#diagram"+j+" .hv-item").append('<br/><div class="hv-item-parent"><p>'+sponsor['username']+'</p></div>');
                    $("#diagram"+j+" .hv-item").append('<div class="hv-item-children"></div>');

                    for(var z = 0; z < 5; z++) {
                        $("#diagram"+j+" .hv-item-children").append('<div class="hv-item-child"><p id="'+downlines[d]['client_id']+'" onclick="treeBranchClick(this)">'+downlines[d]['username']+'</p></div>');
                        d++;
                        if(d == (downlines.length))
                            return false;
                    }
                }//Append 2nd carousel onwards
                else {
                    $(".carousel-indicators").append('<li data-target="#treeCarousel" data-slide-to="'+j+'"></li>');
                    $(".carousel-inner").append('<div id="diagram'+j+'" class="item"></div>');
                    //Append hierarchy diagram div
                    $("#diagram"+j).append('<div class="hv-hierarchy" style="margin:0; height:300px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
                    //Append items to diagram
                    $("#diagram"+j+" .hv-item").append('<br/><div class="hv-item-parent"><p>'+sponsor['username']+'</p></div>');
                    $("#diagram"+j+" .hv-item").append('<div class="hv-item-children"></div>');

                    for(var z = 0; z < 5; z++) {
                        $("#diagram"+j+" .hv-item-children").append('<div class="hv-item-child"><p id="'+downlines[d]['client_id']+'" onclick="treeBranchClick(this)">'+downlines[d]['username']+'</p></div>');
                        d++;
                        if(d == (downlines.length))
                            return false;
                    }
                }

                j++;

                if(d == (downlines.length))
                    return false;
            }
        }
        else {
            //Append 1st carousel
            $(".carousel-indicators").append('<li data-target="#treeCarousel" data-slide-to="0" class="active"></li>');
            $(".carousel-inner").append('<div id="diagram0" class="item active"></div>');
            //Append hierarchy diagram div
            $("#diagram0").append('<div class="hv-hierarchy" style="margin:0; height:300px;"><div class="hv-wrapper"><div class="hv-item"></div></div></div>');
            //Append items to diagram
            $("#diagram0 .hv-item").append('<br/><div class="hv-item-parent"><p>'+sponsor['username']+'</p></div>');
            $("#diagram0 .hv-item").append('<div class="hv-item-children"></div>');

            $("#diagram0 .hv-item-children").append(`<div class="hv-item-child"><p>${translations['M03311'][language]}</p></div>`);

            $('.goToReg').click(function() {
                $.redirect('registration.php',{
                    fromDiagram : "1"
                });
            });
        }
    }

}