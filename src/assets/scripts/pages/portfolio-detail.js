import Swiper from 'swiper/bundle';
import 'swiper/css';

export default class portfolioDetail {
  constructor() {}

  init(next) {
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
    
          const addCloseEvent = modal => {
            const close = [
              modal.querySelector('.js-modal-close'),
              modal.querySelector('.modal_inner')
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
          addCloseEvent(modal);
        });
      });
    });

    const target = next.querySelector('.js-slider-portfolio-single');
    if(!target) return;

    const button = {
      next: next.querySelector('.js-next'),
      prev: next.querySelector('.js-prev')
    }

    console.log(button);
    
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
              if(target === 'note') {
                const html = data[target] ? data[target] : '';
                el.innerHTML = html;
                return;
              } 
              el.textContent = data[target] ? data[target] : '';
            });
          }
        }
      }
      return;
    }

    slider.on('activeIndexChange', getActiveSlidePostId);
    addModalEvent(target);
  }
}
