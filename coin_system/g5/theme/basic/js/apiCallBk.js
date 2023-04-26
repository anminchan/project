var $restApiBk = {
	apiUrlBase : "/restBk/",
	defaultResult : {
		"ErrorCode" : 999,
		"ErrorMsg" : "UnknownError",
		"RetVals" : {
		}
    },
    getSessionKey : function()
    {
        return Cookies.get("sessionKey");
    },
    bkShoe : {
        create : function(shoeDate, shoeNo, roomNo, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoe",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "POST",
                processData : false,
				data : JSON.stringify({"shoeDate":shoeDate, "shoeNo":shoeNo, "roomNo": roomNo}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
        },
        getList : function(shoeDate, q1Data, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoe?shoeDate=" + shoeDate + "&q1Data=" + (q1Data==null?"":q1Data),
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
        getInfo: function(shoeIdx, shoeDate, roomNo, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoe/" + shoeIdx + "?shoeDate=" + shoeDate + "&roomNo=" + roomNo,
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
        remove : function(shoeIdx, confirm, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoe/" + shoeIdx,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "DELETE",
                processData : false,
				data : JSON.stringify({"confirm":confirm?1:0}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		setRound : function(shoeIdx, roundNo, dataStr, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoe/" + shoeIdx,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "PUT",
                processData : false,
				data : JSON.stringify({"roundNo":roundNo, "dataStr":dataStr}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		getStatistics : function(q1, shoeIdx, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoe/" + shoeIdx + "/statistics?q1=" + q1,
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
		getHelpStatistics : function (q1, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoe/helpStatistics?q1=" + q1,
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
	bkShoeComplete : {
        getList : function(shoeDate, q1Data, roomNo, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

			var queryStr = "";

			
			if (shoeDate != null)
			{
				if (queryStr != "")
				{
					queryStr += queryStr + "&";
				}
				queryStr = queryStr + "shoeDate=" + shoeDate;
			}
			if (q1Data != null)
			{
				if (queryStr != "")
				{
					queryStr += queryStr + "&";
				}
				queryStr = queryStr + "q1Data=" + q1Data;
			}
			if (roomNo != null)
			{
				if (queryStr != "")
				{
					queryStr += queryStr + "&";
				}
				queryStr = queryStr + "roomNo=" + roomNo;
			}
            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeComplete?" + queryStr,
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
        getInfo: function(shoeIdx, shoeDate, roomNo, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeComplete/" + shoeIdx + "?shoeDate=" + shoeDate + "&roomNo=" + roomNo,
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
        setRoundBulk : function(insertData, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeComplete",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "POST",
                processData : false,
				data : JSON.stringify({"insertData":insertData}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
        },
		remove : function(shoeIdx, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeComplete/" + shoeIdx,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "DELETE",
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
	bkShoeProceding: {
        create : function(shoeDate, roomNo)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;
			var shoeIdx = 0;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeProceding",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "POST",
                processData : false,
				data : JSON.stringify({"shoeDate":shoeDate, "roomNo": roomNo}),
				async : false,
				success : function(data) {
					if (data.ErrorCode == 0)
					{
						shoeIdx = data.RetVals.shoeIdx;
					}
					else
					{
						alert(data.ErrorMsg);
					}
				}
			});

			return shoeIdx;
        },
        getList : function(shoeDate, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeProceding?shoeDate=" + shoeDate,
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
        getInfo: function(shoeIdx, shoeDate, roomNo, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeProceding/" + shoeIdx + "?shoeDate=" + shoeDate + "&roomNo=" + roomNo,
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
		setRound : function(shoeIdx, roundNo, dataStr, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeProceding/" + shoeIdx,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "PUT",
                processData : false,
				data : JSON.stringify({"roundNo":roundNo, "dataStr":dataStr}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		setManPick : function(shoeIdx, roundNo, dataStr, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeProceding/" + shoeIdx + "/setManPick",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "PUT",
                processData : false,
				data : JSON.stringify({"roundNo":roundNo, "dataStr":dataStr}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		sendComplete : function(shoeIdx, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeProceding/" + shoeIdx + "/sendComplete",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "PUT",
                processData : false,
				data : JSON.stringify({}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
		},
		setPick:function(shoeIdx, quaterNo, pickNo, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeProceding/" + shoeIdx + "/setPick",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "PUT",
                processData : false,
				data : JSON.stringify({"quaterNo":quaterNo, "pickNo":pickNo}),
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
		getList : function(successCallback) 
		{
			var sessionKey = $restApiBk.getSessionKey();

			$.ajax({url:$restApiBk.apiUrlBase + "bkMember",
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
			var sessionKey = $restApiBk.getSessionKey();

			$.ajax({url:$restApiBk.apiUrlBase + "bkMember/own",
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
		memberUpdate : function(memberId, colName, colValue, successCallback)
		{
			var sessionKey = $restApiBk.getSessionKey();
			var sendingData = {};
			sendingData[colName] = colValue;

			$.ajax({url:$restApiBk.apiUrlBase + "bkMember/" + memberId + "/" + colName,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify(sendingData),
				success : function(data) {
					successCallback(data);
				}
			});
		},
		memberRoundNoUpdate : function(memberId, roundNoStart, roundNoEnd, successCallback)
		{
			var sessionKey = $restApiBk.getSessionKey();
			var sendingData = {};
			sendingData["roundNoStart"] = roundNoStart;
			sendingData["roundNoEnd"] = roundNoEnd;

			$.ajax({url:$restApiBk.apiUrlBase + "bkMember/" + memberId + "/roundNo",
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "PUT",
				processData: false,
				data : JSON.stringify(sendingData),
				success : function(data) {
					successCallback(data);
				}
			});
		}
	},
	bkShoeUserProceding: {
        getInfo: function(shoeIdx, memberId, roomNo, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeUserProceding/" + shoeIdx + "?memberId=" + memberId + "&roomNo=" + roomNo,
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
        clear: function(shoeIdx, memberId, roomNo, successFunc)
        {
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeUserProceding/" + shoeIdx + "?memberId=" + memberId + "&roomNo=" + roomNo,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "DELETE",
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
		setRound : function(shoeIdx, roundNo, dataStr, successFunc)
		{
            var sessionKey = $restApiBk.getSessionKey();
            var result = null;

            $.ajax({url:$restApiBk.apiUrlBase + "bkShoeUserProceding/" + shoeIdx,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
                method : "PUT",
                processData : false,
				data : JSON.stringify({"roundNo":roundNo, "dataStr":dataStr}),
				async : true,
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