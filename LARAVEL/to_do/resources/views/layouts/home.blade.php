<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            Logo
        </div>
        <div class="content">
            <nav>       {{-- menu de navegação --}}
                <a href="http://" class="btn btn-primary">
                    Criar Tarefa
                </a>
            </nav>
            <main>      {{-- conteúdo prinçipal --}}
                <section class="graph">
                    <div class="graph_header">
                        <h2>Progresso do dia</h2>
                        <hr class="LinhaHeader"/>
                        Data
                    </div>

                    <div class="graph_header-subtitle">Tarefas: <b>3 / 6</b>

                    </div>

                    <div class="graph-placeholder">

                    </div>

                    <p class="graph_header-tasks_left">Resta apenas 3 tarefas para serem realizadas</p>
                </section>

                <section class="list">
                    <div class="list_header">
                        <select class="list_header-select">
                            <option value="1">Todas as tarefas</option>
                        </select>
                    </div>
                </section>
            </main>
        </div>
    </div>
</body>
</html>