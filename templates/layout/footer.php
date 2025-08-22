<footer class="site-footer bg-dark text-light py-5" role="contentinfo">
    <div class="container">
        <div class="row">
            <!-- Company Information -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-white mb-3"><?= e(config('site.company_name')) ?></h5>
                <p class="text-light"><?= e(config('contact.address.full')) ?></p>
                <p class="text-light">
                    <i class="fas fa-phone me-2"></i>
                    <a href="tel:<?= e(config('contact.phones.0')) ?>" class="text-light text-decoration-none">
                        <?= formatPhone(config('contact.phones.0')) ?>
                    </a>
                </p>
                <p class="text-light">
                    <i class="fas fa-envelope me-2"></i>
                    <a href="mailto:<?= e(config('contact.email')) ?>" class="text-light text-decoration-none">
                        <?= e(config('contact.email')) ?>
                    </a>
                </p>
            </div>
            
            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-white mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <?php foreach (getNavigationMenu() as $menuItem): ?>
                        <li class="mb-2">
                            <a href="<?= e($menuItem['url']) ?>" class="text-light text-decoration-none">
                                <?= e($menuItem['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Services -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="text-white mb-3">Our Services</h6>
                <ul class="list-unstyled">
                    <?php foreach (getFeaturedServices() as $service): ?>
                        <li class="mb-2">
                            <a href="<?= url($service['Slug']) ?>" class="text-light text-decoration-none">
                                <?= e($service['Name']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Social Media -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="text-white mb-3">Follow Us</h6>
                <div class="d-flex">
                    <?php foreach (socialLinks() as $social): ?>
                        <a href="<?= e($social['url']) ?>" 
                           class="text-light me-3" 
                           title="<?= e($social['label']) ?>"
                           target="_blank" 
                           rel="noopener noreferrer"
                           aria-label="Follow us on <?= e($social['label']) ?>">
                            <?= $social['icon'] ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <hr class="my-4 border-light">
        
        <!-- Copyright -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-light"><?= copyright() ?></p>
            </div>
            <div class="col-md-6 text-md-end">
                <ul class="list-inline mb-0">
                    <?php foreach (getFooterMenu() as $footerItem): ?>
                        <li class="list-inline-item">
                            <a href="<?= e($footerItem['url']) ?>" class="text-light text-decoration-none">
                                <?= e($footerItem['label']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
