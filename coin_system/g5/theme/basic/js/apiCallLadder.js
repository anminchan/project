var $restApiLadder = {
	apiUrlBase : "/restLadder/",
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
    ladder : {
        getList : function(startDate, endDate, successFunc) {
            var sessionKey = $restApiLadder.getSessionKey();

            var result = null;
            var url = "ladder/?reg_date_start=" + startDate + "&reg_date_end=" + endDate;

			$.ajax({url:$restApiLadder.apiUrlBase + url,
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
        getListStatistics : function(startDate, endDate, duration, successFunc) {
            var sessionKey = $restApiLadder.getSessionKey();

            var result = null;
            var url = "ladder/statistics?reg_date_start=" + startDate + "&reg_date_end=" + endDate + "&duration=" + duration;

			$.ajax({url:$restApiLadder.apiUrlBase + url,
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
        updateResult : function(startDate, endDate, successFunc) {
            var sessionKey = $restApiLadder.getSessionKey();

            var result = null;
            var url = "ladder/";

			$.ajax({url:$restApiLadder.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "POST",
                processData : false,
                data : JSON.stringify({"reg_date_start":startDate, "reg_date_end":endDate}),
				async : true,
				success : function(data) {
					if (typeof(successFunc) == "function")
					{
						successFunc(data);
					}
				}
			});
        },
        updateStatistics : function(startDate, endDate, successFunc) {
            var sessionKey = $restApiLadder.getSessionKey();

            var result = null;
            var url = "ladder/statistics";

			$.ajax({url:$restApiLadder.apiUrlBase + url,
				headers : {"Content-Type":"application/json",
						"sessionKey":sessionKey},
				dataType : "json",
				method : "POST",
                processData : false,
                data : JSON.stringify({"reg_date_start":startDate, "reg_date_end":endDate}),
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
}