!function($) {

  'use strict';

  /**
   * Soooooooo dirty ;_;
   * add the "detach from post" link
   */
  $(document).on('click', '.attachments-browser .attachment', function() {
    var html = '<a class="remove-post-attachment" href="#">Detach from the post</a>'

    $('.attachment-details').find('.delete-attachment').parent().append(html)
  })

  /**
   * Remove the media from the post
   */
  $(document).on('click', '.remove-post-attachment', function(e) {
    e.preventDefault()
    // get the attachment id
    var datas = $(this).closest('.media-sidebar').find('input[type=hidden]').attr('name')
      , regex = /\[([0-9]*)\]/
      , match = regex.exec(datas)

    if (match !== null) {
      var id = match[1]

      $.ajax({
          url: '/wp-content/plugins/remove-post-attachment/ajax.php'
        , type: 'post'
        , dataType: 'json'
        , data: { id: id }
      })
      .done(function() {
        // quick and dirty: deselect the attachment and remove it from the list
        var attachment = $('.attachments').find('.attachment.selected')
        attachment.find('.check').click()
        attachment.remove()
      })
    }
  })

}(window.jQuery);
