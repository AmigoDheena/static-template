<!-- Services Page Example Template -->
<section class="page-header bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3"><?= e(getVar('page_title', 'Services Page Title')) ?></h1>
                <p class="lead"><?= e(getVar('page_description', 'Your services page description goes here.')) ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid Example -->
<section class="services-grid py-5">
    <div class="container">
        <!-- Featured Services Example -->
        <?php $featuredServices = getFeaturedServices(); ?>
        <?php if (!empty($featuredServices)): ?>
            <div class="row mb-5">
                <div class="col-12">
                    <h2 class="h3 mb-4 text-center">Featured Services</h2>
                    <p class="text-center text-muted">Replace getFeaturedServices() with your own data or modify includes/data/services.php</p>
                </div>
            </div>
            <div class="row g-4 mb-5">
                <?php foreach ($featuredServices as $service): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm service-card">
                            <div class="card-img-wrapper position-relative overflow-hidden">
                                <!-- Example: Dynamic image path -->
                                <?= img('services/' . ($service['Image'] ?? 'default-service.jpg'), e($service['Name']), [
                                    'class' => 'card-img-top service-image',
                                    'style' => 'height: 250px; object-fit: cover;'
                                ]) ?>
                                <div class="card-img-overlay d-flex align-items-end p-0">
                                    <div class="bg-dark bg-opacity-75 text-white p-3 w-100">
                                        <span class="badge bg-primary">Featured</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= e($service['Name']) ?></h5>
                                <p class="card-text text-muted"><?= e(truncate($service['Desc'], 120)) ?></p>
                                
                                <?php if (isset($service['Price'])): ?>
                                    <p class="text-primary fw-bold mb-2">
                                        <i class="fas fa-tag me-1"></i><?= e($service['Price']) ?>
                                    </p>
                                <?php endif; ?>
                                
                                <?php if (isset($service['Category'])): ?>
                                    <p class="text-muted small mb-3">
                                        <i class="fas fa-folder me-1"></i><?= e($service['Category']) ?>
                                    </p>
                                <?php endif; ?>
                                
                                <?php if (isset($service['Keywords']) && is_array($service['Keywords'])): ?>
                                    <div class="mb-3">
                                        <?php foreach ($service['Keywords'] as $keyword): ?>
                                            <span class="badge bg-light text-dark me-1"><?= e($keyword) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer bg-transparent">
                                <div class="d-flex gap-2">
                                    <a href="<?= url($service['Slug']) ?>" class="btn btn-primary flex-fill">
                                        <i class="fas fa-info-circle me-1"></i>Learn More
                                    </a>
                                    <a href="<?= url('contact') ?>?service=<?= urlencode($service['Slug']) ?>" class="btn btn-outline-primary">
                                        <i class="fas fa-envelope me-1"></i>Quote
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <!-- No services message -->
            <div class="row">
                <div class="col-12 text-center py-5">
                    <h3>No Services Found</h3>
                    <p class="text-muted">Add your services to <code>includes/data/services.php</code></p>
                    <p class="small text-muted">This template shows how to display services when they exist.</p>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Additional Services Example -->
        <?php $allServices = getServicesForListing(); ?>
        <?php $nonFeaturedServices = array_filter($allServices, function($service) {
            return !isset($service['Featured']) || $service['Featured'] !== true;
        }); ?>
        
        <?php if (!empty($nonFeaturedServices)): ?>
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="h3 mb-4 text-center">Additional Services</h2>
                </div>
            </div>
            <div class="row g-4">
                <?php foreach ($nonFeaturedServices as $service): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm">
                            <div class="card-img-wrapper position-relative overflow-hidden">
                                <?= img('services/' . ($service['Image'] ?? 'default-service.jpg'), e($service['Name']), [
                                    'class' => 'card-img-top',
                                    'style' => 'height: 200px; object-fit: cover;'
                                ]) ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= e($service['Name']) ?></h5>
                                <p class="card-text text-muted"><?= e(truncate($service['Desc'], 100)) ?></p>
                                
                                <?php if (isset($service['Price'])): ?>
                                    <p class="text-primary fw-bold"><?= e($service['Price']) ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="<?= url($service['Slug']) ?>" class="btn btn-outline-primary w-100">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Call to Action Example -->
<section class="cta-section bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="h3 mb-3">Custom Call to Action</h2>
                <p class="lead text-muted mb-4">Replace this with your own call to action message and buttons.</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="<?= url('contact') ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Contact Us
                    </a>
                    <a href="tel:<?= e(config('contact.phones.0')) ?>" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-phone me-2"></i>Call Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom CSS for Services Page -->
<style>
.service-card {
    transition: transform 0.2s ease-in-out;
}

.service-card:hover {
    transform: translateY(-5px);
}

.service-image {
    transition: transform 0.3s ease;
}

.service-card:hover .service-image {
    transform: scale(1.05);
}

.card-img-wrapper {
    height: 250px;
}

@media (max-width: 768px) {
    .card-img-wrapper {
        height: 200px;
    }
}
</style>

<!-- 
Framework Usage Examples in this template:

1. Data Functions:
   - getFeaturedServices() - Get featured services from data file
   - getServicesForListing() - Get all services for listing
   - truncate($text, $length) - Truncate text helper

2. Image Helper:
   - img('path/image.jpg', 'Alt Text', ['class' => 'css-class', 'style' => 'css-style'])

3. URL Generation:
   - url('page-slug') - Generate clean URLs
   - url('contact') . '?param=value' - URLs with query parameters

4. Configuration:
   - config('contact.phones.0') - Get config values

5. Conditional Rendering:
   - Check if data exists before displaying
   - Handle empty states gracefully

6. PHP Array Functions:
   - array_filter() for filtering data
   - foreach loops for iteration
   - isset() for checking array keys
-->
