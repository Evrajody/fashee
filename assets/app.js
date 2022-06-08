/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

import 'bootstrap/dist/css/bootstrap.min.css';
import './plugins/bootstrap/js/popper.js'
import 'bootstrap/dist/js/bootstrap.min.js'

import './plugins/animsition/js/animsition.js'
import './plugins/css-hamburgers/hamburgers.min.css'

import './fonts/font-awesome-4.7.0/css/font-awesome.css'

import './plugins/select2/select2.min.css';
import './plugins/select2/select2.min.js';

import './plugins/slick/slick.css';
import './plugins/slick/slick.min.js'
import './slick-custom.js';

import './styles/util.css'; 
import './styles/main.css';

import './main.js';
import './plugins/sweetalert/sweetalert.min.js';


$(".selection-1").select2({
       minimumResultsForSearch: 20,
       dropdownParent: $('#dropDownSelect1')
});

$(".selection-2").select2({
       minimumResultsForSearch: 20,
       dropdownParent: $('#dropDownSelect2')
});

// start the Stimulus application
// import './bootstrap';
