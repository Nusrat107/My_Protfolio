@extends('frontend.master')

@section('content')

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section mt-5">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <div class="col-lg-4 order-lg-2">

            <div class="sticky-sidebar">

              <div class="service-card" data-aos="fade-left" data-aos-delay="200">
                <div class="card-header">
                  <div class="service-icon">
                    <i class="bi bi-code-square"></i>
                  </div>
                  <h3>Web Development</h3>
                  <p class="service-tagline">Full-Stack Solutions</p>
                </div>
                <div class="card-body">
                  <div class="price-tag">
                    <span class="label">Starting at</span>
                    <span class="price">$2,500</span>
                  </div>
                  <ul class="quick-info">
                    <li>
                      <i class="bi bi-clock"></i>
                      <span>4-6 weeks delivery</span>
                    </li>
                    <li>
                      <i class="bi bi-arrow-repeat"></i>
                      <span>Unlimited revisions</span>
                    </li>
                    <li>
                      <i class="bi bi-shield-check"></i>
                      <span>60 days support</span>
                    </li>
                  </ul>
                  <div class="cta-buttons">
                    <a href="#" class="btn-primary">Start Project</a>
                    <a href="#" class="btn-secondary">Schedule Call</a>
                  </div>
                </div>
              </div>

              <div class="contact-card" data-aos="fade-left" data-aos-delay="300">
                <h4>Have Questions?</h4>
                <p>Let's discuss your project requirements and how I can help.</p>
                <div class="contact-methods">
                  <a href="mailto:hello@example.com" class="contact-item">
                    <i class="bi bi-envelope"></i>
                    <span>hello@example.com</span>
                  </a>
                  <a href="tel:+15551234567" class="contact-item">
                    <i class="bi bi-telephone"></i>
                    <span>+1 (555) 123-4567</span>
                  </a>
                </div>
              </div>

            </div>

          </div>

          <div class="col-lg-8 order-lg-1">

            <div class="service-overview" data-aos="fade-up" data-aos-delay="200">
              <div class="overview-header">
                <span class="badge">Premium Service</span>
                <h2>Professional Web Development That Drives Results</h2>
              </div>
              <p class="lead-text">Transform your digital presence with custom web solutions built to perform. I specialize in creating high-performance websites that combine stunning design with powerful functionality, delivering exceptional user experiences that convert visitors into customers.</p>
            </div>

            <div class="service-image-showcase" data-aos="zoom-in" data-aos-delay="300">
              <img src="{{asset('frontend/assets/img/services/services-1.webp')}}" alt="Web Development" class="img-fluid main-image">
              <div class="image-overlay">
                <div class="tech-stack">
                  <span class="tech-item">React</span>
                  <span class="tech-item">Node.js</span>
                  <span class="tech-item">MongoDB</span>
                </div>
              </div>
            </div>

            <div class="features-grid" data-aos="fade-up" data-aos-delay="400">
              <h3 class="section-heading">What You Get</h3>
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="feature-box">
                    <div class="icon-wrapper">
                      <i class="bi bi-layers"></i>
                    </div>
                    <h4>Modern Architecture</h4>
                    <p>Scalable, maintainable code structure using the latest web technologies and best practices for long-term success.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="feature-box">
                    <div class="icon-wrapper">
                      <i class="bi bi-speedometer2"></i>
                    </div>
                    <h4>Lightning Fast</h4>
                    <p>Optimized performance with lazy loading, code splitting, and CDN integration for instant page loads.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="feature-box">
                    <div class="icon-wrapper">
                      <i class="bi bi-phone-landscape"></i>
                    </div>
                    <h4>Responsive Design</h4>
                    <p>Pixel-perfect layouts that adapt seamlessly across all devices, from mobile phones to large desktop screens.</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="feature-box">
                    <div class="icon-wrapper">
                      <i class="bi bi-graph-up"></i>
                    </div>
                    <h4>SEO Optimized</h4>
                    <p>Search engine friendly structure with semantic HTML, meta tags, and performance optimizations built in.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="workflow-section" data-aos="fade-up" data-aos-delay="500">
              <h3 class="section-heading">Development Workflow</h3>
              <div class="timeline">
                <div class="timeline-item">
                  <div class="timeline-marker">1</div>
                  <div class="timeline-content">
                    <h4>Strategy &amp; Planning</h4>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
                    <span class="duration">1 week</span>
                  </div>
                </div>
                <div class="timeline-item">
                  <div class="timeline-marker">2</div>
                  <div class="timeline-content">
                    <h4>Design &amp; Prototyping</h4>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae.</p>
                    <span class="duration">1-2 weeks</span>
                  </div>
                </div>
                <div class="timeline-item">
                  <div class="timeline-marker">3</div>
                  <div class="timeline-content">
                    <h4>Development &amp; Testing</h4>
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>
                    <span class="duration">2-3 weeks</span>
                  </div>
                </div>
                <div class="timeline-item">
                  <div class="timeline-marker">4</div>
                  <div class="timeline-content">
                    <h4>Launch &amp; Optimization</h4>
                    <p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur vel illum qui dolorem.</p>
                    <span class="duration">1 week</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="testimonial-section" data-aos="fade-up" data-aos-delay="600">
              <div class="testimonial-card">
                <div class="stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
                <blockquote>
                  "Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Exceptional work and outstanding communication throughout."
                </blockquote>
                <div class="client-info">
                  <img src="{{asset('frontend/assets/img/person/person-m-5.webp')}}" alt="Michael Chen" class="client-avatar">
                  <div class="client-details">
                    <h5>Michael Chen</h5>
                    <p>Founder, TechStart Inc.</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="tech-details" data-aos="fade-up" data-aos-delay="700">
              <h3 class="section-heading">Technologies &amp; Tools</h3>
              <div class="tech-categories">
                <div class="tech-category">
                  <h5>Frontend</h5>
                  <div class="tech-tags">
                    <span>React</span>
                    <span>Vue.js</span>
                    <span>TypeScript</span>
                    <span>Tailwind CSS</span>
                    <span>SASS</span>
                  </div>
                </div>
                <div class="tech-category">
                  <h5>Backend</h5>
                  <div class="tech-tags">
                    <span>Node.js</span>
                    <span>Express</span>
                    <span>Python</span>
                    <span>Django</span>
                    <span>REST API</span>
                  </div>
                </div>
                <div class="tech-category">
                  <h5>Database</h5>
                  <div class="tech-tags">
                    <span>MongoDB</span>
                    <span>PostgreSQL</span>
                    <span>Redis</span>
                    <span>Firebase</span>
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

    <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection