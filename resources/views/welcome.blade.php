<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <title>Bubble Works</title>
</head>

<body>

    <!-- HEADER->Navbar->Hero -->
    <header>

        <!-- nav bar -->
        <nav>
            <div class="nav">
                <a href="/" class="nav-logo">Bubbleworks</a>
                <ul class="nav-links">

                    <li><a href="/" class="btn">Home</a></li>
                    <li><a href="" class="btn">Contact Us</a></li>
                    <li><a href="{{ route('login') }}" class="btn btn-secondary">Log In</a></li>
                    <li><a href="{{ route('users.register') }}" class="btn btn-primary">Sign Up</a></li>

                </ul>
            </div>
        </nav>

        <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->

        <section class="hero-section">
            <div>
                <h1>Fresh, Fast, Effortless
                    <br> Laundry That Lets You Live
                </h1>
                <p>Schlitz live-edge PBR&B sartorial, literally organic venmo bicycle rights butcher kale chips
                    kickstarter
                    banjo tumeric blackbird spyplane. </p>
                <a href="" class="btn btn-hero-cta">Get Your Clothes Ready</a>
            </div>

        </section>

    </header>

    {{-- MAIN->Services->Testimonials --}}
    <main>
        <!-- services section -->
        <h1 id="service-header">Our Services</h1>
        <section class="service service1">
            <img src="{{ asset('images/dropoff.jpg') }}" alt="Clothes being dropped off.">
            <div>
                <h2><span>Drop off</span></h2>
                <p> Leave your laundry with us, and we'll take care of the rest. </p>
                <br>
                <p>Turnaround time:</p>
                <p><span>1 business day</span></p>
                <br>
                <p>Price:</p>
                <p><span>Php 30.00 per kg</span></p>
                <br>
                <p>Maximum weight:</p>
                <p> <span>15kg per bag</span>
                </p>
            </div>
        </section>

        <section class="service service2">
            <div>

                <h2><span>Self service</span></h2>
                <p> Do your laundry at your own pace. Affordable and convenient. </p>

                <br>
                <p>Price:</p>
                <p><span>Php 30.00 per kg</span></p>
                <br>
                <p>Maximum weight:</p>
                <p> <span>15kg per bag</span></p>


            </div>
            <img src="{{ asset('images/selfservice.jpg') }}" alt="Person folding clothes.">

        </section>



        <h1 id="testimonial-header">Our Customers <span style="color: #fdaaaa;">Love Us</span> — Here’s Why</h1>

        <!-- testimonials section -->
        <section class="testimonial">

            <div class="testimonial-card">
                <img src="{{ asset('images/testimonial1.jpg') }}" alt="Smiling woman giving thumbs up.">
                <p>"I’ve never had my clothes so clean and fresh. The staff is incredibly friendly and efficient!"</p>
                <div class="stars">★★★★★</div>
                <h2>Alicia Bennett</h2>
            </div>

            <div class="testimonial-card">
                <img src="{{ asset('images/testimonial2.jpg') }}" alt="Smiling man in cap.">
                <p>"Fast service and affordable prices. I drop off my laundry weekly and it’s always perfect."</p>
                <div class="stars">★★★★★</div>
                <h2>Mark Rivera</h2>
            </div>

            <div class="testimonial-card">
                <img src="{{ asset('images/testimonial3.jpg') }}" alt="Smiling man in cap.">
                <p>"The best laundry shop in town! My delicate clothes are always handled with care and
                    professionalism."</p>
                <div class="stars">★★★★★</div>
                <h2>Sophie Carter</h2>
            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <!-- CTA Section -->
        <!-- CTA Section -->
        <div class="footer-cta">
            <h2>Ready to Elevate Your Experience?</h2>
            <p>Join thousands who trust us for fast, reliable, and stylish service. Whether you're craving quality,
                convenience, or a bit of both—we've got you covered.</p>
            <a href="#" class="btn-cta">Get Started Today</a>
        </div>


        <!-- Footer Links -->
        <div class="footer-links">
            <div>
                <h3>About Us</h3>
                <ul>
                    <li>Polaroid waistcoat</li>
                    <li>Lumbersexual swag</li>
                    <li>Paleo brunch</li>
                </ul>
            </div>
            <div>
                <h3>Our Locations</h3>
                <ul>
                    <li>Ecoland</li>
                    <li>Bankal</li>
                    <li>UM Matina</li>
                </ul>
            </div>
            <div>
                <h3>Our Services</h3>
                <ul>
                    <li>Self service</li>
                    <li>Drop in</li>
                    <li>Pick up and deliver</li>
                </ul>
            </div>
            <div>
                <h3>Contact</h3>
                <ul>
                    <li>Matina, Davao City</li>
                    <li>+6309092134</li>
                    <li>bubbleworks@gmail.com</li>
                    <li><a href="#">facebook.com/bubbleworks</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; 2025 Bubbleworks. All rights reserved.</p>
        </div>
    </footer>


</body>

</html>
