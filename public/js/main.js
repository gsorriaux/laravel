

$('#deleteBook').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    
    var titre = button.data('titre') // Extract info from data-* attributes
    var auteur = button.data('auteur')
    var bookId = button.data('bookid')

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    
    modal.find('.modal-title').text('Supprimer le livre ' + titre + ' ?')
    modal.find('.modal-body .title').text('Titre : ' + titre)
    modal.find('.modal-body .author').text('Auteur : ' + auteur)
    modal.find('input[type=number]').val(bookId)
  })

  $('#editBook').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    
    var titre = button.data('titre') // Extract info from data-* attributes
    var auteur = button.data('auteur')
    var bookId = button.data('bookid')
    var description = button.data('description')
    var genres = button.data('genre')
    var annee = button.data('annee')
    console.log(genres);
    


    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    
    modal.find('.modal-title').text('Editer le livre')
    modal.find('input[type=number][name=id]').val(bookId)
    modal.find('input[type=text][name=titre]').val(titre)
    modal.find('select[name=auteur]').val(auteur)
    modal.find('input[type=text][name=description]').val(description)
    var inputs = modal.find('input[type=checkbox]')
    console.log(inputs);

    modal.find('input[type=checkbox]').each(inputs, function( key, value ) {
      genres.forEach(genre => {
        if (genre.id == value.value) {
          value.checked = true;
        }
      });
      console.log( key + ": " + value.value );
    });
     



    

    modal.find('input[type=number][name=annee]').val(annee)
  })

  $('#deleteAuthor').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    var author = button.data('author')
    var authorId = button.data('authorid')

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    
    modal.find('.modal-title').text("Supprimer l'auteur :")
    modal.find('.modal-body .author').text(author + " ?")
    modal.find('input[type=number]').val(authorId)
  })

  $('#editAuthor').on('show.bs.modal', function (event) {
    
    var button = $(event.relatedTarget) // Button that triggered the modal
    
    
    var author = button.data('author')
    var authorId = button.data('authorid')


    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    
    modal.find('.modal-title').text("Editer l'auteur")
    modal.find('input[type=number][name=id]').val(authorId)
    modal.find('input[type=text][name=name]').val(author)
  })