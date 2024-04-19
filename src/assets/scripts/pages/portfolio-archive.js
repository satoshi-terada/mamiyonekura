import Swiper from 'swiper/bundle';
import 'swiper/css';

export default class portfolioArchive {
  constructor() {}

  init(next) {
    const target = next.querySelector('.js-slider-portfolio-archive');
    console.log('target', target);
    
    if(!target) return;
    
    const button = {
      next: next.querySelector('.js-next'),
      prev: next.querySelector('.js-prev')
    }

    const slider = new Swiper(target, { // eslint-disable-line
      slidesPerView: 'auto',
      spaceBetween: 40,
      loop: false,
      navigation: {
        nextEl: button.next,
        prevEl: button.prev
      }
    });
  }
};
