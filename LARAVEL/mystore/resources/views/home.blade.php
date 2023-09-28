<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/style.css" />
    <title>B7Store</title>
  </head>

  <body>
      <x-base.header />   <!-- chamando componente 'header' -->
    <main>
          <!-- Section Area -->
        <x-hero />
          <!-- /Section area-->
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
          <div class="ad-item">
            <div
              class="ad-image"
              style="background-image: url('http://placehold.it/150x150')"
            ></div>
            <div class="ad-title">Bola de Futebol Americano Wilson</div>
            <div class="ad-price">R$ 138,61</div>
          </div>
          <div class="ad-item">
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
          <div class="ad-item">
            <div
              class="ad-image"
              style="background-image: url('http://placehold.it/150x150')"
            ></div>
            <div class="ad-title">MacBook Pro</div>
            <div class="ad-price">R$ 8.349,10</div>
          </div>
        </div>
      </div>
    </main>
    <x-base.footer />   <!-- chamando componente 'footer' -->
  </body>
</html>
