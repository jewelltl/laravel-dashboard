$(document).ready(function(){
 	
	// Pusher.logToConsole = true;
    //update stats for test (every 5s)
	setInterval(function(){
		var info = {
    		_token: $('meta[name="csrf-token"]').attr('content')
    	}
		$.ajax({
			type: "get",
      		url: "/chart-update",
		    data: info,
			beforeSend: function (xhr) {
	            var token = $('meta[name="csrf-token"]').attr('content');
	            if (token) {
	                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	            }
	        }
		})
	},5000)
    //update stats for test (every second)
    setInterval(function(){
        var info = {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
        $.ajax({
            type: "get",
            url: "/stats-update",
            data: info,
            beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');
                if (token) {
                      return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                }
            }
        })
    },1000)

	var pusher = new Pusher(app_key, {
		cluster: cluster,
		encrypted: true
	})
	var channel = pusher.subscribe('client-dashboard');

	//pusher get channel for test
	channel.bind('get-stats', function(response) {
		changeStats(response)
    });
	//pusher get channel for real
    channel.bind('get-stats' + id, function(response) {
  		changeStats(response)
    });

    //pusher get channel for real
    channel.bind('get-chart' + id, function(response) {
  		DrawChart(response)
    });
     channel.bind('get-chart', function(response) {
  		DrawChart(response)
    });

    var changeStats = function(stats){
    	$("#balance").html(stats.balance)
    	$("#available_credit").html(stats.available_credit)
    	$("#current_due").html(stats.current_due)
    	$("#past_due").html(stats.past_due)
    	$("#terms").html(stats.terms)
    	$("#asr").html(stats.asr)
    	$("#requests_cancelled").html(stats.requests_cancelled)
    	$("#billed_minutes").html(stats.billed_minutes)
    	$("#total_calls").html(stats.total_calls)
    	$("#connected_calls").html(stats.connected_calls)
    	$("#short_calls").html(stats.short_calls)
    }
    
    var DrawChart = function(chartData){
        
        var labels = chartData.map(obj =>{ 
                var date = new Date(obj.created_at)
                return date.getHours() + ":" + date.getMinutes();
            })
        var active = chartData.map(obj => obj.active)
        var asr = chartData.map(obj => obj.asr)
        var cps = chartData.map(obj => obj.cps)
        var ports = chartData.map(obj => obj.ports)

        var dom = document.getElementById("main");
        var mytempChart = echarts.init(dom);
        var app = {};
        option = null;
        option = {
           
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['Active','ASR', 'CPS', 'Ports']
            },
            toolbox: {
                show : true,
                feature : {
                    magicType : {show: true, type: ['line', 'bar']},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            color: ["#55ce63", "#009efb", "#6772e5", "#ff5c6c"],
            calculable : true,
            xAxis : [
                {
                    type : 'category',

                    boundaryGap : false,
                    data : labels
                }
            ],
            yAxis : [
                {
                    type : 'value',
                    axisLabel : {
                        formatter: '{value}'
                    }
                }
            ],

            series : [
                {
                    name:'Active',
                    type:'line',
                    color:['#000'],
                    data: active,
                    markPoint : {
                        data : [
                            {type : 'max', name: 'Max'},
                            {type : 'min', name: 'Min'}
                        ]
                    },
                    itemStyle: {
                        normal: {
                            lineStyle: {
                                shadowColor : 'rgba(0,0,0,0.3)',
                                shadowBlur: 10,
                                shadowOffsetX: 8,
                                shadowOffsetY: 8 
                            }
                        }
                    },        
                    markLine : {
                        data : [
                            {type : 'average', name: 'Average'}
                        ]
                    }
                },
                {
                    name:'ASR',
                    type:'line',
                    data: asr,
                    markPoint : {
                        data : [
                            {name : 'Week minimum', value : -2, xAxis: 1, yAxis: -1.5}
                        ]
                    },
                    itemStyle: {
                        normal: {
                            lineStyle: {
                                shadowColor : 'rgba(0,0,0,0.3)',
                                shadowBlur: 10,
                                shadowOffsetX: 8,
                                shadowOffsetY: 8 
                            }
                        }
                    }, 
                    markLine : {
                        data : [
                            {type : 'average', name : 'Average'}
                        ]
                    }
                },
                {
                    name:'CPS',
                    type:'line',
                    data: cps,
                    markPoint : {
                        data : [
                            {name : 'Week minimum', value : -2, xAxis: 1, yAxis: -1.5}
                        ]
                    },
                    itemStyle: {
                        normal: {
                            lineStyle: {
                                shadowColor : 'rgba(0,0,0,0.3)',
                                shadowBlur: 10,
                                shadowOffsetX: 8,
                                shadowOffsetY: 8 
                            }
                        }
                    }, 
                    markLine : {
                        data : [
                            {type : 'average', name : 'Average'}
                        ]
                    }
                },
                {
                    name:'Ports',
                    type:'line',
                    data: ports,
                    markPoint : {
                        data : [
                            {name : 'Week minimum', value : -2, xAxis: 1, yAxis: -1.5}
                        ]
                    },
                    itemStyle: {
                        normal: {
                            lineStyle: {
                                shadowColor : 'rgba(0,0,0,0.3)',
                                shadowBlur: 10,
                                shadowOffsetX: 8,
                                shadowOffsetY: 8 
                            }
                        }
                    }, 
                    markLine : {
                        data : [
                            {type : 'average', name : 'Average'}
                        ]
                    }
                }
            ]
        };

        if (option && typeof option === "object") {
            mytempChart.setOption(option, true), $(function() {
                    function resize() {
                        setTimeout(function() {
                            mytempChart.resize()
                        }, 100)
                    }
                    $(window).on("resize", resize), $(".sidebartoggler").on("click", resize)
                });
        }


    }


    DrawChart(chartData)

})



