/** VanilaJS adding listener to navigation to add style when navbar is affixed */
document.addEventListener('DOMContentLoaded', () => {
  if (window.scrollY >= 1) {
    document.getElementsByTagName('body')[0].classList.add('affixed')
  } else {
    document.getElementsByTagName('body')[0].classList.remove('affixed')
  }

  window.addEventListener('scroll', () => {
    if (window.scrollY >= 1) {
      document.getElementsByTagName('body')[0].classList.add('affixed')
    } else {
      document.getElementsByTagName('body')[0].classList.remove('affixed')
    }
  })
})
