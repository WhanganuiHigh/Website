  
  <script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

  <script src="/assets/js/bootstrap.min.js"></script>

  
  <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
  @includeWhen($page->production, '_partials.analytics')
  @include('_partials.cms.identity_redirect')