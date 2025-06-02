document.addEventListener('DOMContentLoaded', () => {
  const burger = document.getElementById('fc-burger');
  const overlay = document.getElementById('fc-overlay-menu');
  const close = document.getElementById('fc-close');

  burger.addEventListener('click', () => overlay.classList.add('active'));
  close.addEventListener('click', () => overlay.classList.remove('active'));
});

