<!-- Contact Page Example Template -->
<section class="page-header bg-primary text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3"><?= e(getVar('page_title', 'Contact Page Title')) ?></h1>
                <p class="lead"><?= e(getVar('page_description', 'Your contact page description goes here.')) ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Example -->
<section class="contact-info py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Address Example -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-item text-center p-4 h-100 bg-light rounded">
                    <div class="contact-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4>Visit Us</h4>
                    <!-- Example: Using config for address -->
                    <p class="text-muted mb-0"><?= e(config('contact.address.full', 'Your Address Here')) ?></p>
                </div>
            </div>
            
            <!-- Phone Example -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-item text-center p-4 h-100 bg-light rounded">
                    <div class="contact-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h4>Call Us</h4>
                    <!-- Example: Loop through phone numbers -->
                    <?php foreach (config('contact.phones', ['Your Phone']) as $phone): ?>
                        <p class="mb-1">
                            <a href="tel:<?= e($phone) ?>" class="text-decoration-none">
                                <?= formatPhone($phone) ?>
                            </a>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <!-- Email Example -->
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="contact-item text-center p-4 h-100 bg-light rounded">
                    <div class="contact-icon bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4>Email Us</h4>
                    <p class="mb-0">
                        <a href="mailto:<?= e(config('contact.email', 'your@email.com')) ?>" class="text-decoration-none">
                            <?= e(config('contact.email', 'your@email.com')) ?>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Example -->
<section class="contact-form py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="bg-white p-5 rounded shadow">
                    <h2 class="h3 mb-4 text-center">Contact Form Example</h2>
                    <p class="text-center text-muted mb-4">This form shows framework features - modify for your needs</p>
                    
                    <form id="contactForm" method="POST" action="<?= url('contact') ?>" novalidate>
                        <!-- Example: CSRF Protection -->
                        <?= csrfField() ?>
                        
                        <!-- Service Selection Example -->
                        <?php $selectedService = get('service', ''); ?>
                        <?php if (!empty(getServicesForListing())): ?>
                            <div class="mb-3">
                                <label for="service" class="form-label">Service of Interest</label>
                                <select class="form-select" id="service" name="service">
                                    <option value="">Select a service (optional)</option>
                                    <?php foreach (getServicesForListing() as $service): ?>
                                        <option value="<?= e($service['Slug']) ?>" 
                                                <?= $selectedService === $service['Slug'] ? 'selected' : '' ?>>
                                            <?= e($service['Name']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <!-- Example: Using post() helper for sanitized input -->
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="<?= e(post('name', '')) ?>" required>
                                    <div class="invalid-feedback">Please provide your name.</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="<?= e(post('email', '')) ?>" required>
                                    <div class="invalid-feedback">Please provide a valid email address.</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                           value="<?= e(post('phone', '')) ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <input type="text" class="form-control" id="subject" name="subject" 
                                           value="<?= e(post('subject', '')) ?>" required>
                                    <div class="invalid-feedback">Please provide a subject.</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Message *</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required 
                                      placeholder="Tell us about your project or inquiry..."><?= e(post('message', '')) ?></textarea>
                            <div class="invalid-feedback">Please provide a message.</div>
                        </div>
                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="agree" name="agree" required>
                            <label class="form-check-label" for="agree">
                                I agree to the terms and conditions *
                            </label>
                            <div class="invalid-feedback">You must agree to the terms.</div>
                        </div>
                        
                        <div class="text-center">
                            <!-- Example: Check if form was submitted -->
                            <?php if (isPost()): ?>
                                <div class="alert alert-info">
                                    <strong>Form submitted!</strong> This is an example - add your form processing logic.
                                </div>
                            <?php endif; ?>
                            
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Contact Options Example -->
<section class="quick-contact py-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-12 mb-4">
                <h2 class="h3">Alternative Contact Methods</h2>
                <p class="lead text-muted">Customize these buttons for your preferred contact methods</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="tel:<?= e(config('contact.phones.0', '')) ?>" class="btn btn-outline-primary btn-lg w-100 py-3">
                    <i class="fas fa-phone mb-2 d-block" style="font-size: 1.5rem;"></i>
                    Call Now
                </a>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-3">
                <a href="mailto:<?= e(config('contact.email', '')) ?>" class="btn btn-outline-primary btn-lg w-100 py-3">
                    <i class="fas fa-envelope mb-2 d-block" style="font-size: 1.5rem;"></i>
                    Send Email
                </a>
            </div>
            
            <!-- Example: Conditional WhatsApp button -->
            <?php if (config('features.whatsapp_button')): ?>
                <div class="col-lg-3 col-md-6 mb-3">
                    <a href="https://api.whatsapp.com/send?phone=<?= e(config('contact.phones.0', '')) ?>" 
                       target="_blank" class="btn btn-outline-success btn-lg w-100 py-3">
                        <i class="fab fa-whatsapp mb-2 d-block" style="font-size: 1.5rem;"></i>
                        WhatsApp
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Form Validation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Bootstrap form validation example
    const forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
    
    // Contact form submission example
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            if (!contactForm.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            contactForm.classList.add('was-validated');
        });
    }
});
</script>

<!-- 
Framework Usage Examples in this template:

1. Security Functions:
   - csrfField() - CSRF protection for forms
   - post('field', 'default') - Sanitized POST data
   - get('param', 'default') - Sanitized GET data
   - e($data) - HTML escaping

2. Request Helpers:
   - isPost() - Check if form was submitted via POST
   - url('page') - Generate URLs

3. Configuration:
   - config('contact.email', 'default@email.com') - Get config with fallback
   - config('contact.phones', []) - Get array config values
   - config('features.whatsapp_button') - Feature toggles

4. Utility Functions:
   - formatPhone($phone) - Format phone numbers
   - getServicesForListing() - Get data from services file

5. Form Processing:
   - Pre-fill form fields with submitted data
   - Handle form validation and feedback
   - Conditional content based on POST data

6. Conditional Features:
   - Show/hide elements based on configuration
   - Handle missing data gracefully
-->
