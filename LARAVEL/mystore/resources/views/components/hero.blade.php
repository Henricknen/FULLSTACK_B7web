<section class="hero-area">
    <h3 class="subtitle">Aqui você encontra o que tanto procura!</h3>
    <h1 class="title">O que você está procurando?</h1>
    <div class="search-area">
      <input
        class="search-text"
        type="text"
        placeholder="Estou procurando por..."
      />
      <select class="categories-options">
        <option selected hidden disabled value="">Categoria</option>
        @foreach ($categories as $category)
            <option value="{{$category['value']}}">{{$category['name']}}</option>
        @endforeach        
      </select>
      
      <select class="states">
        <option selected hidden disabled value="">Estado</option>
        @foreach ($states as $state)
            <option value="{{$state['value']}}">{{$state['name']}}</option>
        @endforeach        
      </select>
      
      <button class="search-button">Procurar</button>
    </div>
  </section>