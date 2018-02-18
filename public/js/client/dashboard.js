$(document).ready(function(){
 	
	// Pusher.logToConsole = true;
	// setInterval(function(){
	// 	var info = {
 //    		_token: $('meta[name="csrf-token"]').attr('content')
 //    	}
	// 	$.ajax({
	// 		type: "get",
 //      		url: "/stats-update",
	// 	    data: info,
	// 		beforeSend: function (xhr) {
	//             var token = $('meta[name="csrf-token"]').attr('content');
	//             if (token) {
	//                   return xhr.setRequestHeader('X-CSRF-TOKEN', token);
	//             }
	//         }
	// 	})
	// },1000)

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



	var container = $("#flot-line-chart-moving");
    // Determine how many data points to keep based on the placeholder's initial size;
    // this gives us a nice high-res plot while avoiding more than one point per pixel.
    var maximum = container.outerWidth() / 2 || 300;
    //
    var data = [];

    channel.bind('get-price', function(response) {
  		$("#price").html(response.price)
  		if (typeof response.price != "undefined"){
			var chart_data = response.price/1000000
			DrawChart(chart_data)  			
  		}
    });


    var DrawChart = function(chart_data){
    	var container = $("#flot-line-chart-moving");
	    // Determine how many data points to keep based on the placeholder's initial size;
	    // this gives us a nice high-res plot while avoiding more than one point per pixel.
	    var maximum = container.outerWidth() / 10 || 300;
	    //
	    function getRandomData() {
	        if (data.length) {
	            data = data.slice(1);
	        }
	        while (data.length < maximum) {
	            var previous = data.length ? data[data.length - 1] : 0;
	            var y = chart_data;
	            data.push(y < 0 ? 0 : y > 100 ? 100 : y);
	        }
	        // zip the generated y values with the x values
	        var res = [];
	        for (var i = 0; i < data.length; ++i) {
	            res.push([i, data[i]])
	        }
	        return res;
	    }
	    //
	    series = [{
	        data: getRandomData(),
	        lines: {
	            fill: true
	        }
	    }];
	    //
	    var plot = $.plot(container, series, {
	        colors: ["#26c6da"],
	        grid: {
	            borderWidth: 0,
	            minBorderMargin: 20,
	            labelMargin: 10,
	            backgroundColor: {
	                colors: ["#fff", "#fff"]
	            },
	            margin: {
	                top: 8,
	                bottom: 20,
	                left: 20
	            },
	            markings: function(axes) {
	                var markings = [];
	                var xaxis = axes.xaxis;
	                for (var x = Math.floor(xaxis.min); x < xaxis.max; x += xaxis.tickSize * 1) {
	                    markings.push({
	                        xaxis: {
	                            from: x,
	                            to: x + xaxis.tickSize
	                        },
	                        color: "#fff"
	                    });
	                }
	                return markings;
	            }
	        },
	        xaxis: {
	            tickFormatter: function() {
	                return "";
	            }
	        },
	        yaxis: {
	            min: 0,
	            max: 110
	        },
	        legend: {
	            show: true
	        }
	    });
	    // Update the random dataset at 25FPS for a smoothly-animating chart
	    function updateRandom() {
	        series[0].data = getRandomData();
	        plot.setData(series);
	        plot.draw();
	    }
    }

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

})

   


/*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/


$(function() {
    
});
    

