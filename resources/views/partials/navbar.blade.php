<nav class="navbar">        
    <a href="{{ route('home') }}">
        <h1 class="logo">Keramo</h1>
    </a>
    <ul class="nav-links">
        <li class="active">
            <input type="checkbox" id="search-toggle" class="search-toggle" />
            <label for="search-toggle" class="search-icon">
                <i class="fas fa-search"></i>
            </label>
            <input type="text" class="search-input" placeholder="Hľadať..." />
        </li>
        <li><a href="{{ route('favorit') }}" class="heart-icon"><i class="far fa-heart"></i></a></li>
        <li>
            <a href="{{ Auth::check() ? route('profile') : route('login') }}" class="profile-icon">
                <i class="far fa-user"></i>
            </a>
        </li>        
        <li><a href="{{ route('basket') }}" class="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
        
    </ul>
    <label for="menu-toggle" class="menu-icon">
        <i class="fas fa-bars"></i>
    </label>
    <input type="checkbox" id="menu-toggle" class="menu-checkbox">
    <div class="popup-menu">
        <div class="popup-content">
            <label for="menu-toggle" class="close-btn">&times;</label>
            <ul>
                <li><a href="{{ route('home') }}">Domov</a></li>
                <li><a href="{{ route('cups') }}">Poháre</a></li>           
                <li><a href="{{ route('plates') }}">Taniere</a></li>
                <li><a href="{{ route('sets') }}">Sety</a></li>
                <li><a href="{{ route('bowls') }}">Misky</a></li>
                <li><a href="{{ route('others') }}">Iné</a></li>
                <li><a href="eshop.html#o-nas">O nás</a></li>
                <li><a href="#">Kontakty</a></li>
            </ul>
        </div>
    </div>
</nav>

