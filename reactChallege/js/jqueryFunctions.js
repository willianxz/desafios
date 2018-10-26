callListarUsuarios = function(){
	
			
			$("#buscar").html(""+
			"<form><div class='form-group'>"+
		        "<input type='text' class='form-control' name='nomeUsuario' placeholder='Digite aqui sua busca pelo name do usuário...'>"+
	          "</div>"+	  
	             "<button class='btn btn-outline-secondary btn-primary' style='margin-left: 200px;' type='button' onclick='callBuscarUsuario()'>Buscar</button>"+	   
            "</form>");
			
			
			$.get("https://jsonplaceholder.typicode.com/users", function(data, status){
				//alert("Data: " + data + "\nStatus: " + status);
				//console.log(data);
				
				$("#titulo").empty();
				$("#titulo").append("Lista de Usuários");
				$("#lista").empty();
				for(var i = 0; i < data.length;i++){
					$("#lista").append("<a href='#'><li class='list-group-item'>"+
					"<h3>"+data[i].name+"</h3>"+
					"<div class='itemOculto'>"+
					" <span>Sobrenome: "+data[i].username+"</span> </br>"+
					" <span>Email: "+data[i].email+"</span> </br>"+
					" <span>Address Street: "+data[i].address.street+"</span> </br>"+
					" <span>Address Suite: "+data[i].address.suite+"</span> </br>"+
					" <span>Address City: "+data[i].address.city+"</span> </br>"+
					" <span>Address Zipcode: "+data[i].address.zipcode+"</span> </br>"+
					" <span>Geo Lat: "+data[i].address.geo.lat+"</span> </br>"+
					" <span>Geo Lng: "+data[i].address.geo.lng+"</span> </br>"+
					" <span>Phone: "+data[i].phone+"</span> </br>"+
					" <span>Website: "+data[i].website+"</span> </br>"+
					" <span>Company Name: "+data[i].company.name+"</span> </br>"+
					" <span>Company CatchPrase: "+data[i].company.catchPhrase+"</span> </br>"+
					" <span>Company Bs: "+data[i].company.bs+"</span> "+
					"</div>"+
					"</li></a>");
				}
				
				$('#lista li').click(function (e) {
					e.preventDefault();
					$(this).children('div.itemOculto').toggle();							
				});
				 
			});
}


callBuscarUsuario = function(){
	
	var nome = $("input[name='nomeUsuario']").val();
	var encontrado = false;
	
	$.get('https://jsonplaceholder.typicode.com/users', function(data, status){
		
		$("#titulo").empty();
		$("#titulo").append("Busca de Usuário");
		$("#lista").empty();
		
		for(var i = 0; i < data.length;i++){
			
			if(nome == data[i].name){
				
			     $("#lista").append("<a href='#'><li class='list-group-item'>"+
					"<h3>"+data[i].name+"</h3>"+
					"<div class='itemOculto'>"+
					" <span>Sobrenome: "+data[i].username+"</span> </br>"+
					" <span>Email: "+data[i].email+"</span> </br>"+
					" <span>Address Street: "+data[i].address.street+"</span> </br>"+
					" <span>Address Suite: "+data[i].address.suite+"</span> </br>"+
					" <span>Address City: "+data[i].address.city+"</span> </br>"+
					" <span>Address Zipcode: "+data[i].address.zipcode+"</span> </br>"+
					" <span>Geo Lat: "+data[i].address.geo.lat+"</span> </br>"+
					" <span>Geo Lng: "+data[i].address.geo.lng+"</span> </br>"+
					" <span>Phone: "+data[i].phone+"</span> </br>"+
					" <span>Website: "+data[i].website+"</span> </br>"+
					" <span>Company Name: "+data[i].company.name+"</span> </br>"+
					" <span>Company CatchPrase: "+data[i].company.catchPhrase+"</span> </br>"+
					" <span>Company Bs: "+data[i].company.bs+"</span> "+
					"</div>"+
					"</li></a>");
				
				$('#lista li').click(function (e) {
					e.preventDefault();
					$(this).children('div.itemOculto').toggle();							
				});
				
				encontrado = true;
				
			}
		}
		
		if(!encontrado){
			$("#lista").append("<h4>Nenhuma informação encontrada para essa pesquisa.</h4>");
			
		}
		
	});
	
}


callListarPublicacoes = function(){
	
			$("#buscar").html(""+
			"<form><div class='form-group'>"+
		        "<input type='text' class='form-control' name='idPublicacao' placeholder='Digite aqui sua busca pelo id da publicação....'>"+
	          "</div>"+	  
	             "<button class='btn btn-outline-secondary btn-primary' style='margin-left: 200px;' type='button' onclick='callBuscarPublicacao()'>Buscar</button>"+	   
            "</form>");
			
			$.get("https://jsonplaceholder.typicode.com/posts", function(data, status){
				//alert("Data: " + data + "\nStatus: " + status);
				//console.log(data);
				
				$("#titulo").empty();
				$("#titulo").append("Lista de Publicações");
				$("#lista").empty();
				for(var i = 0; i < data.length;i++){
					
					$("#lista").append("<a href='#'><li class='list-group-item'>"+
					"<h3>"+data[i].title+"</h3>"+
					"<div class='itemOculto'>"+
					" <span>UserId: "+data[i].userId+"</span> </br>"+
					" <span>Id: "+data[i].id+"</span> </br>"+
					" <span>body: "+data[i].body+"</span>"+
					"</div>"+
					"</li></a>");
				}
				
				$('#lista li').click(function (e) {
					e.preventDefault();
					$(this).children('div.itemOculto').toggle();							
				});
				 
			});
}


callBuscarPublicacao = function(){
	
	var id = $("input[name='idPublicacao']").val();
	
	$("#titulo").empty();
	$("#titulo").append("Busca de Publicação");
    $("#lista").empty();
	
	if(id > 0 && id <= 101){
		$.get('https://jsonplaceholder.typicode.com/posts/'+id, function(data, status){			
			
				
					$("#lista").append("<a href='#'><li class='list-group-item'>"+
					"<h3>"+data.title+"</h3>"+
					"<div class='itemOculto'>"+
					" <span>UserId: "+data.userId+"</span> </br>"+
					" <span>Id: "+data.id+"</span> </br>"+
					" <span>body: "+data.body+"</span>"+
					"</div>"+
					"</li></a>");
						
						
				$('#lista li').click(function (e) {
					e.preventDefault();
					$(this).children('div.itemOculto').toggle();							
				});
			
		});
	}else{
		$("#lista").append("<h4>Nenhuma informação encontrada para essa pesquisa.</h4>");
	}
}	