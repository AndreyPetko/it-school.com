$(document).ready(function(){
  var $grid =  $('.grid').isotope({
  // options
//  itemSelector: '.grid-item',
//  layoutMode: 'fitRows'
});
    
    
    
    $('.category-button').click(function(){
        id = $(this).attr('id');

        if(id != 'all') {
            $grid.isotope({filter: '.' + id});   
        } else {
            $grid.isotope({ filter: '*' });
        }
    });
    
});