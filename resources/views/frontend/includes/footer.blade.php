<footer class="footer-section">
    <div class="container">
    <div class="content-block">
        <div class="footer-col">
            <img src="{{url('images/logo/karuna-logo-english.svg')}}" alt="" class="footer-logo">
            <div class="title">GET IN TOUCH</div>
            <ul class="contact-info">
                <li>
                    <a href="tel:+947700000" class="contact-link">
                        <i class="fa-solid fa-phone"></i>
                        +94 77 00000
                    </a>
                </li>
                <li>
                    <a href="mailto:info@karuna.com" class="contact-link green">
                        <i class="fa-solid fa-at"></i>
                        info@karuna.com
                    </a>
                </li>
            </ul>
            <ul class="social-media">
                <li>
                    <a href="#" class="social-link">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </li>
                <li>
                    <a href="#" class="social-link">
                        <i class="fa-brands fa-google-plus-g"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-col">
            <div class="title">Quick links</div>
            <ul class="footer-list">
                <li><a href="{{route('frontend.index')}}" class="footer-link">Home</a></li>
                <li><a href="{{route('frontend.about_us')}}" class="footer-link">About Us</a></li>
                <li><a href="{{route('frontend.campaigns')}}" class="footer-link">Our Works</a></li>
                <li><a href="{{route('frontend.support')}}" class="footer-link">Support Us</a></li>
                <li><a href="{{route('frontend.contact')}}" class="footer-link">Contact Us</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <div class="title">Resources</div>
            <ul class="footer-list">
                <li><a href="{{route('frontend.help')}}" class="footer-link">Help &amp; Support</a></li>
                <li><a href="{{route('frontend.events')}}" class="footer-link">Events</a></li>
                <li><a href="{{route('frontend.privacy_policy')}}" class="footer-link">Privacy Policy</a></li>
                <li><a href="{{route('frontend.terms_and_conditions')}}" class="footer-link">Terms & Conditions</a></li>
            </ul>
        </div>
        <div class="footer-col">
            <div class="title">About our organization</div>
            <div class="footer-text">We are a UK based non for profit charitable organization, providing you an easy, transparent technical pathway for supplying food, education & medicine to the needy children and families in all parts of Sri Lanka.</div>
        </div>
    </div>
    <a href="https://tallentor.com/" target="_blank" class="copyright">Copyright @ {{date('Y')}} | Tallentor Global Ltd</a>
    </div>
</footer>