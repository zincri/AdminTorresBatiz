$('.selectpicker').selectpicker();
$(document).ready(function()
	{
		$(".picker").each(function()
		{
			div=$(this);
			if (icos)
			{
				var iconos="<ul>";
				for (var i=0; i<icos.length; i++) { iconos+="<li><i data-valor='"+icos[i]+"' rel='"+icos[i]+"' class='fa "+icos[i]+"'></i></li>"; }
				iconos+="</ul>";
			}
		
			div.append("<div class='oculto'><input type='text' placeholder='Encuentra tu icono...'>"+iconos+"</div>");
			$(".inputpicker").click(function()
			{
				$(".oculto").fadeToggle("fast");
			});
			$(document).on("click",".oculto ul li",function()
			{
				$(".inputpicker").val($(this).find("i").data("valor"));
				$(".oculto").fadeToggle("fast");
			});
			$(document).on("keyup",".oculto input[type=text]",function()
			{
				var value=$(this).val();
				$(".oculto ul li i").each(function() 
				{
					if ($(this).attr("rel").search(value) > -1) $(this).closest("li").show();
					else $(this).closest("li").hide();
				});
			});
		});
	});