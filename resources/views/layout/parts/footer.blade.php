<footer class="container-fluid px-0 position-relative">
    <div class="bg-blk padtb-footer">
      <div class="container">
        <div class="row padb-row">
          <div class="w-30">
            <ul class="footer-links">
              <li><a href="/"><img src="{{ url('assets/images/global-logo-white.svg') }}" class="logo-w" alt="logo"></a></li>
            </ul>
            {{-- <ul class="footer-links pt-2 sp-padl">
              <h4 class="mb-0">Join our community</h4>
              <p class="lh-p">info@sample-email.com.</p>
            </ul> --}}
          </div>
          <div class="w-20 sp-padtb">
            <ul class="footer-links sp-padl">
              <h4 class="mb-0">Marketplace</h4>
              <li><a href="{{ route('about-us') }}">About Us</a></li>
              <li><a href="{{ route('terms-and-conditions') }}">Terms and Conditions </a></li>
              <li><a href="{{ route('privacy-policy') }}">Privacy Policy </a></li>
            </ul>
          </div>
          <div class="w-20 sp-padtb">
            <ul class="footer-links sp-padl">
              <h4 class="mb-0">Games</h4>
              <li><a href="{{route('all-games')}}">All Games</a></li>
              <li><a href="{{route('contact')}}">Contact Us</a></li>
              <li><a href="{{ route('user-guide') }}">Community Guidelines </a></li>
            </ul>
          </div>
          <div class="w-30">
            <ul class="footer-links sp-padl">
                <li>
                    <h4 class="mb-0">Company</h4>
                    <p class="lh-p">GLOBAL CARPATICA SL</p>
                </li>
                <li>
                    <h4 class="mb-0">Location</h4>
                    <p class="lh-p">Company Number: B-02939957 <br> AVENIDA DEL PUENTE CULTURAL 8 BLOQUE B PLANTA 4 PUERTA 628702 SAN SEBASTIAN DE LOS REYES MADRID SPAIN</p>
                </li>
            </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 bg-blk d-flex justify-content-center align-items-center">
          <p class="mb-0 copy-h4">&copy; <?php echo date("Y"); ?> GLOBAL CARPATICA SL, Inc. All Rights Reserved.</p>
        </div>
      </div>
        </div>
      </div>
    </div>
  </footer>
  