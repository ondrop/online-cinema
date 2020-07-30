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





let buyFilm = document.getElementById('buy-film'),
	modalId = 'buy',
	showModal = 'show-modal',
	openModal = 'modal-open';

window.onclick = () => {
	hideDropdown(event);
	hidePopup(modalId, showModal, openModal);
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

function hideDropdown(event) {
	if (!event.target.matches('.dropdown-button')) {
 		let dropdowns = document.getElementsByClassName('dropdown-menu');
    	for (i = 0; i < dropdowns.length; i++) {
      		let openDropdown = dropdowns[i];
      		if (openDropdown.classList.contains('show-dropdown-menu')) {
        		openDropdown.classList.remove('show-dropdown-menu');
      		}
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
