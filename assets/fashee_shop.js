
import $ from 'jquery/dist/jquery.min.js';
import 'nouislider/distribute/nouislider.min.css'
import * as noUiSlider from 'nouislider/distribute/nouislider.min.js';


// // /*[ No ui ]
// // ===========================================================*/
 var filterBar = document.getElementById('filter-bar');

 noUiSlider.create(filterBar, {
     start: [ 20, 200 ],
     connect: true,
     range: {
         'min': 20,
         'max': 200
     }
 });

  var skipValues = [
      document.getElementById('value-lower'),
      document.getElementById('value-upper')
  ];

  filterBar.noUiSlider.on('update', function( values, handle ) {
      skipValues[handle].innerHTML = Math.round(values[handle]) ;
  });

