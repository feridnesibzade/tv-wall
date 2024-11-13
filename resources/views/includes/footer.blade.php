<footer>
    <div class="container">
        <div class="footer__inner">
            <p>MyWall © 2020-2024</p>
            <ul>
                <li><img src="/storage/img/footer (2).png" alt="" /></li>
                <li><img src="/storage/img/footer (1).png" alt="" /></li>
                <li><img src="/storage/img/footer (3).png" alt="" /></li>
            </ul>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="/assets/js/app.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lf9xHoqAAAAABlaBAGp-6dWQAgPAGQ8sDX6RoEo"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });
</script>
<script>
    let billBtn = document.getElementById('billBtn');
    let mobileBill = document.getElementById('mobileBill');
    let closeBillBtn = document.getElementById('closeBillBtn');
    let open = false;

    billBtn.addEventListener('click', function(e) {
        if (!open) {
            mobileBill.style.display = 'block';
            mobileBill.style.transform = 'translateX(5%)';
            setTimeout(() => {
                mobileBill.style.opacity = 1;
                mobileBill.style.transform = 'translateX(0)';
            }, 10);
            closeBillBtn.style.display = 'block';
        } else {
            // Hide with fade-out effect
            mobileBill.style.opacity = 0;
            closeBillBtn.style.display = 'none';
            mobileBill.style.transform = 'translateX(5%)';
            setTimeout(() => {
                if (!open) {
                    mobileBill.style.display = 'none';
                }
            }, 500); // Match the opacity transition duration
        }

        open = !open;
    });
</script>


@stack('footer')
</body>

</html>
