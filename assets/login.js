
/**FICHIER STYLE DE L'AUHENTICATOR  */

import './styles/login.css';

import $ from 'jquery/dist/jquery.js';
import 'bootstrap/dist/css/bootstrap.min.css';


$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
 });