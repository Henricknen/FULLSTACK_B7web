<div class="categories-area">
    <div class="title">Categorias</div>
    <div class="buttons">
      <button class="cars">
        <img src="assets/icons/carIcon.png" alt="Ícone Carros" />
        Carros
      </button>
      <button class="eletronics">
        <img
          src="assets/icons/eletronicsIcon.png"
          alt="Ícone Eletrônicos"
        />
        Eletrônicos
      </button>
      <button class="clothes">
        <img src="assets/icons/clothesIcon.png" alt="Ícone Roupas" />
        Roupas
      </button>
      <button class="sports">
        <img src="assets/icons/sportsIcon.png" alt="Ícone Esportes" />
        Esportes
      </button>
      <button class="babies">
        <img src="assets/icons/babiesIcon.png" alt="Ícone Bebês" />
        Bebês
      </button>
    </div>
  </div>
  <div class="ads">
    <div class="ads-title">Anúncios recentes</div>
    <div class="ads-area">
      @foreach ($advertisesList as $ad)
        <x-simpleadivertises bgImage = "{{$ad['image']}}" title = "{{$ad['title']}}" price = "{{$ad['price']}}" href = "{{$ad['href']}}" />
      @endforeach
    <div class="ads-area">
      @foreach ($advertisesList as $ad)
        <x-simple-adivertise bgImage = "{{$ad['image']}}" title = "{{$ad['title']}}" price = "{{$ad['price']}}" href = "{{$ad['href']}}" />
      @endforeach
    <div class="ads-area">
      @foreach ($advertisesList as $ad)
        <x-simple-adivertises bgImage = "{{$ad['image']}}" title = "{{$ad['title']}}" price = "{{$ad['price']}}" href = "{{$ad['href']}}" />
      @endforeach

      {{-- <x-simple-adivertises /> --}}
      {{-- <x-simple-adivertise /> --}}
      {{-- <div class="ad-item">
        <div
          class="ad-image"
          style="background-image: url('http://placehold.it/150x150')"
        ></div>
        <div class="ad-title">Tênis vans Baby - 1 ano</div>
        <div class="ad-price">R$ 189,99</div>
      </div>
      <div class="ad-item">
        <div
          class="ad-image"
          style="background-image: url('http://placehold.it/150x150')"
        ></div>
        <div class="ad-title">Controle PS4 - Preto</div>
        <div class="ad-price">R$ 275,00</div>
      </div>
      <div class="ad-item">
        <div
          class="ad-image"
          style="background-image: url('http://placehold.it/150x150')"
        ></div>
        <div class="ad-title">Volkswagen Fusca 68</div>
        <div class="ad-price">R$ 34.990,00</div>
      </div>
      <div class="ad-item">
        <div
          class="ad-image"
          style="background-image: url('http://placehold.it/150x150')"
        ></div>
        <div class="ad-title">Volkswagen Polo 2015 - Azul</div>
        <div class="ad-price">R$ 67.900,00</div>
      </div>
      <div class="ad-item">
        <div
          class="ad-image"
          style="background-image: url('http://placehold.it/150x150')"
        ></div>
        <div class="ad-title">Camisas sociais masculinas</div>
        <div class="ad-price">R$ 110,00</div>
      </div>
      <div class="ad-item">
        <div
          class="ad-image"
          style="background-image: url('http://placehold.it/150x150')"
        ></div>
        <div class="ad-title">Bola de Basquete Spalding - NBA</div>
        <div class="ad-price">R$ 190,36</div>
      </div>
      <div class="ad-item"> --}}
        {{-- <div
          class="ad-image"
          style="background-image: url('http://placehold.it/150x150')"
        ></div>
        <div class="ad-title">MacBook Pro</div>
        <div class="ad-price">R$ 8.349,10</div>
      </div> --}}
    </div>
  </div>
</div>