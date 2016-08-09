$(document).ready( function(){
	console.log("ready");

	$("#submitData").click( function(){
		var data1 = $("#userInput").val();
		var data2 = $("#userInput2").val();
		var data3 = $("#userInput3").val();

		var dataToTransmit = { intention: "insertARecord", d1 : data1, d2: data2, d3: data3 }

		// console.log( data1 )
		// console.log( data2 )
		// console.log( data3 )

		$.post("api/index.php", dataToTransmit ).done( function( response ){ 
			console.log( response )
		})

	});

	$("#searchData").click( function(){
		var searchKey = $("#searchKey").val();

		var dataToTransmit 	= { intention: "selectARecord", d4: searchKey }
		

		$.post("api/", dataToTransmit ).done( function( response ){
			console.log( response )

			obj = JSON.parse( response )

			console.log( obj.status )

			console.log( obj.data[0] )

			$("#displayData").html( obj.data[0][0] + "-" + obj.data[0][1])
		})
	})
})