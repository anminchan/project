/// 諛곕떦�� ���꾩쑝濡� 援щ텇�섏뿬 �⑥듅 蹂듭듅�쇰줈 �뺣━�댁꽌 以���.
function getAllOdds(raceID)
{
	var oddsResult = $restApi.odds.getList(raceID);
	if (oddsResult.ErrorCode != 0)
	{
		alert(oddsResult.ErrorMsg);
		return null;
	}

	//var timeIdxes = [undefined, undefined, undefined];
	//var singleOdds = [undefined, undefined, undefined];
	//var quinOdds = [undefined, undefined, undefined];

	var oddsDatas = [undefined, undefined, undefined];

	var oddsAllListPre = oddsResult.RetVals.list;
	// ��긽 3媛쒕줈 �좎�
	oddsAllList = new Array(3);
	for(var i=0; i<oddsAllListPre.length; i++)
	{
		if (oddsAllListPre[i].timeIdx == 30) // 留덇컧
		{
			oddsAllList[2] = oddsAllListPre[i];
		}
		else {
			oddsAllList[i] = oddsAllListPre[i];
		}
	}

	if (oddsAllList.length > 0 && oddsAllList[0] != undefined)
	{
		var odds = getOddsOne(oddsAllList, 0);
		oddsDatas[0] = {
			timeIdx : {
				timeIdx : oddsAllList[0].timeIdx,
				timeIdxLongName : oddsAllList[0].timeIdxLongName,
				timeIdxShortName : oddsAllList[0].timeIdxShortName
			},
			singleOdds : odds.singleOdds,
			quinOdds : odds.quinOdds
		};
	}
	if (oddsAllList.length > 1 && oddsAllList[1] != undefined)
	{
		var odds = getOddsOne(oddsAllList, 1);
		oddsDatas[1] = {
			timeIdx : {
				timeIdx : oddsAllList[1].timeIdx,
				timeIdxLongName : oddsAllList[1].timeIdxLongName,
				timeIdxShortName : oddsAllList[1].timeIdxShortName
			},
			singleOdds : odds.singleOdds,
			quinOdds : odds.quinOdds
		};
	}
	if (oddsAllList[2] != undefined)
	{
		var odds = getOddsOne(oddsAllList, 2);
		oddsDatas[2] = {
			timeIdx : {
				timeIdx : oddsAllList[2].timeIdx,
				timeIdxLongName : oddsAllList[2].timeIdxLongName,
				timeIdxShortName : oddsAllList[2].timeIdxShortName
			},
			singleOdds : odds.singleOdds,
			quinOdds : odds.quinOdds
		};
	}

	return  oddsDatas;
}

function getOddsOne(oddsAllList, timeOrder)
{
	var singleOddsList = $.grep(oddsAllList[timeOrder].oddsList, function(elem) { return elem.entryNo1 == 0; });
	var singleOdds = null;
	if (singleOddsList.length > 0)
	{
		singleOdds = singleOddsList[0].odds;
	}

	var quinOddsList = $.grep(oddsAllList[timeOrder].oddsList, function(elem) { return elem.entryNo1 != 0 && elem.entryNo1 != 100; });
	var quinOdds = new Array();
	for(var i=0; i<quinOddsList.length; i++)
	{
		quinOdds[i] = new Array();
		var notExistDoubleQuinAdjust = 0;
		for(var j=0; j<quinOddsList[i].odds.length; j++)
		{
			if (quinOddsList[i].odds[j].entryNo1 == quinOddsList[i].odds[j].entryNo2)
			{
				// 媛숈�嫄� 諛곕떦�� 0
				quinOddsList[i].odds[j].odds = 0;
			}
			quinOdds[i][j+notExistDoubleQuinAdjust]=quinOddsList[i].odds[j];

			if (j == i) // 以묐났留덈쾲 �� �덉뼱�� �� �먮━
			{
				if (quinOddsList[i].odds[j].entryNo1 != quinOddsList[i].odds[j].entryNo2)
				{
					notExistDoubleQuinAdjust = 1;
					var copyTarget = null;
					if (i == 0)
					{
						copyTarget = $.extend({}, quinOdds[i][i]);
					}
					else
					{
						copyTarget = $.extend({}, quinOdds[i][i-1]);
					}

					copyTarget.entryNo1 = (i+1).toString();
					copyTarget.entryNo2 = (i+1).toString();
					copyTarget.odds = 0;
					copyTarget.upperWinCnt = 0;
					copyTarget.leftWinCnt = 0;
					quinOdds[i].splice(i,0,copyTarget);
				}
			}

		}
	}

	return {
		singleOdds : singleOdds,
		quinOdds : quinOdds
	};
}

function getSingleOddsOrderHorseNo(oddsData, stdHorseNo, horses)
{
	var singleOddsOrderHorseNo = [undefined, undefined, undefined];
	for(var timeOrder = 0; timeOrder<oddsData.length; timeOrder++)
	{
		if (oddsData[timeOrder] == undefined)
		{
			continue;
		}
		if (timeOrder == 2 && oddsData[timeOrder].quinOdds.length == 0) continue;
		
		singleOddsOrderHorseNo[timeOrder] = [];

		for(var horseIdx=0; horseIdx<oddsData[timeOrder].singleOdds.length; horseIdx++)
		{
			singleOddsOrderHorseNo[timeOrder].push(oddsData[timeOrder].singleOdds[horseIdx].entryNo2);
		}

		singleOddsOrderHorseNo[timeOrder].sort(function(a,b) {
			var aIdx = parseInt(a) - 1;
			var aOdds = parseInt(oddsData[timeOrder].singleOdds[aIdx].odds);

			var bIdx = parseInt(b) - 1;
			var bOdds = parseInt(oddsData[timeOrder].singleOdds[bIdx].odds);

			// 吏��뺣쭏�대㈃ 臾댁“嫄� �좊몢��.
			if (a == stdHorseNo)
			{
				return -1;
			}
			else if (b == stdHorseNo)
			{
				return 1;
			}
			else
			{
				// �섎떎 痍⑥냼留덈㈃ 洹몃깷 留덈쾲��
				if (horses[a].canceled==1 && horses[b].canceled == 1)
				{
					return parseInt(a) - parseInt(b);
				}
				else if (horses[a].canceled==1)
				{
					return 1;
				}
				else if (horses[b].canceled==1)
				{
					return -1;
				}
				else
				{
					if (aOdds != bOdds)
					{
						return aOdds - bOdds;
					}
					else
					{
						var aQuinSum = getQuinSumOne(oddsData[timeOrder].quinOdds, a);
						var bQuinSum = getQuinSumOne(oddsData[timeOrder].quinOdds, b);

						if (aQuinSum != bQuinSum)
						{
							return aQuinSum-bQuinSum;
						}
						else
						{
							return aIdx - bIdx;
						}
					}
				}
			}
		});
	}

	return singleOddsOrderHorseNo;
}

function getStdQuinOddsOrderHorseNoRank(oddsData, stdHorseNo, horses)
{
	var stdQuinOddsOrderHorseNo = [undefined, undefined, undefined];
	var stdQuinOddsRanks = [undefined, undefined, undefined];

	if (stdHorseNo != 0)
	{
		for(var timeOrder = 0; timeOrder<oddsData.length; timeOrder++)
		{
			if (oddsData[timeOrder] == undefined)
			{
				continue;
			}
			if (timeOrder == 2 && oddsData[timeOrder].quinOdds.length == 0) continue;

			stdQuinOddsOrderHorseNo[timeOrder] = [];
			stdQuinOddsRanks[timeOrder] = [];

			//console.log(oddsData[timeOrder].quinOdds);
			//console.log(parseInt(stdHorseNo)-1);
			for(var horseIdx=0; horseIdx<oddsData[timeOrder].quinOdds[parseInt(stdHorseNo)-1].length; horseIdx++)
			{
				stdQuinOddsOrderHorseNo[timeOrder].push(oddsData[timeOrder].quinOdds[parseInt(stdHorseNo)-1][horseIdx].entryNo2);
			}

			stdQuinOddsOrderHorseNo[timeOrder].sort(function(a,b) {
				var aIdx = parseInt(a) - 1;
				var aOdds = parseInt(oddsData[timeOrder].quinOdds[parseInt(stdHorseNo)-1][aIdx].odds);

				var bIdx = parseInt(b) - 1;
				var bOdds = parseInt(oddsData[timeOrder].quinOdds[parseInt(stdHorseNo)-1][bIdx].odds);

				// �섎떎 痍⑥냼留덈㈃ 洹몃깷 留덈쾲��
				if (horses[a].canceled==1 && horses[b].canceled == 1)
				{
					return parseInt(a) - parseInt(b);
				}
				else if (horses[a].canceled==1)
				{
					return 1;
				}
				else if (horses[b].canceled==1)
				{
					return -1;
				}
				else
				{
					if (aOdds != bOdds)
					{
						return aOdds - bOdds;
					}
					else
					{
						var aQuinSum = getQuinSumOne(oddsData[timeOrder].quinOdds, a);
						var bQuinSum = getQuinSumOne(oddsData[timeOrder].quinOdds, b);

						if (aQuinSum != bQuinSum)
						{
							return aQuinSum-bQuinSum;
						}
						else
						{
							return aIdx - bIdx;
						}
					}
				}
			});

			for(var dIdx=0; dIdx<stdQuinOddsOrderHorseNo[timeOrder].length; dIdx++)
			{
				if (dIdx == 0)
				{
					stdQuinOddsRanks[timeOrder].push((dIdx+1).toString());
				}
				else
				{
					var value = oddsData[timeOrder].quinOdds[parseInt(stdHorseNo)-1][parseInt(stdQuinOddsOrderHorseNo[timeOrder][dIdx])-1].odds;
					var valuePrev = oddsData[timeOrder].quinOdds[parseInt(stdHorseNo)-1][parseInt(stdQuinOddsOrderHorseNo[timeOrder][dIdx-1])-1].odds;
					// �댁쟾怨� �숇쪧
					if (value == valuePrev)
					{
						// �대� �댁쟾�먮룄 �숇쪧�� �덉뿀�� 寃쎌슦
						if (!stdQuinOddsRanks[timeOrder][dIdx-1].endsWith("T"))
						{
							stdQuinOddsRanks[timeOrder][dIdx-1] = stdQuinOddsRanks[timeOrder][dIdx-1] + "T";
						}
						stdQuinOddsRanks[timeOrder][dIdx] = stdQuinOddsRanks[timeOrder][dIdx-1];
					}
					else
					{
						stdQuinOddsRanks[timeOrder][dIdx] = (dIdx+1).toString();
					}
				}
			}

		}
	}

	return {
		stdQuinOddsOrderHorseNo : stdQuinOddsOrderHorseNo,
		stdQuinOddsRanks : stdQuinOddsRanks
	};
}

function getSum5OddsOrderHorseNo(oddsData, stdHorseNo, horses)
{
	var singleOddsOrderHorseNo = getSingleOddsOrderHorseNo(oddsData, stdHorseNo, horses);
	var sum5OddsOrderHorseNo = [undefined, undefined, undefined];
	var sum5Odds = [undefined, undefined, undefined];
	for(var timeOrder = 0; timeOrder<oddsData.length; timeOrder++)
	{
		if (oddsData[timeOrder] == undefined)
		{
			continue;
		}

		sum5OddsOrderHorseNo[timeOrder] = [];
		sum5Odds[timeOrder] = [];

		for(var horseIdx=0; horseIdx<oddsData[timeOrder].quinOdds.length; horseIdx++)
		{
			var entryNo = oddsData[timeOrder].quinOdds[horseIdx][0].entryNo1;
			sum5OddsOrderHorseNo[timeOrder].push(entryNo);

			sum5Odds[timeOrder].push(getSum5Odds(oddsData[timeOrder].quinOdds, singleOddsOrderHorseNo[timeOrder], entryNo))
		}

		sum5OddsOrderHorseNo[timeOrder].sort(function(a,b) {
			var cancelA = horses[a].lock?1:(!horses[a].lineOut&&!horses[a].holeOut?1:0);
			var cancelB = horses[b].lock?1:(!horses[b].lineOut&&!horses[b].holeOut?1:0);
			
			if (cancelA != cancelB)
			{
				return cancelB - cancelA;
			}
			else
			{

				var aIdx = parseInt(a) - 1;
				var aOdds = parseInt(sum5Odds[timeOrder][aIdx]);

				var bIdx = parseInt(b) - 1;
				var bOdds = parseInt(sum5Odds[timeOrder][bIdx]);

				// 吏��뺣쭏�대㈃ 臾댁“嫄� �좊몢��.
				if (a == stdHorseNo)
				{
					return -1;
				}
				else if (b == stdHorseNo)
				{
					return 1;
				}
				else
				{
					// �섎떎 痍⑥냼留덈㈃ 洹몃깷 留덈쾲��
					if (horses[a].canceled==1 && horses[b].canceled == 1)
					{
						return parseInt(a) - parseInt(b);
					}
					else if (horses[a].canceled==1)
					{
						return 1;
					}
					else if (horses[b].canceled==1)
					{
						return -1;
					}
					else
					{
						if (aOdds != bOdds)
						{
							return aOdds - bOdds;
						}
						else
						{
							var aQuinSum = getQuinSumOne(oddsData[timeOrder].quinOdds, a);
							var bQuinSum = getQuinSumOne(oddsData[timeOrder].quinOdds, b);

							if (aQuinSum != bQuinSum)
							{
								return aQuinSum-bQuinSum;
							}
							else
							{
								return aIdx - bIdx;
							}
						}
					}
				}
			}
		});
	}

	return sum5OddsOrderHorseNo;
}

function getQuinSumOne(quinOdds, entryNo)
{
	var idx = parseInt(entryNo)-1;
	var sum = 0;

	for(var i=0; i<quinOdds[idx].length; i++)
	{
		var quin = quinOdds[idx][i];

		sum += parseInt(quin.odds);
	}
	return sum;
}

function getSum5Odds(quinOddsOne, singleOddsOrderHorseNoOne, entryNo)
{
	var entryNoRank = singleOddsOrderHorseNoOne.indexOf(entryNo);
	var entryIdx = parseInt(entryNo) - 1;
	var sum5 = 0;

	var maxOddsIn5 = 0;
	for(var i=0; i<5 && i<singleOddsOrderHorseNoOne.length; i++)
	{
		var entryNo2 = singleOddsOrderHorseNoOne[i];
		var entryIdx2 = parseInt(entryNo2) - 1;

		// 5�� �대궡
		if (entryNoRank < 5 && entryIdx2!=entryIdx)
		{
			sum5 += parseInt(quinOddsOne[entryIdx][entryIdx2].odds);
		}
		if (entryNoRank >= 5)
		{
			var odds = parseInt(quinOddsOne[entryIdx][entryIdx2].odds)
			sum5 += odds;
			if (maxOddsIn5 < odds)
			{
				maxOddsIn5 = odds;
			}
		}
	}

	if (entryNoRank >= 5)
	{
		sum5 -= maxOddsIn5;
	}

	return sum5;
}

function getDegiValueOrderHorseNoNRank(oddsData, stdHorseNo, horses)
{
	var degiValueOrderHorseNo = [undefined, undefined, undefined];
	var degiValueRanks = [undefined, undefined, undefined];

	for(var timeOrder = 0; timeOrder<oddsData.length; timeOrder++)
	{
		if (oddsData[timeOrder] == undefined)
		{
			continue;
		}
		if (timeOrder == 2 && oddsData[timeOrder].quinOdds.length == 0) continue;

		degiValueOrderHorseNo[timeOrder] = [];
		degiValueRanks[timeOrder] = [];

		for(var horseIdx=1; horseIdx<horses.length; horseIdx++)
		{
			var entryNo = horses[horseIdx].entryNo;
			degiValueOrderHorseNo[timeOrder].push(entryNo);
		}

		degiValueOrderHorseNo[timeOrder].sort(function(a,b) {
			var aOdds = parseInt(horses[a].degiValue);
			var bOdds = parseInt(horses[b].degiValue);

			if (aOdds != bOdds)
			{
				return aOdds - bOdds;
			}
			else
			{
				var aQuinSum = getQuinSumOne(oddsData[timeOrder].quinOdds, a);
				var bQuinSum = getQuinSumOne(oddsData[timeOrder].quinOdds, b);

				if (aQuinSum != bQuinSum)
				{
					return aQuinSum-bQuinSum;
				}
				else
				{
					return parseInt(a) - parseInt(b);
				}
			}
		});

		for(var dIdx=0; dIdx<degiValueOrderHorseNo[timeOrder].length; dIdx++)
		{
			if (dIdx == 0)
			{
				degiValueRanks[timeOrder].push((dIdx+1).toString());
			}
			else
			{
				// �댁쟾怨� �숇쪧
				if (horses[degiValueOrderHorseNo[timeOrder][dIdx]].degiValue == horses[degiValueOrderHorseNo[timeOrder][dIdx-1]].degiValue)
				{
					// �대� �댁쟾�먮룄 �숇쪧�� �덉뿀�� 寃쎌슦
					if (!degiValueRanks[timeOrder][dIdx-1].endsWith("T"))
					{
						degiValueRanks[timeOrder][dIdx-1] = degiValueRanks[timeOrder][dIdx-1] + "T";
					}
					degiValueRanks[timeOrder][dIdx] = degiValueRanks[timeOrder][dIdx-1];
				}
				else
				{
					degiValueRanks[timeOrder][dIdx] = (dIdx+1).toString();
				}
			}
		}
	}

	return {
		degiValueOrderHorseNo : degiValueOrderHorseNo,
		degiValueRanks : degiValueRanks
	};
}