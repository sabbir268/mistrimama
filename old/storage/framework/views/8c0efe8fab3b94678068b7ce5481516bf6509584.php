<style type="text/css">
  /*! =========================================================
 *
 Material Bootstrap Wizard - V1.0.1
 
*
* =========================================================
*
* MIT License Copyright 2017 Creative Tim (http://www.creative-tim.com/product/material-bootstrap-wizard)
 *
 *                       _oo0oo_
 *                      o8888888o
 *                      88" . "88
 *                      (| -_- |)
 *                      0\  =  /0
 *                    ___/`---'\___
 *                  .' \|     |// '.
 *                 / \|||  :  |||// \
 *                / _||||| -:- |||||- \
 *               |   | \  -  /// |   |
 *               | \_|  ''\---/''  |_/ |
 *               \  .-\__  '-'  ___/-. /
 *             ___'. .'  /--.--\  `. .'___
 *          ."" '<  `.___\_<|>_/___.' >' "".
 *         | | :  `- \`.;`\ _ /`;.`/ - ` : | |
 *         \  \ `_.   \_ __\ /__ _/   .-` /  /
 *     =====`-.____`.___ \_____/___.-`___.-'=====
 *                       `=---='
 *
 *     ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *
 *               Buddha Bless:  "No Bugs"
 *
 * ========================================================= */


.image-container {
  min-height: 100vh;
  background-position: center center;
  background-size: cover;
  position: relative;
}
.image-container:before {
  content: "";
  display: block;
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background: #000000;
  opacity: .3;
}

.made-with-mk {
  width: 50px;
  height: 50px;
  display: block;
  position: fixed;
  z-index: 555;
  bottom: 40px;
  right: 40px;
  border-radius: 30px;
  background-color: rgba(16, 16, 16, 0.35);
  border: 1px solid rgba(255, 255, 255, 0.15);
  color: #FFFFFF;
  cursor: pointer;
  padding: 10px 12px;
  white-space: nowrap;
  overflow: hidden;
  -webkit-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
  -moz-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
  -o-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
  transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
}
.made-with-mk:hover, .made-with-mk:active, .made-with-mk:focus {
  width: 218px;
  color: #FFFFFF;
  transition-duration: .55s;
  padding: 10px 19px;
}
.made-with-mk:hover .made-with, .made-with-mk:active .made-with, .made-with-mk:focus .made-with {
  opacity: 1;
}
.made-with-mk:hover .brand, .made-with-mk:active .brand, .made-with-mk:focus .brand {
  left: 0;
}
.made-with-mk .brand,
.made-with-mk .made-with {
  float: left;
}
.made-with-mk .brand {
  position: relative;
  top: 4px;
  left: -1px;
  letter-spacing: 1px;
  vertical-align: middle;
  font-size: 16px;
  font-weight: 600;
}
.made-with-mk .made-with {
  color: rgba(255, 255, 255, 0.6);
  position: absolute;
  left: 58px;
  top: 14px;
  opacity: 0;
  margin: 0;
  -webkit-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
  -moz-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
  -o-transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
  transition: 0.55s cubic-bezier(0.6, 0, 0.4, 1);
}
.made-with-mk .made-with strong {
  font-weight: 400;
  color: rgba(255, 255, 255, 0.9);
}

.wizard-container {
  padding-top: 100px;
  z-index: 3;
}
.wizard-container .wizard-navigation {
  position: relative;
}

h1, .h1 {
  font-size: 3.8em;
  line-height: 1.15em;
}

h2, .h2 {
  font-size: 2.6em;
}

h3, .h3 {
  /*font-size: 1.825em;*/
  /*line-height: 1.4em;*/
  margin: 20px 0 10px;
}

h4, .h4 {
  /*font-size: 1.3em;*/
  /*line-height: 1.4em;*/
}

h5, .h5 {
  /*font-size: 1.25em;*/
  /*line-height: 1.4em;*/
 
}

h6, .h6 {
  /*font-size: 0.9em; */
}

.title,
.card-title,
.wizard-title {
  font-weight: 700;
}

.title,
.title a,
.card-title,
.card-title a,
.wizard-title,
.wizard-title a {
  color: #3C4858;
  text-decoration: none;
}

h2.title {
  margin-bottom: 30px;
}

.description,
.card-description,
.footer-big p {
  color: #999999;
}

.text-warning {
  color: #ff9800;
}

.text-primary {
  color: #9c27b0;
}

.text-danger {
  color: #f44336;
}

.text-success {
  color: #4caf50;
}

.text-info {
  color: #00bcd4;
}

.card {
  background-color: #FFFFFF;
  padding: 10px 0;
  width: 100%;
  border-radius: 6px;
  color: rgba(0,0,0, 0.87);
  background: #fff;
}

.wizard-card {
  min-height: 410px;
  box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}
.wizard-card .picture-container {
  position: relative;
  cursor: pointer;
  text-align: center;
}
.wizard-card .picture {
  width: 106px;
  height: 106px;
  background-color: #999999;
  border: 4px solid #CCCCCC;
  color: #FFFFFF;
  border-radius: 50%;
  margin: 5px auto;
  overflow: hidden;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
}
.wizard-card .picture:hover {
  border-color: #2ca8ff;
}
.wizard-card[data-color="purple"] .moving-tab {
  position: absolute;
  text-align: center;
  padding: 12px;
  font-size: 12px;
  text-transform: uppercase;
  -webkit-font-smoothing: subpixel-antialiased;
  background-color: #9c27b0;
  top: -4px;
  left: 0px;
  border-radius: 4px;
  color: #FFFFFF;
  cursor: pointer;
  font-weight: 500;
  box-shadow: 0 16px 26px -10px rgba(156, 39, 176, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(156, 39, 176, 0.2);
}
.wizard-card[data-color="purple"] .picture:hover {
  border-color: #9c27b0;
}


.wizard-card[data-color="purple"] .form-group .form-control {
  background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#D2D2D2, #D2D2D2);
}
.wizard-card[data-color="purple"] .checkbox input[type=checkbox]:checked + .checkbox-material .check {
  background-color: #9c27b0;
}
.wizard-card[data-color="purple"] .radio input[type=radio]:checked ~ .check {
  background-color: #9c27b0;
}
.wizard-card[data-color="purple"] .radio input[type=radio]:checked ~ .circle {
  border-color: #9c27b0;
}
.wizard-card[data-color="green"] .moving-tab {
  position: absolute;
  text-align: center;
  padding: 12px;
  font-size: 12px;
  text-transform: uppercase;
  -webkit-font-smoothing: subpixel-antialiased;
  background-color: #4caf50;
  top: -4px;
  left: 0px;
  border-radius: 4px;
  color: #FFFFFF;
  cursor: pointer;
  font-weight: 500;
  box-shadow: 0 16px 26px -10px rgba(76, 175, 80, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(76, 175, 80, 0.2);
}
.wizard-card[data-color="green"] .picture:hover {
  border-color: #4caf50;
}
.wizard-card[data-color="green"] .choice:hover .icon, .wizard-card[data-color="green"] .choice.active .icon {
  border-color: #4caf50;
  color: #4caf50;
}
.wizard-card[data-color="green"] .form-group .form-control {
  background-image: linear-gradient(#4caf50, #4caf50), linear-gradient(#D2D2D2, #D2D2D2);
}
.wizard-card[data-color="green"] .checkbox input[type=checkbox]:checked + .checkbox-material .check {
  background-color: #4caf50;
}
.wizard-card[data-color="green"] .radio input[type=radio]:checked ~ .check {
  background-color: #4caf50;
}
.wizard-card[data-color="green"] .radio input[type=radio]:checked ~ .circle {
  border-color: #4caf50;
}
.wizard-card[data-color="blue"] .moving-tab {
  position: absolute;
  text-align: center;
  padding: 12px;
  font-size: 12px;
  text-transform: uppercase;
  -webkit-font-smoothing: subpixel-antialiased;
  background-color: #00bcd4;
  top: -4px;
  left: 0px;
  border-radius: 4px;
  color: #FFFFFF;
  cursor: pointer;
  font-weight: 500;
  box-shadow: 0 16px 26px -10px rgba(0, 188, 212, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 188, 212, 0.2);
}
.wizard-card[data-color="blue"] .picture:hover {
  border-color: #00bcd4;
}
.wizard-card[data-color="blue"] .choice:hover .icon, .wizard-card[data-color="blue"] .choice.active .icon {
  border-color: #00bcd4;
  color: #00bcd4;
}
.wizard-card[data-color="blue"] .form-group .form-control {
  background-image: linear-gradient(#00bcd4, #00bcd4), linear-gradient(#D2D2D2, #D2D2D2);
}
.wizard-card[data-color="blue"] .checkbox input[type=checkbox]:checked + .checkbox-material .check {
  background-color: #00bcd4;
}
.wizard-card[data-color="blue"] .radio input[type=radio]:checked ~ .check {
  background-color: #00bcd4;
}
.wizard-card[data-color="blue"] .radio input[type=radio]:checked ~ .circle {
  border-color: #00bcd4;
}
.wizard-card[data-color="orange"] .moving-tab {
  position: absolute;
  text-align: center;
  padding: 12px;
  font-size: 12px;
  text-transform: uppercase;
  -webkit-font-smoothing: subpixel-antialiased;
  background-color: #ff9800;
  top: -4px;
  left: 0px;
  border-radius: 4px;
  color: #FFFFFF;
  cursor: pointer;
  font-weight: 500;
  box-shadow: 0 16px 26px -10px rgba(255, 152, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(255, 152, 0, 0.2);
}
.wizard-card[data-color="orange"] .picture:hover {
  border-color: #ff9800;
}
.wizard-card[data-color="orange"] .choice:hover .icon, .wizard-card[data-color="orange"] .choice.active .icon {
  border-color: #ff9800;
  color: #ff9800;
}
.wizard-card[data-color="orange"] .form-group .form-control {
  background-image: linear-gradient(#ff9800, #ff9800), linear-gradient(#D2D2D2, #D2D2D2);
}
.wizard-card[data-color="orange"] .checkbox input[type=checkbox]:checked + .checkbox-material .check {
  background-color: #ff9800;
}
.wizard-card[data-color="orange"] .radio input[type=radio]:checked ~ .check {
  background-color: #ff9800;
}
.wizard-card[data-color="orange"] .radio input[type=radio]:checked ~ .circle {
  border-color: #ff9800;
}
.wizard-card[data-color="red"] .moving-tab {
  position: absolute;
  text-align: center;
  padding: 12px;
  font-size: 12px;
  text-transform: uppercase;
  -webkit-font-smoothing: subpixel-antialiased;
  background-color: #f44336;
  top: -4px;
  left: 0px;
  border-radius: 4px;
  color: #FFFFFF;
  cursor: pointer;
  font-weight: 500;
  box-shadow: 0 16px 26px -10px rgba(244, 67, 54, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(244, 67, 54, 0.2);
}
.wizard-card[data-color="red"] .picture:hover {
  border-color: #f44336;
}
.wizard-card[data-color="red"] .choice:hover .icon, .wizard-card[data-color="red"] .choice.active .icon {
  border-color: #f44336;
  color: #f44336;
}
.wizard-card[data-color="red"] .form-group .form-control {
  background-image: linear-gradient(#f44336, #f44336), linear-gradient(#D2D2D2, #D2D2D2);
}
.wizard-card[data-color="red"] .checkbox input[type=checkbox]:checked + .checkbox-material .check {
  background-color: #f44336;
}
.wizard-card[data-color="red"] .radio input[type=radio]:checked ~ .check {
  background-color: #f44336;
}
.wizard-card[data-color="red"] .radio input[type=radio]:checked ~ .circle {
  border-color: #f44336;
}
.wizard-card .picture input[type="file"] {
  cursor: pointer;
  display: block;
  height: 100%;
  left: 0;
  opacity: 0 !important;
  position: absolute;
  top: 0;
  width: 100%;
}
.wizard-card .picture-src {
  width: 100%;
}
.wizard-card .tab-content {
  min-height: 340px;
  padding: 20px 15px;
}
.wizard-card .disabled {
  display: none;
}
.wizard-card .wizard-header {
  text-align: center;
  padding: 25px 0 35px;
}
.wizard-card .wizard-header h5 {
  margin: 5px 0 0;
}
.wizard-card .nav-pills > li {
  text-align: center;
}
.wizard-card .btn {
  text-transform: uppercase;
}
.wizard-card .info-text {
  text-align: center;
  font-weight: 300;
  margin: 10px 0 30px;
}
.wizard-card .choice {
  text-align: center;
  cursor: pointer;
  margin-top: 20px;
}
.wizard-card .choice .icon {
  text-align: center;
  vertical-align: middle;
  height: 116px;
  width: 116px;
  border-radius: 50%;
  color: #999999;
  margin: 0 auto 20px;
  border: 4px solid #CCCCCC;
  transition: all 0.2s;
  -webkit-transition: all 0.2s;
}
.wizard-card .choice i {
  font-size: 40px;
  line-height: 111px;
}
.wizard-card .choice:hover .icon, .wizard-card .choice.active .icon {
  border-color: #2ca8ff;
}
.wizard-card .choice input[type="radio"],
.wizard-card .choice input[type="checkbox"] {
  position: absolute;
  left: -10000px;
  z-index: -1;
}
.wizard-card .btn-finish {
  display: none;
}
.wizard-card .description {
  color: #999999;
  font-size: 14px;
}
.wizard-card .wizard-title {
  margin: 0;
}

legend {
  margin-bottom: 20px;
  font-size: 21px;
}

output {
  padding-top: 8px;
  font-size: 14px;
  line-height: 1.42857;
}

.form-control {
  height: 36px;
  padding: 7px 0;
  font-size: 14px;
  line-height: 1.42857;
}

@media  screen and (-webkit-min-device-pixel-ratio: 0) {
  input[type="date"].form-control,
  input[type="time"].form-control,
  input[type="datetime-local"].form-control,
  input[type="month"].form-control {
    line-height: 36px;
  }
  input[type="date"].input-sm, .input-group-sm input[type="date"],
  input[type="time"].input-sm, .input-group-sm
  input[type="time"],
  input[type="datetime-local"].input-sm, .input-group-sm
  input[type="datetime-local"],
  input[type="month"].input-sm, .input-group-sm
  input[type="month"] {
    line-height: 24px;
  }
  input[type="date"].input-lg, .input-group-lg input[type="date"],
  input[type="time"].input-lg, .input-group-lg
  input[type="time"],
  input[type="datetime-local"].input-lg, .input-group-lg
  input[type="datetime-local"],
  input[type="month"].input-lg, .input-group-lg
  input[type="month"] {
    line-height: 44px;
  }
}
.radio label,
.checkbox label {
  min-height: 20px;
}

.form-control-static {
  padding-top: 8px;
  padding-bottom: 8px;
  min-height: 34px;
}

.input-sm .input-sm {
  height: 24px;
  padding: 3px 0;
  font-size: 11px;
  line-height: 1.5;
  border-radius: 0;
}
.input-sm select.input-sm {
  height: 24px;
  line-height: 24px;
}
.input-sm textarea.input-sm,
.input-sm select[multiple].input-sm {
  height: auto;
}

.form-group-sm .form-control {
  height: 24px;
  padding: 3px 0;
  font-size: 11px;
  line-height: 1.5;
}
.form-group-sm select.form-control {
  height: 24px;
  line-height: 24px;
}
.form-group-sm textarea.form-control,
.form-group-sm select[multiple].form-control {
  height: auto;
}
.form-group-sm .form-control-static {
  height: 24px;
  min-height: 31px;
  padding: 4px 0;
  font-size: 11px;
  line-height: 1.5;
}

.input-lg .input-lg {
  height: 44px;
  padding: 9px 0;
  font-size: 18px;
  line-height: 1.33333;
  border-radius: 0;
}
.input-lg select.input-lg {
  height: 44px;
  line-height: 44px;
}
.input-lg textarea.input-lg,
.input-lg select[multiple].input-lg {
  height: auto;
}

.form-group-lg .form-control {
  height: 44px;
  padding: 9px 0;
  font-size: 18px;
  line-height: 1.33333;
}
.form-group-lg select.form-control {
  height: 44px;
  line-height: 44px;
}
.form-group-lg textarea.form-control,
.form-group-lg select[multiple].form-control {
  height: auto;
}
.form-group-lg .form-control-static {
  height: 44px;
  min-height: 38px;
  padding: 10px 0;
  font-size: 18px;
  line-height: 1.33333;
}

.form-horizontal .radio,
.form-horizontal .checkbox,
.form-horizontal .radio-inline,
.form-horizontal .checkbox-inline {
  padding-top: 8px;
}
.form-horizontal .radio,
.form-horizontal .checkbox {
  min-height: 28px;
}
@media (min-width: 768px) {
  .form-horizontal .control-label {
    padding-top: 8px;
  }
}
@media (min-width: 768px) {
  .form-horizontal .form-group-lg .control-label {
    padding-top: 13.0px;
    font-size: 18px;
  }
}
@media (min-width: 768px) {
  .form-horizontal .form-group-sm .control-label {
    padding-top: 4px;
    font-size: 11px;
  }
}

.label {
  border-radius: 3px;
}
.label, .label.label-default {
  background-color: #FFFFFF;
}
.label.label-inverse {
  background-color: #212121;
}
.label.label-primary {
  background-color: #9c27b0;
}
.label.label-success {
  background-color: #4caf50;
}
.label.label-info {
  background-color: #00bcd4;
}
.label.label-warning {
  background-color: #ff9800;
}
.label.label-danger {
  background-color: #f44336;
}
.label.label-rose {
  background-color: #e91e63;
}

.form-control,
.form-group .form-control {
  border: 0;
  background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#D2D2D2, #D2D2D2);
  background-size: 0 2px, 100% 1px;
  background-repeat: no-repeat;
  background-position: center bottom, center calc(100% - 1px);
  background-color: transparent;
  transition: background 0s ease-out;
  float: none;
  box-shadow: none;
  border-radius: 0;
  font-weight: 400;
}
.form-control::-moz-placeholder,
.form-group .form-control::-moz-placeholder {
  color: #AAAAAA;
  font-weight: 400;
}
.form-control:-ms-input-placeholder,
.form-group .form-control:-ms-input-placeholder {
  color: #AAAAAA;
  font-weight: 400;
}
.form-control::-webkit-input-placeholder,
.form-group .form-control::-webkit-input-placeholder {
  color: #AAAAAA;
  font-weight: 400;
}
.form-control[readonly], .form-control[disabled], fieldset[disabled] .form-control,
.form-group .form-control[readonly],
.form-group .form-control[disabled], fieldset[disabled]
.form-group .form-control {
  background-color: transparent;
}
.form-control[disabled], fieldset[disabled] .form-control,
.form-group .form-control[disabled], fieldset[disabled]
.form-group .form-control {
  background-image: none;
  border-bottom: 1px dotted #D2D2D2;
}

.form-group {
  position: relative;
}
.form-group.label-static label.control-label, .form-group.label-placeholder label.control-label, .form-group.label-floating label.control-label {
  position: absolute;
  pointer-events: none;
  transition: 0.3s ease all;
}
.form-group.label-floating label.control-label {
  will-change: left, top, contents;
}
.form-group.label-placeholder:not(.is-empty) label.control-label {
  display: none;
}
.form-group .help-block {
  position: absolute;
  display: none;
}
.form-group.is-focused .form-control {
  outline: none;
  background-image: linear-gradient(#9c27b0, #9c27b0), linear-gradient(#D2D2D2, #D2D2D2);
  background-size: 100% 2px, 100% 1px;
  box-shadow: none;
  transition-duration: 0.3s;
}
.form-group.is-focused .form-control .material-input:after {
  background-color: #9c27b0;
}
.form-group.is-focused.form-info .form-control {
  background-image: linear-gradient(#00bcd4, #00bcd4), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.is-focused.form-success .form-control {
  background-image: linear-gradient(#4caf50, #4caf50), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.is-focused.form-warning .form-control {
  background-image: linear-gradient(#ff9800, #ff9800), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.is-focused.form-danger .form-control {
  background-image: linear-gradient(#f44336, #f44336), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.is-focused.form-rose .form-control {
  background-image: linear-gradient(#e91e63, #e91e63), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.is-focused.form-white .form-control {
  background-image: linear-gradient(#FFFFFF, #FFFFFF), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.is-focused.label-placeholder label,
.form-group.is-focused.label-placeholder label.control-label {
  color: #AAAAAA;
}
.form-group.is-focused .help-block {
  display: block;
}
.form-group.has-warning .form-control {
  box-shadow: none;
}
.form-group.has-warning.is-focused .form-control {
  background-image: linear-gradient(#ff9800, #ff9800), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.has-warning label.control-label,
.form-group.has-warning .help-block {
  color: #ff9800;
}
.form-group.has-error .form-control {
  box-shadow: none;
}
.form-group.has-error.is-focused .form-control {
  background-image: linear-gradient(#f44336, #f44336), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.has-error label.control-label,
.form-group.has-error .help-block {
  color: #f44336;
}
.form-group.has-success .form-control {
  box-shadow: none;
}
.form-group.has-success.is-focused .form-control {
  background-image: linear-gradient(#4caf50, #4caf50), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.has-success label.control-label,
.form-group.has-success .help-block {
  color: #4caf50;
}
.form-group.has-info .form-control {
  box-shadow: none;
}
.form-group.has-info.is-focused .form-control {
  background-image: linear-gradient(#00bcd4, #00bcd4), linear-gradient(#D2D2D2, #D2D2D2);
}
.form-group.has-info label.control-label,
.form-group.has-info .help-block {
  color: #00bcd4;
}
.form-group textarea {
  resize: none;
}
.form-group textarea ~ .form-control-highlight {
  margin-top: -11px;
}
.form-group select {
  appearance: none;
}
.form-group select ~ .material-input:after {
  display: none;
}

.form-control {
  margin-bottom: 7px;
}
.form-control::-moz-placeholder {
  font-size: 14px;
  line-height: 1.42857;
  color: #AAAAAA;
  font-weight: 400;
}
.form-control:-ms-input-placeholder {
  font-size: 14px;
  line-height: 1.42857;
  color: #AAAAAA;
  font-weight: 400;
}
.form-control::-webkit-input-placeholder {
  font-size: 14px;
  line-height: 1.42857;
  color: #AAAAAA;
  font-weight: 400;
}

.checkbox label,
.radio label,
label {
  font-size: 14px;
  line-height: 1.42857;
  color: #AAAAAA;
  font-weight: 400;
}

label.control-label {
  font-size: 11px;
  line-height: 1.07143;
  color: #AAAAAA;
  font-weight: 400;
  margin: 16px 0 0 0;
}

.help-block {
  margin-top: 0;
  font-size: 11px;
}

.form-group {
  padding-bottom: 7px;
  margin: 27px 0 0 0;
}
.form-group .form-control {
  margin-bottom: 7px;
}
.form-group .form-control::-moz-placeholder {
  font-size: 14px;
  line-height: 1.42857;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group .form-control:-ms-input-placeholder {
  font-size: 14px;
  line-height: 1.42857;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group .form-control::-webkit-input-placeholder {
  font-size: 14px;
  line-height: 1.42857;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group .checkbox label,
.form-group .radio label,
.form-group label {
  font-size: 14px;
  line-height: 1.42857;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group label.control-label {
  font-size: 11px;
  line-height: 1.07143;
  color: #AAAAAA;
  font-weight: 400;
  margin: 16px 0 0 0;
}
.form-group .help-block {
  margin-top: 0;
  font-size: 11px;
}
.form-group.label-floating label.control-label, .form-group.label-placeholder label.control-label {
  top: -7px;
  font-size: 14px;
  line-height: 1.42857;
}
.form-group.label-static label.control-label, .form-group.label-floating.is-focused label.control-label, .form-group.label-floating:not(.is-empty) label.control-label {
  top: -28px;
  left: 0;
  font-size: 11px;
  line-height: 1.07143;
}
.form-group.label-floating input.form-control:-webkit-autofill ~ label.control-label label.control-label {
  top: -28px;
  left: 0;
  font-size: 11px;
  line-height: 1.07143;
}

.form-group.form-group-sm {
  padding-bottom: 3px;
  margin: 21px 0 0 0;
}
.form-group.form-group-sm .form-control {
  margin-bottom: 3px;
}
.form-group.form-group-sm .form-control::-moz-placeholder {
  font-size: 11px;
  line-height: 1.5;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group.form-group-sm .form-control:-ms-input-placeholder {
  font-size: 11px;
  line-height: 1.5;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group.form-group-sm .form-control::-webkit-input-placeholder {
  font-size: 11px;
  line-height: 1.5;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group.form-group-sm .checkbox label,
.form-group.form-group-sm .radio label,
.form-group.form-group-sm label {
  font-size: 11px;
  line-height: 1.5;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group.form-group-sm label.control-label {
  font-size: 9px;
  line-height: 1.125;
  color: #AAAAAA;
  font-weight: 400;
  margin: 16px 0 0 0;
}
.form-group.form-group-sm .help-block {
  margin-top: 0;
  font-size: 9px;
}
.form-group.form-group-sm.label-floating label.control-label, .form-group.form-group-sm.label-placeholder label.control-label {
  top: -11px;
  font-size: 11px;
  line-height: 1.5;
}
.form-group.form-group-sm.label-static label.control-label, .form-group.form-group-sm.label-floating.is-focused label.control-label, .form-group.form-group-sm.label-floating:not(.is-empty) label.control-label {
  top: -25px;
  left: 0;
  font-size: 9px;
  line-height: 1.125;
}
.form-group.form-group-sm.label-floating input.form-control:-webkit-autofill ~ label.control-label label.control-label {
  top: -25px;
  left: 0;
  font-size: 9px;
  line-height: 1.125;
}

.form-group.form-group-lg {
  padding-bottom: 9px;
  margin: 30px 0 0 0;
}
.form-group.form-group-lg .form-control {
  margin-bottom: 9px;
}
.form-group.form-group-lg .form-control::-moz-placeholder {
  font-size: 18px;
  line-height: 1.33333;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group.form-group-lg .form-control:-ms-input-placeholder {
  font-size: 18px;
  line-height: 1.33333;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group.form-group-lg .form-control::-webkit-input-placeholder {
  font-size: 18px;
  line-height: 1.33333;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group.form-group-lg .checkbox label,
.form-group.form-group-lg .radio label,
.form-group.form-group-lg label {
  font-size: 18px;
  line-height: 1.33333;
  color: #AAAAAA;
  font-weight: 400;
}
.form-group.form-group-lg label.control-label {
  font-size: 14px;
  line-height: 1.0;
  color: #AAAAAA;
  font-weight: 400;
  margin: 16px 0 0 0;
}
.form-group.form-group-lg .help-block {
  margin-top: 0;
  font-size: 14px;
}
.form-group.form-group-lg.label-floating label.control-label, .form-group.form-group-lg.label-placeholder label.control-label {
  top: -5px;
  font-size: 18px;
  line-height: 1.33333;
}
.form-group.form-group-lg.label-static label.control-label, .form-group.form-group-lg.label-floating.is-focused label.control-label, .form-group.form-group-lg.label-floating:not(.is-empty) label.control-label {
  top: -32px;
  left: 0;
  font-size: 14px;
  line-height: 1.0;
}
.form-group.form-group-lg.label-floating input.form-control:-webkit-autofill ~ label.control-label label.control-label {
  top: -32px;
  left: 0;
  font-size: 14px;
  line-height: 1.0;
}

select.form-control {
  border: 0;
  box-shadow: none;
  border-radius: 0;
}
.form-group.is-focused select.form-control {
  box-shadow: none;
  border-color: #D2D2D2;
}
select.form-control[multiple], .form-group.is-focused select.form-control[multiple] {
  height: 85px;
}

.input-group-btn .btn {
  margin: 0 0 7px 0;
}

.form-group.form-group-sm .input-group-btn .btn {
  margin: 0 0 3px 0;
}
.form-group.form-group-lg .input-group-btn .btn {
  margin: 0 0 9px 0;
}

.input-group .input-group-btn {
  padding: 0 12px;
}
.input-group .input-group-addon {
  border: 0;
  background: transparent;
  padding: 6px 15px 0px;
}

.form-group input[type=file] {
  opacity: 0;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 100;
}

.form-control-feedback {
  opacity: 0;
}
.has-success .form-control-feedback {
  color: #4caf50;
  opacity: 1;
}
.has-error .form-control-feedback {
  color: #f44336;
  opacity: 1;
}

.btn {
  border: none;
  border-radius: 3px;
  position: relative;
  padding: 12px 30px;
  margin: 10px 1px;
  font-size: 12px;
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 0;
  will-change: box-shadow, transform;
  transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}
.btn::-moz-focus-inner {
  border: 0;
}
.btn, .btn.btn-default {
  box-shadow: 0 2px 2px 0 rgba(153, 153, 153, 0.14), 0 3px 1px -2px rgba(153, 153, 153, 0.2), 0 1px 5px 0 rgba(153, 153, 153, 0.12);
}
.btn, .btn:hover, .btn:focus, .btn:active, .btn.active, .btn:active:focus, .btn:active:hover, .btn.active:focus, .btn.active:hover, .open > .btn.dropdown-toggle, .open > .btn.dropdown-toggle:focus, .open > .btn.dropdown-toggle:hover, .btn.btn-default, .btn.btn-default:hover, .btn.btn-default:focus, .btn.btn-default:active, .btn.btn-default.active, .btn.btn-default:active:focus, .btn.btn-default:active:hover, .btn.btn-default.active:focus, .btn.btn-default.active:hover, .open > .btn.btn-default.dropdown-toggle, .open > .btn.btn-default.dropdown-toggle:focus, .open > .btn.btn-default.dropdown-toggle:hover {
  background-color: #999999;
  color: #FFFFFF;
}
.btn:focus, .btn:active, .btn:hover, .btn.btn-default:focus, .btn.btn-default:active, .btn.btn-default:hover {
  box-shadow: 0 14px 26px -12px rgba(153, 153, 153, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(153, 153, 153, 0.2);
}
.btn.disabled, .btn.disabled:hover, .btn.disabled:focus, .btn.disabled.focus, .btn.disabled:active, .btn.disabled.active, .btn:disabled, .btn:disabled:hover, .btn:disabled:focus, .btn:disabled.focus, .btn:disabled:active, .btn:disabled.active, .btn[disabled], .btn[disabled]:hover, .btn[disabled]:focus, .btn[disabled].focus, .btn[disabled]:active, .btn[disabled].active, fieldset[disabled] .btn, fieldset[disabled] .btn:hover, fieldset[disabled] .btn:focus, fieldset[disabled] .btn.focus, fieldset[disabled] .btn:active, fieldset[disabled] .btn.active, .btn.btn-default.disabled, .btn.btn-default.disabled:hover, .btn.btn-default.disabled:focus, .btn.btn-default.disabled.focus, .btn.btn-default.disabled:active, .btn.btn-default.disabled.active, .btn.btn-default:disabled, .btn.btn-default:disabled:hover, .btn.btn-default:disabled:focus, .btn.btn-default:disabled.focus, .btn.btn-default:disabled:active, .btn.btn-default:disabled.active, .btn.btn-default[disabled], .btn.btn-default[disabled]:hover, .btn.btn-default[disabled]:focus, .btn.btn-default[disabled].focus, .btn.btn-default[disabled]:active, .btn.btn-default[disabled].active, fieldset[disabled] .btn.btn-default, fieldset[disabled] .btn.btn-default:hover, fieldset[disabled] .btn.btn-default:focus, fieldset[disabled] .btn.btn-default.focus, fieldset[disabled] .btn.btn-default:active, fieldset[disabled] .btn.btn-default.active {
  box-shadow: none;
}
.btn.btn-simple, .btn.btn-default.btn-simple {
  background-color: transparent;
  color: #999999;
  box-shadow: none;
}
.btn.btn-simple:hover, .btn.btn-simple:focus, .btn.btn-simple:active, .btn.btn-default.btn-simple:hover, .btn.btn-default.btn-simple:focus, .btn.btn-default.btn-simple:active {
  background-color: transparent;
  color: #999999;
}
.btn.btn-primary {
  box-shadow: 0 2px 2px 0 rgba(156, 39, 176, 0.14), 0 3px 1px -2px rgba(156, 39, 176, 0.2), 0 1px 5px 0 rgba(156, 39, 176, 0.12);
}
.btn.btn-primary, .btn.btn-primary:hover, .btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary.active, .btn.btn-primary:active:focus, .btn.btn-primary:active:hover, .btn.btn-primary.active:focus, .btn.btn-primary.active:hover, .open > .btn.btn-primary.dropdown-toggle, .open > .btn.btn-primary.dropdown-toggle:focus, .open > .btn.btn-primary.dropdown-toggle:hover {
  background-color: #9c27b0;
  color: #FFFFFF;
}
.btn.btn-primary:focus, .btn.btn-primary:active, .btn.btn-primary:hover {
  box-shadow: 0 14px 26px -12px rgba(156, 39, 176, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(156, 39, 176, 0.2);
}
.btn.btn-primary.disabled, .btn.btn-primary.disabled:hover, .btn.btn-primary.disabled:focus, .btn.btn-primary.disabled.focus, .btn.btn-primary.disabled:active, .btn.btn-primary.disabled.active, .btn.btn-primary:disabled, .btn.btn-primary:disabled:hover, .btn.btn-primary:disabled:focus, .btn.btn-primary:disabled.focus, .btn.btn-primary:disabled:active, .btn.btn-primary:disabled.active, .btn.btn-primary[disabled], .btn.btn-primary[disabled]:hover, .btn.btn-primary[disabled]:focus, .btn.btn-primary[disabled].focus, .btn.btn-primary[disabled]:active, .btn.btn-primary[disabled].active, fieldset[disabled] .btn.btn-primary, fieldset[disabled] .btn.btn-primary:hover, fieldset[disabled] .btn.btn-primary:focus, fieldset[disabled] .btn.btn-primary.focus, fieldset[disabled] .btn.btn-primary:active, fieldset[disabled] .btn.btn-primary.active {
  box-shadow: none;
}
.btn.btn-primary.btn-simple {
  background-color: transparent;
  color: #9c27b0;
  box-shadow: none;
}
.btn.btn-primary.btn-simple:hover, .btn.btn-primary.btn-simple:focus, .btn.btn-primary.btn-simple:active {
  background-color: transparent;
  color: #9c27b0;
}
.btn.btn-info {
  box-shadow: 0 2px 2px 0 rgba(0, 188, 212, 0.14), 0 3px 1px -2px rgba(0, 188, 212, 0.2), 0 1px 5px 0 rgba(0, 188, 212, 0.12);
}
.btn.btn-info, .btn.btn-info:hover, .btn.btn-info:focus, .btn.btn-info:active, .btn.btn-info.active, .btn.btn-info:active:focus, .btn.btn-info:active:hover, .btn.btn-info.active:focus, .btn.btn-info.active:hover, .open > .btn.btn-info.dropdown-toggle, .open > .btn.btn-info.dropdown-toggle:focus, .open > .btn.btn-info.dropdown-toggle:hover {
  background-color: #00bcd4;
  color: #FFFFFF;
}
.btn.btn-info:focus, .btn.btn-info:active, .btn.btn-info:hover {
  box-shadow: 0 14px 26px -12px rgba(0, 188, 212, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 188, 212, 0.2);
}
.btn.btn-info.disabled, .btn.btn-info.disabled:hover, .btn.btn-info.disabled:focus, .btn.btn-info.disabled.focus, .btn.btn-info.disabled:active, .btn.btn-info.disabled.active, .btn.btn-info:disabled, .btn.btn-info:disabled:hover, .btn.btn-info:disabled:focus, .btn.btn-info:disabled.focus, .btn.btn-info:disabled:active, .btn.btn-info:disabled.active, .btn.btn-info[disabled], .btn.btn-info[disabled]:hover, .btn.btn-info[disabled]:focus, .btn.btn-info[disabled].focus, .btn.btn-info[disabled]:active, .btn.btn-info[disabled].active, fieldset[disabled] .btn.btn-info, fieldset[disabled] .btn.btn-info:hover, fieldset[disabled] .btn.btn-info:focus, fieldset[disabled] .btn.btn-info.focus, fieldset[disabled] .btn.btn-info:active, fieldset[disabled] .btn.btn-info.active {
  box-shadow: none;
}
.btn.btn-info.btn-simple {
  background-color: transparent;
  color: #00bcd4;
  box-shadow: none;
}
.btn.btn-info.btn-simple:hover, .btn.btn-info.btn-simple:focus, .btn.btn-info.btn-simple:active {
  background-color: transparent;
  color: #00bcd4;
}
.btn.btn-success {
  box-shadow: 0 2px 2px 0 rgba(76, 175, 80, 0.14), 0 3px 1px -2px rgba(76, 175, 80, 0.2), 0 1px 5px 0 rgba(76, 175, 80, 0.12);
}
.btn.btn-success, .btn.btn-success:hover, .btn.btn-success:focus, .btn.btn-success:active, .btn.btn-success.active, .btn.btn-success:active:focus, .btn.btn-success:active:hover, .btn.btn-success.active:focus, .btn.btn-success.active:hover, .open > .btn.btn-success.dropdown-toggle, .open > .btn.btn-success.dropdown-toggle:focus, .open > .btn.btn-success.dropdown-toggle:hover {
  background-color: #4caf50;
  color: #FFFFFF;
}
.btn.btn-success:focus, .btn.btn-success:active, .btn.btn-success:hover {
  box-shadow: 0 14px 26px -12px rgba(76, 175, 80, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(76, 175, 80, 0.2);
}
.btn.btn-success.disabled, .btn.btn-success.disabled:hover, .btn.btn-success.disabled:focus, .btn.btn-success.disabled.focus, .btn.btn-success.disabled:active, .btn.btn-success.disabled.active, .btn.btn-success:disabled, .btn.btn-success:disabled:hover, .btn.btn-success:disabled:focus, .btn.btn-success:disabled.focus, .btn.btn-success:disabled:active, .btn.btn-success:disabled.active, .btn.btn-success[disabled], .btn.btn-success[disabled]:hover, .btn.btn-success[disabled]:focus, .btn.btn-success[disabled].focus, .btn.btn-success[disabled]:active, .btn.btn-success[disabled].active, fieldset[disabled] .btn.btn-success, fieldset[disabled] .btn.btn-success:hover, fieldset[disabled] .btn.btn-success:focus, fieldset[disabled] .btn.btn-success.focus, fieldset[disabled] .btn.btn-success:active, fieldset[disabled] .btn.btn-success.active {
  box-shadow: none;
}
.btn.btn-success.btn-simple {
  background-color: transparent;
  color: #4caf50;
  box-shadow: none;
}
.btn.btn-success.btn-simple:hover, .btn.btn-success.btn-simple:focus, .btn.btn-success.btn-simple:active {
  background-color: transparent;
  color: #4caf50;
}
.btn.btn-warning {
  box-shadow: 0 2px 2px 0 rgba(255, 152, 0, 0.14), 0 3px 1px -2px rgba(255, 152, 0, 0.2), 0 1px 5px 0 rgba(255, 152, 0, 0.12);
}
.btn.btn-warning, .btn.btn-warning:hover, .btn.btn-warning:focus, .btn.btn-warning:active, .btn.btn-warning.active, .btn.btn-warning:active:focus, .btn.btn-warning:active:hover, .btn.btn-warning.active:focus, .btn.btn-warning.active:hover, .open > .btn.btn-warning.dropdown-toggle, .open > .btn.btn-warning.dropdown-toggle:focus, .open > .btn.btn-warning.dropdown-toggle:hover {
  background-color: #ff9800;
  color: #FFFFFF;
}
.btn.btn-warning:focus, .btn.btn-warning:active, .btn.btn-warning:hover {
  box-shadow: 0 14px 26px -12px rgba(255, 152, 0, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(255, 152, 0, 0.2);
}
.btn.btn-warning.disabled, .btn.btn-warning.disabled:hover, .btn.btn-warning.disabled:focus, .btn.btn-warning.disabled.focus, .btn.btn-warning.disabled:active, .btn.btn-warning.disabled.active, .btn.btn-warning:disabled, .btn.btn-warning:disabled:hover, .btn.btn-warning:disabled:focus, .btn.btn-warning:disabled.focus, .btn.btn-warning:disabled:active, .btn.btn-warning:disabled.active, .btn.btn-warning[disabled], .btn.btn-warning[disabled]:hover, .btn.btn-warning[disabled]:focus, .btn.btn-warning[disabled].focus, .btn.btn-warning[disabled]:active, .btn.btn-warning[disabled].active, fieldset[disabled] .btn.btn-warning, fieldset[disabled] .btn.btn-warning:hover, fieldset[disabled] .btn.btn-warning:focus, fieldset[disabled] .btn.btn-warning.focus, fieldset[disabled] .btn.btn-warning:active, fieldset[disabled] .btn.btn-warning.active {
  box-shadow: none;
}
.btn.btn-warning.btn-simple {
  background-color: transparent;
  color: #ff9800;
  box-shadow: none;
}
.btn.btn-warning.btn-simple:hover, .btn.btn-warning.btn-simple:focus, .btn.btn-warning.btn-simple:active {
  background-color: transparent;
  color: #ff9800;
}
.btn.btn-danger {
  box-shadow: 0 2px 2px 0 rgba(244, 67, 54, 0.14), 0 3px 1px -2px rgba(244, 67, 54, 0.2), 0 1px 5px 0 rgba(244, 67, 54, 0.12);
}
.btn.btn-danger, .btn.btn-danger:hover, .btn.btn-danger:focus, .btn.btn-danger:active, .btn.btn-danger.active, .btn.btn-danger:active:focus, .btn.btn-danger:active:hover, .btn.btn-danger.active:focus, .btn.btn-danger.active:hover, .open > .btn.btn-danger.dropdown-toggle, .open > .btn.btn-danger.dropdown-toggle:focus, .open > .btn.btn-danger.dropdown-toggle:hover {
  background-color: #f44336;
  color: #FFFFFF;
}
.btn.btn-danger:focus, .btn.btn-danger:active, .btn.btn-danger:hover {
  box-shadow: 0 14px 26px -12px rgba(244, 67, 54, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(244, 67, 54, 0.2);
}
.btn.btn-danger.disabled, .btn.btn-danger.disabled:hover, .btn.btn-danger.disabled:focus, .btn.btn-danger.disabled.focus, .btn.btn-danger.disabled:active, .btn.btn-danger.disabled.active, .btn.btn-danger:disabled, .btn.btn-danger:disabled:hover, .btn.btn-danger:disabled:focus, .btn.btn-danger:disabled.focus, .btn.btn-danger:disabled:active, .btn.btn-danger:disabled.active, .btn.btn-danger[disabled], .btn.btn-danger[disabled]:hover, .btn.btn-danger[disabled]:focus, .btn.btn-danger[disabled].focus, .btn.btn-danger[disabled]:active, .btn.btn-danger[disabled].active, fieldset[disabled] .btn.btn-danger, fieldset[disabled] .btn.btn-danger:hover, fieldset[disabled] .btn.btn-danger:focus, fieldset[disabled] .btn.btn-danger.focus, fieldset[disabled] .btn.btn-danger:active, fieldset[disabled] .btn.btn-danger.active {
  box-shadow: none;
}
.btn.btn-danger.btn-simple {
  background-color: transparent;
  color: #f44336;
  box-shadow: none;
}
.btn.btn-danger.btn-simple:hover, .btn.btn-danger.btn-simple:focus, .btn.btn-danger.btn-simple:active {
  background-color: transparent;
  color: #f44336;
}
.btn:focus, .btn:active, .btn:active:focus {
  outline: 0;
}
.btn.btn-round {
  border-radius: 30px;
}

.btn.btn-fab {
  border-radius: 50%;
  font-size: 24px;
  height: 56px;
  margin: auto;
  min-width: 56px;
  width: 56px;
  padding: 0;
  overflow: hidden;
  position: relative;
  line-height: normal;
}
.btn.btn-fab .ripple-container {
  border-radius: 50%;
}
.btn.btn-fab.btn-fab-mini, .btn-group-sm .btn.btn-fab {
  height: 40px;
  min-width: 40px;
  width: 40px;
}
.btn.btn-fab.btn-fab-mini.material-icons, .btn-group-sm .btn.btn-fab.material-icons {
  top: -3.5px;
  left: -3.5px;
}
.btn.btn-fab.btn-fab-mini .material-icons, .btn-group-sm .btn.btn-fab .material-icons {
  font-size: 17px;
}
.btn.btn-fab i.material-icons {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-12px, -12px);
  line-height: 24px;
  width: 24px;
  font-size: 24px;
}
.btn.btn-lg, .btn-group-lg .btn {
  font-size: 14px;
  padding: 18px 36px;
}
.btn.btn-sm, .btn-group-sm .btn {
  padding: 5px 20px;
  font-size: 11px;
}
.btn.btn-xs, .btn-group-xs .btn {
  padding: 4px 15px;
  font-size: 10px;
}
.btn.btn-just-icon {
  font-size: 18px;
  padding: 10px 10px;
  line-height: 1em;
}

.btn.btn-just-icon i {
  width: 20px;
}
.btn.btn-just-icon.btn-lg {
  font-size: 22px;
  padding: 13px 18px;
}

.btn .material-icons {
  vertical-align: middle;
  font-size: 17px;
  top: -1px;
  position: relative;
}

/*            Navigation menu                */
.nav-pills {
  background-color: rgba(200, 200, 200, 0.2);
}
.nav-pills > li + li {
  margin-left: 0;
}
.nav-pills > li > a {
  border: 0 !important;
  border-radius: 0;
  line-height: 18px;
  /*text-transform: uppercase;*/
  font-size: 12px;
  font-weight: 500;
  min-width: 100px;
  text-align: center;
  color: #555555 !important;
}
.nav-pills > li.active > a,
.nav-pills > li.active > a:hover,
.nav-pills > li.active > a:focus,
.nav-pills > li > a:hover,
.nav-pills > li > a:focus {
  background-color: inherit;
}
.nav-pills > li i {
  display: block;
  font-size: 30px;
  padding: 15px 0;
}

.popover, .tooltip-inner {
  color: #555555;
  line-height: 1.5em;
  background: #FFFFFF;
  border: none;
  border-radius: 3px;
  box-shadow: 0 8px 10px 1px rgba(0, 0, 0, 0.14), 0 3px 14px 2px rgba(0, 0, 0, 0.12), 0 5px 5px -3px rgba(0, 0, 0, 0.2);
}

.popover {
  padding: 0;
  box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
}
.popover.left > .arrow, .popover.right > .arrow, .popover.top > .arrow, .popover.bottom > .arrow {
  border: none;
}

.popover-title {
  background-color: #FFFFFF;
  border: none;
  padding: 15px 15px 5px;
  font-size: 1.3em;
}

.popover-content {
  padding: 10px 15px 15px;
  line-height: 1.4;
}

.tooltip.in {
  opacity: 1;
  -webkit-transform: translate3d(0, 0px, 0);
  -moz-transform: translate3d(0, 0px, 0);
  -o-transform: translate3d(0, 0px, 0);
  -ms-transform: translate3d(0, 0px, 0);
  transform: translate3d(0, 0px, 0);
}

.tooltip {
  opacity: 0;
  transition: opacity, transform .2s ease;
  -webkit-transform: translate3d(0, 5px, 0);
  -moz-transform: translate3d(0, 5px, 0);
  -o-transform: translate3d(0, 5px, 0);
  -ms-transform: translate3d(0, 5px, 0);
  transform: translate3d(0, 5px, 0);
}
.tooltip.left .tooltip-arrow {
  border-left-color: #FFFFFF;
}
.tooltip.right .tooltip-arrow {
  border-right-color: #FFFFFF;
}
.tooltip.top .tooltip-arrow {
  border-top-color: #FFFFFF;
}
.tooltip.bottom .tooltip-arrow {
  border-bottom-color: #FFFFFF;
}

.tooltip-inner {
  padding: 10px 15px;
  min-width: 130px;
}

.withripple {
  position: relative;
}

.ripple-container {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  width: 100%;
  height: 100%;
  overflow: hidden;
  border-radius: inherit;
  pointer-events: none;
}
.disabled .ripple-container {
  display: none;
}

.ripple {
  position: absolute;
  width: 20px;
  height: 20px;
  margin-left: -10px;
  margin-top: -10px;
  border-radius: 100%;
  background-color: #000;
  background-color: rgba(0, 0, 0, 0.05);
  transform: scale(1);
  transform-origin: 50%;
  opacity: 0;
  pointer-events: none;
}

.ripple.ripple-on {
  transition: opacity 0.15s ease-in 0s, transform 0.5s cubic-bezier(0.4, 0, 0.2, 1) 0.1s;
  opacity: 0.1;
}

.ripple.ripple-out {
  transition: opacity 0.1s linear 0s !important;
  opacity: 0;
}

.radio label {
  cursor: pointer;
  padding-left: 35px;
  position: relative;
  color: rgba(0,0,0, 0.26);
}
.form-group.is-focused .radio label {
  color: rgba(0,0,0, 0.26);
}
.form-group.is-focused .radio label:hover, .form-group.is-focused .radio label:focus {
  color: rgba(0,0,0, .54);
}
fieldset[disabled] .form-group.is-focused .radio label {
  color: rgba(0,0,0, 0.26);
}
.radio label span {
  display: block;
  position: absolute;
  left: 10px;
  top: 2px;
  transition-duration: 0.2s;
}
.radio label .circle {
  border: 1px solid rgba(0,0,0, .54);
  height: 15px;
  width: 15px;
  border-radius: 100%;
}
.radio label .check {
  height: 15px;
  width: 15px;
  border-radius: 100%;
  background-color: #9c27b0;
  transform: scale3d(0, 0, 0);
}
.radio label .check:after {
  display: block;
  position: absolute;
  content: "";
  background-color: rgba(0,0,0, 0.87);
  left: -18px;
  top: -18px;
  height: 50px;
  width: 50px;
  border-radius: 100%;
  z-index: 1;
  opacity: 0;
  margin: 0;
  transform: scale3d(1.5, 1.5, 1);
}
.radio label input[type=radio]:not(:checked) ~ .check:after {
  animation: rippleOff 500ms;
}
.radio label input[type=radio]:checked ~ .check:after {
  animation: rippleOn 500ms;
}
.radio input[type=radio] {
  opacity: 0;
  height: 0;
  width: 0;
  overflow: hidden;
}
.radio input[type=radio]:checked ~ .check, .radio input[type=radio]:checked ~ .circle {
  opacity: 1;
}
.radio input[type=radio]:checked ~ .check {
  background-color: #9c27b0;
}
.radio input[type=radio]:checked ~ .circle {
  border-color: #9c27b0;
}
.radio input[type=radio]:checked ~ .check {
  transform: scale3d(0.65, 0.65, 1);
}
.radio input[type=radio][disabled] ~ .check, .radio input[type=radio][disabled] ~ .circle {
  opacity: 0.26;
}
.radio input[type=radio][disabled] ~ .check {
  background-color: #000000;
}
.radio input[type=radio][disabled] ~ .circle {
  border-color: #000000;
}

@keyframes  rippleOn {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.2;
  }
  100% {
    opacity: 0;
  }
}
@keyframes  rippleOff {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.2;
  }
  100% {
    opacity: 0;
  }
}
.checkbox label {
  cursor: pointer;
  padding-left: 0;
  color: rgba(0,0,0, 0.26);
}
.form-group.is-focused .checkbox label {
  color: rgba(0,0,0, 0.26);
}
.form-group.is-focused .checkbox label:hover, .form-group.is-focused .checkbox label:focus {
  color: rgba(0,0,0, .54);
}
fieldset[disabled] .form-group.is-focused .checkbox label {
  color: rgba(0,0,0, 0.26);
}
.checkbox input[type=checkbox] {
  opacity: 0;
  position: absolute;
  margin: 0;
  z-index: -1;
  width: 0;
  height: 0;
  overflow: hidden;
  left: 0;
  pointer-events: none;
}
.checkbox .checkbox-material {
  vertical-align: middle;
  position: relative;
  top: 3px;
  padding-right: 5px;
}
.checkbox .checkbox-material:before {
  display: block;
  position: absolute;
  left: 0;
  content: "";
  background-color: rgba(0, 0, 0, 0.84);
  height: 20px;
  width: 20px;
  border-radius: 100%;
  z-index: 1;
  opacity: 0;
  margin: 0;
  transform: scale3d(2.3, 2.3, 1);
}
.checkbox .checkbox-material .check {
  position: relative;
  display: inline-block;
  width: 20px;
  height: 20px;
  border: 1px solid rgba(0,0,0, .54);
  overflow: hidden;
  z-index: 1;
  border-radius: 3px;
}
.checkbox .checkbox-material .check:before {
  position: absolute;
  content: "";
  transform: rotate(45deg);
  display: block;
  margin-top: -3px;
  margin-left: 7px;
  width: 0;
  height: 0;
  background: red;
  box-shadow: 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0, 0 0 0 0 inset;
  animation: checkbox-off 0.3s forwards;
}
.checkbox input[type=checkbox]:focus + .checkbox-material .check:after {
  opacity: 0.2;
}
.checkbox input[type=checkbox]:checked + .checkbox-material .check {
  background: #9c27b0;
}
.checkbox input[type=checkbox]:checked + .checkbox-material .check:before {
  color: #FFFFFF;
  box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0px 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
  animation: checkbox-on 0.3s forwards;
}
.checkbox input[type=checkbox]:checked + .checkbox-material:before {
  animation: rippleOn 500ms;
}
.checkbox input[type=checkbox]:checked + .checkbox-material .check:after {
  animation: rippleOn 500ms forwards;
}
.checkbox input[type=checkbox]:not(:checked) + .checkbox-material:before {
  animation: rippleOff 500ms;
}
.checkbox input[type=checkbox]:not(:checked) + .checkbox-material .check:after {
  animation: rippleOff 500ms;
}
fieldset[disabled] .checkbox, fieldset[disabled] .checkbox input[type=checkbox],
.checkbox input[type=checkbox][disabled] ~ .checkbox-material .check,
.checkbox input[type=checkbox][disabled] + .circle {
  opacity: 0.5;
}
.checkbox input[type=checkbox][disabled] ~ .checkbox-material .check {
  border-color: #000000;
  opacity: .26;
}
.checkbox input[type=checkbox][disabled] + .checkbox-material .check:after {
  background-color: rgba(0,0,0, 0.87);
  transform: rotate(-45deg);
}

@keyframes  checkbox-on {
  0% {
    box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0px 32px 0 20px, -5px 5px 0 10px, 15px 2px 0 11px;
  }
  50% {
    box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0px 32px 0 20px, -5px 5px 0 10px, 20px 2px 0 11px;
  }
  100% {
    box-shadow: 0 0 0 10px, 10px -10px 0 10px, 32px 0 0 20px, 0px 32px 0 20px, -5px 5px 0 10px, 20px -12px 0 11px;
  }
}
@keyframes  rippleOn {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.2;
  }
  100% {
    opacity: 0;
  }
}
@keyframes  rippleOff {
  0% {
    opacity: 0;
  }
  50% {
    opacity: 0.2;
  }
  100% {
    opacity: 0;
  }
}
@media (max-width: 768px) {
  .main .container {
    margin-bottom: 50px;
  }
}
@media (min-width: 768px) {
  .navbar-form {
    margin-top: 21px;
    margin-bottom: 21px;
    padding-left: 5px;
    padding-right: 5px;
  }

  .btn-wd {
    min-width: 140px;
  }
}





.logo-container{
    left: 50px;
    position: absolute;
    top: 20px;
    z-index: 3;
}
.logo-container .logo{
    overflow: hidden;
    border-radius: 50%;
    border: 1px solid #333333;
    width: 60px;
    float: left;
}
.logo-container .brand{
    font-size: 18px;
    color: #FFF;
    line-height: 20px;
    float: left;
    margin-left: 10px;
    margin-top: 10px;
    width: 60px
}

body{
    background-color: #CCCCCC;
}

.section .wizard-card{
    min-height: inherit;
}





.title.text-center{
    margin-bottom: 50px;
}

.switch{
    margin-right: 20px;
}

#buttons .btn{
    margin: 0 0px 15px;
}



.txt-white{
    color: #FFFFFF;
}
.txt-gray{
    color: #ddd !important;
}


.parallax{
  width:100%;
  height:570px;

  display: block;
  background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
    background-position: center center;

}

.logo-container.logo-documentation{
    position: relative;
    top: 0;
    left: 0;
}

.logo-container .logo{
    overflow: hidden;
    border-radius: 50%;
    border: 1px solid #333333;
    width: 50px;
    float: left;
}

.logo-container .brand{
    font-size: 16px;
    line-height: 18px;
    float: left;
    margin-left: 10px;
    margin-top: 7px;
    width: 70px;
    height: 40px;
    text-align: left;
}


.
.logo-container .brand-material{
    font-size: 18px;
    margin-top: 15px;
    height: 25px;
    width: auto;
}

.logo-container .logo img{
    width: 100%;
}
.navbar-small .logo-container .brand{
    color: #333333;
}

.fixed-section{
    top: 90px;
    max-height: 80vh;
    overflow: scroll;
}
.fixed-section ul li{
    list-style: none;
}
.fixed-section li a{
    font-size: 14px;
    padding: 2px;
    display: block;
    color: #666666;
}
.fixed-section li a.active{
    color: #00bbff;
}
.fixed-section.float{
    position: fixed;
    top: 100px;
    width: 200px;
    margin-top: 0;
}


.parallax .parallax-image{
    width: 100%;
    overflow: hidden;
    position: absolute;
}
.parallax .parallax-image img{
    width: 100%;
}

@media (max-width: 768px){
    .parallax .parallax-image{
         width: 100%;
         height: 640px;
         overflow: hidden;
     }
    .parallax .parallax-image img{
       height: 100%;
       width: auto;
   }
}

.img-container{
    width: 100%;
    overflow: hidden;
}
.img-container img{
    width: 100%;
}

.lightbox img{
    width: 100%;
}
.lightbox .modal-content{
    overflow: hidden;
}
.lightbox .modal-body{
    padding: 0;
}
@media  screen and (min-width: 991px){
    .lightbox .modal-dialog{
        width: 960px;
    }
}

</style>