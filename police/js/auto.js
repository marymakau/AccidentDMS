$('#LicenceNumber').autocomplete({
	source: function( request, response ) {
		$.ajax({
			url : 'ajax.php',
			dataType: "json",
			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'country_table',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[0],
						value: code[0],
						data : item
					}
				}));
			}
		});
	},
	autoFocus: true,	      	
	minLength: 0,
	select: function( event, ui ) {
		var names = ui.item.data.split("|");						
		$('#NationalIdNumber').val(names[1]);
		$('#DriverGender').val(names[2]);
		$('#CrashDriverName').val(names[3]);
		$('#DriverRoadWorthStatus').val(names[4]);
		$('#DriverLicenceValidity').val(names[5]);
		$('#DriverAge').val(names[6]);

	}		      	
});
			      
$('#CrashDriverName').autocomplete({
  	source: function( request, response ) {
  		$.ajax({
  			url : 'ajax.php',
  			dataType: "json",
  			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'CrashDriverName',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[3],
						value: code[3],
						data : item
					}
				}));
			}
  		});
  	},
  	autoFocus: true,	      	
  	minLength: 0,
  	select: function( event, ui ) {
		var names = ui.item.data.split("|");					
		$('#NationalIdNumber').val(names[1]);
		$('#DriverGender').val(names[2]);
		$('#LicenceNumber').val(names[0]);
	$('#DriverRoadWorthStatus').val(names[4]);
		$('#DriverLicenceValidity').val(names[5]);
		$('#DriverAge').val(names[6]);

	},
	open: function() {
		$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
	},
	close: function() {
		$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
	}		      	
 });
  
 $('#NationalIdNumber').autocomplete({
  	source: function( request, response ) {
  		$.ajax({
  			url : 'ajax.php',
  			dataType: "json",
  			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'NationalIdNumber',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[1],
						value: code[1],
						data : item
					}
				}));
			}
  		});
  	},
  	autoFocus: true,	      	
  	minLength: 0,
  	select: function( event, ui ) {
		var names = ui.item.data.split("|");					
		$('#CrashDriverName ').val(names[3]);
		$('#DriverGender').val(names[2]);
		$('#LicenceNumber').val(names[0]);
		$('#DriverRoadWorthStatus').val(names[4]);
		$('#DriverLicenceValidity').val(names[5]);
		$('#DriverAge').val(names[6]);

	},
	open: function() {
		$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
	},
	close: function() {
		$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
	}		      	
});
  
$('#DriverGender').autocomplete({
  	source: function( request, response ) {
  		$.ajax({
  			url : 'ajax.php',
  			dataType: "json",
  			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'DriverGender',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[2],
						value: code[2],
						data : item
					}
				}));
			}
  		});
  	},
  	autoFocus: true,	      	
  	minLength: 0,
  	select: function( event, ui ) {
		var names = ui.item.data.split("|");					
		$('#CrashDriverName ').val(names[3]);
		$('#NationalIdNumber ').val(names[1]);
		$('#LicenceNumber').val(names[0]);
		$('#DriverRoadWorthStatus').val(names[4]);
		$('#DriverLicenceValidity').val(names[5]);
		$('#DriverAge').val(names[6]);

	},
	open: function() {
		$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
	},
	close: function() {
		$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
	}		      	
});

$('#DriverRoadWorthStatus').autocomplete({
  	source: function( request, response ) {
  		$.ajax({
  			url : 'ajax.php',
  			dataType: "json",
  			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'DriverRoadWorthStatus',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[4],
						value: code[4],
						data : item
					}
				}));
			}
  		});
  	},
  	autoFocus: true,	      	
  	minLength: 0,
  	select: function( event, ui ) {
		var names = ui.item.data.split("|");					
		$('#CrashDriverName ').val(names[3]);
		$('#NationalIdNumber ').val(names[1]);
		$('#LicenceNumber').val(names[0]);
		$('#DriverRoadWorthStatus').val(names[4]);
		$('#DriverLicenceValidity').val(names[5]);
		$('#DriverAge').val(names[6]);

	},
	open: function() {
		$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
	},
	close: function() {
		$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
	}		      	
});
$('#DriverLicenceValidity').autocomplete({
  	source: function( request, response ) {
  		$.ajax({
  			url : 'ajax.php',
  			dataType: "json",
  			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'DriverLicenceValidity',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[5],
						value: code[5],
						data : item
					}
				}));
			}
  		});
  	},
  	autoFocus: true,	      	
  	minLength: 0,
  	select: function( event, ui ) {
		var names = ui.item.data.split("|");					
		$('#CrashDriverName ').val(names[3]);
		$('#NationalIdNumber ').val(names[1]);
		$('#LicenceNumber').val(names[0]);
		$('#DriverRoadWorthStatus').val(names[4]);
		$('#DriverLicenceValidity').val(names[5]);
		$('#DriverAge').val(names[6]);

	},
	open: function() {
		$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
	},
	close: function() {
		$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
	}		      	
});
$('#DriverAge').autocomplete({
  	source: function( request, response ) {
  		$.ajax({
  			url : 'ajax.php',
  			dataType: "json",
  			method: 'post',
			data: {
			   name_startsWith: request.term,
			   type: 'DriverAge',
			   row_num : 1
			},
			 success: function( data ) {
				 response( $.map( data, function( item ) {
				 	var code = item.split("|");
					return {
						label: code[6],
						value: code[6],
						data : item
					}
				}));
			}
  		});
  	},
  	autoFocus: true,	      	
  	minLength: 0,
  	select: function( event, ui ) {
		var names = ui.item.data.split("|");					
		$('#CrashDriverName ').val(names[3]);
		$('#NationalIdNumber ').val(names[1]);
		$('#LicenceNumber').val(names[0]);
		$('#DriverRoadWorthStatus').val(names[4]);
		$('#DriverLicenceValidity').val(names[5]);
		$('#DriverAge').val(names[6]);

	},
	open: function() {
		$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
	},
	close: function() {
		$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
	}		      	
});