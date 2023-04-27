<?php
include_once('./_common.php');

$mb_id = isset($_SESSION['ss_mb_id']) ? trim($_SESSION['ss_mb_id']) : '';

if(!$mb_id)
    alert('회원아이디 값이 없습니다. 올바른 방법으로 이용해 주십시오.');

$ss_mb_10 = get_session('ss_mb_10_ss');
if($member){
    if( $ss_mb_10 != $member['mb_10']){
        if(function_exists('social_provider_logout')){
            social_provider_logout();
        }
        session_unset(); // 모든 세션변수를 언레지스터 시켜줌
        session_destroy(); // 세션해제함
        alert('중복접속으로 인하여 로그아웃 되었습니다.', G5_URL);
    }
}

?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta http-equiv="imagetoolbar" content="no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="text/javascript" src="<?php echo G5_THEME_URL?>/js/hmac-sha256.js"></script>
    <script type="text/javascript" src="<?php echo G5_THEME_URL?>/js/enc-base64-min.js"></script>
    <script type="text/javascript" src="<?php echo G5_JS_DIR?>/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="<?php echo G5_THEME_URL?>/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo G5_THEME_URL?>/js/js.cookie.js"></script>
    <script type="text/javascript" src="<?php echo G5_THEME_URL?>/js/jquery-watermark.js"></script>
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/jquery-ui.min.css">
    <link rel='stylesheet' href='<?php echo G5_THEME_URL?>/css/tbos.css'>
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link href="http://fonts.googleapis.com/earlyaccess/nanumgothiccoding.css" rel="stylesheet">
    <title>Insert title here</title>

    <script type="text/javascript">
        var overlap = "${overlap}";

        /*$.datepicker.setDefaults({
            dateFormat: 'yy-mm-dd',
            prevText: '이전 달',
            nextText: '다음 달',
            monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            dayNames: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
            dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
            showMonthAfterYear: true,
            yearSuffix: '년'
        });*/


        function getHashFromUrl(url){
            var a = document.createElement("a");
            a.href = url;
            return a.hash.replace(/^#/, "");
        };

        var isBlink = false;

        var todayStr = "";
        var shoeItems = [null,null,null,null,null,null,null,null];
        var currentRoomNo = null;
        var currentShoe = null;

        var firstMoney = [5,10,20,40];
        var secondMoney = [20,40,80,160];

        var tableNos = [];
        var memberNo = 121;
        var intervalObj = null;

        var routeQuaterPoint = [[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0]];
        var routeQuaterPointRank = [[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0]];
        var routeMatchCount = [0, 0, 0, 0, 0, 0];

        $(document).ready(function() {
            if(overlap == ''){
                alert("중복 브라우저 허용은 안됩니다.");
                location.href = "<?php echo G5_BBS_URL; ?>/login.php";
                return false;
            }

            //var queryValues = getUrlVars();
            //var tableNoStr = queryValues.tableNo;
            var tableNoStr = "1"; //테이블 NO
            if (tableNoStr == undefined || tableNoStr == null)
            {
                tableNos = [1];
            }
            else
            {
                tableNos = tableNoStr.split(',');
            }
            //setTableTop(tableNoStr);
            $.fn.classList = function() { if (this.length == 0) { return []; } else { return this[0].className.split(/\s+/); } }

            /* if ("${USER}" == null || "${USER}" == "")
            {
                location.href="<?php echo G5_BBS_URL; ?>/login.php";
                return;
            } */

            //bindUserInfo();
            bindBtns();

            clearTable();
            /* shoeDate = queryValues.shoeDate;
            if (shoeDate == undefined)
            {
                var today = new Date();
                shoeDate = today.getFullYear() + "-" + padLeft((today.getMonth() + 1),2) + "-" + padLeft(today.getDate(),2);
            } */

            /* intervalObj = setInterval(function() {
                location.reload();
            }, 10000); */

            //loadShoe();

        });

        /* function setTableTop(tableNoStr)
        {
            $(".swapBtn select").val(tableNoStr);
        } */

        function loadShoe()
        {
            /* $restApiBk.bkShoeUserProceding.getInfo(null, memberNo, tableNos[0], function(data) {
                if (data.ErrorCode == 0)
                {
                    shoeItems[parseInt(tableNos[0])-1] = data.RetVals.item[0];
                    var shoeItem = shoeItems[parseInt(tableNos[0])-1];
                    routeQuaterPoint = [[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0],[0, 0, 0, 0, 0, 0]];
                    routeMatchCount = [0,0,0,0,0,0];
                    calcCurrentRound(shoeItem);
                    calculateStatistics(shoeItem);
                    calcResults(shoeItem);
                    drawBatTable(0);
                    drawShoeItem($(".pickTable:eq(0)"), 0, 1, $(".pickTableNameTbl:eq(0)"));
                    drawShoeItem($(".pickTable:eq(1)"), 0, 2, $(".pickTableNameTbl:eq(1)"));
                    drawShoeItem($(".pickTable:eq(2)"), 0, 3, $(".pickTableNameTbl:eq(2)"));
                    drawShoeItem($(".pickTable:eq(3)"), 0, 4, $(".pickTableNameTbl:eq(3)"));
                    drawShoeItem($(".pickTable:eq(4)"), 0, 5, $(".pickTableNameTbl:eq(4)"));
                    drawShoeItem($(".pickTable:eq(5)"), 0, 6, $(".pickTableNameTbl:eq(5)"));
                    drawShoeItem($(".pickTable:eq(6)"), 0, 7, $(".pickTableNameTbl:eq(6)"));
                    $(".pickTableNo:eq(0)").text(tableNos[0] + "번");
                    drawTable();
                }
                else
                {
                    if (data.ErrorCode == -801) {
                        location.reload();
                    }
                    else
                    {
                        console.log(data);
                        alert(data.ErrorMsg);
                    }
                }
            }); */
        }

        function getRouteQuaterRank(quaterNo)
        {
            // 1~4까지만 구한다.
            var rankPoints = [
                -150,
                routeQuaterPoint[quaterNo][1],
                routeQuaterPoint[quaterNo][2],
                routeQuaterPoint[quaterNo][3],
                routeQuaterPoint[quaterNo][4],
                -150
            ];

            var rankOrders = [
                0, 1, 2, 3, 4, 5
            ];

            rankOrders.sort(function (a, b) {
                var rankPointa = rankPoints[a];
                var rankPointb = rankPoints[b];

                if (rankPointa != rankPointb)
                {
                    return rankPointb - rankPointa;
                }
                else
                {
                    return a - b;
                }
            });

            routeQuaterPointRank[quaterNo][0] = rankOrders.indexOf(0) + 1;
            routeQuaterPointRank[quaterNo][1] = rankOrders.indexOf(1) + 1;
            routeQuaterPointRank[quaterNo][2] = rankOrders.indexOf(2) + 1;
            routeQuaterPointRank[quaterNo][3] = rankOrders.indexOf(3) + 1;
            routeQuaterPointRank[quaterNo][4] = rankOrders.indexOf(4) + 1;
            routeQuaterPointRank[quaterNo][5] = rankOrders.indexOf(5) + 1;
        }

        function calculateStatistics(shoeItem)
        {
            var currentRoundRemain = shoeItem.currentRound % 4;
            if (currentRoundRemain == 0) currentRoundRemain = 4;
            var currentQuaterNo = (shoeItem.currentRound - currentRoundRemain) / 4 + 1;
            shoeItem.pCount = 0;
            shoeItem.bCount = 0;
            shoeItem.disp4X = 0;
            shoeItem.disp8X = 0;
            var prevWinner = "";
            var winCount = "";

            var routeQuaterPointSum = [0,0,0,0,0,0];
            for(var j=1; j<=60; j++)
            {
                var roundRemain = j % 4;
                if (roundRemain == 0) roundRemain = 4;
                var quaterNo = (j - roundRemain) / 4 + 1;
                if (shoeItem["r" + j] == null) shoeItem["r" + j] = "";
                if (shoeItem["r" + j] == "B") shoeItem.bCount++;
                else if (shoeItem["r" + j] == "P") shoeItem.pCount++;

                if (prevWinner == shoeItem["r" + j])
                {
                    winCount++;
                }
                else
                {
                    prevWinner = shoeItem["r" + j];
                    if (winCount >= 4) shoeItem.disp4X++;
                    if (winCount >= 8) shoeItem.disp8X++;
                    winCount = 1;
                }

                for(var routeNo = 1; routeNo < 8; routeNo++)
                {
                    var pickValBase = "";
                    if (routeNo == 0)
                    {
                        pickValBase = "manPick";
                    }
                    else if (routeNo == 1)
                    {
                        pickValBase = "pickRouteOne";
                    }
                    else if (routeNo == 2)
                    {
                        pickValBase = "pickRouteTwo";
                    }
                    else if (routeNo == 3)
                    {
                        pickValBase = "pickRouteThree";
                    }
                    else if (routeNo == 4)
                    {
                        pickValBase = "pickRouteFour";
                    }
                    else if (routeNo == 5)
                    {
                        pickValBase = "pickRouteFive";
                    }
                    else if (routeNo == 6)
                    {
                        pickValBase = "pickRouteSix";
                    }
                    else if (routeNo == 7)
                    {
                        pickValBase = "pickRouteSeven";
                    }

                    var roundNo = j;
                    var roundRemain = roundNo % 4;
                    if (roundRemain == 1 && roundNo > 12)
                    {
                        var quaterPoint = getPointOfQuater(shoeItem["r" + (roundNo - 3)], shoeItem["r" + (roundNo - 2)], shoeItem["r" + (roundNo-1)],shoeItem[pickValBase + (roundNo - 3)], shoeItem[pickValBase + (roundNo - 2)], shoeItem[pickValBase + (roundNo-1)]);
                        routeQuaterPointSum[routeNo] += quaterPoint;
                    }
                    if ((roundNo > 12 && roundNo <= shoeItem.currentRound) && (shoeItem.currentRound == roundNo || roundRemain == 1))
                    {
                        routeQuaterPoint[quaterNo][routeNo] = routeQuaterPointSum[routeNo];
                        getRouteQuaterRank(quaterNo);
                    }
                    if (roundNo > 20 && shoeItem.currentRound == roundNo)
                    {
                        //routeQuaterPoint[routeNo] = routeQuaterPointSum[routeNo];
                        var roundRemainX = (roundRemain == 0?4:roundRemain);
                        var roundStart = (roundNo - roundRemainX) - 12 + 1;
                        var matchCount = getMatchCount(shoeItem, roundStart, pickValBase);
                        routeMatchCount[routeNo] = matchCount;
                    }
                }
            }

            //console.log("routeMatchCount=" + JSON.stringify(routeMatchCount));
        }

        function getMatchCount(shoeItem, roundStart, pickValBase)
        {
            var matchCount = 0;

            for(var i=0; i<12; i++)
            {
                var roundNo = roundStart+i;
                var roundRemain = roundNo % 4;
                //console.log("roundNo=" + roundNo);
                if (roundRemain != 1)
                {
                    var resultPick = shoeItem["r" + roundNo];
                    var predictPick = shoeItem[pickValBase + roundNo];

                    if (predictPick != "P" && predictPick != "B") {
                        matchCount = 0;
                        break;
                    }

                    if ((resultPick == "P" || resultPick == "B"))
                    {
                        if (resultPick == predictPick) { matchCount++; }
                    }
                }
            }

            return matchCount;
        }

        function calcResults(shoeItem)
        {
            console.log(shoeItem);
            var singleResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":1}];
            var pMaxResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":2}];
            var bMaxResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":3}];
            var qMaxResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":4}];
            var prevShoesResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":5}];
            var prevHeadsResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":6}];
            var upSumResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":7}];
            var allNewResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":8}];
            var threeSevenResults = [{"level":0,"totCnt":0,"winCnt":0,"firstMatch":0,"bangMiss":0,"pick":"","order":9}];

            var prevSingle = null;
            var prevPMax = null;
            var prevBMax = null;
            var prevQMax = null;
            var prevPrevShoe = null;
            var prevPrevHead = null;
            var prevUpSum = null;
            var prevAllNew = null;
            var prevThreeSeven = null;

            for(var rIdx=5; rIdx<=60; rIdx++)
            {
                prevSingle = singleResults[singleResults.length-1];
                prevPMax = pMaxResults[pMaxResults.length-1];
                prevBMax = bMaxResults[bMaxResults.length-1];
                prevQMax = qMaxResults[qMaxResults.length-1];
                prevPrevShoe = prevShoesResults[prevShoesResults.length-1];
                prevPrevHead = prevHeadsResults[prevHeadsResults.length-1];
                prevUpSum = upSumResults[upSumResults.length-1];
                prevAllNew = allNewResults[allNewResults.length-1];
                prevThreeSeven = threeSevenResults[threeSevenResults.length-1];

                var shoeResult = shoeItem["r" + rIdx];
                var sMax = shoeItem["sMax" + rIdx];
                var pMax = shoeItem["pMax" + rIdx];
                var bMax = shoeItem["bMax" + rIdx];
                var prMax = shoeItem["qMax" + rIdx];
                var prShoe = shoeItem["pShoe" + rIdx];
                var prHead = shoeItem["pHead" + rIdx];
                var upSum = shoeItem["upSum" + rIdx];
                var allNew = shoeItem["allNew" + rIdx];
                var threeSeven = shoeItem["threeSeven" + rIdx];

                if (shoeResult != "P"  && shoeResult != "B") { break; }

                singleResults.push(calcResult(prevSingle, shoeResult, sMax, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["sMax" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["sMax" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["sMax" + (rIdx-1)]));
                pMaxResults.push(calcResult(prevPMax, shoeResult, pMax, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["pMax" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["pMax" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["pMax" + (rIdx-1)]));
                bMaxResults.push(calcResult(prevBMax, shoeResult, bMax, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["bMax" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["bMax" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["bMax" + (rIdx-1)]));
                qMaxResults.push(calcResult(prevQMax, shoeResult, prMax, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["qMax" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["qMax" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["qMax" + (rIdx-1)]));
                prevShoesResults.push(calcResult(prevPrevShoe, shoeResult, prShoe, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["pShoe" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["pShoe" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["pShoe" + (rIdx-1)]));
                prevHeadsResults.push(calcResult(prevPrevHead, shoeResult, prHead, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["pHead" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["pHead" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["pHead" + (rIdx-1)]));
                upSumResults.push(calcResult(prevUpSum, shoeResult, upSum, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["upSum" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["upSum" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["upSum" + (rIdx-1)]));
                allNewResults.push(calcResult(prevAllNew, shoeResult, allNew, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["allNew" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["allNew" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["allNew" + (rIdx-1)]));
                threeSevenResults.push(calcResult(prevThreeSeven, shoeResult, threeSeven, rIdx, shoeItem["r" + (rIdx-3)], shoeItem["threeSeven" + (rIdx-3)], shoeItem["r" + (rIdx-2)], shoeItem["threeSeven" + (rIdx-2)], shoeItem["r" + (rIdx-1)], shoeItem["threeSeven" + (rIdx-1)]));
            }

            shoeItem.singleResults = singleResults;
            shoeItem.pMaxResults = pMaxResults;
            shoeItem.bMaxResults = bMaxResults;
            shoeItem.qMaxResults = qMaxResults;
            shoeItem.prevShoesResults = prevShoesResults;
            shoeItem.prevHeadsResults = prevHeadsResults;
            shoeItem.upSumResults = upSumResults;
            shoeItem.allNewResults = allNewResults;
            shoeItem.threeSevenResults = threeSevenResults;
        }

        function calcResult(prevResult, roundResult, pick, rIdx, prev3Shoe, prev3Pick, prev2Shoe, prev2Pick, prev1Shoe, prev1Pick)
        {
            console.log(roundResult);
            var result = $.extend({}, prevResult);
            if (roundResult == pick) // 적중
            {
                result.level++;
                result.totCnt++;
                result.winCnt++;
                if (rIdx % 4 == 1) // firstMatch
                {
                    result.firstMatch++;
                }
            }
            else // 미스
            {
                result.level--;
                result.totCnt++;
                // bangCheck
                if (rIdx % 4 == 0)
                {
                    if (prev3Shoe != prev3Pick &&
                        prev2Shoe != prev2Pick &&
                        prev1Shoe != prev1Pick)
                    {
                        result.bangMiss++;
                    }
                }
                result.pick = pick;
            }

            return result;
        }

        function calcCurrentRound(shoeItem)
        {
            for(var rIdx=1; rIdx<=60; rIdx++)
            {
                var roundNo = rIdx;
                if (shoeItem["r" + roundNo] == null || shoeItem["r" + roundNo] == "")
                {
                    shoeItem.currentRound = roundNo;
                    break;
                }
            }
        }

        function clearTable()
        {

        }

        function drawTable()
        {
            var shoeItem = shoeItems[(currentRoomNo-1)];
            $(".inputTableSec .roundNo").removeClass("pWin bWin");
            $(".inputTableSec .quaterIndi").removeClass("current");
            var $sections = $(".inputTableSec .roundNo")
            for(var rNo=0; rNo<60; rNo++)
            {
                var currentRoundRemain = shoeItem.currentRound % 4;
                if (currentRoundRemain == 0) currentRoundRemain = 4;
                var currentQuaterNo = (shoeItem.currentRound - currentRoundRemain) / 4 + 1;

                $($(".inputTableSec .quaterIndi")[(currentQuaterNo-1)]).addClass("current")
                var dataStr = shoeItem["r" + (rNo+1)];
                if (dataStr == "P")
                {
                    $($sections[rNo]).text("P").addClass("pWin");
                }
                else if (dataStr == "B")
                {
                    $($sections[rNo]).text("B").addClass("bWin");
                }
                else
                {
                    $($sections[rNo]).text((rNo+1)).removeClass("pWin bWin");
                }
            }
        }

        function makeTS()
        {
            return Math.round(new Date().getTime()/1000);
        }

        function setHeaderWidth()
        {
            $(".headerBG").width($("body")[0].scrollWidth + 200);
            $(".contentArea").width($("body")[0].scrollWidth + 200);
            //console.log("$(\"body\")[0].scrollWidth=" + $("body")[0].scrollWidth);
        }

        function goLogout()
        {
            Cookies.set("sessionKey", "", {path : '/'});
            location.href="/";
        }

        /* function bindUserInfo()
        {
            $restApiBk.member.getInfo(function(data) {
                //if (data.RetVals.item == null) return;
                loadShoe();
            });
        } */

        function padLeft(target, totalLength, padChar){
            return Array(totalLength-String(target).length+1).join(padChar||'0')+target;
        }

        function bindBtns()
        {
            /* $(".logoutBt").click(function() {
                if (Cookies.get("sessionKey") == null || Cookies.get("sessionKey") == "")
                {
                    goLogout();
                }
                else
                {
                    var result = $restApi.logout();

                    if (result.ErrorCode == 0)
                    {
                        goLogout();
                    }

                }
            }); */

            /* $(".toggleLeftBtn").click(function() {
                if ($(".pageRoot").css("margin-left") == "0px")
                {
                    $(".pageRoot").css("margin-left", "-200px");
                    $(".leftArea").css("left", "-200px");
                    $("#footer").css("margin-left", "200px");
                }
                else
                {
                    $(".pageRoot").css("margin-left", "0px");
                    $(".leftArea").css("left", "0px");
                    $("#footer").css("margin-left", "0px");
                }
            }); */

            $(".headTopBtn").hover(function	() {
                var leftPos = $(this).offset().left-1;
                $(this).addClass("hover");
            }, function() {
                $(this).removeClass("hover");
            });

            $(".headerMiddleBtn")
                .hover(function	() {
                    $(this).addClass("hover");
                }, function() {
                    $(this).removeClass("hover");
                })
                .click(function() {
                    if (!$(this).hasClass("codeInfoAll"))
                    {
                        var $click=$(this).find(".divHeaderTask ul li:first a");
                        location.href=$click.attr("href");
                    }
                    //.trigger("click");
                });

            $(".headerBottomBtn").hover(function	() {
                $(this).addClass("hover");
            }, function() {
                $(this).removeClass("hover");
            });

            /* $(".dingdong").on("click", function() {
                $restApi.odds.touchTime();
            }); */

            $("#moveTopBtn a").on("click", function(e) {
                window.scrollTo(0,0);
                e.stopPropagation();
                e.preventDefault();
                return false;
            });

            $(".swapBtn select").on("change", function() {
                var tableNoStr = $(this).val();

                location.href="/user/bkUser2.php?tableNo=" + tableNoStr;
            });

            $(".pointInfoT .basePoint").on("change", function() {
                //drawBatTable(0);
            });

            $(".pickTableSec .chkIncludeCalc").on("change", function() {
                //drawBatTable(0);
            });

            var futurePic = "N";

            $(".inputTable .roundNo").on("click", function() {
                if(overlap == ''){
                    alert("중복 브라우셔 허용은 안됩니다.");
                    location.href = "<?php echo G5_BBS_URL; ?>/login.php";
                    return false;
                }

                // 10배수 씩 체크
                if(($(".inputTable .roundNo").index($(this))+1) % 4 == 0){
                    // 세션체크
                    if(fnSessionCheck() == "Y"){
                        alert("세션이 끊겼습니다.(사용시간 마감되었거나 중복 로그인 발생)");
                        location.href = "<?php echo G5_BBS_URL; ?>/login.php";
                        return false;
                    }
                }

                var $rounds = $(".inputTable .roundNo");
                var rIdx = $rounds.index($(this));
                var currentVal = $(this).text();
                var nextVal = " ";
                if (currentVal == "P") {
                    nextVal = "B";
                    $(this).css('color', 'red');
                }else if (currentVal == "T") {
                    nextVal = $(this).attr('data-round-no');
                    $(this).css('color', 'black');
                }else if (currentVal == "B"){
                    nextVal = "T";
                    $(this).css('color', 'green');
                }else{
                    nextVal = "P";
                    $(this).css('color', 'blue');
                }

                $(this).text(nextVal);

                var roundNo = $(this).attr('data-round-no');

                var picAfterTextChk = 0;
                for(var p=(rIdx+1); p < 60; p++){
                    var picTextChk = $(".inputTable .roundNo").eq(p).text();
                    if(picTextChk == "P" || picTextChk == "B" || picTextChk == "T"){
                        picAfterTextChk++;
                    }
                }

                var picRankAfterTextChk = 0;
                for(var h=0; h < 60; h++){
                    var picTextChk = $(".inputTable .roundNo").eq(h).text();
                    if(picTextChk == "P" || picTextChk == "B" || picTextChk == "T"){
                        picRankAfterTextChk++;
                    }
                }

                if(roundNo > 3){
                    if((roundNo % 4) == 0){
                        if(picAfterTextChk <= 0){
                            // 예상픽
                            var resultText = "";
                            var d = new Date();

                            for(var t=0; t<6; t++){
                                var randomNum = generateRandom(0, 255);
                                var randomTNum = generateRandom(1, 100);
                                var randomTIndex = generateRandom(0, 4);
                                var picNum = pad(randomNum.toString(2), 8);

                                var randomFinish = "";
                                var randomNumBefor = -1;
                                for(var k=0; k<4; k++){
                                    var randomNumIndex = generateRandom(0, 7);
                                    if(randomNumBefor != randomNumIndex) randomFinish += picNum.substring(randomNumIndex, randomNumIndex+1);
                                    randomNumBefor = randomNumIndex;
                                }

                                picNum = randomFinish;
                                for(var i=0; i<4; i++){
                                    if(picNum.substring(i, i+1) == 0){
                                        // 0:p
                                        resultText = "P";
                                        //if(randomTNum == d.getSeconds()) resultText = "T";
                                        if(randomTNum == '50' && randomTIndex == i) resultText = "T";
                                    }else{
                                        // 1:b
                                        resultText = "B";
                                        if(randomTNum == '50' && randomTIndex == i) resultText = "T";
                                    }

                                    $(".pickTable:eq("+t+") tbody .resultRow td").eq(i+Number(roundNo)).text(resultText);

                                    // 글씨 컬러
                                    if (resultText == "B") { $(".pickTable:eq("+t+") tbody .resultRow td").eq(i+Number(roundNo)).css("color", "red"); }
                                    else if (resultText == "P") { $(".pickTable:eq("+t+") tbody .resultRow td").eq(i+Number(roundNo)).css("color", "blue"); }
                                    else if (resultText == "T") { $(".pickTable:eq("+t+") tbody .resultRow td").eq(i+Number(roundNo)).css("color", "green"); }

                                    // background color
                                    $(".pickTable:eq("+t+") tbody .resultRow td").eq(i+Number(roundNo)).css("background-color", "#99ffcc;"); // 초기 컬러
                                }
                            }
                        }
                    }
                }else{
                    if(roundNo <= 3 && futurePic == "N"){
                        for(var t=0; t<6; t++){
                            for(var i=0; i<4; i++){
                                $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).text("N");
                                $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).css("background-color", "#99ffcc;")
                                $(".pickTable:eq("+t+") tbody .roundRow td").eq(i).css("background-color", "#bbefff;");
                            }
                        }
                    }
                }

                //적중컬러 : #ffff33; , 미적중컬러: #cccccc;
                if(roundNo > 4 || (roundNo <= 4 && futurePic == "Y")){
                    for(var t=0; t<6; t++){
                        var picResultText = $(".pickTable:eq("+t+") tbody .resultRow td").eq(Number(roundNo)-1).text();
                        if(picResultText != ""){
                            if(picResultText == nextVal){
                                $(".pickTable:eq("+t+") tbody .resultRow td").eq(Number(roundNo)-1).css("background-color", "#ffff33;");
                                $(".pickTable:eq("+t+") tbody .roundRow td").eq(Number(roundNo)-1).css("background-color", "#bbefff;");
                            }else{
                                if(nextVal != "B" && nextVal != "P" && nextVal != "T"){
                                    $(".pickTable:eq("+t+") tbody .resultRow td").eq(Number(roundNo)-1).css("background-color", "#99ffcc;");
                                    $(".pickTable:eq("+t+") tbody .roundRow td").eq(Number(roundNo)-1).css("background-color", "");
                                }else{
                                    $(".pickTable:eq("+t+") tbody .resultRow td").eq(Number(roundNo)-1).css("background-color", "#cccccc;");
                                    $(".pickTable:eq("+t+") tbody .roundRow td").eq(Number(roundNo)-1).css("background-color", "#bbefff;");
                                }
                            }
                        }
                    }
                }

                var markCnt = 0;
                var markCntArray = "";
                for(var t=0; t<6; t++){
                    for(var i=0; i<60; i++){
                        if($(".pickTable:eq("+t+") tbody .resultRow td").eq(i).css("background-color") == "rgb(255, 255, 51)"){
                            markCnt++;
                        }
                    }
                    markCntArray += markCnt+(t < 5 ? "||" : "");
                    markCnt = 0;
                }

                var aaa = markCntArray.split("||");
                var bbb =new Array(aaa.length);
                var rnk = aaa.length;

                for(var i=0; i<aaa.length; i++) {
                    rnk = 1;
                    for(var j=0; j<aaa.length; j++) {
                        if(parseFloat(aaa[i]) < parseFloat(aaa[j])) rnk++;
                    }
                    for(var j=0; j<bbb.length; j++) {
                        if(bbb[j]==rnk) rnk++;
                    }
                    bbb[i] = rnk;
                }

                if(futurePic == 'N'){
                    if(rIdx > 3){
                        $(".quaterPointRank").each(function(i, e){
                            var round = (parseFloat(aaa[i]) / (picRankAfterTextChk-4))*100;
                            $(this).text(bbb[i]+"등("+Number(round).toFixed(2)+"%)");
                        });

                        for(var t=0; t<bbb.length; t++){
                            $(".pickTableNameTbl").eq(t).find('.rankName').css('background-color', '');
                            $(".pickTableNameTbl").eq(t).find('.quaterPointRank').css('background-color', '');
                        }

                        for(var x=0; x<bbb.length; x++){
                            if(bbb[x] == 1){
                                $(".pickTableNameTbl").eq(x).find('.rankName').css('background-color', '#FFFF00');
                                $(".pickTableNameTbl").eq(x).find('.quaterPointRank').css('background-color', '#FFFF00');
                            }else if(bbb[x] == 2){
                                $(".pickTableNameTbl").eq(x).find('.rankName').css('background-color', '#D8D8D8');
                                $(".pickTableNameTbl").eq(x).find('.quaterPointRank').css('background-color', '#D8D8D8');
                            }else if(bbb[x] == 3){
                                $(".pickTableNameTbl").eq(x).find('.rankName').css('background-color', '#FE9A2E');
                                $(".pickTableNameTbl").eq(x).find('.quaterPointRank').css('background-color', '#FE9A2E');
                            }
                        }
                    }else{
                        $(".quaterPointRank").each(function(i, e){
                            $(this).text("0등(0%)");
                        });
                    }
                }else{
                    $(".quaterPointRank").each(function(i, e){
                        var round = (parseFloat(aaa[i]) / picRankAfterTextChk)*100;
                        $(this).text(bbb[i]+"등("+Number(round).toFixed(2)+"%)");
                    });

                    for(var t=0; t<bbb.length; t++){
                        $(".pickTableNameTbl").eq(t).find('.rankName').css('background-color', '');
                        $(".pickTableNameTbl").eq(t).find('.quaterPointRank').css('background-color', '');
                    }

                    for(var x=0; x<bbb.length; x++){
                        if(bbb[x] == 1){
                            $(".pickTableNameTbl").eq(x).find('.rankName').css('background-color', '#FFFF00');
                            $(".pickTableNameTbl").eq(x).find('.quaterPointRank').css('background-color', '#FFFF00');
                        }else if(bbb[x] == 2){
                            $(".pickTableNameTbl").eq(x).find('.rankName').css('background-color', '#D8D8D8');
                            $(".pickTableNameTbl").eq(x).find('.quaterPointRank').css('background-color', '#D8D8D8');
                        }else if(bbb[x] == 3){
                            $(".pickTableNameTbl").eq(x).find('.rankName').css('background-color', '#FE9A2E');
                            $(".pickTableNameTbl").eq(x).find('.quaterPointRank').css('background-color', '#FE9A2E');
                        }
                    }
                }

                // 사용자 픽정보 저장세팅
                var userPicArray = new Array();
                $(".inputTable .roundNo").each(function(i){
                    userPicArray.push($(this).text());
                });

                // 예측 픽정보 저장세팅
                var userPicExceptArray = new Array();
                var userPicExceptText = "";
                $(".pickTable").each(function(i){
                    $(this).eq(i).find('.resultRow').children('td').each(function(j){
                        userPicExceptText += ($(this).text()+(j<60?"||":""));
                    });
                    userPicExceptArray.push(userPicExceptText);
                });

            });

            $(".fristButton").click(function(){
                if(overlap == ''){
                    alert("중복 브라우셔 허용은 안됩니다.");
                    location.href = "<?php echo G5_BBS_URL; ?>/login.php";
                    return false;
                }

                // 세션체크
                if(fnSessionCheck() == "Y"){
                    alert("세션이 끊겼습니다.(사용시간 마감되었거나 중복 로그인 발생)");
                    location.href = "<?php echo G5_BBS_URL; ?>/login.php";
                    return false;
                }

                var valChk = "Y";
                for(var i=0; i<4; i++){
                    if($(".inputTable .roundNo").eq(i).text() == "P" ||
                        $(".inputTable .roundNo").eq(i).text() == "B" ||
                        $(".inputTable .roundNo").eq(i).text() == "T"){
                        valChk = "N";
                    }
                }

                if(valChk == "N"){
                    alert("이미 진행 된 값이 있습니다.");
                    futurePic = "N";
                }else{
                    // 예상픽
                    var resultText = "";
                    var d = new Date();

                    for(var t=0; t<6; t++){
                        var randomNum = generateRandom(0, 15);
                        var randomTNum = generateRandom(0, 60);
                        var picNum = pad(randomNum.toString(2), 4);

                        for(var i=0; i<4; i++){
                            if(picNum.substring(i, i+1) == 0){
                                // 0:p
                                resultText = "P";
                                if(randomTNum == d.getSeconds()) resultText = "T";
                            }else{
                                // 1:b
                                resultText = "B";
                                if(randomTNum == d.getSeconds()) resultText = "T";
                            }

                            $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).text(resultText);

                            // 글씨 컬러
                            if (resultText == "B") { $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).css("color", "red"); }
                            else if (resultText == "P") { $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).css("color", "blue"); }
                            else if (resultText == "T") { $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).css("color", "green"); }

                            // background color
                            $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).css("background-color", "#99ffcc;"); // 초기 컬러
                        }
                    }

                    futurePic = "Y";
                }
            });

            $(".clearButton").on("click", function() {
                if(overlap == ''){
                    alert("중복 브라우셔 허용은 안됩니다.");
                    location.href = "<?php echo G5_BBS_URL; ?>/login.php";
                    return false;
                }

                if(fnSessionCheck() == "Y"){
                    alert("세션이 끊겼습니다.(사용시간 마감되었거나 중복 로그인 발생)");
                    location.href = "<?php echo G5_BBS_URL; ?>/login.php";
                    return false;
                }

                /* $restApiBk.bkShoeUserProceding.clear(null, memberNo, tableNos[0], function(data) {
                    loadShoe();
                }); */
                // 초기화
                for(var i=0; i<60; i++){
                    $(".inputTable .roundNo").eq(i).text(i+1);
                    $(".inputTable .roundNo").eq(i).css('color', 'black');
                }

                for(var t=0; t<6; t++){
                    for(var i=0; i<60; i++){
                        $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).text('');
                        $(".pickTable:eq("+t+") tbody .resultRow td").eq(i).css('background-color', '');
                        $(".pickTable:eq("+t+") tbody .roundRow td").eq(i).css("background-color", "");
                    }
                }

                for(var t=0; t<6; t++){
                    $(".pickTableNameTbl").eq(t).find('.rankName').css('background-color', '');
                    $(".pickTableNameTbl").eq(t).find('.quaterPointRank').css('background-color', '');
                    $(".pickTableNameTbl").eq(t).find('.quaterPointRank').text('');
                }

                futurePic = "N";
            });

            $(".abSelectionTbl .selectionA").on("click", function() {
                $(".pickTableSec.route6ASec").removeClass("invisible");
                $(".pickTableSec.route6BSec").addClass("invisible");
            });

            $(".abSelectionTbl .selectionB").on("click", function() {
                $(".pickTableSec.route6ASec").addClass("invisible");
                $(".pickTableSec.route6BSec").removeClass("invisible");
            });
        }

        function fnSessionCheck(){
            var sCheck = "N";
            $.ajax({
                url: "<?php echo G5_BBS_URL ?>/ajax.sessioncheck.php",
                type: "GET",
                dataType: "json",
                async: false,
                cache: false,
                success: function(data) {
                    console.log(data);
                    console.log(data.msg);
                    sCheck = data.msg;
                }
            });

            return sCheck;
        }

        function hexc(colorval) {
            var parts = colorval.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            delete(parts[0]);
            for (var i = 1; i <= 3; ++i) {
                parts[i] = parseInt(parts[i]).toString(16);
                if (parts[i].length == 1) parts[i] = '0' + parts[i];
            }
            color = '#' + parts.join('');
        }

        var generateRandom = function (min, max) {
            var ranNum = Math.floor(Math.random()*(max-min+1)) + min;
            return ranNum;
        }

        function pad(n, width) {
            n = n + '';
            return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
        }

        var autoCancelTimeout = null;
        function showBG(msg)
        {
            if (autoCancelTimeout != null)
            {
                clearTimeout(autoCancelTimeout);
                autoCancelTimeout = null;
            }

            if (msg != undefined)
            {
                $(".waitingBG .commentArea")
                    .text(msg)
                    .css("display", "");
            }
            else {
                $(".waitingBG .commentArea")
                    .css("display", "none");
            }
            $(".waitingBG").css("display","block");
            autoCancelTimeout = setTimeout(function() {
                hideBG();
            }, 3000000);
        }

        function hideBG()
        {
            $(".waitingBG").css("display","none");
            if (autoCancelTimeout != null)
            {
                clearTimeout(autoCancelTimeout);
                autoCancelTimeout = null;
            }
        }

        function playDingDong()
        {
            var audio = new Audio('/sound/sound.mp3');
            audio.play();
        }

        function groupBy(xs, key) {
            return xs.reduce(function(rv, x) {
                (rv[x[key]] = rv[x[key]] || []).push(x);
                return rv;
            }, {});
        }

        function getUrlVars()
        {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for(var i = 0; i < hashes.length; i++)
            {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }

        function moveScrollTo($elem, offset)
        {
            var elemsOffset = $elem.offset();

            if (elemsOffset != undefined)
            {
                var scrollTop = $elem.offset().top;
                scrollTop = scrollTop + offset;

                $("body").animate({scrollTop : scrollTop}, 1);
            }
        }

        function clearFunction()
        {
            $(".memoBtn").addClass("invisible");
            window["memoBtnClickFunc"] = undefined;
        }

        /* function drawBatTable(tableNoOrder)
        {
            var tableIdx = parseInt(tableNos[tableNoOrder]) - 1;
            var shoeItem = shoeItems[tableIdx];

            if (shoeItem != null && shoeItem.shoeIdx != null)
            {
                var currentRoundRemain = shoeItem.currentRound % 4;
                if (currentRoundRemain == 0) currentRoundRemain = 4;
                var currentQuaterNo = (shoeItem.currentRound - currentRoundRemain) / 4 + 1;

                var currentQuaterFirstRound = currentQuaterNo * 4 - 3;

                var basePoint = $(".pointInfoT .basePoint").val();
                var routeEnabled = [true, true, true, true, true];

                    -
                for(var i=0; i<4; i++)
                {
                    var roundNo = currentQuaterFirstRound + i;
                    var bCount = 0;
                    var pCount = 0;
                    var roundBasePoint = 0;
                    $(".pointInfoT .roundNo:eq(" + i + ")").text(roundNo);
                    if (i > 0)
                    {
                        roundBasePoint = (basePoint * Math.pow(2, i-1));
                        $(".pointInfoT .pointBaseDisp:eq(" + i + ")").text(roundBasePoint+"P");
                    }
                    for(var routeNo = 0; routeNo<5; routeNo++)
                    {
                        if (!routeEnabled[routeNo])
                        {
                            continue;
                        }

                        var pickVal = "";
                        var roundVal = shoeItem["r" + roundNo];

                        if (routeNo == 0)
                        {
                            pickVal = shoeItem["manPick" + roundNo];
                        }
                        else if (routeNo == 1)
                        {
                            if ($(".chkIncludeCalc:eq(0)").is(":checked"))
                            {
                                pickVal = shoeItem["pickRouteOne" + roundNo];
                            }
                        }
                        else if (routeNo == 2)
                        {
                            if ($(".chkIncludeCalc:eq(1)").is(":checked"))
                            {
                                pickVal = shoeItem["pickRouteTwo" + roundNo];
                            }
                        }
                        else if (routeNo == 3)
                        {
                            if ($(".chkIncludeCalc:eq(2)").is(":checked"))
                            {
                                pickVal = shoeItem["pickRouteThree" + roundNo];
                            }
                        }
                        else if (routeNo == 4)
                        {
                            if ($(".chkIncludeCalc:eq(3)").is(":checked"))
                            {
                                pickVal = shoeItem["pickRouteFour" + roundNo];
                            }
                        }
                        else if (routeNo == 5)
                        {
                            pickVal = shoeItem["pickRouteFive" + roundNo];
                        }
                        else if (routeNo == 6)
                        {
                            pickVal = shoeItem["pickRouteSix" + roundNo];
                        }
                        else if (routeNo == 7)
                        {
                            pickVal = shoeItem["pickRouteSeven" + roundNo];
                        }

                        if (pickVal == 'P' || pickVal == 'B')
                        {
                            if (i > 0)
                            {
                                if (pickVal == roundVal) { routeEnabled[routeNo] = false; }
                            }

                            if (pickVal == 'P') { pCount++; }
                            else if (pickVal == 'B') { bCount++; }
                        }
                    }

                    var pPoint = roundBasePoint*pCount;
                    var bPoint = roundBasePoint*bCount;

                    $(".pointInfoT .pointDispP:eq(" + i + ")").text(pPoint+"P");
                    $(".pointInfoT .pointDispB:eq(" + i + ")").text(bPoint+"P");
                }
            }
        } */

        function validValue(selection)
        {
            if (selection == "P" || selection == "B")
                return true;
            else
                return false;
        }
        function getPointOfQuater(r2, r3, r4, pick2, pick3, pick4)
        {
            var point = 0;
            if (!validValue(r2) || !validValue(r3) || !validValue(r4))
            {
                point = 0;
                return point;
            }

            // 픽이 없는 경우에도 0점
            if (!validValue(pick2) && !validValue(pick3) && !validValue(pick4))
            {
                point = 0;
            }
            else if (validValue(pick2) && validValue(pick3) && validValue(pick4))
            {
                if (r2 != pick2 && r3 != pick3 && r4 != pick4)
                {
                    point = -10;
                }
                else
                {
                    if (r2 == pick2) { point += 5; }
                    if (r3 == pick3) { point += 3; }
                    if (r4 == pick4) { point += 2; }
                }
            }
            else
            {
                point = 0;
            }
            return point;
        }
        function drawShoeItem($table, tableNoOrder, routeNo, $nameTable)
        {
            var tableIdx = parseInt(tableNos[tableNoOrder]) - 1;
            var shoeItem = shoeItems[tableIdx];

            $table.find(".openRow td").removeClass("active");
            $table.find(".roundRow td").removeClass("singleMax playerMax bankerMax quaterMax prevShoe prevHead upSum allNew threeSeven manPick first second last");
            $table.find(".resultRow td").removeClass("match miss pWin bWin nicety none recommandReverse");

            if (shoeItem != null && shoeItem.shoeIdx != null)
            {
                $table.attr("data-shoe-idx", shoeItem.shoeIdx);
                var prevQuaterNo = 0;
                var bangCount = 0;
                var prevBangCount = 0;
                var pickCount = 0;

                $table.find(".roundRow td").removeClass("bColor pColor");
                $table.find(".openRow td").removeClass("match").text("open");
                for(var roundNo=1; roundNo<=60; roundNo++)
                {
                    var roundRemain = roundNo % 4;
                    if (roundRemain == 0) roundRemain = 4;

                    var quaterNo = (roundNo - roundRemain) / 4 + 1;

                    if (prevQuaterNo != quaterNo)
                    {
                        if (pickCount > 0)
                        {
                            prevBangCount = bangCount;
                        }

                        pickCount = 0;
                        bangCount = 0;
                        prevQuaterNo = quaterNo;
                    }

                    var $openCol = $table.find(".openRow td:eq(" + (roundNo-1) + ")");
                    var $roundCol = $table.find(".roundRow td:eq(" + (roundNo-1) + ")");
                    var $resultCol = $table.find(".resultRow td:eq(" + (roundNo-1) + ")");

                    if (roundNo == shoeItem.currentRound) { $openCol.addClass("active"); }

                    var currentRoundRemain = shoeItem.currentRound % 4;
                    if (currentRoundRemain == 0) currentRoundRemain = 4;
                    var currentQuaterNo = (shoeItem.currentRound - currentRoundRemain) / 4 + 1;

                    var currentQuaterLastRound = currentQuaterNo * 4;
                    if (roundNo > currentQuaterLastRound) break;

                    var className = "";
                    var pickVal = "";
                    var roundVal = shoeItem["r" + roundNo];
                    if (routeNo == 0)
                    {
                        className = "manPickM";
                        $roundCol.addClass(className);
                        pickVal = shoeItem["manPick" + roundNo];
                    }
                    else if (routeNo == 1)
                    {
                        //className = "manPickM";
                        //$roundCol.addClass(className);
                        pickVal = shoeItem["pickRouteOne" + roundNo];
                    }
                    else if (routeNo == 2)
                    {
                        //className = "manPickM";
                        //$roundCol.addClass(className);
                        pickVal = shoeItem["pickRouteTwo" + roundNo];
                    }
                    else if (routeNo == 3)
                    {
                        //className = "manPickM";
                        //$roundCol.addClass(className);
                        pickVal = shoeItem["pickRouteThree" + roundNo];
                    }
                    else if (routeNo == 4)
                    {
                        pickVal = shoeItem["pickRouteFour" + roundNo];
                    }
                    else if (routeNo == 5)
                    {
                        pickVal = shoeItem["pickRouteFive" + roundNo];
                    }
                    else if (routeNo == 6)
                    {
                        pickVal = shoeItem["pickRouteSix" + roundNo];
                    }
                    else if (routeNo == 7)
                    {
                        pickVal = shoeItem["pickRouteSeven" + roundNo];
                    }

                    if (routeNo == 5 && roundNo <= 1)
                    {
                        $resultCol.text("N").addClass("none");
                    }
                    else if (routeNo != 5 && roundNo <= 8)
                    {
                        $resultCol.text("N").addClass("none");
                    }
                    else if (pickVal != "P" && pickVal != "B")
                    {
                        $resultCol.text("N").addClass("none");
                    }
                    else
                    {
                        $resultCol.text(pickVal);
                        if (pickVal == "P") $resultCol.addClass("pWin");
                        else if (pickVal == "B") $resultCol.addClass("bWin");
                        if ((pickVal == "P" || pickVal == "B") && (roundVal == "P" || roundVal == "B"))
                        {
                            if (pickVal == roundVal)
                            {
                                $resultCol.addClass("match");
                                bangCount = 0;
                            }
                            else
                            {
                                $resultCol.addClass("miss");
                                bangCount++;
                            }
                        }

                        pickCount++;

                        if(prevBangCount >= 3) { $resultCol.addClass("recommandReverse"); }
                    }

                    if (shoeItem.currentRound == roundNo)
                    {
                        var pickColor = 0;
                        var pickColor = "";

                        $table.closest(".pickTableNameSec").find(".countDisp").val("");
                        $table.closest(".pickTableNameSec").find(".countDisp").css("background-color", "transparent");
                        if (routeNo == 6)
                        {
                            pickCount = shoeItem["pickRouteSixCount" + roundNo];
                            pickColor = shoeItem["pickRouteSixColor" + roundNo];
                        }
                        else if (routeNo == 7)
                        {
                            pickCount = shoeItem["pickRouteSevenCount" + roundNo];
                            pickColor = shoeItem["pickRouteSevenColor" + roundNo];
                        }

                        //console.log("pickCount=" + pickCount);
                        //console.log("pickColor=" + pickColor);
                        if (pickColor != "")
                        {
                            //console.log("length=" + $table.parent().find(".countDisp").length);
                            $table.parent().find(".countDisp").text(pickCount);
                            $table.parent().find(".countDisp").css("background-color", "#" + pickColor);
                        }
                    }
                    if (routeNo == 5) // route 8 표시 route5
                    {
                        var $route8IndicatorTbl = $table.parent().find(".route8IndicatorTbl");
                        var $subjectTh = $route8IndicatorTbl.find(".headerTh");
                        var $roundRowTd = $table.find(".roundRow td:eq(" + (roundNo-1) + ")");
                        var $openRowTd = $table.find(".openRow td:eq(" + (roundNo-1) + ")");

                        var routeSubject = "";
                        var routeStage = "";
                        var routePick = "";

                        if (roundNo > 4)
                        {
                            routeSubject = shoeItem["pickRouteEightSubject" + roundNo];
                            routeStage = shoeItem["pickRouteEightStage" + roundNo];
                            routePick = shoeItem["pickRouteEightPick" + roundNo];
                        }
                        if (shoeItem.currentRound == roundNo)
                        {
                            $route8IndicatorTbl.find("td").addClass("invisible2");
                            $route8IndicatorTbl.find("td.countTd").removeClass("active");
                            $subjectTh.removeClass("bColor pColor");
                            if (roundNo > 4)
                            {
                                $subjectTh.text(routeSubject);

                                var routeStateLimit = 0;
                                if (routeSubject == "1W") { routeStateLimit = 15; }
                                else if (routeSubject == "2W") { routeStateLimit = 15; }
                                else if (routeSubject == "4WA") { routeStateLimit = 12; }
                                else if (routeSubject == "4WB") { routeStateLimit = 12; }
                                else if (routeSubject == "1PA") { routeStateLimit = 10; }
                                else if (routeSubject == "2PB") { routeStateLimit = 10; }
                                else if (routeSubject == "3W") { routeStateLimit = 2; }
                                else if (routeSubject == "3P") { routeStateLimit = 2; }
                                else if (routeSubject == "5W") { routeStateLimit = 3; }
                                else if (routeSubject == "6W") { routeStateLimit = 3; }
                                else if (routeSubject == "7W") { routeStateLimit = 3; }
                                else if (routeSubject == "8W") { routeStateLimit = 3; }
                                else if (routeSubject == "W9") { routeStateLimit = 5; }
                                else if (routeSubject == "W10") { routeStateLimit = 5; }
                                else if (routeSubject == "4P") { routeStateLimit = 1; }
                                else if (routeSubject == "5PA") { routeStateLimit = 1; }
                                else if (routeSubject == "5PB") { routeStateLimit = 1; }

                                $route8IndicatorTbl.find("td:lt(" + (routeStateLimit*2) + ")").removeClass("invisible2");
                                $route8IndicatorTbl.find("td.countTd:eq(" + (routeStage-1) + ")").addClass("active");

                                if (routePick == "B") { $subjectTh.addClass("bColor"); $roundRowTd.addClass("bColor"); }
                                else if (routePick == "P") { $subjectTh.addClass("pColor"); $roundRowTd.addClass("pColor");  }
                            }
                        }
                        if (routePick == "B") { $roundRowTd.addClass("bColor"); }
                        else if (routePick == "P") { $roundRowTd.addClass("pColor");  }
                        if ((routePick == "B" || routePick == "P"))
                        {
                            $openRowTd.text(routeSubject);
                            if ((roundVal == "B" || roundVal == "P") && routePick == roundVal)
                            {
                                $openRowTd.addClass("match");
                            }
                        }
                    }

                    if (routeNo >= 1 && routeNo <= 4)
                    {
                        var rankNo = routeQuaterPointRank[quaterNo][routeNo];
                        if (rankNo == 1) { $roundCol.addClass("first");  }
                        if (rankNo == 2) { $roundCol.addClass("second");  }
                        if (rankNo == 4) { $roundCol.addClass("last");  }
                    }
                }

                $nameTable.find(".quaterPointRank").removeClass("first").removeClass("second");
                $nameTable.find(".pickTableName").removeClass("match");

                $nameTable.find(".quaterPoint").text(routeQuaterPoint[currentQuaterNo][routeNo] + "P");
                $nameTable.find(".quaterPointRank").text(routeQuaterPointRank[currentQuaterNo][routeNo] + "등");
                if (routeQuaterPointRank[currentQuaterNo][routeNo] == 1) { $nameTable.find(".quaterPointRank").addClass("first"); }
                if (routeQuaterPointRank[currentQuaterNo][routeNo] == 2) { $nameTable.find(".quaterPointRank").addClass("second"); }

                // 이전 3쿼터에서 맞은게 2개인경우 표시
                if (routeMatchCount[routeNo] == 2) { $nameTable.find(".pickTableName").addClass("match"); }
            }
        }

        function getClassWithOrder(order)
        {
            var className = "";
            if (order == 1) { className = "singleM"; }
            else if (order == 2) { className = "pMaxM"; }
            else if (order == 3) { className = "bMaxM"; }
            else if (order == 4) { className = "qMaxM"; }
            else if (order == 5) { className = "prevShoeM"; }
            else if (order == 6) { className = "prevHeadsM"; }
            else if (order == 7) { className = "upSumM"; }
            else if (order == 8) { className = "allNewM"; }
            else if (order == 9) { className = "threeSevenM"; }
            else if (order == 10) { className = "manPickM"; }

            return className;
        }

        function getBaseWithOrder(order)
        {
            var baseName = "";
            if (order == 1) { baseName = "sMax"; }
            else if (order == 2) { baseName = "pMax"; }
            else if (order == 3) { baseName = "bMax"; }
            else if (order == 4) { baseName = "qMax"; }
            else if (order == 5) { baseName = "pShoe"; }
            else if (order == 6) { baseName = "pHead"; }
            else if (order == 7) { baseName = "upSum"; }
            else if (order == 8) { baseName = "allNew"; }
            else if (order == 9) { baseName = "threeSeven"; }
            else if (order == 10) { baseName = "manPick"; }

            return baseName;
        }

        function goLogout()
        {
            Cookies.set("sessionKey", "", {path : '/'});
            location.href="/";
        }

        /* if("${userInfo[0].insdatediff}" >= 0){
            $("#userTime").show();

            var userInsTime = "${userInfo[0].instime2}".replace(/ /gi, "");
            var iY = userInsTime.substring(0, 4);
            var iM = userInsTime.substring(5, 7);
            var iD = userInsTime.substring(8, 10);
            var iH = userInsTime.substring(10, 12);
            var iMM = userInsTime.substring(13, 15);
            var iS = userInsTime.substring(16, 18);

            function getTime() {
                now = new Date();
                dday = new Date(iY,iM,iD,iH,iMM,iS); // 원하는 날짜, 시간 정확하게 초단위까지 기입
                days = (dday - now) / 1000 / 60 / 60 / 24;
                daysRound = Math.floor(days);
                hours = (dday - now) / 1000 / 60 / 60 - (24 * daysRound);
                hoursRound = Math.floor(hours);
                minutes = (dday - now) / 1000 /60 - (24 * 60 * daysRound) - (60 * hoursRound);
                minutesRound = Math.floor(minutes);
                seconds = (dday - now) / 1000 - (24 * 60 * 60 * daysRound) - (60 * 60 * hoursRound) - (60 * minutesRound);
                secondsRound = Math.round(seconds);

                $("#counterH").text(hoursRound);
                $("#counterM").text(minutesRound);
                $("#counterS").text(secondsRound);
                if(hoursRound == '0' && minutesRound == '0' && secondsRound == '1'){
                    $("#userTime").hide();
                    alert("사용종료되었습니다.!!![문의 주시기 바랍니다.]");
                    //location.href = "<?php echo G5_BBS_URL; ?>/login.php";
                }else{
                    window.setTimeout("getTime();", 1000);
                }
            }

            getTime();
        }else{
            $("#userTime").hide();
        } */

    </script>
    <style type="text/css">
        body { position: relative; }
        .headerFG { margin-top : -92px;  height: 92px; }
        .rowTemplate {display:none !important;}
        .toggleLeftBtn {position: absolute; left: 200px; top: 0px; width: 10px; height: 110px; border: 1px solid #bdbbbb; color: #666666; background: #DDDCC6; cursor: pointer; }
        .leftArea {left: 0px; top: 0px; position: absolute;}
        .contentArea { width : 100%; }
        .flatButton {
            border: 1px solid black;
            border-radius: 0;
            background: none;
            -webkit-appearance: none;
            padding-top : 4px; padding-bottom : 4px;
            padding-left : 3px; padding-right : 3px;
        }

        hr { display: block; height: 1px; border: 0; border-top: 1px solid #F3D0B3; margin: 10px 0; padding: 0; }
        br { display: block; margin : 10px 0; content: " "; }
        .winnerDisp { font-family: elephant; font-size: 15px; }

        .bWin { color : red; }
        .pWin { color : blue; }
        .bWin.nicety { color : rgb(0, 191, 25); }
        .pWin.nicety { color : rgb(0, 191, 25); }

        .divHeaderTask { display: none; left:6px; }
        .headTopBtn>.aMiddle {background-color: #535353; color: #ebebeb;}
        .headTopBtn.hover>.aMiddle {background-color: #FEFEF4; color: black;}
        .headTopBtn.hover>.divHeaderTask { display : block; }

        #ulHeaderMiddle .ulHeaderTask li {display: block;}
        .headerMiddleBtn>.aMiddle {background-color: #2987cf; color: #ecebeb;}
        .headerMiddleBtn.current { background-color: #2987cf; }
        .headerMiddleBtn.current span { background-color: white; color: black; }
        .headerMiddleBtn.hover>.aMiddle {background-color: #FEFEF4; color: black;}
        .headerMiddleBtn.hover>.divHeaderTask { display : block; }

        .headerBottomBtn>.aMiddle {background-color: #7F7D7D; color: #ECEBEB;}
        .headerBottomBtn.current { background-color: #a2a2a2 }
        .headerBottomBtn.current span { background-color: white; color: black; }
        .headerBottomBtn.hover>.aMiddle {background-color: #FEFEF4; color: black;}
        .headerBottomBtn.hover>.divHeaderTask { display : block; }

        .redBorder { border : 2px solid Red !important; }
        .invisible { display: none !important; }
        .invisible2 { visibility: hidden !important; }
        .waitingBG { width: 100%; height: 100%; position:absolute; left:0; top:0; display: none; z-index: 11; }
        .waitingBG .bg { background-color: black; width: 100%; height: 100%; position:absolute; left:0; top:0; opacity: 0.3; }
        .waitingBG .img { position: absolute; top:calc(50% - 150px); left:calc(50% - 150px); }
        .waitingBG .img img { vertical-align: middle;}
        .waitingBG .img .commentArea { background-color: white; color : black; text-align: center; }

        table tr td,
        table tr th { border:1px solid black; text-align:center; }

        .roundNo { font-family: elephant; font-size: 15px; }
        .pbNameDisp { font-family: elephant; font-size: 15px; }

        .topSec div { display : inline-block; padding:5px; padding-left:20px; padding-right:20px; }
        .topSec .autoReloadBtn { background-color:#F3F3F3; border : 2px solid transparent; }
        .topSec .autoReloadBtn.active { border : 2px solid red; }
        .topSec .swapBtn { background-color:#F3DEDD; border : 2px solid transparent; }
        .topSec .swapBtn.active { border : 2px solid red; }
        .topSec .warning { background-color:#F3F3F3; color: red; }

        .pickTableNo { font-size : 30px; display : inline-block; vertical-align:top; }
        .pointInfoT { display : inline-block; vertical-align:top; }
        .pointInfoT td { width : 42px; height : 30px;  }
        .pointInfoT .pointDisp { width : 85px; }
        .pointInfoT .pointBaseDisp { width : 85px; }
        .pointInfoT .pointBaseDisp .basePoint { width : 100%; height:100%; }

        .clearButton { height : 30px; }
        .fristButton { height : 30px; }
        .pointInfoT tbody { border : 2px solid black; }
        .pointInfoT .pointDisp { border-right: 2px solid black; }

        .inputTableSec {display:inline-block; vertical-align:top; margin-top: 10px;}
        .inputTable { margin-right:25px;}
        .inputTable td { height : 25px; }
        .inputTable .roundResult { width : 42px; }
        .inputTable tbody { border : 2px solid black; }
        .inputTable .quaterIndi.current { background-color : red; }
        .inputTable .quaterIndi { border-left : 2px solid black;border-right : 2px solid black; }
        .inputTable .roundResult:nth-child(4n) { border-right : 2px solid black; }

        .pickTableSec { display:inline-block; vertical-align:top; }

        .pickTableNameSec { margin-bottom : 2px; }
        .pickTableNameSec label { vertical-align:top; margin-top:7px; display:inline-block; }
        .pickTableNameTbl { display:inline-block; }
        .pickTableNameTbl tbody { border : 2px solid black; }
        .pickTableNameTbl td { width : 100px; height : 25px; }
        .pickTableNameTbl td.first { background-color : red; color:white; }
        .pickTableNameTbl td.second { background-color : blue;  color:white; }
        .pickTableNameTbl td.match { background-color : lime;  color:black; }
        .abSelectionTbl { display:inline-block; }
        .abSelectionTbl td { width : 35px; height : 30px; border : 0px; }
        .abSelectionTbl .empty { width : 5px; }
        .abSelectionTbl .selectionA,.abSelectionTbl .selectionB { border : 2px solid black; font-size:22px; }
        .abSelectionTbl .selected { background-color : red; }
        .countDispTbl { display:inline-block; margin-left:15px; }
        .countDispTbl td { width : 35px; height : 30px; border:2px solid black;  font-size:22px; }

        .route8IndicatorTbl { display:inline-block; }
        .route8IndicatorTbl td { height: 30px; }
        .route8IndicatorTbl .spaceTd { width : 3px; border-top:0px; border-bottom:0px; }
        .route8IndicatorTbl .headerTh { width : 60px; border : 2px solid black; font-size:15px; }
        .route8IndicatorTbl .countTd { width : 30px;  border : 2px solid black; font-family: elephant; font-size:15px; }
        .route8IndicatorTbl .headerTh.bColor { background-color:#C00000; }
        .route8IndicatorTbl .headerTh.pColor { background-color:#0099FF; }
        .route8IndicatorTbl .countTd.active { background-color:#00FF99; }
        .pickTable.route5 .roundRow .bColor { background-color:#C00000; }
        .pickTable.route5 .roundRow .pColor { background-color:#0099FF; }
        .pickTable.route5 .openRow .match { background-color:lime; }
        .pickTable .roundRow .first { background-color:red; }
        .pickTable .roundRow .second { background-color:blue; }
        .pickTable .roundRow .last { background-color:#FF6CFF; }

        .pickTable { margin-right:30px;}
        .pickTable td { height : 25px; width : 42px; }
        .pickTable tbody { border : 2px solid black; }
        .pickTable tr td:nth-child(4n) { border-right : 2px solid black; }
        .pickTable tbody tr.resultRow { border-bottom : 2px solid black; }
        .pickTable .openRow td { height : 22px; }
        .pickTable .openRow td button { height : 20px; padding-top:0px; }
        .pickTable .roundRow td { height : 22px; }
        .pickTable .openRow td.active { background-color:red; }
        .pickTable .roundRow td { font-family: elephant; font-size: 15px; }
        .pickTable .resultRow td { font-family: elephant; font-size: 15px; }

        .pickTable .roundRow td.singleM { background-color: #00B050; }
        .pickTable .roundRow td.pMaxM { background-color: #3399FF; }
        .pickTable .roundRow td.bMaxM { background-color: red; }
        .pickTable .roundRow td.qMaxM { background-color: #948A54; }
        .pickTable .roundRow td.prevShoeM { background-color: #F79646; }
        .pickTable .roundRow td.prevHeadsM { background-color: #C0504D; }
        .pickTable .roundRow td.upSumM { background-color: #d0d0d0; }
        .pickTable .roundRow td.allNewM { background-color: #7635A5; }
        .pickTable .roundRow td.threeSevenM { background-color: #FFE1AA; }
        .pickTable .roundRow td.manPickM { background-color: #717171; }

        .pickTable .resultRow td.match { background-color : #66FFCC; }
        .pickTable.route5 .resultRow td.match { background-color : #3399FF; }
        .pickTable .resultRow td.miss { background-color : yellow; }
        .pickTable .resultRow td.none { background-color : #4caf50; }
        .pickTable .resultRow td.recommandReverse.bWin { color : #b0b0b0; }
        .pickTable .resultRow td.recommandReverse.pWin { color : #808080; }
    </style>
    <script type="text/javascript">
        var loginPingInterval = null;

        /* $(document).ready(function() {
            loginPingInterval = setInterval(pingSession, 5*60*1000);
            pingSession();
        }); */

        function pingSession()
        {
            /* $restApi.member.pingLogin(function(data) {
                //console.log(data);
                if (data.ErrorCode != 0) // 갱신 실패 로그아웃 처리
                {
                    Cookies.set("sessionKey", "", {path : "/"});
                    location.href="/";
                }
            }); */
        }
    </script>
    </head>
    <body oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
    <div class="pageRoot" style="margin-left: -200px;">
        <div id="header">
            <div id="headerTop">
                <strong><?php echo $member['mb_id'] ?>님</strong>
                <a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout">로그아웃</a>
            </div>
        </div>
        <div id="section" class="contentArea">
            <!-- start of contentArea -->
            <div class="topSec">
                <div class="warning">[경고] 화면에서 제공하는 버튼 및 기능 외에 사용할 경우 중복사용 및 세션 삭제됩니다.(새로고침 F5키 클릭, 인터넷브라우저 주소 새로고침)</div><br />
                <div class="warning">[안내] 보안을 위한 제공 기능 외 행위를 일체 막고 있습니다. 불편없도록 제공되는 기능만 사용하시기 바랍니다.</div>
            </div>
            <hr/>
            <!-- end of contentArea -->
            <div class="pickTableNoSec">
                <div class="pickTableNo invisible">
                    1번
                </div>
                <button class="clearButton">초기화하기</button>
                <button class="fristButton">처음예측하기</button>
            </div>
            <div class="inputTableSec">
                <table class="inputTable">
                    <tr>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">1쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">2쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">3쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">4쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">5쿼터</td>
                    </tr>
                    <tr>
                        <td class="roundResult roundNo" data-round-no="1">1</td>
                        <td class="roundResult roundNo" data-round-no="2">2</td>
                        <td class="roundResult roundNo" data-round-no="3">3</td>
                        <td class="roundResult roundNo" data-round-no="4">4</td>
                        <td class="roundResult roundNo" data-round-no="5">5</td>
                        <td class="roundResult roundNo" data-round-no="6">6</td>
                        <td class="roundResult roundNo" data-round-no="7">7</td>
                        <td class="roundResult roundNo" data-round-no="8">8</td>
                        <td class="roundResult roundNo" data-round-no="9">9</td>
                        <td class="roundResult roundNo" data-round-no="10">10</td>
                        <td class="roundResult roundNo" data-round-no="11">11</td>
                        <td class="roundResult roundNo" data-round-no="12">12</td>
                        <td class="roundResult roundNo" data-round-no="13">13</td>
                        <td class="roundResult roundNo" data-round-no="14">14</td>
                        <td class="roundResult roundNo" data-round-no="15">15</td>
                        <td class="roundResult roundNo" data-round-no="16">16</td>
                        <td class="roundResult roundNo" data-round-no="17">17</td>
                        <td class="roundResult roundNo" data-round-no="18">18</td>
                        <td class="roundResult roundNo" data-round-no="19">19</td>
                        <td class="roundResult roundNo" data-round-no="20">20</td>
                    </tr>
                </table>
            </div>
            <div class="inputTableSec">
                <table class="inputTable">
                    <tr>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">6쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">7쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">8쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">9쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">10쿼터</td>
                    </tr>
                    <tr>
                        <td class="roundResult roundNo" data-round-no="21">21</td>
                        <td class="roundResult roundNo" data-round-no="22">22</td>
                        <td class="roundResult roundNo" data-round-no="23">23</td>
                        <td class="roundResult roundNo" data-round-no="24">24</td>
                        <td class="roundResult roundNo" data-round-no="25">25</td>
                        <td class="roundResult roundNo" data-round-no="26">26</td>
                        <td class="roundResult roundNo" data-round-no="27">27</td>
                        <td class="roundResult roundNo" data-round-no="28">28</td>
                        <td class="roundResult roundNo" data-round-no="29">29</td>
                        <td class="roundResult roundNo" data-round-no="30">30</td>
                        <td class="roundResult roundNo" data-round-no="31">31</td>
                        <td class="roundResult roundNo" data-round-no="32">32</td>
                        <td class="roundResult roundNo" data-round-no="33">33</td>
                        <td class="roundResult roundNo" data-round-no="34">34</td>
                        <td class="roundResult roundNo" data-round-no="35">35</td>
                        <td class="roundResult roundNo" data-round-no="36">36</td>
                        <td class="roundResult roundNo" data-round-no="37">37</td>
                        <td class="roundResult roundNo" data-round-no="38">38</td>
                        <td class="roundResult roundNo" data-round-no="39">39</td>
                        <td class="roundResult roundNo" data-round-no="40">40</td>
                    </tr>
                </table>
            </div>
            <br/>
            <div class="inputTableSec">
                <table class="inputTable">
                    <tr>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">11쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">12쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">13쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">14쿼터</td>
                        <td colspan="4" class="quaterIndi" style="background-color: #99ff00;">15쿼터</td>
                    </tr>
                    <tr>
                        <td class="roundResult roundNo" data-round-no="41">41</td>
                        <td class="roundResult roundNo" data-round-no="42">42</td>
                        <td class="roundResult roundNo" data-round-no="43">43</td>
                        <td class="roundResult roundNo" data-round-no="44">44</td>
                        <td class="roundResult roundNo" data-round-no="45">45</td>
                        <td class="roundResult roundNo" data-round-no="46">46</td>
                        <td class="roundResult roundNo" data-round-no="47">47</td>
                        <td class="roundResult roundNo" data-round-no="48">48</td>
                        <td class="roundResult roundNo" data-round-no="49">49</td>
                        <td class="roundResult roundNo" data-round-no="50">50</td>
                        <td class="roundResult roundNo" data-round-no="51">51</td>
                        <td class="roundResult roundNo" data-round-no="52">52</td>
                        <td class="roundResult roundNo" data-round-no="53">53</td>
                        <td class="roundResult roundNo" data-round-no="54">54</td>
                        <td class="roundResult roundNo" data-round-no="55">55</td>
                        <td class="roundResult roundNo" data-round-no="56">56</td>
                        <td class="roundResult roundNo" data-round-no="57">57</td>
                        <td class="roundResult roundNo" data-round-no="58">58</td>
                        <td class="roundResult roundNo" data-round-no="59">59</td>
                        <td class="roundResult roundNo" data-round-no="60">60</td>
                    </tr>
                </table>
            </div>
            <br/>
            <div style="margin-top: 10px; margin-bottom: 10px;">
                <table>
                    <tr>
                        <td style="background-color: #FFFF00">1등 색상</td>
                        <td style="background-color: #D8D8D8">2등 색상</td>
                        <td style="background-color: #FE9A2E">3등 색상</td>
                    </tr>
                </table>
            </div>

            <div class="pickTableSec">
                <div class="pickTableNameSec">
                    <table class="pickTableNameTbl">
                        <tr>
                            <td class="pickTableName" style="background-color: #0000cc; color: white;">Route 1</td>
                            <td class="rankName">Rank</td>
                            <td class="quaterPointRank"></td>
                        </tr>
                    </table>
                </div>
                <table class="pickTable">
                    <tbody>
                    <tr class="roundRow">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>32</td>
                        <td>33</td>
                        <td>34</td>
                        <td>35</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>41</td>
                        <td>42</td>
                        <td>43</td>
                        <td>44</td>
                        <td>45</td>
                        <td>46</td>
                        <td>47</td>
                        <td>48</td>
                        <td>49</td>
                        <td>50</td>
                        <td>51</td>
                        <td>52</td>
                        <td>53</td>
                        <td>54</td>
                        <td>55</td>
                        <td>56</td>
                        <td>57</td>
                        <td>58</td>
                        <td>59</td>
                        <td>60</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="pickTableSec">
                <div class="pickTableNameSec">
                    <table class="pickTableNameTbl">
                        <tr>
                            <td class="pickTableName" style="background-color: #0000cc; color: white;">Route 2</td>
                            <!-- <td>Point</td>
                            <td class="quaterPoint"></td> -->
                            <td class="rankName">Rank</td>
                            <td class="quaterPointRank"></td>
                        </tr>
                    </table>
                    <!-- <label><input type="checkbox" class="chkIncludeCalc" value="1" checked="checked"/>계산에 포함</label> -->
                </div>
                <table class="pickTable">
                    <tbody>
                    <tr class="roundRow">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>32</td>
                        <td>33</td>
                        <td>34</td>
                        <td>35</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>41</td>
                        <td>42</td>
                        <td>43</td>
                        <td>44</td>
                        <td>45</td>
                        <td>46</td>
                        <td>47</td>
                        <td>48</td>
                        <td>49</td>
                        <td>50</td>
                        <td>51</td>
                        <td>52</td>
                        <td>53</td>
                        <td>54</td>
                        <td>55</td>
                        <td>56</td>
                        <td>57</td>
                        <td>58</td>
                        <td>59</td>
                        <td>60</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div><br/>
            <div class="pickTableSec">
                <div class="pickTableNameSec">
                    <table class="pickTableNameTbl">
                        <tr>
                            <td class="pickTableName" style="background-color: #0000cc; color: white;">Route 3</td>
                            <!-- <td>Point</td>
                            <td class="quaterPoint"></td> -->
                            <td class="rankName">Rank</td>
                            <td class="quaterPointRank"></td>
                        </tr>
                    </table>
                    <!-- <label><input type="checkbox" class="chkIncludeCalc" value="1" checked="checked"/>계산에 포함</label> -->
                </div>
                <table class="pickTable">
                    <tbody>
                    <tr class="roundRow">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>32</td>
                        <td>33</td>
                        <td>34</td>
                        <td>35</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>41</td>
                        <td>42</td>
                        <td>43</td>
                        <td>44</td>
                        <td>45</td>
                        <td>46</td>
                        <td>47</td>
                        <td>48</td>
                        <td>49</td>
                        <td>50</td>
                        <td>51</td>
                        <td>52</td>
                        <td>53</td>
                        <td>54</td>
                        <td>55</td>
                        <td>56</td>
                        <td>57</td>
                        <td>58</td>
                        <td>59</td>
                        <td>60</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="pickTableSec">
                <div class="pickTableNameSec">
                    <table class="pickTableNameTbl">
                        <tr>
                            <td class="pickTableName" style="background-color: #0000cc; color: white;">Route 4</td>
                            <!-- <td>Point</td>
                            <td class="quaterPoint"></td> -->
                            <td class="rankName">Rank</td>
                            <td class="quaterPointRank"></td>
                        </tr>
                    </table>
                    <!-- <label><input type="checkbox" class="chkIncludeCalc" value="1" checked="checked"/>계산에 포함</label> -->
                </div>
                <table class="pickTable">
                    <tbody>
                    <tr class="roundRow">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>32</td>
                        <td>33</td>
                        <td>34</td>
                        <td>35</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>41</td>
                        <td>42</td>
                        <td>43</td>
                        <td>44</td>
                        <td>45</td>
                        <td>46</td>
                        <td>47</td>
                        <td>48</td>
                        <td>49</td>
                        <td>50</td>
                        <td>51</td>
                        <td>52</td>
                        <td>53</td>
                        <td>54</td>
                        <td>55</td>
                        <td>56</td>
                        <td>57</td>
                        <td>58</td>
                        <td>59</td>
                        <td>60</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div><br/>
            <div class="pickTableSec">
                <div class="pickTableNameSec">
                    <table class="pickTableNameTbl">
                        <tr>
                            <td class="pickTableName" style="background-color: #0000cc; color: white;">Route 5</td>
                            <!--
                            <td>Point</td>
                            <td class="quaterPoint"></td>-->
                            <td class="rankName">Rank</td>
                            <td class="quaterPointRank"></td>
                        </tr>
                    </table>
                </div>
                <table class="pickTable route5">
                    <tbody>
                    <tr class="roundRow">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>32</td>
                        <td>33</td>
                        <td>34</td>
                        <td>35</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>41</td>
                        <td>42</td>
                        <td>43</td>
                        <td>44</td>
                        <td>45</td>
                        <td>46</td>
                        <td>47</td>
                        <td>48</td>
                        <td>49</td>
                        <td>50</td>
                        <td>51</td>
                        <td>52</td>
                        <td>53</td>
                        <td>54</td>
                        <td>55</td>
                        <td>56</td>
                        <td>57</td>
                        <td>58</td>
                        <td>59</td>
                        <td>60</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="pickTableSec route6ASec">
                <div class="pickTableNameSec">
                    <table class="pickTableNameTbl">
                        <tr>
                            <td class="pickTableName" style="background-color: #0000cc; color: white;">Route 6</td>
                            <!--
                            <td>Point</td>
                            <td class="quaterPoint"></td>-->
                            <td class="rankName">Rank</td>
                            <td class="quaterPointRank"></td>
                        </tr>
                    </table>
                </div>
                <table class="pickTable route6">
                    <tbody>
                    <tr class="roundRow">
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>32</td>
                        <td>33</td>
                        <td>34</td>
                        <td>35</td>
                        <td>36</td>
                        <td>37</td>
                        <td>38</td>
                        <td>39</td>
                        <td>40</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr class="roundRow">
                        <td>41</td>
                        <td>42</td>
                        <td>43</td>
                        <td>44</td>
                        <td>45</td>
                        <td>46</td>
                        <td>47</td>
                        <td>48</td>
                        <td>49</td>
                        <td>50</td>
                        <td>51</td>
                        <td>52</td>
                        <td>53</td>
                        <td>54</td>
                        <td>55</td>
                        <td>56</td>
                        <td>57</td>
                        <td>58</td>
                        <td>59</td>
                        <td>60</td>
                    </tr>
                    <tr class="resultRow">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div><br/>
        </div>
    </div>
</body>
</html>