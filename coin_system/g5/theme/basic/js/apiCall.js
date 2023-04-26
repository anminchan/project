var $restApi = {
	apiUrlBase : "/rest/",
	defaultResult : {
			"ErrorCode" : 999,
			"ErrorMsg" : "UnknownError",
			"RetVals" : {
			}
		},
	getMyIp : function()
	{
		var myIp = "";
		$.ajax({url:$restApi.apiUrlBase + "getMyIP",
			headers : {"Content-Type":"application/json"},
			dataType : "json",
			method : "get",
			data : "{}",
			cash : true,
			async : false,
			success : function(data) {
				//alert(JSON.stringify(data));
				myIp = data.RetVals.ip;
			}
		});

		return myIp;

	},
	login : function(loginID, passwordHash, force)
	{
		var result =  $.extend(true, {}, $restApi.defaultResult);

		$.ajax({url:$restApi.apiUrlBase + "login",
			headers : {"Content-Type":"application/json"},
			dataType : "json",
			method : "POST",
			data : JSON.stringify({
					"loginID" : loginID,
					"passwordHash" : passwordHash,
					"force" : force
				}),
			async : false,
			processData: false,
			success : function(data) {
				result = data;
			}
		});

		return result;
	},
	getSessionKey : function()
	{
		return Cookies.get("sessionKey");
	},
	logout : function()
	{
		var result =  $.extend(true, {}, $restApi.defaultResult);
		var sessionKey = $restApi.getSessionKey();

		$.ajax({url:$restApi.apiUrlBase + "logout",
			headers : {"Content-Type":"application/json"},
			dataType : "json",
			method : "POST",
			data : JSON.stringify({
					"sessionKey" : sessionKey
				}),
			async : false,
			processData: false,
			success : function(data) {
				result = data;
			}
		});

		return result;

	},
	track : {
		getListAll : function(successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "track",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				success : function(data) {
					successCallback(data);
				}
			});
		}
	},
	raceClass : {
		getListAll : function(successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "raceClass",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				success : function(data) {
					successCallback(data);
				}
			});
		}
	},
	expectSymbol : {
		getListAll : function(successCallback)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "expectSymbol",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				async : false,
				processData: false,
				success : function(data) {
					if (successCallback != undefined)
					{
						successCallback(data);
					}
					result = data;
				}
			});

			return result;
		}
	},
	raceHorseAge : {
		getListAll : function(successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "raceHorseAge",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				success : function(data) {
					successCallback(data);
				}
			});
		}
	},
	race : {
		getListPage : function(trackID, fromDate, toDate, pageNo, pageSize,
			horseCount, raceDistance, raceClassID, raceHorseAgeID,
			raceHandy, raceType, raceRUnder, raceRUpper, stdHorseSingleOdds, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			var url = "race?trackID=" + trackID + "&pageNo=" + pageNo + "&pageSize=" + pageSize;
			if (fromDate != null && toDate != null)
			{
				url += "&fromDate=" + fromDate + "&toDate=" + toDate;
			}
			if (horseCount != null)
			{
				url += "&horseCount=" + horseCount;
			}
			if (raceDistance != null)
			{
				url += "&raceDistance=" + raceDistance;
			}
			if (raceClassID != null)
			{
				url += "&raceClassID=" + raceClassID;
			}
			if (raceHorseAgeID != null)
			{
				url += "&raceHorseAgeID=" + raceHorseAgeID;
			}
			if (raceHandy != null)
			{
				url += "&raceHandy=" + raceHandy;
			}
			if (raceType != null)
			{
				url += "&raceType=" + raceType;
			}
			if (raceRUnder != null)
			{
				url += "&raceRUnder=" + raceRUnder;
			}
			if (raceRUpper != null)
			{
				url += "&raceRUpper=" + raceRUpper;
			}
			if (stdHorseSingleOdds != null)
			{
				url += "&stdHorseSingleOdds=" + stdHorseSingleOdds;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				success : function(data) {
					successCallback(data);
				}
			});
		},
		create : function(inputData)
		{
			var result = null;
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "race",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "POST",
				processData: false,
				async : false,
				data : JSON.stringify(inputData),
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		updateRaceHorseHeadSelect : function(raceID, entryNo, headSelect)
		{
			var result = null;
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID + "/" + entryNo + "/headSelect",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				async : false,
				data : JSON.stringify({"headSelect" : headSelect}),
				success : function(data) {
					result = data;
				}
			});

			return result;

		},
		setStdHorseNo : function(raceID, stdHorseNo)
		{
			var result = null;
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID + "/stdHorseNo",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				async : false,
				data : JSON.stringify({"stdHorseNo" : stdHorseNo}),
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setRaceResult : function (raceID, inputData)
		{
			var result = null;
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID + "/result",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				async : false,
				data : JSON.stringify(inputData),
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setProceding : function(raceID, proceding, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID + "/proceding",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify({"proceding" : proceding}),
				success : function(data) {
					if (successFunc != undefined && successFunc != null)
					{
						successFunc(data);
					}
				}
			});
		},
		remove : function(raceID, successFunc)
		{
			var result = null;
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "DELETE",
				processData: false,
				async : false,
				success : function(data) {
					if (successFunc != undefined && successFunc != null)
					{
						successFunc(data);
					}
				}
			});
		},
		update : function(raceID, inputData, successFunc)
		{
			var result = null;
			var sessionKey = $restApi.getSessionKey();

			//console.log($restApi.apiUrlBase + "race/" + raceID);
			//console.log(JSON.stringify(inputData));
			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify(inputData),
				success : function(data) {
					if (successFunc != undefined && successFunc != null)
					{
						successFunc(data);
					}
				}
			});
		},
		getInfoCurrent : function()
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "race/current",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		getInfo : function(raceID)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setMisc : function(raceID, columnName, value)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var data = {};
			data[columnName] = value;
			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID + "/" + columnName,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				async : false,
				data : JSON.stringify(data),
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setDescription : function(raceID, selectionType, description)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var data = {};
			data["selectionType"] = selectionType;
			data["description"] = description;
			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID + "/description",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				async : false,
				data : JSON.stringify(data),
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setDescription1 : function(raceID, description)
		{
			return this.setMisc(raceID, "description1", description);
		},
		setDescription2 : function(raceID, description)
		{
			return this.setMisc(raceID, "description2", description);
		},
		setDescription3 : function(raceID, description)
		{
			return this.setMisc(raceID, "description3", description);
		},
		setDescription4 : function(raceID, description)
		{
			return this.setMisc(raceID, "description4", description);
		},
		setDescription5 : function(raceID, description)
		{
			return this.setMisc(raceID, "description5", description);
		},
		setDescription6 : function(raceID, description)
		{
			return this.setMisc(raceID, "description6", description);
		},
		setDescription7 : function(raceID, description)
		{
			return this.setMisc(raceID, "description7", description);
		},
		setDescription8 : function(raceID, description)
		{
			return this.setMisc(raceID, "description8", description);
		},
		setSingleOddsDegi : function(raceID, singleOddsDegi)
		{
			return this.setMisc(raceID, "singleOddsDegi", singleOddsDegi);
		},
		setRaceCanceled : function(raceID, raceCanceled)
		{
			return this.setMisc(raceID, "raceCanceled", raceCanceled);
		},
		setRaceDelayMinutes : function(raceID, raceDelayMinutes)
		{
			return this.setMisc(raceID, "raceDelayMinutes", raceDelayMinutes);
		},
		setChaosRace : function(raceID, chaosRace)
		{
			return this.setMisc(raceID, "chaosRace", chaosRace);
		},
		setHeadHoleOut : function(raceID, headHoleOut)
		{
			return this.setMisc(raceID, "headHoleOut", headHoleOut);
		},
		setCanceledHorse : function(raceID, canceledHorseNo)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "race/" + raceID + "/canceledHorseNo",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				async : false,
				data : JSON.stringify({"canceledHorseNo" : canceledHorseNo}),
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		getCalculation : function(trackID, fromDate, toDate, horseCount, raceDistance,
			raceClassID, raceHorseAgeID, raceHandy, raceType, raceRUnder, raceRUpper, stdHorseSingleOdds, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var url = "race/calculation";

			var queryStr = "";
			if (trackID != undefined && trackID != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "trackID=" + trackID;
			}
			if (fromDate != undefined && fromDate != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "fromDate=" + fromDate;
			}
			if (toDate != undefined && toDate != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "toDate=" + toDate;
			}
			if (horseCount != undefined && horseCount != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "horseCount=" + horseCount;
			}
			if (raceDistance != undefined && raceDistance != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "raceDistance=" + raceDistance;
			}
			if (raceClassID != undefined && raceClassID != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "raceClassID=" + raceClassID;
			}
			if (raceHorseAgeID != undefined && raceHorseAgeID != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "raceHorseAgeID=" + raceHorseAgeID;
			}
			if (raceHandy != undefined && raceHandy != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "raceHandy=" + raceHandy;
			}
			if (raceType != undefined && raceType != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "raceType=" + raceType;
			}
			if (raceRUnder != undefined && raceRUnder != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "raceRUnder=" + raceRUnder;
			}
			if (raceRUpper != undefined && raceRUpper != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "raceRUpper=" + raceRUpper;
			}
			if (stdHorseSingleOdds != undefined && stdHorseSingleOdds != null)
			{
				if (queryStr != "") queryStr += "&";
				queryStr += "stdHorseSingleOdds=" + stdHorseSingleOdds;
			}

			if (queryStr != "")
			{
				url = url + "?" + queryStr;
			}

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		}
	},
	member : {
		getList : function(pageNo, pageSize, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member?pageNo=" + pageNo + "&pageSize=" + pageSize + "&approved=1&deleted=0",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				success : function(data) {
					successCallback(data);
				}
			});

		},
		getInfo : function(successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/my",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				success : function(data) {
					successCallback(data);
				}
			});
		},
		pingLogin : function(successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/my",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "POST",
				processData: false,
				success : successCallback
			});
		},
		setLastState : function(memberNo, codeInfoSummaryString, codeInfoOrdering, codeInfoCheckedSummary, codeInfoTrackID, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/lastState",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify({"codeInfoSummaryString" : codeInfoSummaryString, "codeInfoOrdering" : codeInfoOrdering, "codeInfoCheckedSummary": codeInfoCheckedSummary, "codeInfoTrackID":codeInfoTrackID}),
				success : function(data) {
					if (typeof(successCallback) == "function")
					{
						successCallback(data);
					}
				}
			});
		},
		setLastState2 : function(memberNo, codeInfoSummaryString, codeInfoOrdering, codeInfoCheckedSummary, codeInfoTrackID, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/lastState",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify({"codeInfo2SummaryString" : codeInfoSummaryString, "codeInfo2Ordering" : codeInfoOrdering, "codeInfo2CheckedSummary": codeInfoCheckedSummary, "codeInfo2TrackID":codeInfoTrackID}),
				success : function(data) {
					if (typeof(successCallback) == "function")
					{
						successCallback(data);
					}
				}
			});
		},
		setLastState3 : function(memberNo, codeInfoSummaryString, codeInfoOrdering, codeInfoCheckedSummary, codeInfoTrackID, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/lastState",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify({"codeInfo3SummaryString" : codeInfoSummaryString, "codeInfo3Ordering" : codeInfoOrdering, "codeInfo3CheckedSummary": codeInfoCheckedSummary, "codeInfo3TrackID":codeInfoTrackID}),
				success : function(data) {
					if (typeof(successCallback) == "function")
					{
						successCallback(data);
					}
				}
			});
		},
		setLastState4 : function(memberNo, codeInfoSummaryString, codeInfoOrdering, codeInfoCheckedSummary, codeInfoTrackID, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/lastState",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify({"codeInfo4SummaryString" : codeInfoSummaryString, "codeInfo4Ordering" : codeInfoOrdering, "codeInfo4CheckedSummary": codeInfoCheckedSummary, "codeInfo4TrackID":codeInfoTrackID}),
				success : function(data) {
					if (typeof(successCallback) == "function")
					{
						successCallback(data);
					}
				}
			});
		},
		setLastState5 : function(memberNo, codeInfoSummaryString, codeInfoOrdering, codeInfoCheckedSummary, codeInfoTrackID, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/lastState",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify({"codeInfo5SummaryString" : codeInfoSummaryString, "codeInfo5Ordering" : codeInfoOrdering, "codeInfo5CheckedSummary": codeInfoCheckedSummary, "codeInfo5TrackID":codeInfoTrackID}),
				success : function(data) {
					if (typeof(successCallback) == "function")
					{
						successCallback(data);
					}
				}
			});
		},
		setLastState6 : function(memberNo, codeInfoSummaryString, codeInfoOrdering, codeInfoCheckedSummary, codeInfoTrackID, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/lastState",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify({"codeInfo6SummaryString" : codeInfoSummaryString, "codeInfo6Ordering" : codeInfoOrdering, "codeInfo6CheckedSummary": codeInfoCheckedSummary, "codeInfo6TrackID":codeInfoTrackID}),
				success : function(data) {
					if (typeof(successCallback) == "function")
					{
						successCallback(data);
					}
				}
			});
		},
		setLastStateSingleOddsDegi : function(memberNo, singleOddsDegi, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/lastState",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify({"singleOddsDegi" : singleOddsDegi}),
				success : function(data) {
					if (typeof(successCallback) == "function")
					{
						successCallback(data);
					}
				}
			});
		},
		getLastState : function(memberNo)
		{
			var sessionKey = $restApi.getSessionKey();

			var result;

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/lastState",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		getMemo : function(memberNo, keywords, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();

			var result;

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/memo?keywords=" + keywords.join(","),
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData: false,
				async : true,
				success : function(data) {
					successFunc(data);
				}
			});

			//return result;
		},
		setMemo : function(memberNo, keyword, content, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();

			var result;

			$.ajax({url:$restApi.apiUrlBase + "member/" + memberNo + "/memo/" + keyword,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				async : true,
				data : JSON.stringify({"memoContent" : content}),
				success : function(data) {
					successFunc(data);
				}
			});

			return result;
		}
	},
	odds : {
		touchTime : function(raceID)
		{
			var result = null;
			var sessionKey = $restApi.getSessionKey();
			//console.log(ignoreData);
			var url = "odds/touchTime";
			if (raceID != undefined)
			{
				url += "/" + raceID;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		queryTime : function(raceID, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();
			//console.log(ignoreData);

			$.ajax({url:$restApi.apiUrlBase + "odds/" + raceID + "/time",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (successCallback != null)
					{
						successCallback(data);
					}
				}
			});
		},
		setIgnore : function(ignoreData, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();
			//console.log(ignoreData);

			$.ajax({url:$restApi.apiUrlBase + "odds/ignore",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify(ignoreData),
				success : function(data) {
					if (successCallback != null)
					{
						successCallback(data);
					}
				}
			});

		},
		set : function(inputData, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "odds",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "POST",
				processData : false,
				data : JSON.stringify(inputData),
				success : function(data) {
					if (successCallback != null)
					{
						successCallback(data);
					}
				}
			});
		},
		getList : function(raceID, successCallback)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "odds/" + raceID,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		getHeadNumbers : function (raceID)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "odds/" + raceID + "/headNumbers",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setFileToOdds : function(raceID, rcDate, timeIdx, fileID)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "odds/file",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify({
					"raceID" : raceID,
					"rcDate" : rcDate,
					"timeIdx" : timeIdx,
					"fileID" : fileID
				}),
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		removeFileFromOdds : function(raceID, timeIdx)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "odds/file",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "DELETE",
				processData : false,
				data : JSON.stringify({
					"raceID" : raceID,
					"timeIdx" : timeIdx
				}),
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setApplyValToRace : function(raceID, timeIdx, applyValStd)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "odds/applyValStd",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify({
					"raceID" : raceID,
					"timeIdx" : timeIdx,
					"applyValStd" : applyValStd
				}),
				async : true,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		getListQuinOddsStatistics:function(raceID, ignoreUnder10, ignoreUnder20, ignoreUnder30, ignoreUnder40, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "odds/" + raceID + "/quinStatistics?ignoreUnder10=" + (ignoreUnder10?"1":"0") + "&ignoreUnder20=" + (ignoreUnder20?"1":"0") + "&ignoreUnder30=" + (ignoreUnder30?"1":"0") + "&ignoreUnder40=" + (ignoreUnder40?"1":"0"),
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		getSinlgleStatistics:function(raceID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "odds/" + raceID + "/singleStatistics",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		getTopStatistics:function(raceID, isAllRace, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();

			$.ajax({url:$restApi.apiUrlBase + "odds/" + raceID + "/topStatistics?isAllRace=" + isAllRace,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		}
	},
	oddsOld : {
		getListTime : function(trackID, raceDate, raceNo)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "oddsOld/" + trackID + "/" + raceDate + "/" + raceNo,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		getListOdds : function(trackID, raceDate, raceNo, timeIdx)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "oddsOld/" + trackID + "/" + raceDate + "/" + raceNo + "/" + timeIdx,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		}
	},
	experts : {
		getList : function(raceID, selectionNumber)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "experts/" + raceID + "/" + selectionNumber,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		}
	},
	rsaInfo : {
		getRaceResult : function(raceID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "rsaInfo/raceResult/" + raceID,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					//console.log("complete");
					//console.log(successFunc);
					if (successFunc != undefined)
					{
						successFunc(data);
					}
					result = data;
				}
			});

			return result;
		},
		getThisWeekRace : function(trackID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "rsaInfo/racePlan/" + trackID,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (successFunc != undefined)
					{
						successFunc(data);
					}
					result = data;
				},
				timeout : 120000 // �� 2遺�
			});

			return result;
		},
		getOldRace : function(trackID, fromDate, toDate, pageNo, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "rsaInfo/racePlanOld/" + trackID + "/" + fromDate + "/" + toDate + "/" + pageNo,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (successFunc != undefined)
					{
						successFunc(data);
					}
					result = data;
				},
				timeout : 120000 // �� 2遺�
			});

			return result;
		},
		getPlanInfo : function(trackID, rcDate, raceOrder, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "rsaInfo/racePlan/" + trackID + "/" + rcDate + "/" + raceOrder,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					result = data;
					if (successFunc != undefined)
					{
						successFunc(result);
					}
				},
				timeout : 120000 // �� 2遺�
			});

			return result;
		},
		getPlanInfoFromResult : function(trackID, rcDate, raceOrder, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "rsaInfo/racePlanOld/" + trackID + "/" + rcDate + "/" + raceOrder,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					result = data;
					if (successFunc != undefined)
					{
						successFunc(result);
					}
				},
				timeout : 120000 // �� 2遺�
			});

			return result;
		}
	},
	expert : {
		getListAll : function()
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "expert",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setTrackRel : function(trackID, experts)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			$.ajax({url:$restApi.apiUrlBase + "expert/" + trackID,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "POST",
				processData : false,
				async : false,
				data : JSON.stringify({"expertIDs" : experts}),
				success : function(data) {
					result = data;
				}
			});

			return result;
		}
	},
	raceSummary : {
		listDictionary : function(horseCntSearch, singleSelectionSearch, singleBNumberSearch, under1000Str, under2000Str, trackID) {
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/dictionary";
			var queryStr = "";
			if (horseCntSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("horseCnt=" + horseCntSearch);
			}
			if (singleSelectionSearch != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("singleSelection=" + singleSelectionSearch);
			}
			if (singleBNumberSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("singleBNumber=" + singleBNumberSearch);
			}
			if (under1000Str != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("under1000Str=" + under1000Str);
			}
			if (under2000Str != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("under2000Str=" + under2000Str);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			url = url + "?" + queryStr;

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		listDictionary2 : function(horseCntSearch, singleSelectionSearch, singleBNumberSearch, symbolID1, symbolID2, symbolID3, symbolID4, symbolID5, trackID) {
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/dictionary2";
			var queryStr = "";
			if (horseCntSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("horseCnt=" + horseCntSearch);
			}
			if (singleSelectionSearch != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("singleSelection=" + singleSelectionSearch);
			}
			if (singleBNumberSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("singleBNumber=" + singleBNumberSearch);
			}
			if (symbolID1 != "" && symbolID1 != "*")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("symbolID1=" + symbolID1);
			}
			if (symbolID2 != "" && symbolID2 != "*")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("symbolID2=" + symbolID2);
			}
			if (symbolID3 != "" && symbolID3 != "*")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("symbolID3=" + symbolID3);
			}
			if (symbolID4 != "" && symbolID4 != "*")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("symbolID4=" + symbolID4);
			}
			if (symbolID5 != "" && symbolID5 != "*")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("symbolID5=" + symbolID5);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}

			url = url + "?" + queryStr;

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		listDictionary3 : function(horseCntSearch, singleSelectionSearch, singleBNumberSearch, under10, under20, notHead, trackID) {
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/dictionary3";
			var queryStr = "";
			if (horseCntSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("horseCnt=" + horseCntSearch);
			}
			if (singleSelectionSearch != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("singleSelection=" + singleSelectionSearch);
			}
			if (singleBNumberSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("singleBNumber=" + singleBNumberSearch);
			}
			if (under10 != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("under10=" + under10);
			}
			if (under20 != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("under20=" + under20);
			}
			if (notHead != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("notHead=" + notHead);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			url = url + "?" + queryStr;

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		listDictionary4 : function(horseCntSearch, singleSelectionSearch, singleBNumberSearch, first, trackID) {
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/dictionary4";
			var queryStr = "";
			if (horseCntSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("horseCnt=" + horseCntSearch);
			}
			if (singleSelectionSearch != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("singleSelection=" + singleSelectionSearch);
			}
			if (singleBNumberSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("singleBNumber=" + singleBNumberSearch);
			}
			if (first != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("first=" + first);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			url = url + "?" + queryStr;

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		listDictionary5 : function(horseCntSearch, number1Sum, under100, trackID) {
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			//console.log("horseCntSearch=" + horseCntSearch);
			//console.log("number1Sum=" + number1Sum);
			var url = "raceSummary/dictionary5";
			var queryStr = "";
			if (horseCntSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("horseCnt=" + horseCntSearch);
			}
			if (number1Sum != "") { if (queryStr != "") { queryStr += "&"; } queryStr += ("number1Sum=" + number1Sum); }
			for(i=2;i<under100.length;i++)
			{
				if (under100[i] == true)
				{
					if (queryStr != "") { queryStr += "&"; }
					queryStr += ("n" + (i) + "Under100=" + under100[i]);
				}
				else if (under100[i] != false)
				{
					if (queryStr != "") { queryStr += "&"; }
					queryStr += ("n" + (i) + "Under100=*");
				}
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			url = url + "?" + queryStr;

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		listDictionary6 : function(horseCntSearch, head5SumRank1Search, head5SumRank2Search, head5SumRank3Search, head5SumRank4Search, head5SumRank5Search, trackID) {
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/dictionary6";
			var queryStr = "";
			if (horseCntSearch > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("horseCnt=" + horseCntSearch);
			}
			if (head5SumRank1Search != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("head5SumRank1Search=" + head5SumRank1Search);
			}
			if (head5SumRank2Search != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("head5SumRank2Search=" + head5SumRank2Search);
			}
			if (head5SumRank3Search != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("head5SumRank3Search=" + head5SumRank3Search);
			}
			if (head5SumRank4Search != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("head5SumRank4Search=" + head5SumRank4Search);
			}
			if (head5SumRank5Search != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("head5SumRank5Search=" + head5SumRank5Search);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			url = url + "?" + queryStr;

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		listSimilar : function(summaryString, raceID, trackID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/similar";
			var queryStr = "";
			if (raceID > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("raceID=" + raceID);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			if (queryStr != "")
			{
				url = url + "?" + queryStr;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		listSimilar2 : function(summaryString, raceID, trackID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/similar2";
			var queryStr = "";
			if (raceID > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("raceID=" + raceID);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			if (queryStr != "")
			{
				url = url + "?" + queryStr;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		listSimilar3 : function(summaryString, raceID, trackID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/similar3";
			var queryStr = "";
			if (raceID > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("raceID=" + raceID);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			if (queryStr != "")
			{
				url = url + "?" + queryStr;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		listSimilar4 : function(summaryString, raceID, trackID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/similar4";
			var queryStr = "";
			if (raceID > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("raceID=" + raceID);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			if (queryStr != "")
			{
				url = url + "?" + queryStr;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		listSimilar5 : function(summaryString, raceID, trackID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/similar5";
			var queryStr = "";
			if (raceID > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("raceID=" + raceID);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			if (queryStr != "")
			{
				url = url + "?" + queryStr;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		listSimilar6 : function(summaryString, raceID, trackID, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/similar6";
			var queryStr = "";
			if (raceID > 0)
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("raceID=" + raceID);
			}
			if (trackID != "")
			{
				if (queryStr != "")
				{
					queryStr += "&";
				}
				queryStr += ("trackID=" + trackID);
			}
			if (queryStr != "")
			{
				url = url + "?" + queryStr;
			}

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		setMark : function(raceID, summaryIdx, codinate, markState, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + raceID + "/mark/" + summaryIdx;
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify({"codinate" : codinate, "markState": markState}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		getMark : function(raceID, summaryIdx)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + raceID + "/mark/" + summaryIdx;
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					result = data;
				}
			});

			return result;
		},
		setSummaryStringValue : function(summaryString, isBatting, isCreate, isPick, isCage, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/summaryStringValue";

			var dataObj = {};
			if (isBatting != "")
			{
				dataObj["isBatting"] = isBatting;
			}
			if (isCreate != "")
			{
				dataObj["isCreate"] = isCreate;
			}
			if (isPick != "")
			{
				dataObj["isPick"] = isPick;
			}
			if (isCage != "")
			{
				dataObj["isCage"] = isCage;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify(dataObj),
				async : false,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		setSummaryString2Value : function(summaryString, isBatting, isCreate, isPick, isCage, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/summaryString2Value";

			var dataObj = {};
			if (isBatting != "")
			{
				dataObj["isBatting"] = isBatting;
			}
			if (isCreate != "")
			{
				dataObj["isCreate"] = isCreate;
			}
			if (isPick != "")
			{
				dataObj["isPick"] = isPick;
			}
			if (isCage != "")
			{
				dataObj["isCage"] = isCage;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify(dataObj),
				async : false,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		setSummaryString3Value : function(summaryString, isBatting, isCreate, isPick, isCage, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/summaryString3Value";

			var dataObj = {};
			if (isBatting != "")
			{
				dataObj["isBatting"] = isBatting;
			}
			if (isCreate != "")
			{
				dataObj["isCreate"] = isCreate;
			}
			if (isPick != "")
			{
				dataObj["isPick"] = isPick;
			}
			if (isCage != "")
			{
				dataObj["isCage"] = isCage;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify(dataObj),
				async : false,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		setSummaryString4Value : function(summaryString, isBatting, isCreate, isPick, isCage, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/summaryString4Value";

			var dataObj = {};
			if (isBatting != "")
			{
				dataObj["isBatting"] = isBatting;
			}
			if (isCreate != "")
			{
				dataObj["isCreate"] = isCreate;
			}
			if (isPick != "")
			{
				dataObj["isPick"] = isPick;
			}
			if (isCage != "")
			{
				dataObj["isCage"] = isCage;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify(dataObj),
				async : false,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		setSummaryString5Value : function(summaryString, isBatting, isCreate, isPick, isCage, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/" + summaryString + "/summaryString5Value";

			var dataObj = {};
			if (isBatting != "")
			{
				dataObj["isBatting"] = isBatting;
			}
			if (isCreate != "")
			{
				dataObj["isCreate"] = isCreate;
			}
			if (isPick != "")
			{
				dataObj["isPick"] = isPick;
			}
			if (isCage != "")
			{
				dataObj["isCage"] = isCage;
			}
			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData : false,
				data : JSON.stringify(dataObj),
				async : false,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		listSummary : function(trackID, horseCount, firstGroup, secondGroup, oddsUnder, oddsUpper, ordering, successFunc)
		{
			var sessionKey = $restApi.getSessionKey();
			var result = null;

			var url = "raceSummary/list?trackID=" + trackID + "&horseCount=" + horseCount + "&firstGroup=" + firstGroup + "&secondGroup=" + secondGroup + "&oddsUnder=" + oddsUnder + "&oddsUpper=" + oddsUpper + "&ordering=" + ordering.join(",");

			$.ajax({url:$restApi.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "GET",
				processData : false,
				async : false,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		}
	}
};