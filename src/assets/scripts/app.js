import barba from '@barba/core';
import { common } from './common';

import home from './pages/home';
import portfolioArchive from './pages/portfolio-archive';
import portfolioDetail from './pages/portfolio-detail';
import about from './pages/about';

const pages = {
  home: new home(),
  portfolioArchive: new portfolioArchive(),
  portfolioDetail: new portfolioDetail(),
  about: new about(),
}

// ブラウザバック時にスクロール位置を使用しない
if (history.scrollRestoration) {
  history.scrollRestoration = 'manual';
}

const changeFontColor = next => {
  const colors = next.querySelector('.js-colors');
  const buttons = colors.querySelectorAll('button');

  buttons.forEach((button) => {
    button.addEventListener('click', () => {
      // クリックするとdata-rgbの値を取得し、rootに変数を設定する
      const rgb = button.dataset.rgb;
      document.documentElement.style.setProperty('--color-text', rgb);
      // クリックしたボタンにis-activeを付与する
      buttons.forEach((button) => {
        button.classList.remove('is-active');
      });
      button.classList.add('is-active');
      // ローカルストレージに選択した色を保存する
      localStorage.setItem('color', rgb);
    });
  });
}


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

barba.hooks.after(() => {
  barba.wrapper.classList.remove('is-animating');

  setTimeout(() => {
    common.elements.layer.classList.remove('is-loading');
    common.elements.html.style.scrollBehavior = 'smooth';
  }, 500);
});

const pageStartScroll = next => {
  if(next.namespace === 'portfolio-detail' || !location.hash) {
    window.scrollTo(0,0);
    return;
  }

  const anchor = next.container.querySelector(location.hash);
  anchor.scrollIntoView({
    block: 'start'
  });
};


barba.init({
  debug: false,
  sync: true,
  views: [
    {
      namespace: 'home',
      afterEnter({next}) {
        pages.home.init(next.container);
      },
      afterLeave() {
        document.querySelector('[data-barba="container"]').style.pointerEvents = 'auto';
      }
    },
    {
      namespace: 'portfolio-archive',
      afterEnter({next}) {
        pages.portfolioArchive.init(next.container);
      }
    },
    {
      namespace: 'portfolio-detail',
      afterEnter({next}) {
        pages.portfolioDetail.init(next.container);
      }
    },
    {
      namespace: 'about',
      afterEnter({next}) {
        pages.about.init(next.container);
      }
    },
    {
      namespace: 'inquiry',
      beforeEnter() {}
    }
  ],
  prevent: ({ el }) => {
    return (el.classList.contains('barba-prevent') || el.closest('#wpadminbar'));
  },
  transitions: [
    {
      once({next}) {
        pageStartScroll(next);
        changeFontColor(next.container);

        // ローカルストレージに保存されている色を取得し、rootに変数を設定する
        const color = localStorage.getItem('color');
        if (color) {
          document.documentElement.style.setProperty('--color-text', color);
          const buttons = next.container.querySelectorAll('button');
          buttons.forEach((button) => {
            if (button.dataset.rgb === color) {
              button.classList.add('is-active');
            }
          });
        }

        setTimeout(() => {
          common.elements.html.style.scrollBehavior = 'smooth';
        }, 350);
      },
      async leave() {},
      beforeEnter({ next }) {
        updateMeta(next);
        changeFontColor(next.container);
      },
      enter() {},
      afterEnter({next}) {
        pageStartScroll(next);
      }
    },
  ],
});
