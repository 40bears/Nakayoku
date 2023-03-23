<footer class="container-fluid px-0 position-relative">
    <div class="bg-blk padtb-footer">
      <div class="container">
        <div class="row padb-row">
          <div class="w-30">
            <ul class="footer-links">
              <li><a href="/"><img src="{{ url('assets/images/Nakayoku-logo.svg') }}" class="logo-w" alt="logo"></a></li>
            </ul>
            {{-- <ul class="footer-links pt-2 sp-padl">
              <h4 class="mb-0">Join our community</h4>
              <p class="lh-p">info@sample-email.com.</p>
            </ul> --}}
          </div>
          <div class="w-20">
            <ul class="footer-links sp-padl">
              <h4 class="mb-0">Marketplace</h4>
              <li><a href="{{ route('about-us') }}">About Us</a></li>
              <li><a href="{{ route('terms-and-conditions') }}">Terms and Conditions </a></li>
              <li><a href="{{ route('privacy-policy') }}">Privacy Policy </a></li>
            </ul>
          </div>
          <div class="w-20 sp-padtb">
            <ul class="footer-links sp-padl">
              <h4 class="mb-0">Nakayoku Games</h4>
              <li><a href="{{route('all-games')}}">All Games</a></li>
              <li><a href="{{route('contact')}}">Contact Us</a></li>
              <li><a href="{{ route('user-guide') }}">Community Guidelines </a></li>
            </ul>
          </div>
          <div class="w-30">
            <ul class="footer-links sp-padl">
                <li>
                    <h4 class="mb-0">Company</h4>
                    <p class="lh-p">Marketing De Apoyo Estrategico Sl</p>
                </li>
                <li>
                    <h4 class="mb-0">Location</h4>
                    <p class="lh-p">Company Number: B87277307 <br> C/ Cerro Del Castañar 50 Bis 28034<br> – Madrid, Spain</p>
                </li>
            </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 bg-blk d-flex justify-content-center align-items-center">
          <p class="mb-0 copy-h4">&copy; <?php echo date("Y"); ?> Nakayoku, Inc. All Rights Reserved.</p>
        </div>
      </div>
        </div>
      </div>
    </div>
  </footer>
  