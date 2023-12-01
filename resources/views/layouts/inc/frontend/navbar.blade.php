<header>
<a href=""></a>
  
    <ul class="navmenu">
        <li><a href="/">home</a></li>
        <li><a href="/collections" >categorias</a></li>
        <li><a href="/wishlist" wire:navigate>lista de desejos</a></li>
        <li><a href="/cart" wire:navigate>carrinho</a></li>
      
        @auth
        <li>  
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Sair
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
     
      </li>
    @endauth
        
    </ul>
  
    <div class="nav-icon">
     
 
      
           <a  class="mobile-search">
        <i class='bx bx-search' id="searchButton"></i>   
           </a>
           <form action="/" method="GET">
            <input type="text" name="search" id="campoBuscaMobile" placeholder="Pesquisar..." aria-label="Pesquisar" >
           
    </form>
     
        <a href="/login"><i class='bx bx-user'></i></a>
        <a href="{{ url('cart')}}"><i class='bx bx-cart'><div class="counter">(@livewire('frontend.cart.cart-count'))</div></i></a>
        
        <a href="{{ url ('wishlist')}}"><i class='bx bx-heart'><div class="counter">(@livewire('frontend.wishlist-count'))</div></i></a>
        <a href="/orders"><i class='bx bx-shopping-bag'></i></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <form action="/" method="GET">
            <input type="text" name="search" id="campoBusca" placeholder="Pesquisar..." aria-label="Pesquisar" >
           <button class="no-mobile-search" type="submit" style="background-color: transparent; border: none;">
            <i class='bx bx-search' id="searchButton" style="cursor: pointer; padding: 0px; margin: 0px;"></i>   
        </button>
    </form>
    </div>
    <script>
        const searchButton = document.getElementById('searchButton');
        const otherIcons = document.querySelectorAll('.nav-icon a:not(.mobile-search)');
        const searchInput = document.getElementById('campoBuscaMobile');
    
        searchButton.addEventListener('click', () => {
            searchInput.style.display = 'block';
     
    
            // Ocultar os outros ícones
            otherIcons.forEach(icon => {
                icon.style.display = 'none';
            });
        });
    </script>
  </header>