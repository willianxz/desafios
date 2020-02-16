
  //Configuração do Editor
  var quill = new Quill('#editor', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['image', 'code-block']
    ]
  },
  placeholder: 'Compose an epic...',
  theme: 'snow'  // or 'bubble'
});

//Eventos
const ImageBlot = Quill.import('formats/image');
const Parchment = Quill.import('parchment');
quill.root.addEventListener('dblclick', (e) => {
  const img = Parchment.find(e.target);
  if (img instanceof ImageBlot) { //Verificamos se o que foi clicado é uma imagem.
    //Se você colocar esse evento abaixo fora do IF,ao invés de ter que clicar em uma imagem para trocar, você poderá clicar em qualquer parte do editor
	//E colocar uma imagem.
    document.querySelector(".ql-image").click();
    quill.setSelection(img.offset(quill.scroll), 1, 'user');
  }
});
