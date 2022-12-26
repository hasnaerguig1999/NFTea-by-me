let burgerMenu = document.getElementsByClassName("burger__menu")[0];
let navBar = document.getElementsByClassName("nav__bar")[0];
burgerMenu.addEventListener('click', function() {
    burgerMenu.classList.toggle('is-active');
    navBar.classList.toggle('is-active')
});
window.onscroll = () => {
	navBar.classList.remove('is-active');
    burgerMenu.classList.remove('is-active');
}
