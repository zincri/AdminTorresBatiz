// MonitoreoSubText
TweenMax.set(".monitoreoSubText path",{drawSVG: "0%"});
TweenMax.set(".monitoreoSubText text",{opacity: 0});

// seguridadSubText

TweenMax.set(".seguridadSubText path",{drawSVG: "0%"});
TweenMax.set(".seguridadSubText text",{opacity: 0});

// administracionSubText

TweenMax.set(".administracionSubText line",{drawSVG: "0%"});
TweenMax.set(".administracionSubText text",{opacity: 0});

// facilidadSubText

TweenMax.set(".facilidadSubText line",{drawSVG: "0%"});
TweenMax.set(".facilidadSubText text",{opacity: 0});

// TGOSSubText

TweenMax.set(".TGOSSubText path",{drawSVG: "0%"});
TweenMax.set(".TGOSSubText text",{opacity: 0});


// monitoreoText
$(".monitoreoText").hover(()=>{
	TweenMax.to(".monitoreoSubText path",1,{drawSVG: "100%"});
	TweenMax.to(".monitoreoSubText text",1,{opacity: 1});
},
()=>{
	TweenMax.to(".monitoreoSubText path",1,{drawSVG: "0%"});
	TweenMax.to(".monitoreoSubText text",1,{opacity: 0});
});

// seguridadText
$(".seguridadText").hover(()=>{
	TweenMax.to(".seguridadSubText path",1,{drawSVG: "100%"});
	TweenMax.to(".seguridadSubText text",1,{opacity: 1});
},
()=>{
	TweenMax.to(".seguridadSubText path",1,{drawSVG: "0%"});
	TweenMax.to(".seguridadSubText text",1,{opacity: 0});
});

// administracionText
$(".administracionText").hover(()=>{
	TweenMax.to(".administracionSubText line",1,{drawSVG: "100%"});
	TweenMax.to(".administracionSubText text",1,{opacity: 1});
},
()=>{
	TweenMax.to(".administracionSubText line",1,{drawSVG: "0%"});
	TweenMax.to(".administracionSubText text",1,{opacity: 0});
});

// facilidadText
$(".facilidadText").hover(()=>{
	TweenMax.to(".facilidadSubText line",1,{drawSVG: "100%"});
	TweenMax.to(".facilidadSubText text",1,{opacity: 1});
},
()=>{
	TweenMax.to(".facilidadSubText line",1,{drawSVG: "0%"});
	TweenMax.to(".facilidadSubText text",1,{opacity: 0});
});

// TGOSText
$(".TGOSText").hover(()=>{
	TweenMax.to(".TGOSSubText path",1,{drawSVG: "100%"});
	TweenMax.to(".TGOSSubText text",1,{opacity: 1});
},
()=>{
	TweenMax.to(".TGOSSubText path",1,{drawSVG: "0%"});
	TweenMax.to(".TGOSSubText text",1,{opacity: 0});
});