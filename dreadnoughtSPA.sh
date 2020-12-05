rm -r API/public_html/css API/public_html/js API/public_html/fonts API/public_html/img API/public_html/favicon.ico
rsync -av --exclude='index.html' spa/dist/ API/public_html/
cp spa/dist/index.html API/views/welcome.blade.php
