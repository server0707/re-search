<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><?= Yii::$app->name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Bosh sahifa',
                        'icon' => 'home',
//                        'badge' => '<span class="right badge badge-info">2</span>',
                        'url' => ['site/index'],
                        /*'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                        ]*/
                    ],
                    [
                        'label' => 'Jurnallar',
                        'icon' => 'book',
                        'badge' => '<span class="right badge badge-danger">'.\common\models\Journal::find()->count().'</span>',
                        'url' => ['/journals'],
                    ],
                    [
                        'label' => 'Maqolalar',
                        'icon' => 'newspaper',
                        'badge' => '<span class="right badge badge-danger">'.\common\models\Article::find()->count().'</span>',
                        'url' => ['/articles'],
                    ],
                    [
                        'label' => 'Yangiliklar',
                        'icon' => 'newspaper',
                        'badge' => '<span class="right badge badge-danger">'.\common\models\News::find()->count().'</span>',
                        'url' => ['/news'],
                    ],
                    [
                        'label' => 'Tahririyat',
                        'icon' => 'spell-check',
                        'badge' => '<span class="right badge badge-danger">'.\common\models\Editorials::find()->count().'</span>',
                        'url' => ['/editorials'],
                    ],
                    [
                        'label' => 'Aloqa',
                        'icon' => 'spell-check',
                        'badge' => '<span class="right badge badge-warning">'.\common\models\Contacts::find()->where(['viewed' => false])->count().'</span>'.'<span class="right badge badge-danger">'.\common\models\Contacts::find()->count().'</span>',
                        'url' => ['/contacts'],
                    ],
                    [
                        'label' => 'Interaktiv xizmatlar',
                        'icon' => 'spell-check',
                        'badge' => '<span class="right badge badge-warning">'.\common\models\InteractiveServices::find()->where(['viewed' => false])->count().'</span>'.'<span class="right badge badge-danger">'.\common\models\InteractiveServices::find()->count().'</span>',
                        'url' => ['/interactive-services'],
                    ],
                    [
                        'label' => 'Kalit so\'zlar',
                        'icon' => 'tags',
                        'badge' => '<span class="right badge badge-danger">'.\common\models\Keyword::find()->count().'</span>',
                        'url' => ['/keywords'],
                    ],
                    [
                        'label' => 'Adminlar',
                        'icon' => 'users',
                        'badge' => '<span class="right badge badge-danger">'.\common\models\User::find()->count().'</span>',
                        'url' => ['/user'],
                    ],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
//                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii', 'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
//                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
//                    ['label' => 'Level1'],
//                    [
//                        'label' => 'Level1',
//                        'items' => [
//                            ['label' => 'Level2', 'iconStyle' => 'far'],
//                            [
//                                'label' => 'Level2',
//                                'iconStyle' => 'far',
//                                'items' => [
//                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
//                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle'],
//                                    ['label' => 'Level3', 'iconStyle' => 'far', 'icon' => 'dot-circle']
//                                ]
//                            ],
//                            ['label' => 'Level2', 'iconStyle' => 'far']
//                        ]
//                    ],
//                    ['label' => 'Level1'],
//                    ['label' => 'LABELS', 'header' => true],
//                    ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
//                    ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
//                    ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>