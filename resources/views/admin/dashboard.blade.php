<h1>today's report</h1>
<h3>total post: {{ $total_post }}</h3>
<h3>total account so far: {{ $total_profiles }}</h3>
<h3>today's post: {{ $today_post }}</h3>
<h3>today's account: {{ $today_ac }}</h3>
@foreach($req as $request)
    <div><h4>{{ $request -> id }}</h4></div>
    <div><h4>{{ $request -> from }}</h4></div>
    <div><h4>{{ $request -> name }}</h4></div>
    <div><h4>{{ $request -> year }}</h4></div>
@endforeach
<a class = 'btn-outline-danger'
   href="{{  route('admin.logout') }}"
   role = "button">
    logout
</a>
