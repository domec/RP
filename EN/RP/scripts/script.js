var base_url="http://localhost/RP/";



function hide() {
	var elements = document.getElementsByTagName("*");
	for(i = 0; i < elements.length; i++)
		if(elements[i].getAttribute("class") == "item_annotation")
			//elements[i].style.display = "none";
			elements[i].style.visibility = "hidden";
}

function show() {
	var elements = document.getElementsByTagName("*");
	for(i = 0; i < elements.length; i++)
		if(elements[i].getAttribute("class") == "item_annotation")
			elements[i].style.visibility = "visible";
			//elements[i].style.display = "inline";
}

function submitOrderBy() {
	document.getElementById("formOrderBy").submit();
}

function submitPerPage() {
	document.getElementById("formPerPage").submit();
}

function redirectFromInfo(){
	alert('Tu nemáte čo hľadať. Čo takto si radšej kúpiť knihu?');
	window.location="books";
}
function redirectFromProfile(){
	alert('Tu nemáte čo hľadať. Čo takto sa radšej zaregistrovať?');
	window.location="registracia";
}
function reload(){
	window.location="info";
}
function itemAdded(){
	alert('Polozka bola pridana do kosika.');
	window.location="../books";
}

$(document).ready(function() {
    $('div#kosik').click(function() {
        window.location="add_to_cart/1";
    });
    $('div#knihy').click(function() {
        window.location="books";
    });
	$(".add_item").click(function(){
	});
	$("div#hide").click(function(){
		$("#item_added").fadeOut(1000);	
	});
	$("#offer").fadeOut(1);
	$("div#offerBook").click(function(){
		$("#offer").fadeToggle(1000);
	});
	$("#bazaarOffersHidden").fadeOut(1);
	$("div#bazaarOffers").click(function(){
		$("#bazaarOffersHidden").fadeToggle(1000);
	});
});

