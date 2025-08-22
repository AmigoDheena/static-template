<!-- Service Detail Section -->
<section class="service-detail py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Service Header -->
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold mb-3"><?= e(getVar('page_title', 'Service')) ?></h1>
                    <?php if (getVar('page_description')): ?>
                        <p class="lead text-muted"><?= e(getVar('page_description')) ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- Service Image -->
                <div class="mb-5">
                    <img src="<?= asset('images/services/' . (getVar('page_slug', 'default') . '.jpg')) ?>" 
                         alt="<?= e(getVar('page_title', 'Service')) ?>" 
                         class="img-fluid rounded shadow">
                </div>
                
                <!-- Service Content -->
                <div class="service-content">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h3>What's Included</h3>
                            <ul class="list-unstyled">
                                <li><i class="fas fa-check text-success me-2"></i>Professional consultation</li>
                                <li><i class="fas fa-check text-success me-2"></i>High-quality deliverables</li>
                                <li><i class="fas fa-check text-success me-2"></i>Timely completion</li>
                                <li><i class="fas fa-check text-success me-2"></i>Customer support</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Service Details</h3>
                            <p><strong>Duration:</strong> Varies by project</p>
                            <p><strong>Pricing:</strong> Contact for quote</p>
                            <p><strong>Availability:</strong> Year-round</p>
                        </div>
                    </div>
                    
                    <!-- Full Description -->
                    <div class="mb-5">
                        <h3>Service Description</h3>
                        <p class="lead"><?= e(getVar('page_description', 'Professional service tailored to your needs.')) ?></p>
                    </div>
                </div>
                
                <!-- Call to Action -->
                <div class="text-center bg-light p-5 rounded">
                    <h3 class="mb-3">Interested in This Service?</h3>
                    <p class="mb-4">Contact us today to discuss your requirements and get a personalized quote.</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="tel:<?= e(config('contact.phones.0')) ?>" class="btn btn-primary btn-lg">
                            <i class="fas fa-phone me-2"></i>Call Now
                        </a>
                        <a href="<?= url('contact') ?>" class="btn btn-outline-primary btn-lg">
                            <i class="fas fa-envelope me-2"></i>Get Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Services Section -->
<section class="related-services bg-light py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h2 class="display-5 fw-bold mb-3">Other Services</h2>
                <p class="lead text-muted">Explore our other professional services that might interest you.</p>
            </div>
        </div>
        
        <div class="row g-4">
            <?php 
            $allServices = getFeaturedServices();
            $currentSlug = getVar('page_slug');
            $relatedServices = array_filter($allServices, function($service) use ($currentSlug) {
                return $service['Slug'] !== $currentSlug;
            });
            $relatedServices = array_slice($relatedServices, 0, 3);
            ?>
            
            <?php foreach ($relatedServices as $service): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= e($service['Name']) ?></h5>
                            <p class="card-text"><?= e(truncate($service['Desc'], 100)) ?></p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="<?= url($service['Slug']) ?>" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
