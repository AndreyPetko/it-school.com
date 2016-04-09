document.addEventListener("DOMContentLoaded",function(){



document.getElementById('student').addEventListener('click', function(){
	document.getElementById('auth-block').css.display = 'block';
});


// --------------nav mobile--------------
var mobMenu = document.getElementById('mobile-menu');
mobMenu.style.height = "0px"
document.getElementById('mobile-button').addEventListener('click', function(){
	// alert(mobMenu.style.height);
	
	if(mobMenu.style.height == "0px") {
		mobMenu.style.height = "224px"
	}
	else{
		mobMenu.style.height = "0px"
	}
});
// --------------nav mobile--------------

// --------------sub nav mobile--------------
var subMenu = document.getElementById('subMenu');
var subMenuButton = document.getElementById('subMenuButton');
var subMenuA = document.getElementsByClassName('subMenuA');
var ulList = document.getElementsByClassName('ulList');

subMenuButton.addEventListener('mouseover', function(){
	subMenu.style.display = 'block';
});
subMenuButton.addEventListener('mouseout', function(){
	subMenu.style.display = 'none';
});
subMenu.addEventListener('mouseover', function(){
	subMenu.style.display = 'block';
});
subMenu.addEventListener('mouseout', function(){
	subMenu.style.display = 'none';
});
 
 for (i=0; i<subMenuA.length; i++){
 	
subMenuA[i].addEventListener('mouseover', function(){
	if(this.previousSibling.previousSibling && this.previousSibling.previousSibling.className == 'ulList'){
	var ulListItem = this.previousSibling.previousSibling;
	ulListItem.style.display = 'block';
		ulListItem.addEventListener('mouseover', function(){
			ulListItem.style.display = 'block';
		})
	
	
};
});
subMenuA[i].addEventListener('mouseout', function(){
	if(this.previousSibling.previousSibling && this.previousSibling.previousSibling.className == 'ulList'){
	var ulListItem = this.previousSibling.previousSibling;
	ulListItem.style.display = 'none';
		ulListItem.addEventListener('mouseout', function(){
			ulListItem.style.display = 'none';
		})
	
}
});

};
 






// --------------sub nav mobile--------------



// --------------zayavka menu--------------
var courseListItem = document.getElementsByClassName("course-list-item")
if(courseListItem){
	function clear(){
		var clearList = document.getElementsByClassName("course-list-item2");
		for(i=0; i < clearList.length; i++){
			clearList[i].style.cssText = "height:0px; margin-top:0px; border:none;";
		};
		for(i=0; i < courseListItem.length; i++){
			courseListItem[i].style.cssText = "background-color: #ebebeb;";
		}

	}
	for(i=0; i < courseListItem.length; i++){
		courseListItem[i].addEventListener("click", function(){
			clear();
			var courseSubmenu = this.nextSibling.nextSibling.childNodes;
			for(i=0; i < courseSubmenu.length; i++){
				if (courseSubmenu[i].tagName == 'DIV'){
					courseSubmenu[i].style.cssText = "height:50px; margin-top:5px; border: 2px solid white;";
				}
			}
			this.style.cssText = "background-color: #d7d7d7;";
		})

	}

}
// --------------zayavka menu--------------

// --------------slider courses--------------
var arrows = document.getElementsByClassName("arrows");

if(arrows[0]){


	var arrowLeft = document.getElementById('arrow-slider-left');
	var arrowRigth = document.getElementById('arrow-slider-rigth');
	var divSlider = document.getElementById('slider-inside');
	arrowRigth.addEventListener('click', function(){
		marginNow = divSlider.style.marginLeft;
		divSlider.style.cssText = "  margin-left:-800px;";
		arrowRigth.style.cssText = "cursor:default; fill:#a9b3dc";
		arrowLeft.style.cssText = "cursor:pointer; fill:#4D5897";

	})
	arrowLeft.addEventListener('click', function(){
		

		divSlider.style.cssText = "  margin-left:0px;";
		arrowLeft.style.cssText = "cursor:default; fill:#a9b3dc";
		arrowRigth.style.cssText = "cursor:pointer; fill:#4D5897";
	})
}
// --------------slider courses--------------
// --------------arrow up start--------------



var arrowUp = document.getElementById("arrow-up");

window.onscroll = function() {

	var pageY = window.pageYOffset || document.documentElement.scrollTop;
	if (pageY > 500) {
		arrowUp.style.display ="block";
		irina.style.opacity = "100"
	}
	else{
		arrowUp.style.display ="none";
	};

}


arrowUp.addEventListener('click', function(){
		// $('body').scrollTop(0);
		var body = $("html, body");
		body.stop().animate({scrollTop:0}, '500', 'swing');
	})


	// --------------arrow up end--------------
});