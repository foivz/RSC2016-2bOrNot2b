$(function() {
	
	
	var queryDict = {};
	location.search.substr(1).split("&").forEach(function(item) {queryDict[item.split("=")[0]] = item.split("=")[1]});
	
	if(typeof queryDict['token'] == 'undefined') window.location = "http://"+ document.location.hostname;
	
	$('[data-var]').html($('<i>').addClass('fa fa-spinner fa-pulse fa-fw'));
	
	$('[data-command]').each(function(i, val) {
		
		var $parent = $(this);
		
		var query = { cmd: $parent.attr('data-command'), token: queryDict['token'] };
		if($parent.is("[data-send]")) {
			$.extend(query, JSON.parse($parent.attr('data-send')))
		}
		
		var reqmethod = ($parent.is('[data-type]')) ? $parent.attr('data-type') : 'GET';
		
		$.ajax({
			method: reqmethod,
			url: "http://squizless.filipm.eu/api/gateway.php",
			data: query
		})
		.done(function( msg ) {
			msg = JSON.parse(msg);
			if(msg.length == 1) {
				$parent.find('[data-var]').each(function() {
					val = $(this)
					if(typeof msg[0][val.attr('data-var')] !== 'undefined') {
						if(val.is("[data-attr]")) val.attr(val.attr('data-attr'), msg[0][val.attr('data-var')]);
						else val.html(msg[0][val.attr('data-var')]);
					} 
				});
			}
			else {				
				var $inside = $parent.children();
				$parent.empty();
				if(typeof $parent.data('inside') === 'undefined') $parent.data('inside', $inside);
				
				for(var i = 0; i < msg.length; i++) {
					var ins = $inside.clone().appendTo($parent);
					
					if($parent.is('[data-callback]')) {
						var callback =  $parent.attr('data-callback');
						console.log(callback);
						window[callback](ins, msg[i]);
					}
				}
				
				/*
				for(var i = 0; i < msg.length; i++) {
					.find('[data-var]').each(function() {
						val = $(this)
						if(val.is("[data-attr]")) val.attr(val.attr('data-attr'), msg[i][val.attr('data-var')]);
						else val.html(msg[i][val.attr('data-var')]);
					})
				}*/
			}
		});
	});
	
	$('form').submit(function(e) {
		e.preventDefault(); 
		
		var query = { cmd: $(this).attr('action'), token: queryDict['token'], debug: true };
		var data = {};
		$(this).serializeArray().map(function(x){data[x.name] = x.value;});
		
		
		$.extend(query, data);
		
		
		console.log(query);
		
		$.ajax({
			method: $(this).attr('method'),
			url: "http://squizless.filipm.eu/api/gateway.php",
			data: query
		}).done(function(data) {
			console.log(data);
			//window.location.href = data;
		});
		
	});
	
	function apiCall(action, method, data) {
		var query = { cmd: action, token: queryDict['token'] };
		
		$.extend(query, data);
		
		$.ajax({
			method: method,
			url: "http://squizless.filipm.eu/api/gateway.php",
			data: query
		});
	}
});
		