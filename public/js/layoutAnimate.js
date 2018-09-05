
TweenMax.set(".codigo3, .panel4, .panel42, .amigable5, .monitoreo1, .seguridad2", {drawSVG: "0%"});
TweenMax.set(".cuadroAdmi, .cuadroFacilidad, .cuadroTotalgreen, .cuadroMonitoreo, .cuadroSeguridad",{opacity: 0});
TweenMax.set(".palabraAdmi, .palabraFacilidad, .palabraTotalgreen, .palabraMonitoreo, .palabraSeguridad",{opacity: 0});

$(".Admi").hover(function(){
	TweenMax.to(".codigo3", 1,{drawSVG: "100%"});
	TweenMax.to(".cuadroAdmi, .palabraAdmi",1,{opacity: 1});
},function(){
	TweenMax.to(".codigo3", 1,{drawSVG: "0%"});
	TweenMax.to(".cuadroAdmi, .palabraAdmi",1,{opacity: 0});
})

$(".Facilidad").hover(function(){
	TweenMax.to(".panel4, .panel42", 1,{drawSVG: "100%"});
	TweenMax.to(".cuadroFacilidad, .palabraFacilidad",1,{opacity: 1});
},function(){
	TweenMax.to(".panel4", 1,{drawSVG: "0%"});
	TweenMax.to(".cuadroFacilidad, .palabraFacilidad",1,{opacity: 0});
});

$(".Totalgreen").hover(function(){
	TweenMax.to(".amigable5", 1,{drawSVG: "100%"});
	TweenMax.to(".cuadroTotalgreen,.palabraTotalgreen",1,{opacity: 1});
},function(){
	TweenMax.to(".amigable5", 1,{drawSVG: "0%"});
	TweenMax.to(".cuadroTotalgreen,.palabraTotalgreen",1,{opacity: 0});
});

$(".Monitoreo").hover(function(){
	TweenMax.to(".monitoreo1", 1,{drawSVG: "100%"});
	TweenMax.to(".cuadroMonitoreo, .palabraMonitoreo",1,{opacity: 1});
},function(){
	TweenMax.to(".monitoreo1", 1,{drawSVG: "0%"});
	TweenMax.to(".cuadroMonitoreo, .palabraMonitoreo",1,{opacity: 0});
});

$(".Seguridad").hover(function(){
	TweenMax.to(".seguridad2", 1,{drawSVG: "100%"});
	TweenMax.to(".cuadroSeguridad, .palabraSeguridad",1,{opacity: 1});
},function(){
	TweenMax.to(".seguridad2", 1,{drawSVG: "0%"});
	TweenMax.to(".cuadroSeguridad, .palabraSeguridad",1,{opacity: 0});
});