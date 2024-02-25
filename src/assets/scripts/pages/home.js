import { common } from '../common';

export default class home {
  constructor() {}

  init(next) {
    this.changeFontColor(next);
    this.randomBackground(next);
  }

  changeFontColor(next) {
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
      });
    });
  }
  
  randomBackground(next) {
    const body = common.elements.body;
    const trigger = next.querySelector('.js-topEye-button');
    const background = next.querySelector('.js-topEye-background');
    const backImages = background.querySelectorAll('img');
    const backImagesLength = backImages.length;
    let showBackImagesIndex = 0;
    
    const showBackground = () => {
      // ランダムで背景画像を表示
      const backImagesIndex = Math.floor(Math.random() * backImagesLength);
      // 重複しないようにする
      if(showBackImagesIndex === backImagesIndex) {
        showBackground();
        return;
      }
      showBackImagesIndex = backImagesIndex;
      backImages[backImagesIndex].classList.add('is-active');
    }

    const hideBackground = () => {
      // 背景画像を非表示
      backImages.forEach((backImage) => {
        backImage.classList.remove('is-active');
      });
    }

    trigger.addEventListener('click', () => {
      if(trigger.classList.toggle('is-active')) {
        body.classList.add('is-back-active');
        showBackground();
      } else {
        body.classList.remove('is-back-active');
        hideBackground();
      }
    });
  }
};
