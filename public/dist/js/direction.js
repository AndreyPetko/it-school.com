$(document).ready(function(){
  var $grid =  $('.grid').isotope({
  // options
 // itemSelector: '.2',
//  layoutMode: 'fitRows'
});


  var defaultId = $('#default-id').val();

  if(defaultId) {
    $grid.isotope({filter: '.' + defaultId});
  }


    $('.category-button').click(function(){
        id = $(this).attr('id');

        if(id != 'all') {
            $grid.isotope({filter: '.' + id});
        } else {
            $grid.isotope({ filter: '*' });
        }
    });
    
});