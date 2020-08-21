<!-- 하이라이트 라이브러리 추가, 토스트 UI 에디터에서 사용됨 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/highlight.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/styles/default.min.css">

<!-- 하이라이트 라이브러리, 언어 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/php.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/php-template.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.1/languages/sql.min.js"></script>

<!-- 코드 미러 라이브러리 추가, 토스트 UI 에디터에서 사용됨 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.48.4/codemirror.min.css" />

<!-- 토스트 UI 에디터, 자바스크립트 코어 -->
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

<!-- 토스트 UI 에디터, 신택스 하이라이트 플러그인 추가 -->
<script
    src="https://uicdn.toast.com/editor-plugin-code-syntax-highlight/latest/toastui-editor-plugin-code-syntax-highlight-all.min.js">
</script>

<!-- 토스트 UI 에디터, CSS 코어 -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />

<script>
    //유튜브 플러그인 시작
    function youtubePlugin() {
        toastui.Editor.codeBlockManager.setReplacer("youtube", function (
            youtubeId) {
            // Indentify multiple code blocks
            const wrapperId = "yt" + Math.random().toString(36).substr(2, 10);

            // Avoid sanitizing iframe tag
            setTimeout(renderYoutube.bind(null, wrapperId, youtubeId), 0);

            return '<div id="' + wrapperId + '"></div>';
        });
    }

    function renderYoutube(wrapperId, youtubeId) {
        const el = document.querySelector('#' + wrapperId);

        var uriParams = getUriParams(youtubeId);

        var width = '100%';
        var height = '100%';

        if (uriParams.width) {
            width = uriParams.width;
        }

        if (uriParams.height) {
            height = uriParams.height;
        }

        var maxWidth = 500;

        if (uriParams['max-width']) {
            maxWidth = uriParams['max-width'];
        }

        var ratio = '16-9';

        if (uriParams['ratio']) {
            ratio = uriParams['ratio'];
        }

        var marginLeft = 'auto';

        if (uriParams['margin-left']) {
            marginLeft = uriParams['margin-left'];
        }

        var marginRight = 'auto';

        if (uriParams['margin-right']) {
            marginRight = uriParams['margin-right'];
        }

        if (youtubeId.indexOf('?') !== -1) {
            var pos = youtubeId.indexOf('?');
            youtubeId = youtubeId.substr(0, pos);
        }

        el.innerHTML = '<div style="max-width:' + maxWidth + 'px; margin-left:' + marginLeft + '; margin-right:' +
            marginRight + ';" class="ratio-' + ratio + ' relative"><iframe class="abs-full" width="' + width +
            '" height="' + height + '" src="https://www.youtube.com/embed/' + youtubeId +
            '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>';
    }
    // 유튜브 플러그인 끝

    // repl 플러그인 시작
    function replPlugin() {
        toastui.Editor.codeBlockManager.setReplacer("repl", function (replUri) {
            var postSharp = "";
            if (replUri.indexOf('#') !== -1) {
                var pos = replUri.indexOf('#');
                postSharp = replUri.substr(pos);
                replUri = replUri.substr(0, pos);
            }

            if (replUri.indexOf('?') === -1) {
                replUri += "?dummy=1";
            }

            replUri += "&lite=true";
            replUri += postSharp;

            // Indentify multiple code blocks
            const wrapperId = "yt" + Math.random().toString(36).substr(2, 10);

            // Avoid sanitizing iframe tag
            setTimeout(renderRepl.bind(null, wrapperId, replUri), 0);

            return "<div id=\"" + wrapperId + "\"></div>";
        });
    }

    function renderRepl(wrapperId, replUri) {
        const el = document.querySelector('#' + wrapperId);

        var uriParams = getUriParams(replUri);

        var height = 400;

        if (uriParams.height) {
            height = uriParams.height;
        }

        el.innerHTML = '<iframe height="' +
            height +
            'px" width="100%" src="' +
            replUri +
            '" scrolling="no" frameborder="no" allowtransparency="true" allowfullscreen="true" sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts allow-modals"></iframe>';
    }
    // repl 플러그인 끝

    // codepen 플러그인 시작
    function codepenPlugin() {
        toastui.Editor.codeBlockManager.setReplacer("codepen", function (
            codepenUri) {
            // Indentify multiple code blocks
            const wrapperId = "yt" + Math.random().toString(36).substr(2, 10);

            // Avoid sanitizing iframe tag
            setTimeout(renderCodepen.bind(null, wrapperId, codepenUri), 0);

            return '<div id="' + wrapperId + '"></div>';
        });
    }

    function renderCodepen(wrapperId, codepenUri) {
        const el = document.querySelector('#' + wrapperId);

        var uriParams = getUriParams(codepenUri);

        var height = 400;

        if (uriParams.height) {
            height = uriParams.height;
        }

        var width = '100%';

        if (uriParams.width) {
            width = uriParams.width;
        }

        if (!isNaN(width)) {
            width += 'px';
        }

        if (codepenUri.indexOf('#') !== -1) {
            var pos = codepenUri.indexOf('#');
            codepenUri = codepenUri.substr(0, pos);
        }

        el.innerHTML = '<iframe height="' + height + '" style="width: ' + width + ';" scrolling="no" title="" src="' +
            codepenUri + '" frameborder="no" allowtransparency="true" allowfullscreen="true"></iframe>';
    }
    // repl 플러그인 끝

    function ToastEditor__getBodyFromXTemplate($el) {
        return $el.html().trim().replace(/<!--REPLACE:script-->/gi, 'script');
    }

    function ToastEditor__init() {
        $('.toast-editor.toast-editor-viewer:not(.toast-editor-loaded)').each(
            function (index, el) {

                var $el = $(this);
                var initialValue = ToastEditor__getBodyFromXTemplate($el
                    .prev());

                var editor = new toastui.Editor.factory({
                    el: el,
                    viewer: true,
                    initialValue: initialValue,
                    plugins: [toastui.Editor.plugin.codeSyntaxHighlight,
                        youtubePlugin, replPlugin, codepenPlugin
                    ]
                });

                $el.addClass('toast-editor-loaded');

                $el.data('data-toast-editor', editor);
            });

        $('.toast-editor:not(.toast-editor-loaded)').each(
            function (index, el) {
                var $el = $(this);
                var height = jq_attr($el, 'data-toast-editor-height', 500);
                height = parseInt(height);
                var initialEditType = jq_attr($el,
                    'data-toast-editor-initialEditType', "markdown");
                var previewStyle = jq_attr($el,
                    'data-toast-editor-previewStyle', "vertical");
                var initialValue = ToastEditor__getBodyFromXTemplate($el
                    .prev());

                if ( initialValue == '' ) {
                    initialValue = ' ';
                }

                var editor = new toastui.Editor({
                    el: el,
                    height: height,
                    initialEditType: initialEditType,
                    previewStyle: previewStyle,
                    initialValue: initialValue,
                    plugins: [toastui.Editor.plugin.codeSyntaxHighlight,
                        youtubePlugin, replPlugin, codepenPlugin
                    ]
                });

                $el.addClass('toast-editor-loaded');

                $el.data('data-toast-editor', editor);
            });
    }

    $(function () {
        ToastEditor__init();
    });
</script> 