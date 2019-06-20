<nav class="nav">
    <div class="row" style="width: 100%;">
        <div class="col-md-9">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link logo_title" href="{{url('/')}}">We Fashion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('sales')) ? 'active' : '' }}" href="{{url('/sales')}}">Soldes</a>
                    <a class="nav-link {{ (request()->is('categories')) ? 'active' : '' }}" href="{{url('categories/1')}}">Homme</a>
                    <a class="nav-link {{ (request()->is('categorie/2')) ? 'active' : '' }}" href="{{url('categories/2')}}">Femme</a>
                </li>
            </ul>
        </div>
    </div>
</nav>