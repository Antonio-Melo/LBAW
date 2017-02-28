$(document).ready(function() {
    $("#price-slider").slider({
      range: true,
      min: 0,
      max: 500,
      values: [75, 300]
    });
});