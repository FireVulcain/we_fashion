<nav class="nav adminNav">
    <div class="row" style="width: 100%;">
        <div class="col-md-9">
            <ul class="nav">
                <li class="nav-item logo_title">We Fashion</li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/products')}}">Produits</a>
                    <a class="nav-link" href="{{url('/admin/categories')}}">Catégories</a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 text-right">
            <a href="{{url('/')}}">
                <img class="homeButton" src="{{asset('images/picto/house.png')}}" alt="picto home">
            </a>
            <a class="logoutButton btn btn-outline-dark" href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                Logout
            </a>
            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
</nav>