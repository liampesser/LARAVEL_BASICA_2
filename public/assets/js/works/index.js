$(function() {

  /**
   * Affichage more works au click sur '#works_index_more'
   */
  $('#works_index_more').click(function(e) {
    e.preventDefault();

    let offset = $('#works_list .col-md-4').length;

    $.get($(this).data('url'), {
      offset,
      limit: $(this).data('limit')
    },function(reponse){
      $('#works_list').append(reponse)
                      .find('.col-md-4:nth-last-of-type(-n+'+offset+')')
                      .addClass('col-sm-6');
    });
  });

});
