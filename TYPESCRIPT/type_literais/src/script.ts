function mostrarFormacao(
    formacao: string,
    alinhamento: 'left' | 'center' | 'right'        // types literais indica o 'alinhamento' do texto dentro da div, podendo ser 'left', 'center' ou 'right'
) {
    return `<div style = "text-align: ${alinhamento}">${formacao}</div>`        // alinhado conforme especificado pelo parâmetro alinhamento
}

mostrarFormacao('Tecnico em informática para internet', 'left');        // utilizando type literal 'left' para alinhar o texto à esquerda
mostrarFormacao('Pós Desenvolvimento Web', 'center');
mostrarFormacao('Graduação Análise e desenvolvimento de sistemas', 'right');