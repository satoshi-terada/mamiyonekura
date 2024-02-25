import barba from '@barba/core';
import Swiper from 'swiper/bundle';
import 'swiper/css';
import { common } from './common'

// ブラウザバック時にスクロール位置を使用しない
if (history.scrollRestoration) {
  history.scrollRestoration = 'manual';
}

(() => {
  const target = document.querySelector('.js-slider-portfolio-archive');
  if(!target) return;

  const button = {
    next: document.querySelector('.js-next'),
    prev: document.querySelector('.js-prev')
  }

  const slider = new Swiper(target, { // eslint-disable-line
    slidesPerView: 'auto',
    spaceBetween: 30,
    loop: false,
    navigation: {
      nextEl: button.next,
      prevEl: button.prev
    }
  });
})();


const addModalEvent = ((target) => {
  const links = target.querySelectorAll('a');
  links.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      const url = link.getAttribute('href');

      const modal = document.createElement('div')
      modal.classList.add('modal');

      const spinner = document.createElement('i');
      spinner.classList.add('fa-spinner');

      modal.appendChild(spinner);
      document.body.appendChild(modal);

      const template = `
      <button class="modal_close js-modal-close"></button>
        <div class="modal_inner">
          <p class="modal_imageWrap"><img src="${url}"></p>
        </div>
      `;

      const addCloseEvent = () => {
        const close = [
          document.querySelector('.js-modal-close'),
          document.querySelector('.modal_inner')
        ];
      
        close.forEach(el => {
          el.addEventListener('click', e => {
            // imgをクリックした場合は閉じない
            if(e.target.tagName === 'IMG') return;
            modal.classList.remove('is-visible');
            modal.addEventListener('transitionend', () => {
              modal.remove();
              el.removeEventListener('click', addCloseEvent);
            });
          });
        });
      };

      modal.innerHTML = template;
      setTimeout(() => modal.classList.add('is-visible'), 100);
      addCloseEvent();
    });
  });
});

(() => {
  const video = document.querySelector('.js-about-video');
  const trigger = document.querySelector('.js-about-video-trigger');
  if(!video) return;

  let isPlaying = false;

  trigger.addEventListener('click', e => {
    e.preventDefault();
    
    if(isPlaying) {
      video.classList.remove('is-playing');
      trigger.classList.remove('is-playing');
      video.addEventListener('pause', () => {
        video.pause();
      }, { once: true });
      isPlaying = false;
      trigger.innerText = '再生する';
      return;
    } else {
      video.play();
      video.classList.add('is-playing');
      trigger.classList.add('is-playing');
      trigger.innerText = '停止する';
      isPlaying = true;
      return;
    }
  });
})();

(() => {
  const target = document.querySelector('.js-slider-portfolio-single');
  if(!target) return;

  const button = {
    next: document.querySelector('.js-next'),
    prev: document.querySelector('.js-prev')
  }

  const slider = new Swiper(target, { // eslint-disable-line
    speed: 500,
    grabCursor: true,
    effect: "creative",
    spaceBetween: 90,
    creativeEffect: {
      effect: "creative",
      prev: {
        translate: ["calc(-100% - 90px)", 0, 0],
      },
      next: {
        translate: ["calc(100% + 90px)", 0, 0],
      },
      limitProgress: 5
    },
    navigation: {
      nextEl: button.next,
      prevEl: button.prev
    }
  });

  // URLにハッシュがある場合、その番号のスライドに移動
  const postId = location.hash.split('#')[1];
  if(postId) slider.slideTo(parseInt(postId), 0);

  getActiveSlidePostId();

  function getActiveSlidePostId() {
    const activeIndex = slider.activeIndex;
    const activeSlide = slider.slides[activeIndex];
    const postId = activeSlide.getAttribute('data-post-id');
     
    // ajaxでjsonデータを取得し、反映する
    const xhr = new XMLHttpRequest();
    const param = new URLSearchParams();
    param.append( 'action', 'get_portfolio_info' );
    param.append( 'post_id', postId);

    xhr.open('GET', `${mysite_ajaxurl}?${param.toString()}`, true); // eslint-disable-line
    xhr.responseType = 'json';
    xhr.send();

    xhr.onload = () => {
      if (xhr.readyState == 4) { // 通信の完了時
        if(xhr.status === 200) {
          const data = xhr.response.data;

          console.log(data);

          const targets = [
            'theme',
            'title',
            'materials',
            'size',
            'place',
            'date',
            'note'
          ];

          targets.forEach(target => {
            const el = document.querySelector(`.js-portfolioData-${target}`);
            if(target === 'note') el.innerHTML = data[target] ? data[target] : '';
            el.textContent = data[target] ? data[target] : '';
          });
        }
      }
    }
    return;
  }

  slider.on('activeIndexChange', getActiveSlidePostId);
  addModalEvent(target);
})();

// meta系の更新
const ANALYTICS_TRACKING_ID = '******';

const updateMeta = (next) => {
  const { head } = document
  const targetHead = next.html.match(/<head[^>]*>([\s\S.]*)<\/head>/i)[0]
  const newPageHead = document.createElement('head')
  newPageHead.innerHTML = targetHead
  const removeHeadTags = [
    "meta[name='description']",
    "meta[property='og:title']",
    "meta[property='og:description']",
    "meta[property='og:url']",
    "meta[property='og:image']",
  ].join(',')
  const headTags = [...head.querySelectorAll(removeHeadTags)]
  const newHeadTags = [...newPageHead.querySelectorAll(removeHeadTags)]
  headTags.forEach((item) => head.removeChild(item))
  newHeadTags.forEach((item) => head.appendChild(item))

  if (typeof ga === 'function') ga('send', 'pageview', window.location.pathname)
  if (typeof gtag === 'function')
    gtag('config', ANALYTICS_TRACKING_ID, { page_path: window.location.pathname })
}

/**
 * barba.js
 * 初期設定
 */
barba.hooks.before(() => {
  return new Promise((resolve) => {
    common.elements.html.style.scrollBehavior = 'auto';
    common.elements.layer.classList.add('is-loading');
    const transitionEndHandler = () => resolve();
    common.elements.layer.addEventListener('transitionend', transitionEndHandler, { once: true });
  });
});

barba.hooks.afterEnter(() => {
  window.scrollTo(0, 0);
});

barba.hooks.after(() => {
  barba.wrapper.classList.remove('is-animating');

  setTimeout(() => {
    common.elements.layer.classList.remove('is-loading');

    common.elements.html.style.scrollBehavior = 'smooth';
  }, 350);
});

barba.init({
  debug: false,
  sync: true,
  views: [],
  prevent: ({ el }) => {
    return (el.classList.contains('barba-prevent') || el.closest('#wpadminbar'));
  },
  transitions: [
    {
      async leave() {},
      beforeEnter({ next }) {
        updateMeta(next)
      },
      enter() {},
    },
  ],
})
