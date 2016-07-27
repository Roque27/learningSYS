var Publicidad = new function (){
	
	var self = this;
	
	this.base_url = '';
	this.controller_url = 'index.php/Admin/Publicidades';
	
	this.showEditPage = function (id_publicidad){
		
		console.log("showEditPage");
		
		var postUrl = self.base_url + self.controller_url + "/publicidad_edit";
		
		var formData = {'id_publicidad': id_publicidad}
		
		$.ajax({
	        type: 'POST',
	        url: postUrl,
	        dataType: 'text',
	        data: formData,
	        success: function (result){
	        	console.log("success" + result);
	        	
	        	$("#main-app").html(result);
	        	
	        },
	        error: function (result){
	        }
	      });
	};
	
	this.updatePublicidad = function (){
		
		var postUrl = self.base_url + self.controller_url + "/update_publicidad";
		
		$.ajax({
	        type: 'POST',
	        url: postUrl,
	        dataType: 'text',
	        data: $( "#form-publicidad" ).serialize(),
	        success: function (result){

	        	$("#message").html(result);
	        	
	        	self.init();
	        	
	        },
	      });
		
		
	};
	
	this.deletePublicidad = function (id){
		
		var postUrl = self.base_url + self.controller_url + "/delete_publicidad";
		
		$.ajax({
	        type: 'POST',
	        url: postUrl,
	        dataType: 'text',
	        data: {'id_publicidad': id},
	        success: function (result){
	        	
	        	self.getPublicidades();
	        	
	        },
	      });
		
		
	};
	
	
	this.getPublicidades = function (){
		
		var postUrl = self.base_url + self.controller_url + "/get_publicidades";
		
		$.ajax({
	        type: 'POST',
	        url: postUrl,
	        success: function (data){
	        	$("#main-app").html(data);
	        },
	      });
		
		
	};
	
	
	
	this.init = function (base_url){
		
		self.base_url = base_url;
		
		// bindings
		// tabla publicidades
		$("#tabla_publicidades tr").each(function (){
			
			//$("#tabla_publicidades tr").eq(1).find('td').first().html()
			
			console.log($(this).find('a').first());
			
			var id_pub = $(this).find('td').first().html();
			
		    $(this).find('a').first().click(function (){
		    	
		    	console.log("evento click");
		    	self.showEditPage(id_pub);
		    	
		    });
		    
		    $(this).find('a').first().next().click(function (){
		    	
		    	self.deletePublicidad(id_pub);
		    	
		    });

		});
		
	};
	
	
	
};





