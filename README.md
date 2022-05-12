<p align="center">
    <h1 align="center">Ilmiy maqolalarni qabul qilish va chop etish loyihasi</h1>
    <br>
</p>

Loyiha PHP Yii Framework 2 da qilingan.

<p align="center">
    <h1>Loyiha qanday ishga tushuriladi?</h1>
</p>

<ol>
    <li>loyiha kod fayllari php serverining papkasiga clon qilib olinadi</li>
    <li>Terminal(command line)da loyiha joylashgan papkaga o'tiladi va <br><code>php yii init</code><br> buyrug'i yoziladi.</li>
    <li>Terminal(command line)da loyiha joylashgan papkaga o'tiladi va <br><code>composer update</code><br> buyrug'i yoziladi. (composer buyruqlarini yurgazish uchun sizda <a href="https://getcomposer.org/download/">Composer</a> o'rnatilgan bo'lishi lozim!)</li>
    <li>MySQL serverida ixtiyoriy nom bilan(masalan: "re-search") ma'lumotlar bazasi yaratiladi</li>
    <li>/common/config/main-local.php faylini oching va "dbname" qiymatini "re-search" dan ozingiz yaratgan ma'lumotlar bazasi nomiga ozgartiring.</li>
    <li>Terminalda loyiha joylashgan papkaga o'tib, <br><code>yii migrate</code><br>
    buyrug'ini yozing va ENTER ni bosing. Qo'shimcha sorovlar uchun terminalga "yes" ni yozib ENTER ni bosing</li>
    <li>Loyiha ishlashga tayyor! Endi uni serveringiz orqali ishlatishingiz mumkin.</li>
    <li>Admin login:    admin <br> Admin parol:     admin</li>
    <li>User login:    user <br> User parol:     user</li>
</ol>