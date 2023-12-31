(function() {
 
  const select = (el, all = false) => {
    el = el.trim()
    if (all) {
      return [...document.querySelectorAll(el)]
    } else {
      return document.querySelector(el)
    }
  }

  let preloader = select('#preloader');
  if (preloader) {
    setTimeout(() => {
      preloader.remove()
    }, 1000);
  }
})()