/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/address.js":
/*!*********************************!*\
  !*** ./resources/js/address.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).on('click', '.btn-add-address', function () {
  var input = "<fieldset class=\"address\">\n            <legend>\n                <button class=\"btn btn-link btn-add-address\" type=\"button\">Adicionar outro\n                    endere\xE7o</button>\n                    <button type=\"button\" class=\"btn btn-danger btn-sm btn-address-remove\">\n                        <i class=\"fas fa-trash\"></i>\n                    </button>\n            </legend>\n            <div class=\"row\">\n                <div class=\"col-md-6\">\n                    <div class=\"form-group\">\n                        <label>CEP</label>\n                        <input type=\"text\" name=\"zip_code[]\" class=\"form-control zip_code\" required />\n                    </div>\n                </div>\n            </div>\n            <div class=\"row\">\n                <div class=\"col-md-8\">\n                    <div class=\"form-group\">\n                        <label>Rua</label>\n                        <input type=\"text\" name=\"street[]\" class=\"form-control street\" required />\n                    </div>\n                </div>\n                <div class=\"col-md-4\">\n                    <div class=\"form-group\">\n                        <label>N\xBA</label>\n                        <input type=\"text\" name=\"number[]\" class=\"form-control number\" required />\n                    </div>\n                </div>\n            </div>\n            <div class=\"row\">\n                <div class=\"col-md-6\">\n                    <div class=\"form-group\">\n                        <label>Bairro</label>\n                        <input type=\"text\" name=\"district[]\" class=\"form-control district\" required />\n                    </div>\n                </div>\n                <div class=\"col-md-4\">\n                    <div class=\"form-group\">\n                        <label>Cidade</label>\n                        <input type=\"text\" name=\"city[]\" class=\"form-control city\" required />\n                    </div>\n                </div>\n                <div class=\"col-md-2\">\n                    <div class=\"form-group\">\n                        <label>UF</label>\n                        <select class=\"form-control uf\" name=\"uf[]\" required>\n                            <option value=\"\" disabled selected>...</option>\n                            <option value=\"AC\">AC</option>\n                            <option value=\"AL\">AL</option>\n                            <option value=\"AP\">AP</option>\n                            <option value=\"AM\">AM</option>\n                            <option value=\"BA\">BA</option>\n                            <option value=\"CE\">CE</option>\n                            <option value=\"DF\">DF</option>\n                            <option value=\"ES\">ES</option>\n                            <option value=\"GO\">GO</option>\n                            <option value=\"MA\">MA</option>\n                            <option value=\"MT\">MT</option>\n                            <option value=\"MS\">MS</option>\n                            <option value=\"MG\">MG</option>\n                            <option value=\"PA\">PA</option>\n                            <option value=\"PB\">PB</option>\n                            <option value=\"PR\">PR</option>\n                            <option value=\"PE\">PE</option>\n                            <option value=\"PI\">PI</option>\n                            <option value=\"RJ\">RJ</option>\n                            <option value=\"RN\">RN</option>\n                            <option value=\"RS\">RS</option>\n                            <option value=\"RO\">RO</option>\n                            <option value=\"RR\">RR</option>\n                            <option value=\"SC\">SC</option>\n                            <option value=\"SP\">SP</option>\n                            <option value=\"SE\">SE</option>\n                            <option value=\"TO\">TO</option>\n                        </select>\n                    </div>\n                </div>\n            </div>\n        </fieldset>";
  $('#list-address').append(input);
});
$(document).on('click', '.btn-address-remove', function () {
  var inputGroup = $(this).closest('.address');
  inputGroup.remove();
});

/***/ }),

/***/ 5:
/*!***************************************!*\
  !*** multi ./resources/js/address.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\vexpenses\resources\js\address.js */"./resources/js/address.js");


/***/ })

/******/ });