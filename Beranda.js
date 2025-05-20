// Menampilkan sambutan saat halaman dibuka
window.addEventListener('DOMContentLoaded', () => {
  alert("Selamat datang di Web Kucing Cute! 🐾");
});

// Animasi fade-in saat scroll
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('fade-in');
    }
  });
});

document.querySelectorAll('.section-title, p, ol').forEach(el => {
  el.classList.add('hidden');
  observer.observe(el);
});

// Efek hover pada daftar jenis kucing
document.querySelectorAll('li > b').forEach(item => {
  item.addEventListener('mouseover', () => {
    item.style.color = '#ec4899'; // pink-400
  });
  item.addEventListener('mouseout', () => {
    item.style.color = '';
  });
});
