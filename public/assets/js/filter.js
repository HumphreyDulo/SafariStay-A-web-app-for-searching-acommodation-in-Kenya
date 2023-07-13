$(document).ready(function() {
    // Apply Filters button click event
    $(document).on('click', '#applyFiltersBtn', function() {
      // Get filter values
      var bedrooms = $('#bedrooms').val().trim();
      var bathrooms = $('#bathrooms').val().trim();
      var price = $('#price').val().trim();
      var location = $('#location').val().trim();
  
      // Perform filtering
      $('.card').each(function() {
        var card = $(this);
        var cardBedrooms = card.find('.card-bedrooms').text().trim();
        var cardBathrooms = card.find('.card-bathrooms').text().trim();
        var cardPrice = card.find('.card-price').text().trim();
        var cardLocation = card.find('.card-location').text().trim();
  
        // Check if the card matches the filter criteria
        var showCard = true;
        if (bedrooms !== '' && cardBedrooms !== bedrooms) {
          showCard = false;
        }
        if (bathrooms !== '' && cardBathrooms !== bathrooms) {
          showCard = false;
        }
        if (price !== '' && parseInt(cardPrice) > parseInt(price)) {
          showCard = false;
        }
        if (location !== '' && cardLocation !== location) {
          showCard = false;
        }
  
        // Show/hide the card based on the filter result
        if (showCard) {
          card.show();
        } else {
          card.hide();
        }
      });
    });
  });
  