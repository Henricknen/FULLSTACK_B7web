<form role = "search" method = "GET" class = "search-form" action = "<?php echo esc_url(home_url('/')); ?>">        <!-- role 'search' configura formulário de busca -->
    <input type = "search" name = "s" value = "<?php the_search_query(); ?>" />     <!-- campo de 'busca' -->

    <input type="submit" value = "Buscar" />
</form>