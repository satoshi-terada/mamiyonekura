const common = {};
common.window = window;
common.func = {};

common.elements = {
  html: document.querySelector('html'),
  body: document.querySelector('body'),
  wrapper: document.querySelector('.wrapper'),
  layer: document.querySelector('.loadLayer'),
};

common.isMobile = window.matchMedia('(max-width: 767px)').matches;

export { common };
