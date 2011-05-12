/**
 * editor_plugin_src.js
 *
 * Copyright 2009, Moxiecode Systems AB
 * Released under LGPL License.
 *
 * License: http://tinymce.moxiecode.com/license
 * Contributing: http://tinymce.moxiecode.com/contributing
 */

(function() {
    tinymce.PluginManager.requireLangPack('mztupload');

    tinymce.create('tinymce.plugins.mztuploadPlugin', {
        init : function(ed, url) {
            ed.addCommand('mceMztupload', function() {
                ed.windowManager.open({
                    file : ed.getParam("plugin_mztupload_url", url + "/upload.htm"),
                    width : 420 + parseInt(ed.getLang('mztupload.delta_width', 0)),
                    height : 225 + parseInt(ed.getLang('mztupload.delta_height', 0)),
                    inline : 1
                }, {
                    plugin_url : url, // Plugin absolute URL
                    some_custom_arg : 'custom arg' // Custom argument
                });
            });
            // Register example button
            ed.addButton('mztupload', {
                title : 'Insert File',
                cmd : 'mceMztupload',
                image : url + '/img/mztupload.gif'
            });

            // Add a node change handler, selects the button in the UI when a image is selected
            ed.onNodeChange.add(function(ed, cm, n) {
                cm.setActive('mztupload', n.nodeName == 'IMG');
            });
        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : 'mztupload plugin',
                author : 'AnkyLiu,mengdz',
                authorurl : 'http://www.mazentop.com/',
                infourl : 'http://www.mazentop.com/',
                version : "1.0"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('mztupload', tinymce.plugins.mztuploadPlugin);
})();