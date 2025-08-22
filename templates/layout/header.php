<header class="site-header" role="banner">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" aria-label="Main navigation">
        <div class="container">
            <!-- Brand/Logo -->
            <a class="navbar-brand" href="<?= url() ?>" title="<?= e(config('site.company_name')) ?>">
                <img src="<?= asset('images/logo.png') ?>" alt="<?= e(config('site.company_name')) ?>" height="40" class="d-inline-block align-text-top">
                <?= e(config('site.company_name')) ?>
            </a>
            
            <!-- Mobile menu toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Navigation menu -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php foreach (getNavigationMenu() as $menuItem): ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $menuItem['class'] ?>" 
                               href="<?= e($menuItem['url']) ?>"
                               <?= $menuItem['active'] ? 'aria-current="page"' : '' ?>>
                                <?= e($menuItem['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Breadcrumbs (only show on non-home pages) -->
    <?php if (currentPage() !== 'home'): ?>
        <div class="container">
            <?= generateBreadcrumbs(getCurrentBreadcrumbs()) ?>
        </div>
    <?php endif; ?>
</header>
