<header>
    <h1>MERCADO DE AHORRO S.R.L.</h1>
    <nav>
        <ul>
            <li><a href="{{route('home')}}" class="{{request()->routeIs('home') ? 'active' : ''}}">Home</a>
            </li>
            <li><a href="{{route('products.index')}}" class="{{request()->routeIs('products.*') ? 'active' : ''}}">Productos</a>
            </li>
            <li><a href="{{route('us')}}" class="{{request()->routeIs('us') ? 'active' : ''}}">Nosotros</a>
            </li>
            <li><a href="{{route('contactus.index')}}" class="{{request()->routeIs('contactus.index') ? 'active' : ''}}">Contactanos</a>
            </li>
        </ul>
    </nav>
</header>