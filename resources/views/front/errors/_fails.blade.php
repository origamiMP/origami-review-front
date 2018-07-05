@php
  if (!isset($fails))
    $fails = Session::get('fails');

@endphp

@if (isset($fails) && count($fails) > 0)
  <div class="alert alert-danger">
    <div class="container">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"><i class="material-icons">clear</i></span>
      </button>
      @foreach ($fails as $fail)
        @foreach($fail as $message)
          <div class="alert-icon">
            <i class="material-icons">error_outline</i>
          </div>
          <div>
            {{ $message->detail }}
          </div>
        @endforeach
      @endforeach
    </div>
  </div>
@endif
@php Session::forget('fails'); @endphp