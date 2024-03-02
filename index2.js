const navLinkEls = document.querySelectorAll('.nav__link');
const windowPathname = window.location.pathname;
console.log(window.location.pathname)

navLinkEls.forEach(navLinkEl => {


const navlinkPathname = new URL(navLinkEl.href).pathname;

  console.log(navLinkEl.href);

  if ((windowPathname === navlinkPathname) || (windowPathname === '/index.html' && navlinkPathname === '/')) {
  navLinkEl.classList.add('active');
  }
});