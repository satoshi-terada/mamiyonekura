export default class about {
  constructor() { }

  init(next) {  
    const video = next.querySelector('.js-about-video');
    const trigger = next.querySelector('.js-about-video-trigger');
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
  }
}
