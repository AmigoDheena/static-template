<!-- About Page Example Template -->
<section class="page-header bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3"><?= e(getVar('page_title', 'About Page Title')) ?></h1>
                <p class="lead"><?= e(getVar('page_description', 'Your about page description goes here.')) ?></p>
            </div>
        </div>
    </div>
</section>

<!-- About Content Example -->
<section class="about-content py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="h3 mb-4">Your Story Section</h2>
                <p class="lead">Replace this with your company story. Use <?= e(config('site.company_name')) ?> to display your company name from config.</p>
                <p>Add your company history, mission, and values here. This is example content to show how to structure an about page.</p>
                <p>You can use multiple paragraphs to tell your complete story and highlight what makes your business unique.</p>
            </div>
            <div class="col-lg-6">
                <!-- Example image usage -->
                <?= img('about-company.jpg', 'About ' . config('site.company_name'), ['class' => 'img-fluid rounded shadow']) ?>
            </div>
        </div>
        
        <!-- Values Section Example -->
        <div class="row text-center">
            <div class="col-12 mb-5">
                <h2 class="h3">Your Company Values</h2>
                <p class="lead text-muted">Replace with your actual values and principles</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="value-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4>Value 1</h4>
                    <p class="text-muted">Description of your first company value or principle.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="text-center">
                    <div class="value-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Value 2</h4>
                    <p class="text-muted">Description of your second company value or principle.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="text-center">
                    <div class="value-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; font-size: 2rem;">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Value 3</h4>
                    <p class="text-muted">Description of your third company value or principle.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section Example -->
<section class="stats-section bg-light py-5">
    <div class="container">
        <div class="row text-center">
            <!-- Replace these with your actual statistics -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <h3 class="display-6 fw-bold text-primary">XXX</h3>
                    <p class="h5 text-muted">Your Metric 1</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <h3 class="display-6 fw-bold text-primary">XXX</h3>
                    <p class="h5 text-muted">Your Metric 2</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <h3 class="display-6 fw-bold text-primary">XXX</h3>
                    <p class="h5 text-muted">Your Metric 3</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="stat-item">
                    <h3 class="display-6 fw-bold text-primary">XXX</h3>
                    <p class="h5 text-muted">Your Metric 4</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Example -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="h3 mb-3">Your Call to Action</h2>
                <p class="lead text-muted mb-4">Customize this section with your own call to action message.</p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="<?= url('contact') ?>" class="btn btn-primary btn-lg">
                        <i class="fas fa-envelope me-2"></i>Primary Action
                    </a>
                    <a href="<?= url('services') ?>" class="btn btn-outline-primary btn-lg">
                        <i class="fas fa-cogs me-2"></i>Secondary Action
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 
Framework Usage Examples in this template:

1. Page Variables:
   - getVar('page_title', 'Default Title')
   - getVar('page_description', 'Default Description')

2. Configuration:
   - config('site.company_name')

3. URL Generation:
   - url('contact')
   - url('services')

4. Asset Helpers:
   - img('image.jpg', 'Alt Text', ['class' => 'css-class'])

5. HTML Escaping:
   - e($variable) - Always escape user data

6. Template Structure:
   - Use semantic HTML5 sections
   - Bootstrap classes for responsive design
   - FontAwesome icons for visual elements
-->
