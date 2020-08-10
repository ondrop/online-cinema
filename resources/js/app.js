/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


const navBarId = 'nav-bar',
	  navBarBlock = 'nav-bar-block',
      navBarList = 'nav-bar-list',
      openNavBar = 'open-nav-bar';

let navBar = document.getElementById(navBarId);

navBar.onclick = () => {
	if (document.body.clientWidth <= 530) {
		showNavBar(navBar, navBarBlock, openNavBar);
	} else {
		showNavBar(navBar, navBarList, openNavBar);
	}
}

function showNavBar(navBar, navBarList, openNavBar) {
	navBar.classList.toggle('fa-times');
	setTimeout(() => {document.getElementById(navBarList).classList.toggle(openNavBar);}, 1);
	document.getElementById(navBarList).style.display = 'block';
	document.getElementsByClassName('menu')[0].style.backgroundColor = '#030210';
	document.getElementsByClassName('menu')[0].classList.toggle('nav-open');
	if (!(navBar.classList.contains('fa-times'))) {
		document.getElementsByClassName('menu')[0].style.backgroundColor = null;
		setTimeout(() => {document.getElementById(navBarList).style.display = null;}, 250);
	}
}

function hideNavBar(navBar, navBarId, navBarList, openNavBar) {
	let menu = document.querySelector('#' + navBarList);
	const target = event.target;
	const its_menu = target == menu || menu.contains(target);
	const its_btnMenu = target == navBar || navBar.contains(target);
	if (!its_menu && !its_btnMenu) {
		navBar.classList.remove('fa-times');
		document.getElementById(navBarList).classList.remove(openNavBar);
		document.getElementsByClassName('menu')[0].classList.remove('nav-open');
		if (!(navBar.classList.contains('fa-times'))) {
			document.getElementsByClassName('menu')[0].style.backgroundColor = null;
			setTimeout(() => {document.getElementById(navBarList).style.display = null;}, 250);
		}
	}
}


const yearLabelId = 'release-year',
	  genreLabelId ='genre',
	  genreSelectId = 'genre-select',
	  countryLabelId ='country',
	  countrySelectId = 'country-select',
	  yearSelectName = 'release_year',
 	  yearSelectId = 'release-year-select',
	  showSelect = 'show-select';

let label = null;

selectOnclick(yearLabelId, yearSelectId, showSelect);
selectOnclick(genreLabelId, genreSelectId, showSelect);
selectOnclick(countryLabelId, countrySelectId, showSelect);

function selectOnclick(labelId, selectId, showSelect) {
	label = document.getElementById(labelId);
	if (label) {
		label.onclick = () => {
			showSelectList(selectId, showSelect);
		}
	}
}

let buyFilm = document.getElementById('buy-film'),
	modalId = 'buy',
	showModal = 'show-modal',
	openModal = 'modal-open';



const categoryBtnId = 'category',
	  filterBtnID = 'filter',
	  sortBtnId1 = 'sort-first',
	  sortBtnId2 = 'sort-second',
	  showDropdownClass = 'show-dropdown-menu';

if (document.getElementById(categoryBtnId)) {
	document.getElementById(categoryBtnId).onclick = () => {
		showDropdown(categoryBtnId, showDropdownClass);
	}
}

if (document.getElementById(filterBtnID)) {
	document.getElementById(filterBtnID).onclick = () => {
		showDropdown(filterBtnID, showDropdownClass);
	}
}

if (document.getElementById(sortBtnId1)) {
	document.getElementById(sortBtnId1).onclick = () => {
		showDropdown(sortBtnId1, showDropdownClass);
	}
}

if (document.getElementById(sortBtnId2)) {
	document.getElementById(sortBtnId2).onclick = () => {
		showDropdown(sortBtnId2, showDropdownClass);
	}
}



window.onclick = () => {
	if (label) {
		hideSelect(yearLabelId, yearSelectName, yearSelectId, showSelect);
		hideSelect(genreLabelId, genreLabelId, genreSelectId, showSelect);
		hideSelect(countryLabelId, countryLabelId, countrySelectId, showSelect);
	}

	if (document.body.clientWidth <= 530) {
		hideNavBar(navBar, navBarId, navBarBlock, openNavBar);
	} else {
		hideNavBar(navBar, navBarId, navBarList, openNavBar);
	}

	if (document.getElementById(categoryBtnId)) {
		hideDropdown(categoryBtnId, showDropdownClass);
	}

	if (document.getElementById(filterBtnID)) {
		hideDropdown(filterBtnID, showDropdownClass);	
	}

	if (document.getElementById(sortBtnId1)) {
		hideDropdown(sortBtnId1, showDropdownClass);
	}

	if (document.getElementById(sortBtnId2)) {
		hideDropdown(sortBtnId2, showDropdownClass);
	}

	hidePopup(modalId, showModal, openModal);

}

function hideSelect(labelId, selectName, selectId, showSelect) {
	if ((!(event.target.matches('#' + labelId))) || (event.target.matches('#' + selectId))) {	
		document.getElementById(selectId).classList.remove(showSelect);
		let selectItems = document.querySelectorAll("input[name='" + selectName + "']");
		for (let i = 0; i < selectItems.length; i++) {
	        if (selectItems[i].checked) {
				document.getElementById(labelId).textContent = selectItems[i].value;
	        }
	    }
	}
}

function showTab(tabList, tabListActive, tabPaneName, showTabPane) {

	if (!tabList.classList.contains(tabListActive)) {
		hideOtherTabs(tabListActive, showTabPane);
		tabList.classList.add(tabListActive);
		document.getElementById(tabPaneName).classList.add(showTabPane);		
	}
}




function hideOtherTabs(tabListActive, showTabPane) {
	const activeTab = document.getElementsByClassName(tabListActive);
	const activetabPane = document.getElementsByClassName(showTabPane);

	for (let i = 0; i < activeTab.length; i++) {
		activeTab[i].classList.remove(tabListActive);
		activetabPane[i].classList.remove(showTabPane);
	}

}



function showDropdown(btnId, showClass) {
	document.getElementById(btnId + '-dropdown').classList.toggle(showClass);
}

function hideDropdown(dropdownBtn, showDropdownClass) {
	let btn = document.querySelector('#' + dropdownBtn);
	let list = document.querySelector('#' + dropdownBtn + '-dropdown');
	const target = event.target;
	const its_list = target == list || list.contains(target);
	const its_btn = target == btn || btn.contains(target);
	let dropdown = document.getElementById(dropdownBtn + '-dropdown');
	if (!its_list && !its_btn) {
	    if (dropdown.classList.contains(showDropdownClass)) {
	    	dropdown.classList.remove(showDropdownClass);
	    }
  	}
}

if (buyFilm) {
	buyFilm.onclick = () => {
		showPopup(modalId, showModal, openModal);
	}
}

function showPopup(modalId, showModal, openModal) {
	document.getElementById(modalId).classList.toggle(showModal);
	document.getElementsByTagName('body')[0].classList.toggle(openModal);
}

function hidePopup(modalId, showModal, openModal) {
	if ((event.target.matches('#buy')) || (event.target.matches('.close-modal-btn'))) {
		document.getElementById(modalId).classList.remove(showModal);
		document.getElementsByTagName('body')[0].classList.remove(openModal);		
	}	
}

function showSelectList(selectId, showSelect) {
	document.getElementById(selectId).classList.toggle(showSelect);
}

let tabSetting = document.getElementById('tab-list-setting');
let tabFilms = document.getElementById('tab-list-films');
let tabPaneSetting = 'tab-pane-setting';
let tabPaneFilms = 'tab-pane-films';
let showTabPane = 'show-tab-pane';
let tabListActive = 'tab-list_active';

if (tabSetting && tabFilms) {
	tabSetting.onclick = () => showTab(tabSetting, tabListActive, tabPaneSetting, showTabPane);
	tabFilms.onclick = () => showTab(tabFilms, tabListActive, tabPaneFilms, showTabPane);
}


let slider = document.getElementsByClassName('slider');
slider = slider[0];

let sliderWidth = parseFloat(getComputedStyle(slider).width);
let arrayOfFilms = document.getElementsByClassName('slider__item');
let filmWidth = parseFloat(getComputedStyle(arrayOfFilms[0]).width);

const stepSlider = filmWidth / sliderWidth * 100;
const stepFilm = (sliderWidth / filmWidth) * arrayOfFilms.length * stepSlider;
const interval = 10000;
const disabledInterval = 1000;
const regExp = /[-0-9.]+(?=%)/;

const minIndex = 0;
const maxIndex = arrayOfFilms.length - 1;
const minusIndex = -1;

let rightItemPos = arrayOfFilms.length;
let leftItemPos = minusIndex;
let buttonRightPush = false;
let buttonLeftPush = false;

let transformForSlider = 0;
let transformForFilm = Number((arrayOfFilms[0].style.transform).match(regExp)[0]);

let sliderControl = document.getElementsByClassName('slider-control'); 
let leftButton = sliderControl[0];
let rightButton = sliderControl[1];


let sliderTimer = setInterval(rightMove, interval);

window.onblur = () => {stopSliderTimer();}
window.onfocus = () => {startAutoSlider();}

rightButton.onclick = () => {
	stopSliderTimer();
	rightMove();
};

leftButton.onclick = () => {
	stopSliderTimer();
	leftMove();
};

let stepTouch = 0,
	posX1 = 0,
	posX2 = 0;

slider.addEventListener('touchstart', () => {
	slider.style.transition = 'none';
	posX1 = event.touches[0].clientX;
	stopSliderTimer();
});
slider.addEventListener('touchmove', () => {
	stepTouch = event.touches[0].clientX;
	stepTouch = (stepTouch - posX1)/(document.body.clientWidth)*100 + transformForSlider;
	blockMove(slider, stepTouch);
});
slider.addEventListener('touchend', () => {
	posX2 = event.changedTouches[0].clientX;
	stepTouch = (Math.abs(posX2 - posX1))/(document.body.clientWidth)*100;
	moveSliderTouch(stepTouch, posX1, posX2);
});

function moveSliderTouch(stepTouch, posX1, posX2) {
	slider.style.transition = null;
	if ((stepTouch >= 15) && (posX1 > posX2)) {
		rightMove();
	} else if ((stepTouch >= 15) && (posX1 < posX2)) {
		leftMove();
	} else {
		blockMove(slider, transformForSlider);
		startAutoSlider();
	}
}

function rightMove() {
	stopSliderTimer();

	rightButton.disabled = true;
	setTimeout(() => {rightButton.disabled = false}, disabledInterval);
	leftButton.disabled = true;
	setTimeout(() => {leftButton.disabled = false}, disabledInterval);
    buttonRightPush = true;

    if (buttonLeftPush) {
    	transformForFilm += stepFilm;
        rightItemPos = leftItemPos + 1;
        buttonLeftPush = false;
    }

    transformForSlider -= stepSlider;
    if (rightItemPos == arrayOfFilms.length) {
        transformForFilm += stepFilm;
        rightItemPos = minIndex;
    }

    blockMove(slider, transformForSlider);
    setTimeout(blockMove, disabledInterval, arrayOfFilms[rightItemPos], transformForFilm);       
    rightItemPos++;

    if (rightItemPos == arrayOfFilms.length) {
        transformForFilm += stepFilm;
        rightItemPos = minIndex;
    }

	startAutoSlider();

}


function leftMove() {
	stopSliderTimer();

	leftButton.disabled = true;
	setTimeout(() => {leftButton.disabled = false}, disabledInterval);
    buttonLeftPush = true;

    if (buttonRightPush) {
    	transformForFilm -= stepFilm;
        leftItemPos = rightItemPos - 1;
        buttonRightPush = false;
    }

    transformForSlider += stepSlider;
    if (leftItemPos == minusIndex) {
    	leftItemPos = maxIndex;
    	transformForFilm -= stepFilm;
    }

    blockMove(slider, transformForSlider); 
    blockMove(arrayOfFilms[leftItemPos], transformForFilm);
    leftItemPos--;
    
    if (leftItemPos == minusIndex) {
    	leftItemPos = maxIndex;
    	transformForFilm -= stepFilm;
    }

	startAutoSlider();
}

function blockMove(slider, transform) {
    slider.style.transform = 'translateX(' + transform + '%)';   
}

function stopSliderTimer() {
	clearInterval(sliderTimer);
}

function startAutoSlider() {
	sliderTimer = setInterval(rightMove, interval);
}