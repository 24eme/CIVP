<footer id="footer" class="text-center">
  <div class="footer-icon">
    <a href="/"><img src="{{asset('images/logos/civp.png')}}" height=200  alt=""></a>
  </div>
  <div class="footer-links container">
    <ul class="footer-nav" role="menubar">
      <li class="nav-item" id="nav-item-civp" role="menuitem">
        <a class="nav-link" id="nav-link-civp" href="https://www.vinsdeprovence.com/civp">CIVP</a>
      </li>
      <li class="nav-item" id="nav-item-contact" role="menuitem">
        <a class="nav-link" id="nav-link-contact" href="https://www.vinsdeprovence.com/contact">Contact</a>
      </li>
      <li class="nav-item" id="nav-item-mentions-legales" role="menuitem">
        <a class="nav-link" id="nav-link-mentions-legales" href="{{ route('mentions') }}">Mentions légales</a>
      </li>
      <li class="nav-item" id="nav-item-admin" role="menuitem">
        <a class="nav-link" id="nav-link-admin" href="{{ route('login') }}"><i class="fas fa-user-lock"></i> Administration</a>
      </li>
    </ul>
  </div>
  <div class="footer-disclaimer">
        <div class="container">
            <a href="https://www.vinsdeprovence.com" class="" target="_blank">www.vinsdeprovence.com</a>
        </div>
  </div>
</footer>
