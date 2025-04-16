<nav class="navbar">        
    <a href="{{ url('eshop.html') }}">
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
        <li><a href="favorite.html" class="heart-icon"><i class="far fa-heart"></i></a></li>
        <li><a href="profil.html" class="profile-icon"><i class="far fa-user"></i></a></li>
        <li><a href="kosik.html" class="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
    </ul>
    <label for="menu-toggle" class="menu-icon">
        <i class="fas fa-bars"></i>
    </label>
    <input type="checkbox" id="menu-toggle" class="menu-checkbox">
    <div class="popup-menu">
        <div class="popup-content">
            <label for="menu-toggle" class="close-btn">&times;</label>
            <ul>
                <li><a href="eshop.html">Domov</a></li>
                <li><a href="pohare.html">Poháre</a></li>
                <li><a href="taniere.html">Taniere</a></li>
                <li><a href="sety.html">Sety</a></li>
                <li><a href="misky.html">Misky</a></li>
                <li><a href="ine.html">Iné</a></li>
                <li><a href="eshop.html#o-nas">O nás</a></li>
                <li><a href="#">Kontakty</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="header-main">
    <div class="line">
        <a href="#kategorie" class="ctn">Nakupuj teraz</a>          
    </div>
</header>
