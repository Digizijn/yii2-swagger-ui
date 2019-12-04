<?php

/* @var $this \yii\web\View */

?>
<div id="message-bar" class="swagger-ui-wrap" data-sw-translate>&nbsp;</div>
<div id="swagger-ui-container" class="swagger-ui-wrap"></div>

<?php

$this->registerJs(<<<SCRIPT
    var url = window.location.search.match(/url=([^&]+)/);
    if (url && url.length > 1) {
        url = decodeURIComponent(url[1]);
    } else {
        url = "/documentation.json";
    }

    window.onload = function() {
        // Pre load translate...
        if (window.SwaggerTranslator) {
            window.SwaggerTranslator.translate();
        }
        const ui = SwaggerUIBundle({
            url: url,
            dom_id: "#swagger-ui-container",
            deepLinking: true,            
            presets: [
              SwaggerUIBundle.presets.apis,
              SwaggerUIStandalonePreset
            ],
            layout: "StandaloneLayout",
            docExpansion: "none",
            apisSorter: "alpha",
            showRequestHeaders: false,
            supportedSubmitMethods: ['get', 'post', 'put', 'delete', 'patch'],
            onComplete: function(swaggerApi, swaggerUi){
                if (typeof initOAuth == "function") {
                    initOAuth({
                        clientId: "your-client-id",
                        clientSecret: "your-client-secret-if-required",
                        realm: "your-realms",
                        appName: "your-app-name",
                        scopeSeparator: ","
                    });
                }
    
                if (window.SwaggerTranslator) {
                    window.SwaggerTranslator.translate();
                }
    
                $('pre code').each(function(i, e) {
                    hljs.highlightBlock(e)
                });
    
                addApiKeyAuthorization();
            },
            onFailure: function(data) {
                log("Unable to Load SwaggerUI");
            }
        });
        
        window.ui = ui
    }

    function addApiKeyAuthorization(){
        //var key = encodeURIComponent($('#input_apiKey')[0].value);
        var user = encodeURIComponent($('#input_user')[0].value);
        var pass = encodeURIComponent($('#input_pass')[0].value);
        //if (key && key.trim() != "") {
        if(user && user.trim() != "" && pass & pass.trim() != ""){
            //var apiKeyAuth = new SwaggerClient.ApiKeyAuthorization("api_key", key, "query");
            var apiKeyAuth = new SwaggerClient.ApiKeyAuthorization("Authorization", "Basic " + btoa(user + ":" + pass, "header"));
            //window.swaggerUi.api.clientAuthorizations.add("api_key", apiKeyAuth);
            window.ui.api.clientAuthorizations.add("key", apiKeyAuth);
            log("added key " + key);
        }
    }

    $('#input_apiKey').change(addApiKeyAuthorization);

    // if you have an apiKey you would like to pre-populate on the page for demonstration purposes...
    /*
     var apiKey = "myApiKeyXXXX123456789";
     $('#input_apiKey').val(apiKey);
     */

//    window.swaggerUi.load();

    function log() {
        if ('console' in window) {
            console.log.apply(console, arguments);
        }
    }
SCRIPT
);
?>
