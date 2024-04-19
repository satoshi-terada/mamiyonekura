import { common } from '../common';

export default class home {
  constructor() {}

  init(next) {
    this.randomBackground(next);
    this.drawing();
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

  drawing() {
    const canvas = document.getElementById('drawingCanvas');
    const container = document.querySelector('[data-barba-namespace="home"]');
    const trigger = document.querySelector('.js-drawingTrigger');
    let currentColor = document.querySelector(':root').style.getPropertyValue('--color-text');

    let isDrawingEnabled = false;

    canvas.width = window.innerWidth
    canvas.height = container.clientHeight;

    const ctx = canvas.getContext('2d');
    let isDrawing = false;

    // イベントハンドラを共通化
    function startDrawing(event) {
      if (!isDrawingEnabled) return;
      isDrawing = true;
      const rect = canvas.getBoundingClientRect();
      const scaleX = canvas.width / rect.width;    // relationship bitmap vs. element for X
      const scaleY = canvas.height / rect.height;  // relationship bitmap vs. element for Y

      let x, y;
      if (event.type === 'touchstart') {
        x = ((event.touches[0].clientX + window.pageXOffset) - rect.left) * scaleX;
        y = ((event.touches[0].clientY + window.pageYOffset) - rect.top) * scaleY;
      } else {
        x = (event.pageX - rect.left) * scaleX;
        y = (event.pageY - rect.top) * scaleY;
      }

      ctx.beginPath();
      ctx.moveTo(x, y);
      ctx.strokeStyle = currentColor; // 現在の色を設定
      ctx.lineWidth = 0.35;
    }

    function continueDrawing(event) {
      if (!isDrawing || !isDrawingEnabled) return;
      const rect = canvas.getBoundingClientRect();
      const scaleX = canvas.width / rect.width;    // relationship bitmap vs. element for X
      const scaleY = canvas.height / rect.height;  // relationship bitmap vs. element for Y

      let x, y;
      if (event.type === 'touchmove') {
        x = ((event.touches[0].clientX + window.pageXOffset) - rect.left) * scaleX;
        y = ((event.touches[0].clientY + window.pageYOffset) - rect.top) * scaleY;
      } else {
        x = (event.pageX - rect.left) * scaleX;
        y = (event.pageY - rect.top) * scaleY;
      }

      ctx.lineTo(x, y);
      ctx.stroke();
    }

    function endDrawing() {
      if (!isDrawingEnabled) return;
      isDrawing = false;
      ctx.closePath();
    }

    trigger.addEventListener('click', e => {
      if(isDrawingEnabled) {
        isDrawingEnabled = false;
        canvas.style.pointerEvents = 'none';
        container.style.pointerEvents = 'auto';

        // events
        canvas.removeEventListener('mousedown', startDrawing);
        canvas.removeEventListener('mousemove', continueDrawing);
        canvas.removeEventListener('mouseup', endDrawing);
        canvas.removeEventListener('touchstart', (e) => {
            startDrawing(e.touches[0]);
            e.preventDefault();
        });
        canvas.removeEventListener('touchmove', (e) => {
            continueDrawing(e.touches[0]);
            e.preventDefault();
        });
        canvas.removeEventListener('touchend', (e) => {
            endDrawing();
            e.preventDefault();
        });
      } else {
        isDrawingEnabled = true;
        canvas.style.pointerEvents = 'auto';
        container.style.pointerEvents = 'none';
        currentColor = document.querySelector(':root').style.getPropertyValue('--color-text');

        // events
        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mousemove', continueDrawing);
        canvas.addEventListener('mouseup', endDrawing);
        canvas.addEventListener('touchstart', (e) => {
            startDrawing(e.touches[0]);
            e.preventDefault();
        });
        canvas.addEventListener('touchmove', (e) => {
            continueDrawing(e.touches[0]);
            e.preventDefault();
        });
        canvas.addEventListener('touchend', (e) => {
            endDrawing();
            e.preventDefault();
        });
      }
      e.target.classList.toggle('is-active');
      e.target.parentElement.classList.toggle('is-active');
    });
  }
}
