(function ($) {
    $.Logger = function( isDebugging, app ) {
        this.debug = {}
    
        if ( isDebugging ) {
            for ( var m in console ) {
                if ( typeof console[m] == 'function' ) {
                    this.debug[m] = console[m].bind(window.console, app.name + ":");
                }
            }
        }
        else {
            for ( var m in console ) {
                if ( typeof console[m] == 'function' ) {
                    this.debug[m] = function(){}
                }
            }
      }
      
      return this.debug
    }
})( jQuery );