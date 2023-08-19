<link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="/assets/images/logo.jpg">
        </div>
        <div class="content">
            <nav>       {{-- menu de navegação --}}
                <a href="http://" class="btn btn-primary">
                    Criar Tarefa
                </a>
            </nav>
            <main>      {{-- conteúdo prinçipal --}}
                <section class="graph">
                    <div className="graph_header">
                        <h2>Progresso</h2>
                        <div class="graph_header-line"></div>
                        <div class="graph_header-date">
                            Data
                        </div>
                    

                    <div class="graph_header-subtitle">Tarefas: <b>3 / 6</b>

                    </div>


                    <div class="tasks_left_footer">
                        <img src="/assets/images/icon-info.png">
                        Resta apenas 3 tarefas para serem realizadas
                    </div>
                </section>

                <section class="list">
                    <div class="list_header">
                        <select class="list_header-select">
                            <option value="1">Todas as tarefas</option>
                        </select>
                    </div>
                    <div class="task_list">
                        <div class="task">
                            <div class="title">
                                <input type="checkbox"/>
                                <div class="task_title">Titulo da Tarefa</div>
                            </div>
                            <div class="priority">
                                <div class="sphere"></div>
                                <div>Titulo da Tarefa</div>
                            </div>
                            <div class="actions">
                                <a href="#">
                                    <img src="/assets/images/icon-edit.png">
                                </a>
                                <a href="#">
                                    <img src="/assets/images/icon-delete.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
                </section>
            </main>
        </div>
            </main>
        </div>
    </div>
</body>
</html>