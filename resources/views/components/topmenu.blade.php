<div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="/" class="nav-link {{request()->is('/') ? 'active' : ''}}" >Home</a></li>
        <li class="nav-item"><a href="/products" class="nav-link {{request()->is('products') ? 'active' : ''}}">Products</a></li>
        <li class="nav-item"><a href="/category" class="nav-link {{request()->is('category') ? 'active' : ''}}">Category</a></li>
      </ul>
    </header>
  </div>
  {{-- <li class="nav-item" x-data="{ isActive: '{{ request()->routeIs('home') ? 'active' : '' }}' }" @click.away="isActive = false">
    <a class="nav-link" href="{{ route('home') }}" :class="{ 'active': isActive }">Home</a>
    <button class="btn btn-primary rounded-pill px-3" type="button">Primary</button>
    <span class="badge text-bg-dark rounded-pill">Dark</span>
</li> --}}