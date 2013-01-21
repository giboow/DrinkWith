/**
 * Generateur de lien en js
 * Exemple :
 * 		HTML :
 * 		<div class=".urlLink" ref="http://github.com"></div>
 * 		JS :
 * 			$('.urlLink').urlLink({});
 * 		JS (ajax) :
 * 			$('.urlLink').urlLink({
 * 				callback : function(url){
 * 					$.ajax({
 * 						url: url
 * 					}).done(function(response){
 * 						return response
 * 					});
 * 				}
 * 			});
 *
 * Possibilités options :
 * 		- callback : Fonction qui permet de traiter l'url (appel ajax ou autre)
 * 		- bindType : type d'interraction avec l'element, voir les evenements jquery
 *		- attrUrl : Attribut pour le stockage de l'url
 *		- cursor : type de curseur
 *		- openIn : ouvre la fenetre en mode __blank (false), __self(true) => utilisable si aucun callback
 */
(function($) {
    jQuery.fn.urlLink = function (options){
        urlLink(this, options);
    };

    function urlLink(element, options) {
        var defaultOptions = {
                callback : null,
                bindType : "click",
                attrUrl : "rel",
                cursor : "pointer",
                openIn : false,
        };

        this.element = element;

        this.callback = null;

        this._init = function(options) {
            var options = $.extend(defaultOptions, options);
            this.element.css('cursor', options.cursor);
            this.element.bind(options.bindType, function() {
                url = $(this).attr(options.attrUrl);
                if ((callback = options.callback) && $.isFunction(callback)) {
                    callback(url);
                } else {
                    var type = "_blank";
                    if(options.openIn) {
                        type = "_self";
                    }
                    window.open(url, type);
                }
            });
        };

        this._init(options);
    };
})(jQuery);