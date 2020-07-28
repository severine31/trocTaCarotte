/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

import 'bootstrap';


console.log('Hello Webpack Encore! Edit me in assets/js/app.js');


$(document).ready(function() {
    $("#registration_form_Sexe").change(function(){
        if(this.value == 'F'){
            $("#profilImg").attr("src","/build/image/personnage/femme_flat.png");
        }
        else{
            $("#profilImg").attr("src","/build/image/personnage/homme_flat.png");
        }
    });
    $("#mon_annonce_CarotteATroquer").change(function(){
        var imgName=$(this).find(':selected').attr('data-image');
        if (imgName == null){
            $("#imgCarotteSummary").attr("src","/build/image/autre/interrogation.png");
        }else{
            $("#imgCarotteSummary").attr("src","/build/image/legume/" + imgName);
        }
    });
    $("#mon_annonce_ContreCarotte").change(function(){
        var imgName=$(this).find(':selected').attr('data-image');
        if (imgName == null){
            $("#imgContreCarotteSummary").attr("src","/build/image/autre/interrogation.png");
        }else{
            $("#imgContreCarotteSummary").attr("src","/build/image/legume/" + imgName);
        }  
    });
});