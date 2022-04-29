$(document).on('click','#btn-add',function(e) {
		var data = $("#user_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "save_cours.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#addEmployeeModal').modal('hide'); 
						
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		var nom=$(this).attr("data-nom");
		var ID_prof=$(this).attr("data-ID_prof");
		var date=$(this).attr("data-date");
		var heure_debut=$(this).attr("data-heure_debut");
		var heure_fin=$(this).attr("data-heure_fin");
		var statut=$(this).attr("data-statut");
		var volumeHoraire=$(this).attr("data-volumeHoraire");
		var volumeHoraireRestant=$(this).attr("data-volumeHoraireRestant");
		$('#id_u').val(id);
		$('#nom_u').val(nom);
		$('#ID_prof_u').val(ID_prof);
		$('#date_u').val(date);
		$('#heure_debut_u').val(heure_debut);
		$('#heure_fin_u').val(heure_fin);
		$('#statut_u').val(statut);
		$('#volumeHoraire_u').val(volumeHoraire);
		$('#volumeHoraireRestant_u').val(volumeHoraireRestant);
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "save_cours.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$('#editEmployeeModal').modal('hide');
						 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
	$(document).on("click", ".delete", function() { 
		var id=$(this).attr("data-id");
		$('#id_d').val(id);
		
	});
	$(document).on("click", "#delete", function() { 
		$.ajax({
			url: "save_cours.php",
			type: "POST",
			cache: false,
			data:{
				type:3,
				id: $("#id_d").val()
			},
			success: function(dataResult){
                location.reload();	
					$('#deleteEmployeeModal').modal('hide');
					$("#"+dataResult).remove();
                    
			}
		});	
	});
	$(document).on("click", "#delete_multiple", function() {
		var user = [];
		$(".user_checkbox:checked").each(function() {
			user.push($(this).data('user-id'));
		});
		if(user.length <=0) {
			alert("Please select records."); 
		} 
		else { 
			WRN_PROFILE_DELETE = "Are you sure you want to delete "+(user.length>1?"these":"this")+" row?";
			var checked = confirm(WRN_PROFILE_DELETE);
			if(checked == true) {
				var selected_values = user.join(",");
				console.log(selected_values);
				$.ajax({
					type: "POST",
					url: "save_cours.php",
					cache:false,
					data:{
						type: 4,						
						id : selected_values
					},
					success: function(response) {
						var ids = response.split(",");
						for (var i=0; i < ids.length; i++ ) {	
							$("#"+ids[i]).remove(); 
						}	
					} 
				});location.reload();	 
			}  
		} 
	});
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function(){
			if(this.checked){
				checkbox.each(function(){
					this.checked = true;                        
				});
			} else{
				checkbox.each(function(){
					this.checked = false;                        
				});
			} 
		});
		checkbox.click(function(){
			if(!this.checked){
				$("#selectAll").prop("checked", false);
			}
		});
	});