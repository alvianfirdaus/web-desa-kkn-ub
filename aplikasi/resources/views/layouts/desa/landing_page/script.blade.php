<script>
    const text = "Website Portal Desa Pencontoh";
    let index = 0;
    let isDeleting = false;

    function typeEffect() {
      const typingText = document.getElementById("typing-text");

      // Pastikan elemen selalu memiliki kelas "typing"
      typingText.classList.add("typing");

      if (!isDeleting && index < text.length) {
        typingText.innerHTML = text.substring(0, index + 1);
        index++;
        setTimeout(typeEffect, 100); // Kecepatan mengetik
      } else if (isDeleting && index > 0) {
        typingText.innerHTML = text.substring(0, index - 1);
        index--;
        setTimeout(typeEffect, 50); // Kecepatan menghapus lebih cepat
      } else {
        isDeleting = !isDeleting; // Beralih antara mengetik dan menghapus
        setTimeout(typeEffect, 1000); // Jeda sebelum mengetik ulang
      }
    }

    window.onload = typeEffect;
  </script>
  <script>
    $(document).ready(function () {
      var owl = $(".owl-carousel");

      owl.owlCarousel({
        loop: true,
        margin: 20,
        nav: false, // Matikan navigasi default Owl Carousel
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
          0: { items: 1 }, // 1 item di layar kecil
          576: { items: 2 }, // 2 item di layar sedang (Mobile)
          768: { items: 3 }, // 3 item di layar lebih besar (Tablet)
          992: { items: 4 }, // 4 item di layar besar (Laptop)
          // 1200: { items: 5 }, // 5 item di layar ekstra besar (Desktop)
        },
      });

      // Custom tombol prev & next
      $(".owl-prev-custom").click(function () {
        owl.trigger("prev.owl.carousel");
      });

      $(".owl-next-custom").click(function () {
        owl.trigger("next.owl.carousel");
      });
    });
  </script>
<script>
    // Fungsi animasi number scramble apbn
    function initNumberAnimation() {
        const pendapatanValue = parseInt(document.getElementById('pendapatan').getAttribute('data-target')) || 0;
        const belanjaValue = parseInt(document.getElementById('belanja').getAttribute('data-target')) || 0;

        animateNumber('pendapatan', pendapatanValue);
        animateNumber('belanja', belanjaValue);

        const options = {
            threshold: 0.5 // Trigger ketika 50% elemen terlihat
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Mulai animasi hanya jika elemen terlihat
                    animateNumber('pendapatan', pendapatanValue);
                    animateNumber('belanja', belanjaValue);
                    observer.unobserve(entry.target); // Berhenti mengamati setelah animasi dimulai
                }
            });
        }, options);

        // Amati section apb-desa
        const apbSection = document.getElementById('apb-desa');
        if (apbSection) {
            observer.observe(apbSection);
        }
    }

    // Fungsi animasi angka
    function animateNumber(element, finalNumber, duration = 2000) {
        const startNumber = 0;
        const startTime = performance.now();
        let animationFrame;

        function updateNumber(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1);
            const easedProgress = easeOutQuad(progress);
            const currentValue = Math.floor(startNumber + (finalNumber - startNumber) * easedProgress);

            element.textContent = 'Rp' + currentValue.toLocaleString('id-ID') + ',00';

            if (progress < 1) {
                animationFrame = requestAnimationFrame(updateNumber);
            } else {
                element.textContent = 'Rp' + finalNumber.toLocaleString('id-ID') + ',00';
            }
        }

        function easeOutQuad(t) {
            return t * (2 - t);
        }

        // Hentikan animasi yang mungkin sedang berjalan
        cancelAnimationFrame(animationFrame);
        animationFrame = requestAnimationFrame(updateNumber);
    }

    // Inisialisasi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', initNumberAnimation);
</script>
<script>
    // Fungsi untuk menginisialisasi animasi counter jumlah penduduk
    function initPopulationCounters() {
        const counters = document.querySelectorAll('.count-number');
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const target = entry.target;
                    const targetNumber = parseInt(target.getAttribute('data-target'));
                    animateCounter(target, targetNumber);
                    observer.unobserve(target);
                }
            });
        }, observerOptions);

        counters.forEach(counter => {
            observer.observe(counter);
        });
    }

    // Fungsi animasi counter
    function animateCounter(element, finalNumber, duration = 1500) {
        const startNumber = 0;
        const startTime = performance.now();
        let animationFrame;

        function updateCounter(currentTime) {
            const elapsedTime = currentTime - startTime;
            const progress = Math.min(elapsedTime / duration, 1);
            const easedProgress = easeOutQuad(progress);
            const currentValue = Math.floor(startNumber + (finalNumber - startNumber) * easedProgress);

            element.textContent = currentValue + ' Jiwa';

            if (progress < 1) {
                animationFrame = requestAnimationFrame(updateCounter);
            } else {
                element.textContent = finalNumber + ' Jiwa';
            }
        }

        function easeOutQuad(t) {
            return t * (2 - t);
        }

        cancelAnimationFrame(animationFrame);
        animationFrame = requestAnimationFrame(updateCounter);
    }

    // Inisialisasi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', initPopulationCounters);
</script>
