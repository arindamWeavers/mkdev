(function($) {
  $('[data-name="category_listing_heading"] input').each(updatePlaceholder);
  $('body').on('blur','[data-name="category_listing_heading"] input', updatePlaceholder);

  function updatePlaceholder() {
    var heading = $(this).val();
    var $headingIDField = $(this).closest('.acf-fields').find('[data-name="category_listing_heading_id"] input');
    var $description = $headingIDField.parent().find('.description');
    var headingID = $headingIDField.val();
    
    if(! $description.length) {
      $headingIDField.parent().append($('<p></p>').addClass('description'));
      $description = $headingIDField.parent().find('.description');
    }
    headingID = heading.replace(/(?:^\w|[A-Z]|\b\w)/g, function(letter) {
      return letter.toUpperCase();
    }).replace(/[\W_]+/g, '');
    $description.text('Default Heading ID: ' + headingID);
  }
})(jQuery);



jQuery(function () {
  jQuery('[id$="-all"] > ul.categorychecklist').each(function () {
    var $list = jQuery(this);
    var $firstChecked = $list.find(':checkbox:checked').first();
    if (!$firstChecked.length)
      return;
    var pos_first = $list.find(':checkbox').position().top;
    var pos_checked = $firstChecked.position().top;
    $list.closest('.tabs-panel').scrollTop(pos_checked - pos_first + 5);
  });
});