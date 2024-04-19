export default class about {
  constructor() { }

  init(next) {
    const video = next.querySelector('.js-about-video');
    const playTrigger = next.querySelector('.js-about-video-trigger');
    const volumeTrigger = next.querySelector('.js-about-video-volume-trigger');
    if(!video) return;

    video.volume = 0.5;

    let isPlaying = true;
    let ismMuted = true;

    playTrigger.addEventListener('click', e => {
      e.preventDefault();
      if(isPlaying) {
        video.pause();
        video.classList.add('is-pause');
        playTrigger.classList.add('is-pause');
        isPlaying = false;
        return;
      } else {
        video.play();
        video.classList.remove('is-pause');
        playTrigger.classList.remove('is-pause');
        isPlaying = true;
        return;
      }
    });

    volumeTrigger.addEventListener('click', e => {
      e.preventDefault();
      if(!isPlaying) return false;

      if(ismMuted) {
        video.muted = false;
        volumeTrigger.classList.remove('is-muted');
        ismMuted = false;
        return;
      } else {
        video.muted = true;
        volumeTrigger.classList.add('is-muted');
        ismMuted = true;
        return;
      }
    });
  }
}
