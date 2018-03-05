$(document).ready(function(){
 	
	// Pusher.logToConsole = true;
    // update stats for test (every 5s)
	

	var pusher = new Pusher(app_key, {
		cluster: cluster,
		encrypted: true
	})
	var channel = pusher.subscribe('client-dashboard');
    setInterval(function(){
        $.ajax({
            url: '/stats-update'
        })
        $.ajax({
            url: '/chart-update'
        })
    },15000)
      

	//pusher get channel for test
	channel.bind('get-stats', function(response) {
		changeStats(response)
    });

    channel.bind('get-chart', function(response) {
        DrawChart(response)
    });

	//pusher get channel for real
    channel.bind('get-stats' + id, function(response) {
        // console.log('pusher stats response for user ' + id)
  		changeStats(response)
    });

    //pusher get channel for real
    channel.bind('get-chart' + id, function(response) {
        // console.log('pusher charts response for user ' + id)
  		DrawChart(response)
    });
     

    var changeStats = function(stats){
    	$("#balance").number(stats.balance, 2)
    	$("#spent_today").number(stats.spent_today, 2)
    	$("#asr").number(stats.asr)
    	$("#canceled_calls").number(stats.canceled_calls)
    	$("#billed_minutes").number(stats.billed_minutes)
    	$("#total_calls").number(stats.total_calls)
    	$("#connected_calls").number(stats.connected_calls)
    	$("#short_calls").number(stats.short_calls)
    }
    
    var DrawChart = function(chartData){
        
        var labels = chartData.map(obj =>{ 
                var date = new Date(obj.created_at)
                return date.getHours() + ":" + date.getMinutes();
            })
        var chart_info = chartData.map(function(obj){
            
            return {
                    time: obj.created_at,
                    Active: obj.active,
                    ASR: obj.asr,
                    CPS : obj.cps,
                    Ports: obj.ports
                }

        })
                
        Morris.Area({
            element: 'dial-history-chart',
            data: chart_info,
            xkey: 'time',
            ykeys: ['Active', 'ASR', 'CPS', 'Ports'],
            labels: ['Active', 'ASR', 'CPS', 'Ports'],
            pointSize: 0,
            fillOpacity: 0,
            pointStrokeColors: ['#20aee3', '#24d2b5', '#6772e5', '#ff5c6c'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 3,
            hideHover: 'auto',
            lineColors: ['#20aee3', '#24d2b5', '#6772e5', '#ff5c6c'],
            resize: true

        });

    }


    DrawChart(chartData)

})



